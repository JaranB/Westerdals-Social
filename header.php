<!-- Header som inneholder navigatoren på nettsiden - start -->

<head>
    <meta charset="UTF-8">
    <title>Something</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>
<header>
    <div id="navigator">
        <div id="logo">
            <a href="index.php">
                <img src="http://localhost/something/bilder/logo.png">
            </a>
        </div>
        <div id="navbuttons">
            <a href="index.php">Home</a>
            <a href="index.php">Something</a>
            <a href="index.php">Something</a>
            <?php

                require_once('db.php');

                  function loggUtFunksjon() {
                    $_SESSION['LogInStatus'] = false;
                    $_SESSION['admin'] = false;
                    header("Location: ./index.php");
                    die();
                  }

                if(!isset($_SESSION)){
                    session_start();
                }

                  if (isset($_GET['loggUt'])) {
                    loggUtFunksjon();
                  }

                if(isset($_SESSION['LogInStatus']) && $_SESSION['LogInStatus'] == true) {

                    if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
                        echo "<a href='adminpanel.php'>Admin</a>";
                    }

                    echo "<a href='index.php?loggUt=true'>Logg ut</a>";

                } else {

                    echo "<a href='login.php'>Login</a>";
                    echo "<a href='register.php'>Register</a>";

                }

                ?>
        </div>
    </div>
        <div id="infobarcontent">
            <?php

                if(isset($_SESSION['LogInStatus']) && $_SESSION['LogInStatus'] == true) {
                  echo "<a>Logget inn som: </a><a>" . $_SESSION['brukernavn']; echo "</a>";
                }

                ?>
        </div>
</header>
<!-- Header som inneholder navigatoren på nettsiden - slutt -->
