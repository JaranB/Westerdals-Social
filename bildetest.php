<?php
require_once('db.php');

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $postsystem = "INSERT IGNORE INTO storage (tittel, post) VALUE ('$title', '$content')";
        mysqli_query($connection, $postsystem);
        echo "Post lagt til";
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

        </div>

        <div class="bildeTestText center">
            <?php

                $postsystem = "SELECT DISTINCT postid, tittel, post FROM storage ORDER BY postid DESC";
                $postsystemquery = mysqli_query($connection, $postsystem);

                $finnpostid = "SELECT postid FROM storage";
                $postidquery = mysqli_query($connection, $finnpostid);


                while ($row = mysqli_fetch_array($postsystemquery)) {
                    $title = $row['tittel'];
                    $content = $row['post'];
                    $postid = $row['postid'];
                    ?>

            <h2><?php echo $title; ?> &emsp;

            </h2>

            <p><?php echo $content; ?></p>

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
