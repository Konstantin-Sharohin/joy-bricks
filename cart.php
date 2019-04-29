<?php
	require('includes/config.inc.php');

	$page_title = 'Корзина';
	include('includes/header.html');
?>
<main class="cart-page-container">
	<h1 class="cart-page-main-title">Корзина</h1>
	<div class="cart-page-inner-container">
		<h2 class="cart-page-title">Выбранные конструкторы</h2>
		<div class="container-table">
			<div class="wrap-table">
					<div class="table">

						<div class="row header">
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

						<div class="row header total-header">
							<div class="cell">
								Итого
							</div>
							<div class="cell">

							</div>
							<div class="cell">

							</div>
						</div>

						<div class="row total-row">
							<div class="cell">

							</div>
							<div class="cell">

							</div>
						</div>

						<div class="row send">
							<div class="cell">

							</div>
							<div class="cell">

							</div>
							<div class="cell">
								<input type="button" name="send_cart" class="cart-submit-btn" value="Оформить заказ">
							</div>
						</div>

					</div>
			</div>
		</div>
	</div>

	<?php
		echo '<button class="return-to-top-btn" title="Вернуться наверх">
					<span class="up-symbol">
						<i class="fas fa-angle-double-up"></i>
					</span>
				</button>';
		?>
</main>
<script src="js/return-top-btn.js"></script>
<script src="js/fill-in-cart-page.js"></script>
<script src="js/cart-item-quantity.js"></script>
<?php
	include('includes/footer.html');
?>