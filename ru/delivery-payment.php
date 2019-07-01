<?php
	$page_title = 'Доставка и оплата';
	include('includes/header.html');
?>
<main class="delivery-payment-container">
	<div class="payment-container">
		<h2 class="payment-title">Способы оплаты</h2>
		<div class="payment-cash">
			<h4 class="cash-title">Наличный расчет <i class="fas fa-money-bill-wave"></i></h4>
			<ul class="payment">
				<li>c курьером после доставки</li>
				<li>при получении товара в отделении курьерской службы (наложенный платеж)</li>
			</ul>
		</div>
		<div class="payment-non-cash">
			<h4 class="non-cash-title">Безналичный расчет <i class="far fa-credit-card"></i></h4>
			<ul class="payment">
				<li>через <span class="privat24"></span></li>
			</ul>
		</div>
		<div class="payment-note">
			<p>Заказанный товар, оплачиваемый по безналичному расчету, находится в резерве 2 дня.<br>Отправка осуществляется после
				поступления оплаты на счет интернет-магазина Joy Bricks.<br>В случае непоступления платежа, заказ отменяется
				автоматически.</p>
		</div>
	</div>

	<div class="order-processing">
		<h2 class="order-processing-title">После оформления заказа</h2>
		<ol>
			<li>На указанный Вами адрес электронной почты будет отправлено сообщение-подтверждение о
				приеме заявки в обработку.</li><br>
			<li>В течение нескольких часов после оформления заказа оператор интернет-магазина подтвердит наличие товара и
				уточнит способ доставки и оплаты.</li><br>
			<li>Для заказов с доставкой по Украине будет отправлено SMS-уведомление с номером накладной.</li>
		</ol>
	</div>

	<div class="delivery-container">
		<h2 class="delivery-title">Способы доставки</h2>
		<div class="delivery-types">
			<h4 class="cash-title">Куръерская доставка</h4>
			<ul class="payment">
				<li>курьер в г. Ужгород (бесплатно)</li>
				<li>по Украине: <div class="icons-nova-pochta"></div><div class="icons-ukr-pochta"></div></li>
			</ul>
		</div>
	</div>
	<button class="return-to-top-btn" title="Вернуться наверх">
		<span class="up-symbol">
			<i class="fas fa-angle-double-up"></i>
		</span>
	</button>
	<script src="js/dest/ugly/return-top-btn.js"></script>
	<script src="js/dest/ugly/header-cart-initialisation.js"></script>
</main>
<?php
	include('includes/footer.html');
?>