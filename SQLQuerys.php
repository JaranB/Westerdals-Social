<?php



                if(!isset($_SESSION)){
                    session_start();
                }

                if(isset($_SESSION['LogInStatus']) && $_SESSION['LogInStatus'] == true) {

                    require_once('db.php');

                    $sql = "SELECT * FROM `brukere` WHERE brukernavn='brukernavn'";
                    $result = mysqli_query($connection, $sql);
                    $row = $result->fetch_assoc();
                    $count = mysqli_num_rows($result);

                    $brukernavn = mysqli_real_escape_string($connection, $row['brukernavn']);
                    $rang = mysqli_real_escape_string($connection, $row['rang']);
                    $passord = md5($row['passord']);

                }

             ?>
