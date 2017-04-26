<?php

require_once('db.php');

if(!isset($_SESSION)){
    session_start();
}

    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) {

    } else {
        header("Location: ./index.php");
        die();
    }


if(isset($_POST) & !empty($_POST)){

	$brukernavn = mysqli_real_escape_string($connection, $_POST['brukerEndre']);
    $nyttBrukernavn = mysqli_real_escape_string($connection, $_POST['navnEndre']);

	$sql = "SELECT * FROM `brukere` WHERE brukernavn='$brukernavn'";
    $result = mysqli_query($connection, $sql);
    $row = $result->fetch_assoc();
	$count = mysqli_num_rows($result);
	if($count == 1){

        if(!empty($_POST['brukerEndre'])){

            if($row['brukernavn'] == $_POST['brukerEndre']){
                $sql2 = "UPDATE brukere SET brukernavn='$nyttBrukernavn' WHERE brukernavn ='$brukernavn'";
                $result2 = mysqli_query($connection, $sql2);
                $smsg = "Navn endret!";
        } else {
                $fmsg = "Endring misslykkes!";
        }

	}else{
		echo "FAILED";

	   }

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
            <div id="adminpanel">
                <form class="adminpanel" method="POST">
                    <a>Bruker å endre:</a>
                    <input type="text" name="brukerEndre" class="" placeholder="Bruker å endre" required>
                    <a>Nytt brukernavn:</a>
                    <input type="text" name="navnEndre" id="inputPassword" class="" placeholder="Nytt Brukernavn">
                    <br>
                    <a>Ny EPost:</a>
                    <input type="text" name="epostEndre" id="inputPassword" class="" placeholder="Nytt Brukernavn">
                    <a>Nytt passord:</a>
                    <input type="text" name="passordENdre" id="inputPassword" class="" placeholder="Nytt Passord">
                    <a>Admin? true/false:</a>
                    <input type="password" name="adminEndre" id="inputPassword" class="" placeholder="Admin? (true/false)">
                    <br>
                    <button id="adminButton" type="submit">Endre</button>
                </form>

                <?php if(isset($smsg)){ ?>
                <div class="varsel" role="alert">
                    <?php echo $smsg; ?> </div>
                <?php } ?>
                <?php if(isset($fmsg)){ ?>
                <div class="varsel" role="alert">
                    <?php echo $fmsg; ?> </div>
                <?php } ?>
            </div>

        </div>
        <!-- Boks for "velkommen" tekst og firmaets  slogan - slutt -->

        <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - start -->
        <div class="push"></div>
        <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - slutt -->

        <?php include 'footer.php';?>

    </body>

    </html>
