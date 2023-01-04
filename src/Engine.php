<?php

namespace BrainGames\Engine;

use function BrainGames\Games\IsEven\game as isEvenGame;
use function BrainGames\Games\Calc\calculationGame;
use function BrainGames\Games\IsPrime\isPrimeGame;
use function BrainGames\Games\NOD\startNODGame;
use function cli\line;
use function BrainGames\Games\Progression\progressionGame;

function startSelectedGame()
{

    \cli\line("Hello, Choose game do you want to play!");
    \cli\line("Type one of this names :");
    $choosed = \cli\prompt("IsEven, Calculation, NOD, Progression, IsPrime");

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
    elseif ($choosed = "Progression")
    {
        return progressionGame();
    }
    elseif ($choosed === "IsPrime")
    {
        return isPrimeGame();
    }
    else line("No such game");
}