<?php
// Include the file containing the database connection
include('includes/dbconnection.php');

// Retrieve the ID from the URL parameter 
$id = $_GET['id'];

// Fetch the corresponding record from the database
$query = mysqli_query($con, "SELECT lesson_name FROM tblcategory WHERE ID = '$id'");
$row = mysqli_fetch_assoc($query);

if ($row) {
    // If a record is found, proceed to display the PDF
    $lesson_name = $row['lesson_name'];

    // Set the appropriate headers to display the PDF file
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $lesson_name . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    // Output the PDF content
    readfile('uploads/' . $lesson_name);
} else {
    // If no record is found, handle the error gracefully
    echo "PDF not found.";
}
