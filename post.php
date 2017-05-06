<?php
require_once(dirname(__FILE__) . '/db.php');

if(!isset($_SESSION)){
    session_start();
}

	if( isset($_GET['postid']) )
	{
                $id = $_GET['postid'];
                $postsystem = "SELECT DISTINCT * FROM steder WHERE postid=$id ORDER BY postid DESC";
                $postsystemquery = mysqli_query($connection, $postsystem);

                $finnpostid = "SELECT postid FROM steder";
                $postidquery = mysqli_query($connection, $finnpostid);


                while ($row = mysqli_fetch_array($postsystemquery)) {
                    $tittel = $row['tittel'];
                    $bildeURL = $row['bildeURL'];
                    $post = $row['post'];
                    $postid = $row['postid'];

            }
    }

if(!empty($_POST['submit'])){
        $kommentar = $_POST['kommentar'];
        $brukernavn = $_SESSION['brukernavn'];
        $postsystem = "INSERT IGNORE INTO kommentarer (kommentar, postid, brukernavn) VALUE ('$kommentar', '$id', '$brukernavn')";
        mysqli_query($connection, $postsystem);
        $smsg = "Kommentar lagt til!";
}

?>

    <!DOCTYPE html>
    <html>

    <?php include 'header.php'; ?>

    <body>


        <!-- Boks for "velkommen" tekst og firmaets  slogan - start -->
        <div id="container">
            <div id="bildeogText">
                <div class="bildePost centerHorizontal">
                    <?php

                    echo "<img src='$bildeURL'>";
                ?>

                </div>

                <div class="bildePostText centerHorizontal">
                    <?php

                    $postsystem = "SELECT DISTINCT postid, tittel, bildeURL, post FROM steder WHERE postid=$id ORDER BY postid DESC";
                    $postsystemquery = mysqli_query($connection, $postsystem);

                    $finnpostid = "SELECT postid FROM steder";
                    $postidquery = mysqli_query($connection, $finnpostid);


                    while ($row = mysqli_fetch_array($postsystemquery)) {
                        $tittel = $row['tittel'];
                        $bildeURL = $row['bildeURL'];
                        $post = $row['post'];
                        $postid = $row['postid'];

                        ?>

                        <p><a href="/something/funksjoner/favoritt.php?postid=<?php echo $postid; ?>" class="funksjonSymboler">&#9734</a></p>

                        <h2>
                            <?php echo $tittel; ?>
                        </h2>

                        <p>
                            <?php echo $post;

                    }?>
                        </p>

                </div>
            </div>
            <div class="bildeKommentarText centerHorizontal" id="kommentar2">
                <?php


                $id = $_GET['postid'];
                $kommentarsystem = "SELECT DISTINCT kommentarid, kommentarer.postid, kommentar, brukernavn FROM kommentarer LEFT JOIN steder ON kommentarer.postid = steder.postid WHERE kommentarer.postid=$id ORDER BY kommentarid DESC";
                $kommentarsystemquery = mysqli_query($connection, $kommentarsystem);

                $finnkommentarid = "SELECT kommentarid FROM steder";
                $kommentaridquery = mysqli_query($connection, $finnkommentarid);
                echo '<h2>Kommentarer:</h2><p>';

                while ($row = mysqli_fetch_array($kommentarsystemquery)) {
                    $brukernavn = $row['brukernavn'];
                    $kommentar = $row['kommentar'];
                    $kommentarid = $row['kommentarid'];

                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true || isset($_SESSION['brukernavn']) && $_SESSION['brukernavn'] == $brukernavn) {

                       // echo "<a href='funksjoner.php?kommentarid='$kommentarid'' class='funksjonSymboler'>&#x2717</a>";

                     ?>
                    <br>

                    <a href="/something/funksjoner/slett.php?kommentarid=<?php echo $kommentarid; ?>" class="funksjonSymboler">&#x2717</a>

                    <?php } ?>
                    <br>
                    <p class="navnKommentar">
                        <?php echo $brukernavn ?>
                    </p>

                    <p class="kommentarKommentar">
                        <?php echo $kommentar; ?>
                    </p>
                        <?php } ?>

                    <form class="kommentarpanel" method="POST">
                        <a>Legg til kommentar:</a>
                        <br>
                        <textarea id="kommentarFelt" name="kommentar" required></textarea>
                        <br>
                        <input type="submit" name="submit" value="Post" />
                    </form>
            </div>

        </div>
        <!-- Boks for "velkommen" tekst og firmaets  slogan - slutt -->

        <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - start -->
        <div class="push"></div>
        <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - slutt -->

        <?php include 'footer.php'; ?>

    </body>

    </html>
