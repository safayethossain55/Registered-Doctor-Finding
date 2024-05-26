<?php 
require '../connection.php';
$conn=mysqli_connect('localhost','root','','docffinding');
if(isset($_POST['id'])){
    $id=$_POST['id'];

    $query=mysqli_query($conn,"select * from specialties where  hid='$id' ");
    $output= '<option value="">Choose Department</option>';
    while($row=mysqli_fetch_array($query)){
        
    $id=$row['id'];
    $sname=$row['sname'];
    $output.= "<option value='$id'>$sname</option>";
    }
    echo $output;
}
?>
