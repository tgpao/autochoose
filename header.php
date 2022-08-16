<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<header class="header">
	<div class="container">
		<?php 
		if (isset($_SESSION['logged_user'])) { ?>
				<div class="header__upper">
					<img src="img/usericon.png" class="user__icon">
					<div class="loggedin__name"> 						
						<?php echo ($_SESSION['logged_user']['name']); ?>			
					</div>

					<img src="img/logouticon.png" class="logout__icon">
					<a href="logout.php" class="logout__link">Вийти</a>					
				</div>
		<?php } else { ?>
			<div class="header__upper">
				<img src="img/usericon.png" class="user__icon">
				<a  class="login__link" href="login.php">Увійти в кабінет</a>
			</div>
		<?php } ?>
					

	</div><!-- container	 -->
</header><!-- header -->

<div class="bottom__border">
	<div class="container">
		<div class="header__lower">

			<div class="header__logo">
				<a href="index.php">
					<img class="logo" src="img/logo.jpg">
				</a>
			</div>
			
			<?php 
			if (isset($_SESSION['logged_user'])) { ?>
					<div class="sellcar">
						<a href="sellcar.php" class="btn">Продати авто</a>
					</div>	
			<?php } else { ?>
				
			<?php } ?>

			

		</div><!-- header__lower -->
	</div><!-- container -->
</div>

</body>
</html>