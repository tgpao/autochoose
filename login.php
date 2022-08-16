<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<title>Увійти в кабінет</title>
</head>
<body>
<?php
include 'header.php';
$email = $_POST['email'];
$password = $_POST['password'];
$do_login = $_POST['do_login'];

if (isset($do_login)) {
	$errors = array();
	$findemail = mysqli_query($connection, "SELECT email FROM `users` WHERE `email` = '$email'");
	$email_assoced = mysqli_fetch_assoc($findemail);

	$findpassword = mysqli_query($connection, "SELECT password FROM `users` WHERE `email` = '$email'");
	$password_assoced = mysqli_fetch_assoc($findpassword);
	$passwordhashed = $password_assoced['password'];



	if (mysqli_num_rows($findemail) > 0) {
		if (password_verify($password, $passwordhashed)) {
			$user_queried = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'");
			$user_assoced = mysqli_fetch_assoc($user_queried);
			$_SESSION['logged_user'] = $user_assoced;
			echo '<script>
			location.href = "index.php"
			</script>';
		} else {
			$errors[] = 'The password is wrong';
		}
	} else {
		$errors[] = 'The email is wrong';
	}

	if (! empty($errors)) { ?>
		<div class="login__error">			
				<?php echo array_shift($errors); ?>			
		</div>
	<?php }
}
?>
<div class="login">
	<div class="container">
		<form class="login__form" action="login.php" method="post">
			<p class="login__text">Вхід до кабінету</p>
			
			<div>
				<div class="input__text">Введіть ваш e-mail</div>
				<input class="login__input" type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
			</div>

			<div>
				<div class="input__text">Введіть ваш пароль</div>
				<input class="login__input" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>">
			</div>



			<div>
				<input class="btn" type="submit" name="do_login" value="Увійти">
			</div>
		</form>

		<div class="reg__btn">
		<a href="registration.php" class="reg__link">Реєстрація на сайті AUTOCHOOSE</a>
		</div>

	</div><!-- container -->
</div><!-- login -->

<?php 
include 'footer.php';
?>

</body>
</html>