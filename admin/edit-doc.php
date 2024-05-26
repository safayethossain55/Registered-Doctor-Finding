<?php



//import database
include("../connection.php");



if ($_POST) {
    //print_r($_POST);
    $result = $database->query("select * from webuser");
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $oldemail = $_POST["oldemail"];
    $spec = $_POST['spec'];
    $email = $_POST['email'];
    $tele = $_POST['Tele'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $id = $_POST['id00'];

    $oldpass = $_POST['oldpassword'];

    $sql = "SELECT * FROM doctor WHERE docpassword = '$oldpass' && docemail='$oldemail'";
    
    $result1 = $database->query($sql);
    if ($result1->num_rows > 0) {
        $sql1 = "UPDATE doctor SET docemail='$email', docname='$name', docnic='$nic', doctel='$tele', specialties=$spec WHERE docid=$id;";
        $database->query($sql1);

        $sql2 = "UPDATE webuser SET email='$email' WHERE email='$oldemail';";
        $database->query($sql2);

        if (!empty($password) && $password == $cpassword) {
            $sql3 = "UPDATE doctor SET docpassword='$password' WHERE docid=$id;";
            $database->query($sql3);
        }

        $error = '4';
    }else {
        $error = '2';
    }
} else {
    //header('location: signup.php');
    $error = '3';
}




header("location: doctors.php?action=edit&error=" . $error . "&id=" . $id);
?>



</body>

</html>