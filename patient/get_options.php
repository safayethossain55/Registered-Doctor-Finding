<?php
require '../connection.php';
// Connect to the MySQL database
$conn = mysqli_connect('localhost', 'username', 'password', 'docffinding');

// Retrieve the selected values of dropdown1 and dropdown2
$hospitalValue = $_GET['hospital'];
$departmentValue = $_GET['department'];

// Query the database to retrieve options for the dependent dropdown
$query = "SELECT * FROM doctor WHERE hospital = '$hospitalValue' AND specialties = '$departmentValue'";
$result = mysqli_query($conn, $query);

// Create an array of options
$options = array();
while ($row = mysqli_fetch_assoc($result)) {
 
  $options[] = $row['docname'];
}

// Return the options as a JSON object
echo json_encode($options);

// Close the database connection
mysqli_close($conn);
?>

