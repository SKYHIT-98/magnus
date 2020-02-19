<?php
    include 'database.php';
        if(isset($_POST['submit']))
        {
           $name=$_POST['name'];
           $mobile = $_POST['mobile'];
           $event = $_POST['events'];
           $email=$_POST['email'];
           $college = $_POST['college'];
          if (!empty($name)|| !empty($mobile)||!empty($email)||!empty($college)||!empty($events)) {

            $sql= "INSERT INTO `magnus`.`magnus_registration` (`name`, `mobile`, `event`, `email`, `college`) VALUES ('$name', '$mobile', '$event', '$email', '$college');";
                mysqli_query($conn, $sql);
                $conn->close();
    header('Location:success.php');
          }
        else {
              header('Location:fail.php');
            }
        }
?>