<?php

class User extends Model
{
	public static function register($nameUser, $surnameUser, $email, $password)
	{
		$db = Db::getConnection();

		$sql = 'INSERT INTO `user`(`name`, `surname`, `email`, `password`) VALUES (:nameUser, :surnameUser, :email, :password)';

		$result = $db->prepare($sql);
		$result->bindParam(':nameUser', $nameUser, PDO::PARAM_STR);
		$result->bindParam(':surnameUser', $surnameUser, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);

		return $result->execute();
	}

	public static function checkName($nameUser)
	{
		if (strlen($nameUser) >= 2) {
			return true;
		}
		return false;
	}
	public static function checkSurname($surnameUser)
	{
		if (strlen($surnameUser) >= 2) {
			return true;
		}
		return false;
	}
	public static function checkEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}
	public static function checkEmailExists($email)
	{
		$db = Db::getConnection();
		$sql = 'SELECT COUNT(*) FROM user WHERE email=:email';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		if ($result->fetchColumn()) {
			return true;
		}
		return false;
	}
	public static function checkPassword($password)
	{
		if ((preg_match("~^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%!?,^&+=.\-_*])([a-zA-Z0-9@#$%!?,^&+=.\-_]){6,}$~", $password))) {
			return true;
		}
		return false;
	}
	public static function checkPasswordConfirm($passwordConfirm, $password)
	{
		if ($passwordConfirm == $password) {
			return true;
		}
		return false;
	}
	public static function checkUserData($email, $password)
	{
		$db = Db::getConnection();

		if ($email && $password) {
			$sql = 'SELECT * FROM user WHERE email=:email AND password=:password';

			$result = $db->prepare($sql);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->bindParam(':password', $password, PDO::PARAM_STR);
			$result->execute();

			$user = $result->fetch();
		} else {
			$sql = 'SELECT * FROM user WHERE email=:email';

			$result = $db->prepare($sql);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->execute();

			$user = $result->fetch();
		}

		if ($user) {
			return $user;
		}
		return false;
	}


	public static function auth($user)
	{
		$_SESSION['user'] = $user;
	}
}
