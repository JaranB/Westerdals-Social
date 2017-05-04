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
            <div class="dropdownMenuSuper">
                <button class="categoryBtn">Kategori</button>
                    <div class="categoryMenu">
                        <a href="bildetest2.php">Barer</a>
                        <a href="bildetest2.php">Restauranter</a>
                        <a href="bildetest2.php">Parkering</a>
                        <a href="bildetest2.php">Helse</a>
                        <a href="bildetest2.php">Transport</a>
                        <a href="bildetest2.php">Matbutikk</a>
                    </div>
            </div>
            <a href="index.php">Something</a>
            <?php

                require_once('db.php');

                  function loggUtFunksjon() {
                    $_SESSION['LogInStatus'] = false;
                    $_SESSION['admin'] = false;
                    $_SESSION['brukernavn'] = null;
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

                    echo "<a href='minside.php'>Min Side</a>";
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
                  echo "<a id='loggetInnSom'>Logget inn som: </a><a>" . $_SESSION['brukernavn']; echo "</a> ";
                }

                 if(isset($_SESSION['avatarURL'])) {

                    $brukernavn = mysqli_real_escape_string($connection, $_SESSION['brukernavn']);

                    $sql = "SELECT avatarURL FROM `brukere` WHERE brukernavn='$brukernavn'";
                    $result1 = mysqli_query($connection, $sql);
                    $row = $result1->fetch_assoc();
                    $avatarURL = $row['avatarURL'];

                     echo "<div id='avatarBildeHeader'><img src='$avatarURL' id='avatarBilde'></div>";
                 }

                ?>
        </div>
</header>
<!-- Header som inneholder navigatoren på nettsiden - slutt -->
