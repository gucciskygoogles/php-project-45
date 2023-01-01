<?php

namespace BrainGames\Games\NOD;

use function BrainGames\Cli\greetings;
use function BrainGames\Helper\getRandomNum;
use function cli\line;
use function cli\prompt;


function startNODGame()
{
    $countOfCorrectAnswers = 0;
    $firstValue = getRandomNum();
    $secondValue = getRandomNum();

    $name = greetings();
    line("Find the greatest common divisor of given numbers.");

    while ($countOfCorrectAnswers !== 3)
    {
        line("Question: %s %s", $firstValue, $secondValue);
        $answer = prompt("Your answer");

        if (isResultOfQuestionCorrect($firstValue, $secondValue, $answer))
        {
            line("Correct!");
            $countOfCorrectAnswers++;
            $firstValue = getRandomNum();
            $secondValue = getRandomNum();
        }
        else
        {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.",
                $answer, gcd($firstValue, $secondValue));
            break;
        }
    }

    if ($countOfCorrectAnswers === 3)
    {
        line("Congratulations, %s!", $name);
    }

}

function isResultOfQuestionCorrect($firstValue, $secondValue, $answer)
{
    if ((int) $answer === gcd($firstValue, $secondValue))
    {

        return true;
    }
    else return false;
}

function gcd($a,$b) {
    return ($a % $b) ? gcd($b,$a % $b) : $b;
}
