<?php

    function thirdNumber()
    {
        //echo !true;
       // echo ((true * 3) - (!false + (!false + true * !!!false)))*;
    }
    //Que retourne la fonction suivante sachant qu'elle détermine le 4ème chiffre du numéro de téléphone ?
    function fourthNumber()
    {
        $i = 100;
        while($i != chr(52))
        {
            $i--;
        }
        echo $i;
    }

    thirdNumber();