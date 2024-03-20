<?php
// Check if the file parameter is set and not empty
if (isset($_GET['file']) && !empty($_GET['file'])) {
    $file = $_GET['file'];
    
    // Define the directory where your files are stored
    $filepath = 'D:\sabawcode\midi' . $file;
    
    // Check if the file exists
    if (file_exists($filepath)) {
        // Set headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        // Read the file and output its contents
        readfile($filepath);
        exit;
    } else {
        // If the file does not exist, display an error message
        echo 'File not found.';
    }
} else {
    // If the file parameter is not set, display an error message
    echo 'Invalid request.';
}
?>
