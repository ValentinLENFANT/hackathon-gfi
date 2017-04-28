<?php

require_once 'outsourcing.php';

function getTheJobAdvert($dictionarySkills)
{
    $db = new PDO('mysql:host=localhost;dbname=enigma;charset=utf8', 'root', '');
    $jobAdvertToGetFromTheDatabase = findJobAdvert($dictionarySkills);
    $response = $db->query('SELECT * FROM jobadvert WHERE id=' . $jobAdvertToGetFromTheDatabase[0]);
    while($jobOffer = $response->fetch())
    {
        echo $jobOffer['wording'] . "<br>" . $jobOffer['description'] . "<br>";
        echo "<a href=riddle.php>Deviens un puissant maitre du code en résolvant cette énigme</a><br><br>";
    }

    $response = $db->query('SELECT * FROM jobadvert WHERE id=' . $jobAdvertToGetFromTheDatabase[1]);
    $idRiddle = "";
    while($jobOffer = $response->fetch())
    {
        echo $jobOffer['wording'] . "<br>" . $jobOffer['description'] . "<br>";
        echo "<a href=riddle.php>Deviens un puissant maitre du code en résolvant cette énigme</a><br><br>";
        $idRiddle = $jobOffer['idRiddle'];
    }

    return $idRiddle;
}

function getTheRiddle($dictionarySkills)
{
    $idRiddle = getTheJobAdvert($dictionarySkills);
    $db = new PDO('mysql:host=localhost;dbname=enigma;charset=utf8', 'root', '');
    $response = $db->query('SELECT * FROM riddle WHERE id=' . $idRiddle);
    while($data = $response->fetch())
    {
        $enigmaContent = $data['content'];
    }
    return $enigmaContent;
}

getTheRiddle($dictionarySkills);