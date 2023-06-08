<?php

namespace App;

use App\Question;

class QuestionManager
{
    protected $question_bank;
    protected $answers;
    
    public function __construct()
    {
        if($_SESSION['Subject'] === 'Contemporary_World'){
        $this->question_bank = [];
        $this->answers = [
            null,
            'a',
            'c',
            'a',
            'd',
            'c',
            'a',
            'd',
            'd',
            'c',
            'a',
            'a',
            'b',
            'b',
            'd',
            'c'
        ];
    } else if($_SESSION['Subject'] === 'Ccs05'){
        $this->question_bank = [];
        $this->answers = [
            null,
            'c',
            'c',
            'a',
            'b',
            'a',
            'd',
            'b',
            'a',
            'a',
            'c',
            'a',
            'a',
            'd',
            'c',
            'a'
        ];
    } else if($_SESSION['Subject'] === 'Ite'){
        $this->question_bank = [];
        $this->answers = [
            null,
            'b',
            'd',
            'a',
            'b',
            'd',
            'a',
            'b',
            'b',
            'a',
            'c',
            'c',
            'a',
            'b',
            'd',
            'a'
        ];
    } else if($_SESSION['Subject'] === 'Ethics'){
        $this->question_bank = [];
        $this->answers = [
            null,
            'a',
            'b',
            'a',
            'b',
            'd',
            'c',
            'c',
            'b',
            'a',
            'b',
            'c',
            'd',
            'b',
            'c',
            'a'
        ];
    }   else if($_SESSION['Subject'] === 'Ccs06'){
        $this->question_bank = [];
        $this->answers = [
            null,
            'c',
            'a',
            'a',
            'b',
            'c',
            'a',
            'a',
            'a',
            'b',
            'c',
            'd',
            'd',
            'c',
            'b',
            'a'
        ];
    }
    }

    public function initialize()
    {
        try {
            if($_SESSION['Subject'] === 'Contemporary_World'){
            $questions_file = 'quiz/Cw.json';
            $questions = file_get_contents($questions_file);
            $questions = json_decode($questions);

            foreach ($questions as $item) {
                $question = new Question(
                    $item->number,
                    $item->question,
                    $item->choices
                );
                array_push($this->question_bank, $question);
            }
            
        }
        
            else if ($_SESSION['Subject'] === 'Ccs05'){
            $questions_file = 'quiz/Ccs05.json';
            $questions = file_get_contents($questions_file);
            $questions = json_decode($questions);

            foreach ($questions as $item) {
                $question = new Question(
                    $item->number,
                    $item->question,
                    $item->choices
                );
                array_push($this->question_bank, $question);
            }
        }   else if ($_SESSION['Subject'] === 'Ite'){
            $questions_file = 'quiz/Ite.json';
            $questions = file_get_contents($questions_file);
            $questions = json_decode($questions);

            foreach ($questions as $item) {
                $question = new Question(
                    $item->number,
                    $item->question,
                    $item->choices
                );
                array_push($this->question_bank, $question);
            }
        }   else if ($_SESSION['Subject'] === 'Ethics'){
            $questions_file = 'quiz/Ethics.json';
            $questions = file_get_contents($questions_file);
            $questions = json_decode($questions);

            foreach ($questions as $item) {
                $question = new Question(
                    $item->number,
                    $item->question,
                    $item->choices
                );
                array_push($this->question_bank, $question);
            }
        }   else if ($_SESSION['Subject'] === 'Ccs06'){
            $questions_file = 'quiz/Ccs06.json';
            $questions = file_get_contents($questions_file);
            $questions = json_decode($questions);

            foreach ($questions as $item) {
                $question = new Question(
                    $item->number,
                    $item->question,
                    $item->choices
                );
                array_push($this->question_bank, $question);
            }
        }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function retrieveQuestion($number)
    {
        if ($number > count($this->question_bank)) {
            return null;
        }

        if ($number < 0) {
            return null;
        }

        return $this->question_bank[$number - 1];
    }

    public function getQuestionSize()
    {
        return count($this->question_bank);
    }
    
    public function computeScore($answers)
    {
        $score = 0;
        
        foreach ($answers as $number => $answer) {

            if ($answer == $this->answers[$number]) {

                $score++;
            }
        }
    
        return $score;
    }
    public function showAnswer($answers)
    {
        $x = 1;
        foreach ($answers as $number => $answer) {

            if ($answer == $this->answers[$number]) {
                echo $x . ". ". $answer . '<span style="color:blue"> (correct)</span>' . "<br>";
                $x++;
            } else {
                echo $x . ". ". $answer . '<span style="color:red"> (incorrect)</span>' . "<br>";
                $x++;
            }
        }
    
    }
}