<?php
    require_once('../db.php');

    if(!isset($_SESSION)){
        session_start();
    }

	if( isset($_GET['postid']) )
	{
            $id = $_GET['postid'];
            $brukernavn = $_SESSION['brukernavn'];
            $sql= "INSERT INTO favoritter (favorittID, brukernavn) VALUE ('$id', '$brukernavn')";
            $res= mysqli_query($connection, $sql) or die("Failed".mysqli_error());
            echo "<meta http-equiv='refresh' content='0;url=/something/index.php'>";
	}

?>
