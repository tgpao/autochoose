<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<title>Продати авто</title>
</head>
<body>
<?php
include 'header.php';
?>

<div class="container">
	<div class="sellcar">
		<div class="sellcar__title">Додавання оголошення</div>
		<div>Вкажіть характеристики вашого авто</div>
		<form class="sellcar__form">

			<div class="sellcar__info">
				<div class="sellcar__info__text">Марка</div>
				<input type="text" name="brand" placeholder="Марка" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">Модель</div>
				<input type="text" name="brand" placeholder="Модель" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">Тип кузову</div>
				<input type="text" name="brand" placeholder="Тип кузову" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">Тип палива</div>
				<input type="text" name="brand" placeholder="Тип палива" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">Привід</div>
				<input type="text" name="brand" placeholder="Привід" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">КПП</div>
				<input type="text" name="brand" placeholder="КПП" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">Регіон</div>
				<input type="text" name="brand" placeholder="Регіон" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">Рік випуску</div>
				<input type="text" name="brand" placeholder="Рік випуску" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">Ціна, $</div>
				<input type="text" name="brand" placeholder="Ціна" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">Пробіг, км</div>
				<input type="text" name="brand" placeholder="Пробіг" class="sellcar__info__input">
			</div>

			<div class="sellcar__info">
				<div class="sellcar__info__text">Опис</div>
				<input type="text" name="brand" placeholder="Опис" class="sellcar__info__input">
			</div>

			<div class="sellcar__info__submit">
				<input type="submit" name="do_sellcar" value="Розмістити оголошення" class="btn">
			</div>

		</form>
	</div><!-- sellcar -->
</div><!-- container -->

<?php
include 'footer.php';
?>

</body>
</html>