<?php
include 'connection.php';
$brand_post = $_POST['brand'];
if (isset($brand_post)) {
	$model_queried = mysqli_query($connection, "SELECT model FROM model INNER JOIN brand ON model.brand_id = brand.id_brand WHERE brand = '$brand_post'");
	echo '<option selected disabled>Модель</option>';
	while($model = mysqli_fetch_assoc($model_queried)){		
		echo '<option value = "' . $model['model'] . '">' . $model['model'] . '</option>';
	}
}
?>