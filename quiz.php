<?php

require "vendor/autoload.php";

session_start();

// 3.

use App\QuestionManager;

$number = null;
$question = null;

try {
    $manager = new QuestionManager;
    $manager->initialize();

    if (isset($_SESSION['is_quiz_started'])) {
        $number = $_SESSION['current_question_number'];
    } else {
        // Marker for a started quiz
        $_SESSION['is_quiz_started'] = true;
        $_SESSION['answers'] = [];
        $number = 1;
    }

    if (isset($_POST['answer'])) {
        $_SESSION['answers'][$number] = $_POST['answer'];
        $number++;
    }

    // Has user answered all items
    if ($number > $manager->getQuestionSize()) {
        header("Location: result.php");
        exit;
    }

    // Marker for question number
    $_SESSION['current_question_number'] = $number;

    $question = $manager->retrieveQuestion($number);
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quiz</title>
        <style>
        form.ques {
            background-color: #fff;
            border: 0px solid #ccc;
            border-radius: 45px;
            padding: 10px;
            margin: 0px;
            max-width: 1085px; /* set a maximum width */
            height: 650px;
            background-image: url('https://lh3.googleusercontent.com/drive-viewer/AFGJ81oFCJykTM1tzAv5m5KJDd8VpE2h4GFvfJD94RRe8lJaOVV7fbSkxvBqW1mU4_Ari2BNUerx78_yfyCBVTSPOTmUh2qQ=s1600');
            background-size: cover;
            margin-top: 25px;
        }
        .bodi{
            background-color: #4CAF50;
        }
        div.quiz{
            display: flex;
            align-items: center;
        }

        input[type="radio"] {
            /* Move the radio circle to the right */
            position: left;
            margin-left: 400px;
        }
        .radio-container {
            display: flex;
            align-items: center;
            font-size: 45px;
        }

        .radio-container input[type="radio"] {
            margin-right: 100px;
            -ms-transform: scale(1.5); /* IE 9 */
            -webkit-transform: scale(1.5); /* Chrome, Safari, Opera */
            transform: scale(1.5);
        }
        .next {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            height: 50px;
            width: 196px;
            position: relative;
            font-size: 20px;
            position: absolute; 
            top: 60%; 
            left: 70%; 
        }

        .next:hover {
            background-color: #3e8e41;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
            transform: translate(2px, 2px);
        }
        .kwesyun{
            font-size: 30px;
        }
        </style>
    </head>
    <body class="bodi">
        <div align="center">
            <form method="POST" action="quiz.php" class="ques">
                <div class="kwesyun">
                    <h1 align="center">Question #<?php echo $question->getNumber(); ?></h1>
                    <h2 style="color: blue" align="center"><?php echo $question->getQuestion(); ?></h2>
                    <h4 style="color: blue" align="center">Choices</h4>
                </div>

                    <input type="hidden" name="number" value="<?php echo $question->getNumber();?>" />
                    <?php foreach ($question->getChoices() as $choice): ?>
                            <div class="radio-container">
                                <input type="radio" name="answer" value="<?php echo $choice->letter; ?>"/>
                                <?php echo $choice->letter; ?>)
                                <?php echo $choice->label; ?>
                            </div>
                <?php endforeach; ?>
                <br>
                <div align="center">
                    <input type="submit" value="Next Question" class="next">
                </div>
            </div>
            </form>
        </div>

    </body>
</html>

