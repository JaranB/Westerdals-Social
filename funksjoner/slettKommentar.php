<?php
    require_once('../db.php');

	if( isset($_GET['kommentarid']) )
	{
            $id = $_GET['kommentarid'];
            $sql= "DELETE FROM kommentarer WHERE kommentarid='$id'";
            $res= mysqli_query($connection, $sql) or die("Failed".mysqli_error());
            echo "<meta http-equiv='refresh' content='0;url=/something/index.php'>";
	}

?>
