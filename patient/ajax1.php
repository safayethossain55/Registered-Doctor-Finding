<?php 
require '../connection.php';
$conn=mysqli_connect('localhost','root','','edoc');
$id=$_POST['id'];
if(isset($_POST['spe'])){
    $spe=$_POST['spe'];
    $output= '<option value="">Choose Doctor</option>';
    $query=mysqli_query($conn,"select * from doctor where  specialties='$spe' ");
    while($row=mysqli_fetch_array($query)){
    $docid=$row['docid'];
    $docname=$row['docname'];
    $output.= "<option value='$docid'>$docname</option>";
    }
    echo $output;
}
?>