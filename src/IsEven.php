<?php

namespace BrainGames\IsEven;

use function BrainGames\Cli\greetings as greet;
use function BrainGames\Helper\getRandomNum;
use function cli\line;
use function cli\prompt;

function game()
{
    $countOfCorrectAnswers = 0;
    $number = getRandomNum();

    $name = greet();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($countOfCorrectAnswers !== 3)
    {
        line("Question: %s", $number);
        $answer = prompt("Your answer");

        if (isResultOfQuestionCorrect($number, $answer, $name))
        {
            $countOfCorrectAnswers++;
            $number = getRandomNum();
        }
        else break;
    }

    if ($countOfCorrectAnswers === 3)
    {
        line("Congratulations, %s!", $name);
    }
}

function isResultOfQuestionCorrect($num, $answer, $name): bool
{
    if ($num % 2 === 0 && $answer === "yes" || $num % 2 !== 0 && $answer === "no")
    {
        line("Correct!");
        return true;
    }
    elseif ($num % 2 === 0 && $answer === "no")
    {
        line("'%s' is wrong answer ;(. Correct answer was 'yes'", $answer);
        line("Let's try again, %s!", $name);
        return false;
    }
    elseif ($num % 2 !== 0 && $answer === "yes")
    {
        line("'%s' is wrong answer ;(. Correct answer was 'no'", $answer);
        line("Let's try again, %s!", $name);
        return false;
    }
    else
    {
        if ($num % 2 === 0)
        {
            $correctAnswer = 'yes';
        }
        else
        {
            $correctAnswer = 'no';
        }
        line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correctAnswer);
        line("Let's try again, %s!", $name);
        return false;
    }

}

