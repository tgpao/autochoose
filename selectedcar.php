<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<title>Авто</title>
</head>
<body>

<?php 
include 'header.php';
$announcement_id = $_POST[selectedcar];
$select_announcement = mysqli_query($connection, "SELECT * FROM announcement 
		INNER JOIN brand ON announcement.brand_id = brand.id_brand
		INNER JOIN model ON announcement.model_id = model.id_model
		INNER JOIN body ON announcement.body_id = body.id_body
		INNER JOIN fuel ON announcement.fuel_id = fuel.id_fuel
		INNER JOIN drive_type ON announcement.drive_type_id = drive_type.id_drive_type
		INNER JOIN gearbox ON announcement.gearbox_id = gearbox.id_gearbox
		INNER JOIN users ON announcement.users_id = users.id_users 
		WHERE id_announcement = '$announcement_id'");
$select_img = mysqli_query($connection, "SELECT * FROM uploaded_img WHERE announcement_id = '$announcement_id'");
$announcement_assoced = mysqli_fetch_assoc($select_announcement);
$img = mysqli_fetch_assoc($select_img);
?>

<div class="selected">
	<div class="container">
		<div class="selected__inner">

			<div class="selected__item">

				<div class="item__left">
					<div class="selected__photos">
					<img class="selected__img" src="<?php echo $img[dir]; ?>">
					</div>
				</div>

				<div class="item__right">
					<div class="selected__title"><?php echo $announcement_assoced[brand] .' '. $announcement_assoced[model] .' '. $announcement_assoced[year]?></div>
				</div>
				
			</div><!-- selected__item -->

		</div><!-- selected__inner -->
	</div><!-- container -->
</div><!-- selected -->

<?php 
include 'footer.php';
?>

</body>
</html>