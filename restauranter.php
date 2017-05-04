<?php
require_once('db.php');

if(!isset($_SESSION)){
    session_start();
}

                $postsystem = "SELECT DISTINCT postid, tittel, bildeURL, post FROM steder ORDER BY postid DESC";
                $postsystemquery = mysqli_query($connection, $postsystem);

                $finnpostid = "SELECT postid FROM steder";
                $postidquery = mysqli_query($connection, $finnpostid);


                while ($row = mysqli_fetch_array($postsystemquery)) {
                    $tittel = $row['tittel'];
                    $bildeURL = $row['bildeURL'];
                    $post = $row['post'];
                    $postid = $row['postid'];

            }

?>

<!DOCTYPE html>
<html>

<?php include 'header.php'; ?>

<body id="barerimg">
    <div class="container">
        <img class="titelundersider" src="http://localhost/something/bilder/kategoribilder/barerlogo.png" width="300px">
        <div id="undersidor">

                <?php

                $postsystem = "SELECT DISTINCT postid, tittel, kategori, bildeURL, post FROM steder WHERE kategori=2 ORDER BY postid DESC";
                $postsystemquery = mysqli_query($connection, $postsystem);

                $finnpostid = "SELECT postid FROM steder";
                $postidquery = mysqli_query($connection, $finnpostid);


                while ($row = mysqli_fetch_array($postsystemquery)) {
                    $tittel = $row['tittel'];
                    $bildeURL = $row['bildeURL'];
                    $post = $row['post'];
                    $postid = $row['postid'];

                    ?>

                    <a href="bildetest2.php?postid=<?php echo $postid; ?>">
                        <div class="hexagonundersider" id="undersideHex">
                            <div class="hexagon-insideundersider">
                                <div class="hexagonimg" style="background:url(<?php echo $bildeURL; ?>)">

                                </div>
                            </div>
                        </div>
                    </a>

                    <?php   }   ?>

        </div>
    </div>

    <!-- Boks for "velkommen" tekst og firmaets  slogan - slutt -->

    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - start -->
    <div class="push"></div>
    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - slutt -->

    <?php include 'footer.php';?>

</body>

</html>
