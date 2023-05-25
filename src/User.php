<?php

namespace App;

use PDO;

class User
{
	protected $id;
	protected $username;
	protected $email;
	protected $pass;
	protected $created_at;

	public function getId()
	{
		return $this->id;
	}
    public function getEmail()
	{
		return $this->email;
	}
	public function getUsername()
	{
		return $this->username;
	}


	public static function getById($id)
	{
		global $conn;

		try {
			$sql = "
				SELECT * FROM users
				WHERE id=:id
				LIMIT 1
			";
			$statement = $conn->prepare($sql);
			$statement->execute([
				'id' => $id
			]);
			$result = $statement->fetchObject('App\User');
			return $result;
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return null;
	}

	public static function hashPassword($password)
	{
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		return $hashed_password;
	}

	public static function attemptLogin($email, $pass)
	{
		global $conn;

		try {
			$sql = "
				SELECT * FROM users
				WHERE email=:email
				LIMIT 1
			";
			$statement = $conn->prepare($sql);
			$statement->execute([
				'email' => $email,
			]);
			$user = $statement->fetchObject('App\User');
		
			if ($user && password_verify($pass, User::hashPassword($pass))) {
				$pass = User::hashPassword($pass);
				return $user;
			}

			
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return null;
	}

	public static function register($username, $email, $password)
	{
		global $conn;
		

		try {
			$hashed_password = self::hashPassword($password);
			$sql = "
				INSERT INTO users (username, email, password)
				VALUES ('$username', '$email', '$hashed_password')
			";

			$conn->exec($sql);
			// echo "<li>Executed SQL query " . $sql;
			return $conn->lastInsertId();
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return false;
	}

	public static function registerMany($users)
	{
		global $conn;

		try {
			foreach ($users as $user) {
				$sql = "
					INSERT INTO users
					SET
						username=\"{$user['username']}\",
						email=\"{$user['email']}\",
						pass=\"{$user['pass']}\"
				";
				$conn->exec($sql);
				// echo "<li>Executed SQL query " . $sql;
			}
			return true;
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return false;
	}	
	public static function profile()
	{
		global $conn;
		$user = $_SESSION['user']['username'];
		try {
			$sql = "SELECT username, 
			quiz, 
			score 
			FROM quiz
			WHERE username = '$user'
			ORDER BY quiz
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