<?php

namespace BrainGames\Engine;

use function BrainGames\Games\IsEven\game as isEvenGame;
use function BrainGames\Games\Calc\calculationGame;

function startSelectedGame()
{
    \cli\line("Hello, Choose game do you want to play!");
    \cli\line("Type one of this names :");
    $choosed = \cli\prompt("IsEven, Calculation");

    if ($choosed === "IsEven")
    {
        isEvenGame();
    }
    elseif ($choosed === "Calc")
    {
        calculationGame();
    }
}