<?php

namespace App;

use PDO;

class Score
{
    public static function register($username,$quiz, $score, $id)
	    {
		    global $conn;
		
		    try {
			    $sql = "
				    INSERT INTO quiz (username, quiz, score, user_id)
				    VALUES ('$username', '$quiz', '$score', '$id')
			    ";

			    $conn->exec($sql);
                return $conn->lastInsertId();
		    } catch (PDOException $e) {
			    error_log($e->getMessage());
		    }

		    return false;
	    }
		public static function list()
		{
			global $conn;

			$quiz = $_SESSION['dropdown'];
			
			try {
				$sql = "SELECT username, 
				quiz, 
				score,
				saved_at 
				FROM quiz
				WHERE quiz = '$quiz'
				GROUP BY username
				ORDER BY score DESC
				limit 100
				";
				$statement = $conn->prepare($sql);
				$statement->execute();
				$table = $statement->fetchAll(PDO::FETCH_ASSOC);
				return $table;
			} catch (Exception $e) {
				error_log($e->getMessage());
			}
	
			return null;
		}
}