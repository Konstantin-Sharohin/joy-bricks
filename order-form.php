<?php
	require('includes/config.inc.php');

	$page_title = 'Форма заказа';
	include('includes/header.html');
?>
<main class="order-submit-container">
	<h1 class="order-submit-main-title">Форма заказа</h1>
	<div class="order-submit-inner-container">
		<h2>Введите Ваши данные</h2>
		<form action="order-form.php" method="post" class="order-form">
			<p><input type="text" name="name" placeholder="Ваше имя" required></p>
			<p><input type="text" name="name" placeholder="Ваша фамилия" required></p>
			<p><input type="email" name="email" placeholder="Ваш email" required></p>
			<p><input type="tel" name="tel" placeholder="Ваш номер телефона"></p>
			<p><input type="text" name="tel" placeholder="Ваш адрес"></p>
			<input name="no_spam1" type="text" style="display:none" value="" />
			<p>
				<label for="check">
					<div class="numbers"><img src="./images/check.jpg" width="150px" height="50px"></div>
				</label>
				<input name="no_spam2" id="check" type="text" placeholder="Введите результат" required />
			</p>
		</form>

		<div class="cart-summary-container">
			<h2>Ваш заказ</h2>
			<div class="cart-summary-header">
				<p class="cart-summary-header-title">Наимен.</p>
				<p class="cart-summary-header-quantity">Кол-во</p>
				<p class="cart-summary-header-price">Цена</p>
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
<script src="js/cart-summary.js"></script>
<?php
	include('includes/footer.html');
?>