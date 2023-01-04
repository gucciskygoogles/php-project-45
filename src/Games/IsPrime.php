<?php

namespace BrainGames\Games\IsPrime;

use function BrainGames\Cli\greetings;
use function BrainGames\Helper\getRandomNum;
use function cli\line;
use function cli\prompt;

function isPrimeGame()
{
    $countOfCorrectAnswers = 0;
    $num = getRandomNum();

    $name = greetings();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($countOfCorrectAnswers !== 3)
    {
        line("Question: %s", $num);
        $answer = prompt("Your answer");

        if (isResultCorrect($num) && $answer === "yes")
        {
            $countOfCorrectAnswers++;
            $num = getRandomNum();
            line("Correct!");
        }
        elseif (!isResultCorrect($num) && $answer === "no")
        {
            $countOfCorrectAnswers++;
            $num = getRandomNum();
            line("Correct!");
        }
        elseif (isResultCorrect($num) && $answer === "no")
        {
            line("'%s' is wrong answer ;(. Correct answer was 'yes'", $answer);
            line("Let's try again, %s!", $name);
        }
        elseif (!isResultCorrect($num) && $answer === "yes")
        {
            line("'%s' is wrong answer ;(. Correct answer was 'no'", $answer);
            line("Let's try again, %s!", $name);
        }
    }

    if ($countOfCorrectAnswers === 3)
    {
        line("Congratulations, %s!", $name);
    }
}

function isResultCorrect($num)
{
    $n = 0;

    for($i = 2; $i < $num; $i++) {
        if($num % $i == 0){
            $n++;
            break;
        }
    }

    if ($n == 0){
        return true;
    } else {
        return false;
    }
}
