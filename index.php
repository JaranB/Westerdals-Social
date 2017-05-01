<!DOCTYPE html>
<html>

<?php include 'header.php';
        include 'SQLQuerys.php'?>

<body>


   <!-- Boks for "velkommen" tekst & firmaets  slogan - start -->
    <div id="containerHovedside">
        <div class="hexbox">
            <div class="even">

                <a href="barer.php"><div class="hexagon">
                        <div class="hexagon-inside">
                            <div class="hexagonimg" id="barer">

                            </div>
                        </div>
                    </div>
                </a>
                <br>

                <a href="transport.php"><div class="hexagon">
                    <div class="hexagon-inside">
                        <div class="hexagonimg" id="transport">
                        </div>
                    </div>
                </div>
            </a>
        </div>

            <div class="odd">
                <a href="restauranter.php">
                    <div class="hexagon">
                        <div class="hexagon-inside">
                            <div class="hexagonimg" id="restauranter">

                            </div>
                        </div>
                    </div>
                </a>

                <br>
                <a href="helse.php">
                <div class="hexagon">
                    <div class="hexagon-inside">
                        <div class="hexagonimg" id="helse">
                            </div>
                        </div>
                    </div>
                </a>

                <br>
                <a href="butikker.php">
                    <div class="hexagon">
                    <div class="hexagon-inside">
                        <div class="hexagonimg" id="butikker">

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="even2">
                <a href="studier.php">
                    <div class="hexagon">
                        <div class="hexagon-inside">
                            <div class="hexagonimg" id="studie">

                            </div>
                        </div>
                    </div>
                </a>
                <br>
                <a href="parkering.php">
                    <div class="hexagon">
                        <div class="hexagon-inside">
                            <div class="hexagonimg" id="parkering">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Boks for "velkommen" tekst og firmaets  slogan - slutt -->

    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - start -->
    <div class="push"></div>
    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - slutt -->

    <?php include 'footer.php';?>

</body>

</html>
