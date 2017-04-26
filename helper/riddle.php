<?php

function hexecuteMe()
{
    return (hexdec('ab') + hexdec('1d')) / hexdec('c8');
}

function binaryIsLife()
{
    return (bindec(1000) - bindec(1000) - bindec(10) + bindec(100)) + bindec(0);
}

function castMeHard()
{
    return (integer)pi() + (bool)floor(2.4) - ceil(0.500000000001) + (real)(string)(float)0;
}

function booleanHell()
{
    return ((true * 3) - (!false + (!false + true * !!!false))) * (false) + pow(!!true + !false, !!true + !false);
}

function knowYourCHR6583677373()
{
    $i = 100;
    while ($i != chr(53)) {
        $i--;
    }
    return $i;
}

function diplopodaFunction()
{
    return sqrt((booleanHell() + binaryIsLife() - (hexecuteMe()-1)) * knowYourCHR6583677373() + rand(0,0) + binaryIsLife() + substr((string)mt_getrandmax(), 0, 1) + rand(2,2));
}

function liechtensteinThisString()
{
    return levenshtein('Did you find the number?','Of course you did!') - levenshtein('Keep doing so well! ;)', 'Keep going!');
}

function bcWorld()
{
    $a = 1;
    $b = $a + $a;
    $c = ($b + $a)*$a;
    $bc = $b*$c;
    return ((bcmul($b, '4') * bcpowmod('2', '4', '5')) + bccomp('2', $a) - bccomp('42', '42') - bcsub($bc, $b) + bcadd($b, $b))-$a;
}

function prickUpYourEars()
{
    return strlen(metaphone('You are doing great! Keep going')) - strlen(metaphone('Metaphone'));
}

function hereIsThePhoneNumber()
{
    return '0'.diplopodaFunction().prickUpYourEars().knowYourCHR6583677373().hexecuteMe().'0'.knowYourCHR6583677373().binaryIsLife().'0'.binaryIsLife();
}

echo hereIsThePhoneNumber();