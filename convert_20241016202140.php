<?php
require 'vendor/autoload.php'; // Include the library

use PDFShift\PDFShift;

// Set your API key from PDFShift
PDFShift::setApiKey('your_api_key_here'); // Keep this line for setting the API key

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST['url'];

    try {
        // Create an instance of the PDFShift class
        $pdfshift = new PDFShift();

        // Convert the URL to PDF using the instance
        $pdf = $pdfshift->convert(array(
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

