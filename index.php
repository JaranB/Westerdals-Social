<!DOCTYPE html>
<html>

<!-- Head som inneholder hvordan character format siden bruker, tittel på siden og stylesheetet - start -->

<head>
    <meta charset="UTF-8">
    <title>Something</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>
<!-- Head som inneholder hvordan character format siden bruker, tittel på siden og stylesheetet - slutt -->

<?php include 'header.php';
        include 'SQLQuerys.php'?>

<body>


    <!-- Boks for "velkommen" tekst og firmaets  slogan - start -->
    <div id="container">
        <div id="hexbox">
            <ol class="odd">
                <li class='hex'><a id="hexText">Parkering</a></li>
                <li class='hex'><a id="hexText">Barer</a></li>
            </ol>
            <ol class="even">
                <li class='hex'><a id="hexText">Transport</a></li>
                <li class='hex'><a id="hexText">Helse</a></li>
                <li class='hex'><a id="hexText">Restauranter</a></li>
            </ol>
            <ol class="odd2">
                <li class='hex'><a id="hexText">Butikker</a></li>
                <li class='hex'><a id="hexText">Studie</a></li>
            </ol>
        </div>
    </div>
    <!-- Boks for "velkommen" tekst og firmaets  slogan - slutt -->

    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - start -->
    <div class="push"></div>
    <!-- En "pusher" som sørger for ett mellomrom mellom footer og sidenes innhold - slutt -->

    <?php include 'footer.php';?>

</body>

</html>
