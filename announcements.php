<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<title>
	<?php
	if(isset($_POST[brand])){
		echo $_POST[brand].' '.$_POST[model];;
	} else {
		echo 'Авто';
	}
	?>		
	</title>
</head>
<body>
<?php
include 'header.php';
$select_announcement = "SELECT * FROM announcement 
		INNER JOIN brand ON announcement.brand_id = brand.id_brand
		INNER JOIN model ON announcement.model_id = model.id_model
		INNER JOIN body ON announcement.body_id = body.id_body
		INNER JOIN fuel ON announcement.fuel_id = fuel.id_fuel
		INNER JOIN drive_type ON announcement.drive_type_id = drive_type.id_drive_type
		INNER JOIN gearbox ON announcement.gearbox_id = gearbox.id_gearbox
		INNER JOIN users ON announcement.users_id = users.id_users";
$body_queried = mysqli_query($connection, "SELECT * FROM body");
$fuel_queried = mysqli_query($connection, "SELECT * FROM fuel");
$drive_type_queried = mysqli_query($connection, "SELECT * FROM drive_type");
$gearbox_queried = mysqli_query($connection, "SELECT * FROM gearbox");

if (isset($_POST[brand]) && empty($_POST[model])) {
	$select_announcement_query = mysqli_query($connection, "$select_announcement WHERE brand = '$_POST[brand]'");
}

if (isset($_POST[model])) {
	$select_announcement_query = mysqli_query($connection, "$select_announcement WHERE model = '$_POST[model]'");	
}

if (empty($_POST[brand])) {
	$select_announcement_query = mysqli_query($connection, $select_announcement);	
}
?>

<div class="announcement">
	<div class="container">
		<div class="announcement__inner">
			<div class="announcement__cars">

				<?php
				while ($select_announcement_assoced = mysqli_fetch_assoc($select_announcement_query)) {

					$select_img_query = mysqli_query($connection, "SELECT * FROM uploaded_img WHERE announcement_id = '$select_announcement_assoced[id_announcement]'");
					$select_img_assoced = mysqli_fetch_assoc($select_img_query);
					 ?>
					
					<div class="announcement__item">
						<div class="announcement__photo"><img class="photo__item" src="<?php echo $select_img_assoced[dir] ?>"></div>

						<div class="announcement__info">

							<form method="POST" action="selectedcar.php">
								<button class="announcement__btn" name="selectedcar" value="<?php echo $select_announcement_assoced[id_announcement]; ?>">
									<div class="announcement__title"><?php echo $select_announcement_assoced[brand] . ' ' . $select_announcement_assoced[model] . ' ' . $select_announcement_assoced[year]; ?>			
									</div>
								</button>
							</form>


							<div class="announcement__price"><?php echo $select_announcement_assoced[price]?> $</div>

							<div class="announcement__data">						
								<div class="data__left">
									<div class="data__text"><?php echo $select_announcement_assoced[mileage]?> км</div>
									<div class="data__text"><?php echo $select_announcement_assoced[fuel]?></div>
								</div>

								<div class="data__right">
									<div class="data__text"><?php echo $select_announcement_assoced[region]?></div>
									<div class="data__text"><?php echo $select_announcement_assoced[gearbox]?></div>
								</div>
							</div>

							<div class="announcement__description"><?php echo $select_announcement_assoced[description]?></div>
						</div>
					</div>

				<?php } ?>
			</div><!-- announcement__cars -->

			<div class="announcement__filter">
			<p class="announcement__filter__title">Фільтр авто</p>

				<select id="body" name ="body" class="filter__input">
					<option disabled selected>Кузов</option>
					<?php
					while ($body = mysqli_fetch_assoc($body_queried)) {						
						echo '<option value="'.$body[id_body].'">' . $body[body] . '</option>';
					}
					?>
				</select>

				<select id="fuel" name ="fuel" class="filter__input">
					<option disabled selected>Тип палива</option>
					<?php
					while ($fuel = mysqli_fetch_assoc($fuel_queried)) {						
						echo '<option value="'.$fuel[id_fuel].'">' . $fuel[fuel] . '</option>';
					}
					?>
				</select>

				<select id="drive_type" name ="drive_type" class="filter__input">
					<option disabled selected>Привід</option>
					<?php
					while ($drive_type = mysqli_fetch_assoc($drive_type_queried)) {						
						echo '<option value="'.$drive_type[id_drive_type].'">' . $drive_type[drive_type] . '</option>';
					}
					?>
				</select>

				<select id="gearbox" name ="gearbox" class="filter__input">
					<option disabled selected>КПП</option>
					<?php
					while ($gearbox = mysqli_fetch_assoc($gearbox_queried)) {						
						echo '<option value="'.$gearbox[id_gearbox].'">' . $gearbox[gearbox] . '</option>';
					}
					?>
				</select>

				<input type="text" name="year" class="filter__input input__not__select" placeholder="Рік">

				<input type="text" name="regio" class="filter__input input__not__select" placeholder="Регіон">
					

			</div><!-- announcement__filter -->

		</div><!-- announcement__inner -->
	</div><!-- container -->
</div><!-- announcement -->

<?php 
include 'footer.php';
?>

</body>
</html>

