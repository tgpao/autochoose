<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<title>Реєстрація</title>
</head>
<body>
<?php 
include 'header.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$number = $_POST['phonenumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_check = $_POST['password_check'];
$do_register = $_POST['do_register'];
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

$insert = "INSERT INTO `users` (`id_users`, `name`, `surname`, `email`, `phone_number`, `password`) VALUES (NULL, '$name', '$surname', '$email', '$number', '$password_hashed')";
$countemail = mysqli_query($connection, "SELECT email FROM `users` WHERE `email` = '$email'");
$countnumber = mysqli_query($connection, "SELECT phone_number FROM `users` WHERE `phone_number` = '$number'");

if (isset($do_register)) {
	$errors = array();

	if (trim($name) == '') {
		$errors[] = "Введіть ваше ім'я!"; 
	}

	if (trim($surname) == '') {
		$errors[] = 'Введіть ваше прізвище!'; 
	}

	if (trim($number) == '') {
		$errors[] = 'Введіть ваш номер телефону!'; 
	}

	if (iconv_strlen($number) != '13') {
		$errors[] = 'Номер введено невірно!'; 
	}

	if (mysqli_num_rows($countnumber) > 0) {
		$errors[] = 'Такий номер телефону вже зареєстрований!'; 
	}

	if (trim($email) == '') {
		$errors[] = 'Введіть ваш email!'; 
	}

	if (mysqli_num_rows($countemail) > 0) {
		$errors[] = 'Така email адреса вже зареєстрована!'; 
	}

	if (trim($password) == '') {
		$errors[] = 'Введіть ваш пароль!'; 
	}

	if ($password_check != $password) {
		$errors[] = 'Паролі не співпадають!'; 
	}

	if (empty($errors)) {
		mysqli_query($connection, $insert);
		echo '<script>
			location.href = "login.php"
			</script>';
	} else { ?>
		<div class="container">
			<div class="reg__errors">
				<?php echo array_shift($errors); ?>
			</div>
		</div>
	<?php }
}
?>

<div class="registration">
	<div class="container">
		<form action="registration.php" method="post" class="registration__form">

			<div class="reg__site">
				<div class="reg__site__text">Реєстрація на сайті <strong class="reg__site__name">AUTOCHOOSE</strong></div>
			</div>

			<p class="registration__text">Введіть ваше ім'я</p>
			<input type="text" name="name" placeholder="Ім'я" class="registration__input" value="<?php echo $name; ?>">

			<p class="registration__text">Введіть ваше прізвище</p>
			<input type="text" name="surname" placeholder="Прізвище" class="registration__input" value="<?php echo $surname; ?>">

			<p class="registration__text">Введіть ваш номер телефону</p>
			<input type="text" name="phonenumber" placeholder="+380"  class="registration__input" value="<?php echo $number; ?>">

			<p class="registration__text">Введіть ваш email</p>
			<input type="text" name="email" placeholder="Email" class="registration__input" value="<?php echo $email; ?>">

			<p class="registration__text">Введіть ваш пароль</p>
			<input type="password" name="password" placeholder="Пароль" class="registration__input" value="<?php echo $password; ?>">

			<p class="registration__text">Введіть ваш пароль ще раз</p>
			<input type="password" name="password_check" placeholder="Перевірка паролю" class="registration__input" value="<?php echo $password_check; ?>">

			<br><input type="submit" name="do_register" class="btn reg" value="Продовжити">

		</form>
	</div><!-- container -->
</div><!-- registration -->

<?php 
include 'footer.php';
?>

</body>
</html>