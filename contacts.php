<?php
	require('includes/config.inc.php');

	$page_title = 'Контакты';
	include('includes/header.html');
?>
<main class="contacts-container">
		<h2>Наши контакты</h2>
		<div class="contacts-inner-container">
			<div class="map">
				<img src="images/map.jpg" alt="Расположение joy-bricks" class="map">
			</div>
			<div class="contacts-text-container">
				<p>Украина, Закарпатская область, г.&nbsp;Ужгород</p>
				<address class="address">
					<p><i class="fas fa-phone"></i> <span class="sales-department-phone"><a href="tel:+380661174263" rel="nofollow">+38(066)117-42-63</a></span></p>
					(Пн-Пт: 10:00-18:00)
					<p><i class="far fa-envelope"></i> <span class="sales-department-email"><a href="mailto:info@joy-bricks.co.ua">info@joy-bricks.co.ua</a></span></p>
				</address>
			</div>
		</div>
</main>
<?php
	include('includes/footer.html');
?>