<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['LogInStatus']) && $_SESSION['LogInStatus'] == true) {
    header("Location: ./index.php");
    die();
}

require_once(dirname(__FILE__) . '/db.php');

if(isset($_POST) & !empty($_POST)){

	$brukernavn = mysqli_real_escape_string($connection, $_POST['brukernavn']);
	$passord = md5($_POST['passord']);

	$sql = "SELECT * FROM `brukere` WHERE brukernavn='$brukernavn' AND passord='$passord'";
    $result = mysqli_query($connection, $sql);
    $row = $result->fetch_assoc();
	$count = mysqli_num_rows($result);
	if($count == 1){
        $_SESSION['LogInStatus'] = true;
        $_SESSION['brukernavn'] = $row['brukernavn'];
        $_SESSION['epost'] = $row['epost'];
        $_SESSION['avatarURL'] = $row['avatarURL'];

	}else{
		$fmsg = "Feil brukernavn eller passord!";

	}

    if($row['rang'] == 1){
        $_SESSION['admin'] = true;
    } else {
        $_SESSION['admin'] = false;
    }

    if (isset($_SESSION['LogInStatus']) && $_SESSION['LogInStatus'] == true) {
        header("Location: ./index.php");
        die();
    }

}
?>

    <!DOCTYPE html>

    <html>

    <?php include 'header.php';?>

    <body>

        <div id="container">
            <div id="brukerinfo">
                <?php if(isset($smsg)){ ?>
                <div class="varsel" role="alert">
                    <?php echo $smsg; ?> </div>
                <?php } ?>
                <?php if(isset($fmsg)){ ?>
                <div class="varsel" role="alert">
                    <?php echo $fmsg; ?> </div>
                <?php } ?>
                <form class="forms centerHorizontal" method="POST">
                    <input type="text" name="brukernavn" placeholder="Brukernavn" required>
                    <input type="password" name="passord" placeholder="Passord" required>
                    <button name="" type="submit">Login</button>
                    <a class="" href="register.php">Register</a>
                </form>
            </div>
        </div>

        <?php include 'footer.php';?>

    </body>

    </html>
