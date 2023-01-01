<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\greetings;
use function BrainGames\Helper\getRandomNum;
use function BrainGames\Helper\getRandomOperation;
use function cli\line;
use function cli\prompt;

function calculationGame()
{
    $countOfCorrectAnswers = 0;
    $firstValue = getRandomNum();
    $secondValue = getRandomNum();
    $operation = getRandomOperation();

    $name = greetings();
    \cli\line("What is the result of the expression?");

    while ($countOfCorrectAnswers !== 3)
    {
        \cli\line("Question: %s %s %s", $firstValue, $operation, $secondValue);
        $answer = prompt("Your answer");

        if ((int) $answer === getResultOfCalculation($firstValue, $operation, $secondValue))
        {
            line("Correct!");
            $countOfCorrectAnswers++;
            $firstValue = getRandomNum();
            $secondValue = getRandomNum();
            $operation = getRandomOperation();
        }
        else
        {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, getResultOfCalculation(
                $firstValue, $operation, $secondValue
            ));
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($countOfCorrectAnswers === 3)
    {
        line("Congratulations, %s!", $name);
    }
}

function getResultOfCalculation($firstValue, $operation, $secondValue) : int
{
    if ($operation === "+")
    {
        return  ($firstValue + $secondValue);
    }
    elseif ($operation === "-")
    {
        return $firstValue - $secondValue;
    }
    elseif ($operation === "*")
    {
        return $firstValue * $secondValue;
    }
    else return 0;
}
