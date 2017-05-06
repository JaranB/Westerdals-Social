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

?>

    <!DOCTYPE html>
    <html>

    <?php include 'header.php'; ?>

    <body>


        <!-- Boks for "velkommen" tekst og firmaets  slogan - start -->
        <div id="container">
            <div id="bildeogText">

                <div class="bildePostText centerHorizontal">
                    <?php

                    $postsystem = "SELECT DISTINCT postid, tittel, bildeURL, post FROM steder ORDER BY postid DESC";
                    $postsystemquery = mysqli_query($connection, $postsystem);

                    $finnpostid = "SELECT postid FROM steder";
                    $postidquery = mysqli_query($connection, $finnpostid);


                    while ($row = mysqli_fetch_array($postsystemquery)) {
                        $tittel = $row['tittel'];
                        $post = $row['post'];
                        $postid = $row['postid'];

                        ?>

                        <p><a href="/something/funksjoner/slett.php?slettPostID=<?php echo $postid; ?>" class="funksjonSymboler">&#x2717</a></p>

                        <h2>
                            <?php echo $tittel; ?>
                            <a>PostID:</a>
                            <?php echo $postid; ?>
                        </h2>

                        <p>
                            <p class="kommentarKommentar kommentarKommentarAdmin">
                                <?php echo $post;

                ?>
                                <br>
                                <?php } ?>
                            </p>

                </div>
            </div>

        </div>
        <!-- Boks for "velkommen" tekst og firmaets  slogan - slutt -->

        <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - start -->
        <div class="push"></div>
        <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - slutt -->

        <?php include 'footer.php'; ?>

    </body>

    </html>
