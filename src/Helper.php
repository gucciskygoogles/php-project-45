<?php

namespace BrainGames\Helper;

function getRandomNum()
{
    return rand(0, 100);
}

function getRandomOperation()
{
    $operations = ["+", "-", "*"];
    return $operations[rand(0, 2)];
}