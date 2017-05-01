<?php

require_once('db.php');

if(!isset($_SESSION)){
    session_start();
}

    if ($_SESSION['LogInStatus'] == false) {
        header("Location: ./index.php");
        die();
    }

    $brukernavn = mysqli_real_escape_string($connection, $_SESSION['brukernavn']);

	$sql = "SELECT avatarURL FROM `brukere` WHERE brukernavn='$brukernavn'";
    $result1 = mysqli_query($connection, $sql);
    $row = $result1->fetch_assoc();
    $avatarURLSession = $_SESSION['avatarURL'];

if(isset($_POST['endreBruker'])) {

    $eksiterendePassord = md5($_POST['eksisterendePassord']);
    $nyttPassord = md5($_POST['passordEndre']);
    $nyEPost = $_POST['epostEndre'];
    $nyAvatarURL = $_POST['settAvatar'];
	$sql = "SELECT * FROM `brukere` WHERE brukernavn='$brukernavn'";
    $result1 = mysqli_query($connection, $sql);
    $row = $result1->fetch_assoc();

    if($row['brukernavn'] == $_SESSION['brukernavn']){
            if(!empty($_POST['passordEndre'])){
                $byttPassord = "UPDATE brukere SET passord='$nyttPassord' WHERE brukernavn='$brukernavn' AND passord='$eksiterendePassord'";
                $result = mysqli_query($connection, $byttPassord);
                $smsg = "Passord endret!";
                }

            if(!empty($_POST['epostEndre'])){
                $byttEPost = "UPDATE brukere SET epost='$nyEPost' WHERE brukernavn ='$brukernavn'";
                $result = mysqli_query($connection, $byttEPost);
                $_SESSION['epost'] = $nyEPost;
                $smsg = "EPost endret!";
            }

            if(!empty($_POST['settAvatar'])){
                $byttAvatar = "UPDATE brukere SET avatarURL='$nyAvatarURL' WHERE brukernavn ='$brukernavn'";
                $result = mysqli_query($connection, $byttAvatar);
                $_SESSION['avatarURL'] = $nyAvatarURL;
                $smsg = "Avatar satt!";
            }

            }else{
                $smsg = "Fyll inn riktig informasjon i minst ett felt!";
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

            <div class="minside">
                <form class="adminpanel" method="POST">
                    <a>Ditt brukernavn: </a><?php echo $_SESSION['brukernavn']; ?>
                    <br>
                    <a>Din EPost: </a><?php echo $_SESSION['epost']; ?>
                    <br>
                    <a>Ditt Avatar: </a>
                    <br>
                    <?php echo "<img src='$avatarURLSession' id='avatarBilde'>"; ?>
                    <br>
                    <a>Bytt passord:</a>
                    <br>
                    <input type="password" name="eksisterendePassord" class="" placeholder="Eksisterende passord">
                    <br>
                    <input type="password" name="passordEndre" class="" placeholder="Nytt passord">
                    <br>
                    <a>Bytt EPost:</a>
                    <br>
                    <input type="text" name="epostEndre" class="" placeholder="Ny EPost">
                    <br>
                    <a>Avatar URL:</a>
                    <br>
                    <input type="text" name="settAvatar" class="" placeholder="Skriv inn URL til avataret">
                    <br>
                    <button type="submit" name="endreBruker">Endre</button>
                </form>

                <form class="adminpanel" method="POST">
                    <a>Favoritter: </a>
                    <br>

            <?php

                $postsystem = "SELECT DISTINCT steder.postid, steder.tittel, steder.kategori, steder.navn, steder.bildeURL, steder.post, favoritter.favorittID, favoritter.brukernavn FROM steder, favoritter WHERE steder.postid=favoritter.favorittID";
                $postsystemquery = mysqli_query($connection, $postsystem);


                while ($row = mysqli_fetch_array($postsystemquery)) {
                    $tittel = $row['tittel'];
                    $bildeURL = $row['bildeURL'];
                    $post = $row['post'];
                    $postid = $row['postid'];
                    $favorittid = $row['favorittID'];
                    $favorittBrukernavn = $row['brukernavn'];
                    $brukernavn = $_SESSION['brukernavn'];

                    if(($favorittid == $postid) && ($favorittBrukernavn == $brukernavn)) {


                    ?>

                    <p><a href="slettFavoritt.php?postid=<?php echo $postid; ?>" class="sletteKryss">&#9734</a></p>

                    <h2><?php echo $tittel; ?></h2>

                    <p><?php echo $post;

                }

            }?></p>

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
