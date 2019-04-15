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
		<div class="container-table">
			<div class="table">
				<div class="table-row header">
					<div class="cell">
						Наименование
					</div>
					<div class="cell">
						Количество (шт.)
					</div>
					<div class="cell">
						Цена (за шт.)
					</div>
				</div>

				<div class="table-row">
					<div class="cell" data-title="Наименование">
						Ninja Saga
					</div>
					<div class="cell" data-title="Количество (шт.)">
						1
					</div>
					<div class="cell" data-title="Цена (за шт.)">
						200 грн
					</div>
				</div>

				<div class="table-row">
					<div class="cell" data-title="Наименование">
						Ninja 2
					</div>
					<div class="cell" data-title="Количество (шт.)">
						1
					</div>
					<div class="cell" data-title="Цена (за шт.)">
						300 грн
					</div>
				</div>
			</div>

			<div class="table total">
				<div class="table-row header total">
					<div class="cell">
						Итого
					</div>
				</div>

				<div class="table-row total">
					<div class="cell" data-title="Итого">
						500 грн
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- <div class="cart-page">
			<div class="cart-page-row-titles">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Наименование</div>
				</div>
				<div class="cart-page-description-container">
					<div class="cart-page-description">Количество (шт.)</div>
				</div>
			</div>

			<div class="cart-page-column quantity">

			</div>
			<div class="cart-page-column price">

			</div>
			<div class="cart-page-column total">
				<div class="cart-page-description-container">
					<div class="cart-page-description">Общая сумма</div>
				</div>
			</div>
		</div>
		<button type="submit" class="cart-submit-btn">Оформить заказ</button>
	</div> -->
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