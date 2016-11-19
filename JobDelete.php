<?php
//Set server and DB details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "JobBank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Retreive variable values
$jobId = mysqli_real_escape_string($conn, $_POST['txtJobId']);

//Set SQL query to delete
$sql = "DELETE FROM JobAdvert WHERE jobId='$jobId'";

//Execute delete query
if ($conn->query($sql) === TRUE) {
    echo "Job advert deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>