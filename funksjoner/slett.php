<?php
    require_once('../db.php');

	if (isset($_GET['kommentarid']) )
	{
            $postid = $_GET['postid'];
            $id = $_GET['kommentarid'];
            $sql= "DELETE FROM kommentarer WHERE kommentarid='$id'";
            $res= mysqli_query($connection, $sql) or die("Failed".mysqli_error());
            echo "<meta http-equiv=\"refresh\" content=\"0;url=".$_SERVER['HTTP_REFERER']."\"/>";
	}
        else if (isset($_GET['slettPostID']) )
	{
            $id = $_GET['slettPostID'];
            $sql= "DELETE FROM steder WHERE postid='$id'";
            $res= mysqli_query($connection, $sql) or die("Failed".mysqli_error());
            echo "<meta http-equiv='refresh' content='0;url=/something/adminpost.php'>";
	}
        else if( isset($_GET['postid']) )
	{

            if(!isset($_SESSION)){
                session_start();
            }

            $id = $_GET['postid'];
            $brukernavn = $_SESSION['brukernavn'];
            $sql= "DELETE FROM favoritter WHERE favorittID='$id' AND brukernavn='$brukernavn'";
            $res= mysqli_query($connection, $sql) or die("Failed".mysqli_error());
            echo "<meta http-equiv='refresh' content='0;url=/something/minside.php'>";
	}

?>
