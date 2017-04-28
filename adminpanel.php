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


if(isset($_POST['endreBruker'])) {

  ///do save processing

if(!empty($_POST['brukerEndre'])){

	$brukernavn = mysqli_real_escape_string($connection, $_POST['brukerEndre']);
    $nyttBrukernavn = $_POST['navnEndre'];
    $nyEPost = $_POST['epostEndre'];
    $nyttPassord = md5($_POST['passordEndre']);
    $nyRang = $_POST['adminEndre'];

	$sql = "SELECT * FROM `brukere` WHERE brukernavn='$brukernavn'";
    $result1 = mysqli_query($connection, $sql);
    $row = $result1->fetch_assoc();

    if($row['brukernavn'] == $_POST['brukerEndre']){
            if(!empty($_POST['navnEndre'])){
                $byttBrukernavn = "UPDATE brukere SET brukernavn='$nyttBrukernavn' WHERE brukernavn ='$brukernavn'";
                $result2 = mysqli_query($connection, $byttBrukernavn);
                $smsg = "Navn endret!";
                }

            if(!empty($_POST['epostEndre'])){
                $byttEPost = "UPDATE brukere SET epost='$nyEPost' WHERE brukernavn ='$brukernavn'";
                $result3 = mysqli_query($connection, $byttEPost);
                $smsg = "EPost endret!";
            }

            if(!empty($_POST['passordEndre'])){
                $byttPassord = "UPDATE brukere SET passord='$nyttPassord' WHERE brukernavn ='$brukernavn'";
                $result3 = mysqli_query($connection, $byttPassord);
                $smsg = "Passord endret!";
                }

            if(!empty($_POST['adminEndre'])){
                $byttRang = "UPDATE brukere SET rang='$nyRang' WHERE brukernavn ='$brukernavn'";
                $result3 = mysqli_query($connection, $byttRang);
                $smsg = "Rang endret!";
                }


            }else{
                $smsg = "Skriv inn gyldig brukernavn!";
}

}
}


?>

    <!DOCTYPE html>
    <html>

    <?php include 'header.php';?>

    <body>


        <!-- Boks for "velkommen" tekst og firmaets  slogan - start -->
        <div id="container">
            <?php if(isset($smsg)){ ?>
            <div class="varsel" role="alert">
                <?php echo $smsg; ?> </div>
            <?php } ?>
            <?php if(isset($fmsg)){ ?>
            <div class="varsel" role="alert">
                <?php echo $fmsg; ?> </div>
            <?php } ?>

            <div id="adminpanel">
                <form class="adminpanel" method="POST">
                    <a>Bruker å endre:</a>
                    <input type="text" name="brukerEndre" class="" placeholder="Bruker å endre" required>
                    <a>Nytt brukernavn:</a>
                    <input type="text" name="navnEndre" id="inputPassword" class="" placeholder="Nytt Brukernavn">
                    <br>
                    <a>Ny EPost:</a>
                    <input type="text" name="epostEndre" id="inputPassword" class="" placeholder="Ny EPost">
                    <a>Nytt passord:</a>
                    <input type="password" name="passordEndre" id="inputPassword" class="" placeholder="Nytt Passord">
                    <a>Admin? 1/false:</a>
                    <input type="text" name="adminEndre" id="inputPassword" class="" placeholder="Admin? (1/false)">
                    <br>
                    <button type="submit" name="endreBruker">Endre</button>
                </form>

                <form class="adminpanel" method="POST">
                    <a>Legg til post</a>
                    <br>
                    <a>Tittel:</a> <input type="text" name="tittel"><br>
                    <a>Kategori:</a> <br>
                        <select name="formKategorier" id="formKategorier">
                        <option value="1">Bar</option>
                        <option value="2">Restaurant</option>
                        <option value="3">Butikk</option>
                        <option value="4">Parkering</option>
                        <option value="5">Helse</option>
                        <option value="6">Tilbud</option>
                        </select>
                    <br>
                    <a>Navn:</a> <input type="text" name="navn"><br>
                    <a>Post:</a> <textarea id="minpost" name="post"></textarea>
                    <button type="submit" name="postInnlegg">Endre</button>
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
