<?php
session_start();
require_once('db.php');
if(isset($_POST) & !empty($_POST)){
	$brukernavn = mysqli_real_escape_string($connection, $_POST['brukernavn']);
	$passord = md5($_POST['passord']);

	$sql = "SELECT * FROM `brukere` WHERE brukernavn='$brukernavn' AND passord='$passord'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		$_SESSION['brukernavn'] = $brukernavn;
	}else{
		$fmsg = "Invalid Username/Password";
	}
}
if(isset($_SESSION['brukernavn'])){
	$smsg = "User already logged in";
}


?>


    <!-- Header som inneholder navigatoren på nettsiden - start -->
    <header>
        <div id="navigator">
            <div id="logo">
                <a href="index.html">
                    <img src="http://bylarm.no/wp-content/themes/bylarm/images/logos/westerdals.png">
                </a>
            </div>
            <div class="brukerinfo">
                <?php if(isset($smsg)){ ?>
                <div class="" role="alert">
                    <?php echo $smsg; ?> </div>
                <?php } ?>
                <?php if(isset($fmsg)){ ?>
                <div class="" role="alert">
                    <?php echo $fmsg; ?> </div>
                <?php } ?>
                <form class="brukerinfo1" method="POST">
                    <div class="">
                        <input type="text" name="brukernavn" class="login1" placeholder="Brukernavn" required>
                    </div>
                    <label for="inputPassword" class="">Password</label>
                    <input type="password" name="passord" id="inputPassword" class="login1" placeholder="Passord" required>
                    <button class="" type="submit">Login</button>
                    <a class="" href="register.php">Register</a>
                </form>
            </div>
            <div id="navbuttons">
                <a href="index.php">Home</a>
                <a href="Something.html">Something</a>
                <a href="Something.html">Something</a>
                <a href="Something.html">Something</a>
                <a href="register.php">Register</a>
            </div>
        </div>
    </header>
    <!-- Header som inneholder navigatoren på nettsiden - slutt -->
