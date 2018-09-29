<?php
require_once('bin//tcpdf/config/lang/eng.php');
require_once('bin/tcpdf/tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('Osama salama');
$pdf->SetAuthor("osama salama");
$pdf->SetTitle(@$page['title']);
$pdf->SetSubject($_SERVER['HTTP_HOST']." ©  ".date("Y/m/d H:i:s A"));
$pdf->SetKeywords("Controller V2  - ".@$page['title']);

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 039', PDF_HEADER_STRING);
$pdf->SetHeaderData("", "",$_SERVER['HTTP_HOST']." ©  ".date("Y/m/d H:i:s A"),$page['title'] . "-: للكاتب : ". "Admin");
$pdf->setHeaderFont(Array('almohanad', '', 10));
$pdf->setFooterFont(Array('almohanad', '', 12));
// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('almohanad', '', 12);

$pdf->Write(0,$page['title'], '', 0, 'R', true, 0, false, false, 'R');
$pdf->Ln();
// create some HTML content
$html = $page['content'];
// set core font
//$pdf->SetFont('helvetica', '', 10);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);

$pdf->Ln();

  $pdf->Ln(5);
 


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('page_01.pdf', 'D');
?>