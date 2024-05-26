
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="st.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
<?php
require '../connection.php';

$con = mysqli_connect('localhost', 'root', '', 'docffinding');
if (isset($_POST['submit'])) {
    $doctor = $_POST['doctor'];
    $department = $_POST['department'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];
    $hospital=$_POST['hospital'];
    $email=$_POST['email'];

    $sqlmain= "select * from appoinments where doctor='$doctor' and date='$date' and time='$time'";
        $stmt = $database->prepare($sqlmain);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows==1){
            echo '
            <script>
            alert ("Already Booked Apointment for this Slot, Please try another slot");
            </script>
            '; }else{
    if (!empty($_POST['doctor']) && !empty($_POST['department']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['msg']) && !empty($_POST['hospital'] && !empty($_POST['email']))) {
        // Secure the data
        $conn = new PDO("mysql:host=localhost;dbname=docffinding", 'root', '');
        $stmt = $conn->prepare("INSERT INTO appoinments (doctor, department, date, time, name, phone, msg,hospital,email) VALUES (:doctor, :department, :date, :time, :name, :phone, :msg, :hospital,:email)");
        $stmt->bindParam(':doctor', $doctor);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':msg', $msg);
        $stmt->bindParam(':hospital', $hospital);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
        echo '
        <script>
        alert ("Booked Appointment Successfully");
        </script>
        ';

    }
    
}
      
}
?>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 ">
                <div class="appoinment-content">
                    <img src="../img/doctor.jpg" alt="" class="img-fluid" height="1000" width="1000" />
                </div>
            </div>
            <div class="col-lg-6 col-md-10 ">
                <div class="appoinment-wrap mt-5 mt-lg-0">
                    <h2 class="mb-2 title-color">Book appoinment</h2>
                    <p class="mb-4">
                        Now you can get an online appointment, We will get back to you and fix a meeting with doctors.
                    </p>

                    <form id="#" class="appoinment-form" method="post" action="#">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select name="hospital" class="form-control" id="hospital">
                                        <option value="">choose Hospital</option>
                                        <?php
                                        $co = mysqli_connect('localhost', 'root', '', 'docffinding');
                                        $query = mysqli_query($co, "select * from hospitals");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['hname']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select name="department" class="form-control" id="department">
                                        <option value="">choose department</option>
                                        <?php
                                        $co = mysqli_connect('localhost', 'root', '', 'docffinding');
                                        $query = mysqli_query($co, "select * from specialties");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['sname']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                            <div class="form-group">
                                <select name="doctor" class="form-control" id="doctor">
                                    <option value="">choose doctor</option>
                                </select>
                            </div>
                                    </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="date" id="date" type="text" class="form-control" placeholder="yyyy/dd/mm">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="time" id="time" type="text" class="form-control" placeholder="Time">
                                </div>

                            </div>
                            <tr>
                
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="email" id="email" type="text" class="form-control" placeholder="Enter Your Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-8 col-lg-8">
                            <textarea name="msg" id="msg" class="form-control" rows="6" placeholder="Your Message"></textarea>
                        </div>
                        <input type="submit" name="submit" value="Make Appointment" class="btn"  style="background-color:burlywood">
                       
                        <input type="button" name="button" class="btn btn-main btn-round-full" value="Back" style="padding-left: 25px;padding-right: 25px;padding-top: 6px;padding-bottom: 6px; background-color:burlywood" onclick="location.href='../patient/index.php'">
                        
                
               
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="jquery.js"></script>
    <script src="https://code.jquery.com-3.5.1.min.js" crossorigin="anonymous"></script>

    <script>
        const hospital = document.getElementById('hospital');
        const department = document.getElementById('department');
        const docotr = document.getElementById('doctor');

        function populateDependentDropdown() {
            const hospitalValue = hospital.value;
            const departmentValue = department.value;
            doctor.innerHTML = '';

            if (hospitalValue && departmentValue) {
                // Connect to the MySQL database
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `get_options.php?hospital=${hospitalValue}&department=${departmentValue}`);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const options = JSON.parse(xhr.responseText);
                        options.forEach((option) => {
                            const newOption = document.createElement('option');
                            newOption.text = option;
                            newOption.value = option;
                            doctor.add(newOption);
                        });
                    }
                };
                xhr.send();
            }
        }

        hospital.addEventListener('change', populateDependentDropdown);
        department.addEventListener('change', populateDependentDropdown);




        $(document).ready(function() {
            $('#department').change(function() {

                var path = "doctors.php";
                var department = $("#department").val();
                $.ajax({
                    type: "POST",
                    url: path,
                    data: {
                        department: department
                    },
                    success: function(data) {
                        $('#doctors').html(data);
                    }
                });

                return false;


            });

            //jquery datepicker
            $("#date").datepicker({
                dateFormat: 'yy/mm/dd',
                minDate: 0
            });


            //timepicker
            $('#time').timepicker({
            });
        });
    </script>

</body>

</html>