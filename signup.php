<?php
require 'database.php';


if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':email',$_POST['email']);
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$stmt->bindParam(':password', $password);

	if ($stmt->execute()) {
		$message = 'Sucessfully created new user';
	} else{
		$message = 'error';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/login.css">

</head>
<body>
	<?php require 'partials/header.php'?>

	<?php if(!empty($message)):?>

	<p><?= $message ?></p>

<?php endif; ?>


	<h1>signup</h1>
	<span>or <a href="login.php">Log in</a></span>
	<form action="signup.php" method="post">
		<input class="login" type="text" name="email" placeholder="enter yout email">
		<input class="login" type="password" name="password"
		placeholder="entr your password">
		<input class="submit" type="submit" value="send">
	</form>

</body>
</html>