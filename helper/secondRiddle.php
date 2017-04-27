<?php

function findTheStreetNumber()
{
    $a = '?';
    $b = 0;
    $c = 84 / 2;

    $b = ($c / ($c * 0.5)) * (2 % 42);
    if ($b == 4 % ($c / ($b / 2))) {
        $b = sqrt(pow($b, $b));
        for ($b = $b; $b < sqrt(($c / 2) * ($c / 2)); $b++) {
            $b++;
        }
        $b = ($b + 2 % 22) - (2 - (-true));
    }
    return $b;
}

function findTheKindOfLane()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $firstLetter = substr($alphabet, 17, 1);
    $secondLetter = substr($alphabet, 17, 6);
    $secondLetter = substr($secondLetter, 1, 3);
    $secondLetter = substr($secondLetter, -1, 2);
    for ($i = 26; $i >= 4; $i --)
    {
        $thirdLetter = substr($alphabet, $i, 1);
    }
    $fourthLetter = '';
    return substr($firstLetter.$secondLetter.$thirdLetter.$fourthLetter.$firstLetter, 0, 3);
}

function findTheNameLane()
{
    $array = array('An', 'dré');
    $keywords = preg_split("/[\s,]+/", "ci tro, ën");
    return implode('', $array) . ' ' . implode('', $keywords);
}

echo findTheStreetNumber(). ' '. findTheKindOfLane(). ' '. findTheNameLane();