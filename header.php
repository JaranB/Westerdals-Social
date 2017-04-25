
    <!-- Header som inneholder navigatoren på nettsiden - start -->
<head>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>
    <header>
        <div id="navigator">
            <div id="logo">
                <a href="index.php">
                    <img src="http://bylarm.no/wp-content/themes/bylarm/images/logos/westerdals.png">
                </a>
            </div>
            <div id="navbuttons">
                <a href="index.php">Home</a>
                <a href="index.php">Something</a>
                <a href="index.php">Something</a>
                <?php

                  function loggUtFunksjon() {
                    $_SESSION['LogInStatus'] = false;
                    header("Location: ./index.php");
                    die();
                  }

                if(!isset($_SESSION)){
                    session_start();
                }

                if(isset($_SESSION['LogInStatus']) && $_SESSION['LogInStatus'] == true) {

                  if (isset($_GET['loggUt'])) {
                    loggUtFunksjon();
                  }

                    echo "<a href='index.php?loggUt=true'>Logg ut</a>";

                } else {

                    echo "<a href='login.php'>Login</a>";
                    echo "<a href='register.php'>Register</a>";

                }

                ?>
            </div>
        </div>
        <div id="infobar">
            <div id="infobarcontent">
                <?php

                if(isset($_SESSION['LogInStatus']) && $_SESSION['LogInStatus'] == true) {
                  echo "Logget inn som: " . $_SESSION['brukernavn'];
                }

                ?>
            </div>
        </div>
    </header>
    <!-- Header som inneholder navigatoren på nettsiden - slutt -->
