<?php
	require('includes/config.inc.php');
	require(MYSQL);

	$page_title = 'Корзина';
	include('includes/header.html');
?>
<main class="cart-page-container">
	<h1 class="cart-page-main-title">Корзина</h1>
	<div class="cart-page-inner-container">
		<h2 class="cart-page-title">Выбраные конструкторы</h2>
		<div class="cart-page">
			<div class="cart-page-column">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Наименование</div>
				</div>
				<div class="cart-page-item-container" title="">
					<div class="cart-page-item"><img class="cart-page-item-img" src="" alt="Ваш заказ"></div>
					<div class="cart-page-item-description"></div>
					<div class="cart-page-item-code"></div>
				</div>
			</div>
			<div class="cart-page-column">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Количество (шт.)</div>
				</div>
				<div class="cart-page-item-container">
					<div class="cart-page-item-quantity">1</div>
				</div>
			</div>
			<div class="cart-page-column">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Цена за единицу</div>
				</div>
				<div class="cart-page-item-container">
					<div class="cart-page-item-price">100 грн</div>
				</div>
			</div>
			<div class="cart-page-column">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Общая сумма</div>
				</div>
				<div class="cart-page-item-container">
					<div class="cart-page-item-price-total">100 грн</div>
				</div>
			</div>
		</div>
		<button type="submit" class="cart-submit-btn">Оформить заказ</button>
		<?php
		echo '<button class="return-to-top-btn" title="Вернуться наверх">
					<span class="up-symbol">
						<i class="fas fa-angle-double-up"></i>
					</span>
				</button></div>';
		?>
	</div>
	<script src="js/return-top-btn.js"></script>
</main>
<script src="js/fill-in-cart.js"></script>
<?php
	include('includes/footer.html');
?>