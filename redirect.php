<?php
include 'mappings.php';

$file = basename($_SERVER['REQUEST_URI']);

if (isset($mappings[$file])) {
    header("Location: " . $mappings[$file]);
    exit;
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Image not found!";
}
?>
