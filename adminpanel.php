<?php

require_once(dirname(__FILE__) . '/db.php');

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) {

} else {
    header("Location: ./index.php");
    die();
}

if(isset($_POST['endreBruker'])) {

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
                    mysqli_query($connection, $byttBrukernavn);
                    $smsg = "Navn endret!";
                    }

                if(!empty($_POST['epostEndre'])){
                    $byttEPost = "UPDATE brukere SET epost='$nyEPost' WHERE brukernavn ='$brukernavn'";
                    mysqli_query($connection, $byttEPost);
                    $smsg = "EPost endret!";
                }

                if(!empty($_POST['passordEndre'])){
                    $byttPassord = "UPDATE brukere SET passord='$nyttPassord' WHERE brukernavn ='$brukernavn'";
                    mysqli_query($connection, $byttPassord);
                    $smsg = "Passord endret!";
                    }

                if(!empty($_POST['adminEndre'])){
                    $byttRang = "UPDATE brukere SET rang='$nyRang' WHERE brukernavn ='$brukernavn'";
                    mysqli_query($connection, $byttRang);
                    $smsg = "Rang endret!";
                    }


                }else{
                    $smsg = "Skriv inn gyldig brukernavn!";
    }

    }
} else if(isset($_POST['slettPost'])) {

    if(!empty($_POST['postID'])){

            $id = $_POST['postID'];
            $sql= "DELETE FROM steder WHERE postid='$id'";
            $res= mysqli_query($connection, $sql) or die("Failed".mysqli_error());

    }
}

if(!empty($_POST['submit'])){
        $tittel = $_POST['tittel'];
        $kategori=$_POST['formKategorier'];
        $bildeURL = $_POST['bildeURL'];
        $post = $_POST['post'];
        $postsystem = "INSERT IGNORE INTO steder (tittel, kategori, bildeURL, post) VALUE ('$tittel', '$kategori', '$bildeURL', '$post')";
        mysqli_query($connection, $postsystem);
        $smsg = "Post lagt til!";
}

?>

    <!DOCTYPE html>
    <html>

    <?php include 'header.php';?>

    <body>


        <!-- Boks for innhold til adminpanel - start -->
        <div id="container">
            <?php if(isset($smsg)){ ?>
            <div class="varsel" role="alert">
                <?php echo $smsg; ?> </div>
            <?php } ?>
            <?php if(isset($fmsg)){ ?>
            <div class="varsel" role="alert">
                <?php echo $fmsg; ?> </div>
            <?php } ?>

            <div class="containerTrePanel center">
                <form class="panel" method="POST">
                    <h2>Endre en bruker:</h2>
                    <br>
                    <a>Bruker å endre:</a>
                    <br>
                    <input type="text" name="brukerEndre" class="" placeholder="Bruker å endre" required>
                    <br>
                    <a>Nytt brukernavn:</a>
                    <br>
                    <input type="text" name="navnEndre" id="inputPassword" class="" placeholder="Nytt Brukernavn">
                    <br>
                    <a>Ny EPost:</a>
                    <br>
                    <input type="text" name="epostEndre" id="inputPassword" class="" placeholder="Ny EPost">
                    <br>
                    <a>Nytt passord:</a>
                    <br>
                    <input type="password" name="passordEndre" id="inputPassword" class="" placeholder="Nytt Passord">
                    <br>
                    <a>Admin? 1/false:</a>
                    <br>
                    <input type="text" name="adminEndre" id="inputPassword" class="" placeholder="Admin? (1/false)">
                    <br>
                    <button type="submit" name="endreBruker">Endre</button>
                </form>

                <form class="panel" method="POST">
                    <h2>Legg til post</h2>
                    <br>
                    <a>Tittel:</a>
                    <br>
                    <input type="text" name="tittel" required>
                    <br>
                    <a>Kategori:</a>
                    <br>
                    <select name="formKategorier" id="formKategorier" required>
                        <option value="1">Bar</option>
                        <option value="2">Restaurant</option>
                        <option value="3">Butikk</option>
                        <option value="4">Parkering</option>
                        <option value="5">Helse</option>
                        <option value="6">Transport</option>
                        <option value="7">Studie</option>
                        </select>
                    <br>
                    <a>Bilde URL:</a>
                    <br>
                    <input type="text" name="bildeURL" required>
                    <br>
                    <a>Post:</a>
                    <br>
                    <textarea id="minpost" name="post" required></textarea>
                    <br>
                    <input type="submit" name="submit" value="Post" />
                </form>

                <form class="panel" method="POST">
                    <h2>Slett post:</h2>
                    <br>
                    <a>PostID:</a>
                    <br>
                    <input type="text" name="postID" required>
                    <br>
                    <button type="submit" name="slettPost">Slett</button>
                    <br>
                    <br>
                    <a href="../something/adminpost.php"><p>Liste for alle poster</p></a>
                    <br>
                </form>

            </div>

        </div>
        <!-- Boks for innhold til adminpanel - slutt -->

        <?php include 'footer.php';?>

    </body>

    </html>
