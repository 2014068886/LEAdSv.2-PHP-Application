<?php
include 'db_conn_pdf.php';
require('fpdf.php');

class PDF extends FPDF
{
	function Header()
	{
		$this->Image('logo.png',10,-1,70);
		$this->SetFont('Arial','B',13);
		$this->Cell(80);
		$this->Cell(80,10,'LEAdS v.2 Logs',1,0,'C');
		$this->Ln(20);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

$day = $_POST['day'];
$date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $day)));

$database = new dbObj();
$result = $database->runQuery("SELECT location,moisture,rain,movement,date,level FROM logs where date(date) = '".$date."'");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`)
			FROM `INFORMATION_SCHEMA`.`COLUMNS`
			WHERE `TABLE_SCHEMA`='leads'
			AND `TABLE_NAME`='logs'
			and `COLUMN_NAME` in ('location','moisture','rain','movement','date','level')");

$pdf = new FPDF();
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',12);
foreach($header as $heading)
{
	foreach($heading as $column_heading)
		$pdf->Cell(43,12,$column_heading,1);
}
foreach($result as $row)
{
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(43,12,$column,1);
}

$pdf->Output();

?>
