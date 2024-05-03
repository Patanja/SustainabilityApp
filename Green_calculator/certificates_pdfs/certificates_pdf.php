
<?php
session_start();

require ("../../vendor/autoload.php"); //access library required for FPDF
require ("../../db_connection.php"); //access database connection

$certificate= $_GET['id'];

$stmt = $link->prepare("SELECT * FROM certificates WHERE id = ?");
$stmt->bind_param("i", $certificate);
$stmt->execute();
$certificate = $stmt->get_result()->fetch_assoc();
$award = $certificate['award'];
$donationAmount = $certificate['donation_amount'];

if (isset($_SESSION['user']['company_name'])) {
    $companyName = $_SESSION['user']['company_name'];
} else {
    die('No company name found in session');
}


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 24);

// Title
$pdf->Cell(0, 10, 'Certificate of Recognition', 0, 1, 'C');

// Spacing
$pdf->Cell(0, 20, '', 0, 1);

$pdf->SetFont('Arial', '', 16);

// Company Name
$pdf->Cell(0, 10, 'Congratulations to:', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 10, $companyName, 0, 1, 'C');

// Spacing
$pdf->Cell(0, 20, '', 0, 1);

$pdf->SetFont('Arial', '', 16);


// Award
$pdf->Cell(0, 10, 'Whose efforts to contribute to sustainability obtained:', 0, 1, 'C');
$awardImage = "http://localhost/SustainabilityApp/Green_calculator/certificates_pdfs/award_images/{$certificate['award']}_award.png";

// Get the image dimensions in pixels
list($widthPx, $heightPx) = getimagesize($awardImage);

// Convert the image width from pixels to millimeters
$widthMm = $widthPx * 0.264583;

// Calculate the x-coordinate to center the image
$x = ($pdf->GetPageWidth() - $widthMm) / 2;

$pdf->Image($awardImage, $x, $y = null, $w = $widthMm, $h = 0, $type = '', $link = '', $align = '', $resize = false, $dpi = 300, $palign = '', $ismask = false, $imgmask = false, $border = 0);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 10, $award . ' award', 0, 1, 'C');



// Location and Date
$pdf->Cell(0, 10, 'Edinburgh, UK', 0, 1, 'C');
$issuedDate = $certificate['issued_date'];
$date = date_create_from_format('Y-m-d', $issuedDate);
$issuedDate = date_format($date, 'd/m/Y');
$pdf->Cell(0, 10, 'Issued on: ' . $issuedDate, 0, 1, 'C');

$pdf->Output();
?>