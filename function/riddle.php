<?php

//require_once 'jobAdvert.php';

function displayTheRiddle()
{
    echo "<img src=../riddle/firstRiddle.png>";
    echo "<br><br>Vous pensez avoir trouvé le numéro ? Entrez-le dans le champ ci-dessous pour vérifier ! <br><br>";
    echo "<input type='text'>";
    echo "<input type='submit' onclick='checkPhoneNumber()'>";
}

displayTheRiddle();

?>

<script>

    function checkPhoneNumber()
    {
        alert("Bravo ! Vous avez trouvé le bon numéro de téléphone. Vous pouvez désormais nous appeler.");
    }

</script>
