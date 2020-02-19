<?php
                            include 'database.php';
                            if (isset($_POST['submit'])) {
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $email = $_POST['email'];
                                $subject = $_POST['subject'];
                                $message = $_POST['message'];
                                if (!empty($fname) || !empty($lname) || !empty($email) || !empty($subject) || !empty($message)) {

                                    $sql = "INSERT INTO `magnus`.`contact` (`first_name`, `last_name`, `email`, `subject`, `message`) VALUES ('$fname', '$lname', '$email', '$subject', '$message');";
                                    mysqli_query($conn, $sql);
                                    $conn->close();
                                    header('Location:index.php');
                                }
                            }
?>