<?php
	require('includes/config.inc.php');
	require(MYSQL);

	$page_title = 'Корзина';
	include('includes/header.html');
?>
<script src="node_modules\mustache\mustache.min.js"></script>
<main class="cart-page-container">
	<h1 class="cart-page-main-title">Корзина</h1>
	<div class="cart-page-inner-container">
		<h2 class="cart-page-title">Выбраные конструкторы</h2>
		<div class="cart-page">
			<div class="cart-page-row photo">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Наименование</div>
				</div>
			</div>
			<div class="cart-page-column quantity">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Количество (шт.)</div>
				</div>
			</div>
			<div class="cart-page-column price">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Цена за единицу</div>
				</div>
			</div>
			<div class="cart-page-column total">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Общая сумма</div>
				</div>
			</div>
		</div>
		<button type="submit" class="cart-submit-btn">Оформить заказ</button>
	</div>
	<?php
		echo '<button class="return-to-top-btn" title="Вернуться наверх">
					<span class="up-symbol">
						<i class="fas fa-angle-double-up"></i>
					</span>
				</button></div>';
		?>
	<script src="js/return-top-btn.js"></script>
</main>
<script src="js/fill-in-cart.js"></script>
<?php
	include('includes/footer.html');
?>