<?php
require_once('db.php');

                $postsystem = "SELECT DISTINCT postid, tittel, bildeURL, post FROM storage ORDER BY postid DESC";
                $postsystemquery = mysqli_query($connection, $postsystem);

                $finnpostid = "SELECT postid FROM storage";
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

<?php include 'header.php';
        include 'SQLQuerys.php'?>

<body>


    <!-- Boks for "velkommen" tekst og firmaets  slogan - start -->
    <div id="container">

        <div class="bildeTest center">
            <?php

                echo "<img src='$bildeURL'>";
            ?>

        </div>

        <div class="bildeTestText center">
            <?php

                $postsystem = "SELECT DISTINCT postid, tittel, bildeURL, post FROM storage ORDER BY postid DESC";
                $postsystemquery = mysqli_query($connection, $postsystem);

                $finnpostid = "SELECT postid FROM storage";
                $postidquery = mysqli_query($connection, $finnpostid);


                while ($row = mysqli_fetch_array($postsystemquery)) {
                    $tittel = $row['tittel'];
                    $bildeURL = $row['bildeURL'];
                    $post = $row['post'];
                    $postid = $row['postid'];
                    ?>

            <h2><?php echo $tittel; ?> &emsp;

            </h2>

            <p><?php echo $post; ?></p>

        <?php
            }
                    ?>
        </div>

    </div>
    <!-- Boks for "velkommen" tekst og firmaets  slogan - slutt -->

    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - start -->
    <div class="push"></div>
    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - slutt -->

    <?php include 'footer.php';?>

</body>

</html>
