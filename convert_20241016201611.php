<?php
require 'vendor/autoload.php'; // Include the library

use PDFShift\PDFShift;

// Set your API key from PDFShift
PDFShift::setApiKey('sk_3562357cf28a45fe7cb0ba77e53fa9aeba5a93ff');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST['url'];

    try {
        // Convert the URL to PDF
        $pdf = PDFShift::convert(array(
            "source" => $url
        ));

        // Send the generated PDF as a downloadable file
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="website.pdf"');
        echo $pdf;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
