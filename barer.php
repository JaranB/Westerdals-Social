<?php
require_once('db.php');
?>

<!DOCTYPE html>
<html>

<?php include 'header.php'; ?>

<body id="barerimg">
    <div class="container">
        <img class="titelundersider" src="http://localhost/something/bilder/kategoribilder/barerlogo.png" width="300px">
            <div id="undersidor">

                <a href="bildetest.php"><div class="hexagon sted1" >
                    <div class="hexagon-inside">
                        <div class="hexagonimg" id="barimg1">

                            </div>
                        </div>
                    </div>
                </a>

                <a href=""><div class="hexagon sted2">
                    <div class="hexagon-inside">
                        <div class="hexagonimg" id="barimg2">
                        </div>
                    </div>
                </div>
            </a>

                <a href="">
                    <div class="hexagon sted3">
                        <div class="hexagon-inside">
                            <div class="hexagonimg" id="barimg3">

                            </div>
                        </div>
                    </div>
                </a>

            </div>
            </div>

    <!-- Boks for "velkommen" tekst og firmaets  slogan - slutt -->

    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - start -->
    <div class="push"></div>
    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - slutt -->

    <?php include 'footer.php';?>

</body>
</html>
