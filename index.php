<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>AutoChoose</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>	
</head>
<body>

<?php
include 'header.php';
$brand_queried = mysqli_query($connection, "SELECT * FROM `brand` ORDER BY `brand`");
$recent_queried = mysqli_query($connection, "SELECT * FROM `announcement` 
				INNER JOIN brand ON announcement.brand_id = brand.id_brand
				INNER JOIN model ON announcement.model_id = model.id_model
				ORDER by id_announcement DESC LIMIT 4");
?>

<div class="search">
	<div class="container">
		<div class="search__inner">
			
			<form method="POST" action="announcements.php" class="search__form">
				<div class="search__input">
					<div class="search__main">
						<div class="search__model">
							<select id="brand" name ="brand" class="input__field">
								<option disabled selected>Марка</option>
								<?php
								while ($brand = mysqli_fetch_assoc($brand_queried)) {						
									echo '<option value="'.$brand[brand].'">' . $brand[brand] . '</option>';
								}
								?>
							</select>
						</div>
						
						<div class="search__model">
							<select id="model" name="model" class="input__field">
								<option disabled selected>Модель</option>
							</select>
						</div>
					</div>

					<div class="search__secondary">
						<div class="search__region">
							<div class="search__text">Регіон</div>						
							<div>
								<input class="input__field" type="text" name="region" placeholder="Регіон">
							</div>
						</div>
						
						<div class="search__region">
							<div class="search__text">Ціна, $</div>
							<div class="price__fields">
								<input class="input__field price" type="text" name="priceFrom" placeholder="від">
								<input class="input__field price" type="text" name="priceTo" placeholder="до">
							</div>
						</div>
					</div>

				</div><!-- search__input -->

				<div class="search__send">
					<input class="submit__btn" type="submit" name="send" value="Пошук">
				</div><!-- search__send -->
			</form>				

		</div><!-- search__inner -->		
	</div><!-- container -->
</div><!-- search -->

<div class="recent">
	<div class="container">
		<div class="recent__new">Нові оголошення!</div>
		<div class="recent__inner">

			<?php
				while($recent_assoced = mysqli_fetch_assoc($recent_queried)){ 

					$select_img_query = mysqli_query($connection, "SELECT * FROM uploaded_img WHERE announcement_id = '$recent_assoced[id_announcement]'");
					$select_img_assoced = mysqli_fetch_assoc($select_img_query);
					?>
			<div class="recent__item">

				<div class="recent__img"><img class="img__inner" src="<?php echo $select_img_assoced[dir]; ?>"></div>

				<form method="POST" action="selectedcar.php">
					<button class="announcement__btn" name="selectedcar" value="<?php echo $recent_assoced[id_announcement]; ?>">
						<div class="recent__title"><?php echo $recent_assoced[brand] .' '. $recent_assoced[model] . ' ' . $recent_assoced[year]; ?>			
						</div>
					</button>
				</form>

				<div class="recent__text">
					<div class="recent__price"><?php echo $recent_assoced[price]; ?> $</div>
					<div class="recent__mileage"> <?php echo $recent_assoced[mileage]; ?> км</div>	
				</div>					
					
			</div><!-- recent__item -->

			<?php } ?>

		</div><!-- recent__inner -->
	</div><!-- container -->
</div><!-- recent -->

<?php 
include 'footer.php';
?>

<script src="ajax.js"></script>
</body>
</html>