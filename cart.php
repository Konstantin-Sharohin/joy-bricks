<?php
	require('includes/config.inc.php');
	require(MYSQL);

	$page_title = 'Корзина';
	include('includes/header.html');
?>
<main class="cart-page-container">
	<div class="cart-page-inner-container">
		<h2 class="cart-page-title">Выбраные конструкторы</h2>
		<div class="cart-page">
			<div class="cart-page-column">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Название</div>
				</div>
				<div class="cart-page-item-container">
					<div class="cart-page-item"><img src="./images/story-images/481ab9.png" alt="Ваш заказ"></div>
				</div>
			</div>
			<div class="cart-page-column">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Количество (шт.)</div>
				</div>
				<div class="cart-page-item-container">
					<div class="cart-page-item">1</div>
				</div>
			</div>
			<div class="cart-page-column">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Цена за единицу</div>
				</div>
				<div class="cart-page-item-container">
					<div class="cart-page-item">100 грн</div>
				</div>
			</div>
			<div class="cart-page-column">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Итого</div>
				</div>
				<div class="cart-page-item-container">
					<div class="cart-page-item">100 грн</div>
				</div>
			</div>
		</div>
		<button type="submit" class="cart-submit-btn">Оформить заказ</button>
	</div>
</main>
<?php
	include('includes/footer.html');
?>