<?php
require_once('db.php');
if(isset($_POST) & !empty($_POST)){
	$brukernavn = mysqli_real_escape_string($connection, $_POST['brukernavn']);
	$epost = mysqli_real_escape_string($connection, $_POST['epost']);
	$passord = md5($_POST['passord']);

	$sql = "INSERT INTO `brukere` (brukernavn, epost, passord) VALUES ('$brukernavn', '$epost', '$passord')";
	$result = mysqli_query($connection, $sql);
	if($result){
		$smsg = "User Registration successfull";
	}else{
		$fmsg = "User registration failed";
	}
}


?>

    <!DOCTYPE html>

    <html>

    <!-- Head som inneholder hvordan character format siden bruker, tittel på siden og stylesheetet - start -->

    <head>
        <meta charset="UTF-8">
        <title>Something</title>
        <link rel="stylesheet" href="./css/style.css" type="text/css">
    </head>
    <!-- Head som inneholder hvordan character format siden bruker, tittel på siden og stylesheetet - slutt -->

    <?php include 'header.php';?>

    <body>


        <!-- Boks for "velkommen" tekst og firmaets  slogan - start -->
        <div id="container">
            <div id="registerbox">
                <?php if(isset($smsg)){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $smsg; ?> </div>
                <?php } ?>
                <?php if(isset($fmsg)){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $fmsg; ?> </div>
                <?php } ?>
                <form class="" method="POST">
                    <label for="inputEmail" class="">Brukernavn:</label>
                    <input type="text" name="brukernavn" class="" placeholder="" required>
                    <label for="inputEmail" class="">EPost:</label>
                    <input type="email" name="epost" id="inputEmail" class="" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="">Passord:</label>
                    <input type="password" name="passord" id="inputPassword" class="" placeholder="Password" required>
                    <button class="" type="submit">Registrer</button>
                    <a class="" href="login.php">Login</a>
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
