<?php

if(!isset($_SESSION)){
    session_start();
}

require_once('db.php');

if(isset($_POST) & !empty($_POST)){
	$brukernavn = mysqli_real_escape_string($connection, $_POST['brukernavn']);
	$passord = md5($_POST['passord']);

	$sql = "SELECT * FROM `brukere` WHERE brukernavn='$brukernavn' AND passord='$passord'";
    $result = mysqli_query($connection, $sql);
    $row = $result->fetch_assoc();
	$count = mysqli_num_rows($result);
	if($count == 1){
        $_SESSION['LogInStatus'] = true;
        $_SESSION['brukernavn'] = $brukernavn;

	}else{
		$fmsg = "Feil brukernavn eller passord!";

	}

    if($row['rang'] == 1){
        $_SESSION['admin'] = true;
    } else {
        $_SESSION['admin'] = false;
    }

    if (isset($_SESSION['LogInStatus']) && $_SESSION['LogInStatus'] == true) {
        $smsg = "Bruker logget inn!";
        header("Location: ./index.php");
        die();
    }

}
?>

<!DOCTYPE html>
<html>

<!-- Head som inneholder hvordan character format siden bruker, tittel på siden og stylesheetet - start -->

<!-- Head som inneholder hvordan character format siden bruker, tittel på siden og stylesheetet - slutt -->

<?php include 'header.php';?>

<body>


    <!-- Boks for "velkommen" tekst og firmaets  slogan - start -->
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
                <form class="forms" method="POST">
                    <input type="text" name="brukernavn" class="" placeholder="Brukernavn" required>
                    <input type="password" name="passord" id="inputPassword" class="" placeholder="Passord" required>
                    <br>
                    <button name="" type="submit">Login</button>
                    <a class="" href="register.php">Register</a>
                </form>
            </div>
    </div>
    <!-- Boks for "velkommen" tekst og firmaets  slogan - slutt -->

    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - start -->
    <div class="push"></div>
    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - slutt -->

    <?php include 'footer.php';?>

</body>

</html>
