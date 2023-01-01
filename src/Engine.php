<?php

namespace BrainGames\Engine;

use function BrainGames\Games\IsEven\game as isEvenGame;
use function BrainGames\Games\Calc\calculationGame;
use function BrainGames\Games\NOD\startNODGame;
use function cli\line;

function startSelectedGame()
{

    \cli\line("Hello, Choose game do you want to play!");
    \cli\line("Type one of this names :");
    $choosed = \cli\prompt("IsEven, Calculation, NOD");

    if ($choosed === "IsEven")
    {
        isEvenGame();
    }
    elseif ($choosed === "Calc")
    {
        calculationGame();
    }
    elseif ($choosed === "NOD")
    {
        return startNODGame();
    }
    else line("No such game");
}