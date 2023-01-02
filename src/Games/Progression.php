<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\greetings;
use function cli\line;
use function cli\prompt;

function progressionGame()
{
    $countOfCorrectAnswers = 0;
    $progression = replaceRandomNumInProgression(generateProgression());
    $progressionAsString = implode(" ", $progression);

    $name = greetings();
    line("What number is missing in the progression?");

    while ($countOfCorrectAnswers !== 3)
    {
        line("Question: %s", $progressionAsString);
        $answer = prompt("Your answer");

        if (isResultCorrect($progression, $answer))
        {
            line("Correct!");
            $countOfCorrectAnswers++;
            $progression = replaceRandomNumInProgression(generateProgression());
        }
        else
        {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, getCorrectResult($progression));
            break;
        }
    }
    if ($countOfCorrectAnswers === 3)
    {
        line("Congratulations, %s!", $name);
    }
}

function generateProgression()
{
    return range(rand(0, 10), rand(10, 50), rand(1, 10));
}

function replaceRandomNumInProgression($arr)
{
    $arr[rand(0, count($arr) - 1)] = "..";
    return $arr;
}

function isResultCorrect($progression, $answer)
{
    $delta = $progression[1] - $progression[0];

    foreach ($progression as $key => $value)
    {
        if ($value === "..")
        {
            if ($answer - $progression[$key - 1] === $delta)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    }
}

function getCorrectResult($progression)
{
    $delta = $progression[1] - $progression[0];

    foreach ($progression as $key => $value)
    {
        if ($value === "..")
        {
            return $progression[$key - 1] + $delta;
        }

    }
}
