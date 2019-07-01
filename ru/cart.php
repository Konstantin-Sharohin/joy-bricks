<?php
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
								<div class="cell"></div>
								<div class="cell"></div>
						</div>
						<div class="row total-row">
								<div class="cell"></div>
								<div class="cell"></div>
						</div>
						<div class="row order">
								<div class="cell"></div>
								<div class="cell"></div>
								<div class="cell">
									<a href="order-form.php">
										<button class="cart-submit-btn">Оформить заказ</button>
									</a>
								</div>
						</div>
					</div>
			</div>
		</div>
	</div>

	<button class="return-to-top-btn" title="Вернуться наверх">
		<span class="up-symbol">
			<i class="fas fa-angle-double-up"></i>
		</span>
	</button>

</main>
<script src="js/dest/ugly/return-top-btn.js"></script>
<script src="js/dest/ugly/create-cart-page.js"></script>
<script src="js/dest/ugly/cart-page-functionality.js"></script>
<?php
	include('includes/footer.html');
?>