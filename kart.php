<!DOCTYPE html>
<html>

<?php include 'header.php'; ?>

<body>


    <!-- Boks for hexagon menyen - start -->
    <div class="kartContainer">
            <div id="style-selector-control"  class="map-control">
                <select id="style-selector" class="selector-control">
                    <option value="silver" selected="selected">WesterDals dag</option>
                    <option value="night">WesterDals natt</option>
                    <option value="retro">Retro</option>
                </select>
            </div>
            <!--Kart stil velger slutt-->

            <div id="map"></div>
            <!--Henter Kartet-->
            <script src="GoogleApiScriptMultipleView.js"></script>
            <!--API nøkkel-->
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoL_r7jaY2J3PcX6pQzUZ_s_CS6VrInZE&callback=initMap">
            </script>
        </div>
    <!-- Boks for hexagon menyen - slutt -->

    <?php include 'footer.php';?>

</body>

</html>
