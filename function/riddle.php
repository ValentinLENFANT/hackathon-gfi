<?php

//require_once 'jobAdvert.php';

function displayTheRiddle()
{
    echo "<div style='background-image: url(../web/img/space.jpg);
    padding-top: 200px;
    background-position: 100% 100%;
    position: relative;
    right: 8px;
    width: 100%;
    bottom: 9px;
    padding-right: 20px;'></div>";
    echo "<img src=../riddle/firstRiddle.png style='width: 90%;
    margin: auto;
    display: block;
    position: relative;
    bottom: 120px;'>";
    echo "<br><br>Vous pensez avoir trouvé le numéro ? Entrez-le dans le champ ci-dessous pour vérifier ! <br><br>";
    echo "<input type='text'>";
    echo "<input type='submit' onclick='checkPhoneNumber()'>";
}

displayTheRiddle();

?>

<script>

    function checkPhoneNumber() {
        alert("Bravo ! Vous avez trouvé le bon numéro de téléphone. Vous pouvez désormais nous appeler.");
    }

</script>
