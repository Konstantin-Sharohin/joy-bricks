<?php
	$page_title = 'Delivery and payment';
	include('includes/header.html');
?>
<main class="delivery-payment-container">
	<div class="payment-container">
		<h2 class="payment-title">Payment methods</h2>
		<div class="payment-cash">
			<h4 class="cash-title">Cash payment<i class="fas fa-money-bill-wave"></i></h4>
			<ul class="payment">
				<li>to a courier after delivery</li>
				<li>upon receipt of goods at the courier service (cash on delivery)</li>
			</ul>
		</div>
		<div class="payment-non-cash">
			<h4 class="non-cash-title">Cashless payment <i class="far fa-credit-card"></i></h4>
			<ul class="payment">
				<li>through <span class="privat24"></span></li>
			</ul>
		</div>
		<div class="payment-note">
			<p>The ordered goods, paid by bank transfer, are in reserve for 2 days. <br> Sending is carried out after receipt of payment to the account of the Joy Bricks online store. <br> In case of non-receipt of payment, the order is automatically canceled.</p>
		</div>
	</div>

	<div class="order-processing">
		<h2 class="order-processing-title">After placing the order</h2>
		<ol>
			<li>A confirmation message will be sent to the e-mail address you have indicated on the acceptance of the application for processing.</li><br>
			<li>Within several hours after placing the order, the operator of the online store will confirm the availability of the goods and specify the method of delivery and payment.</li><br>
			<li>For orders with delivery in Ukraine, an SMS notification with the invoice number will be sent.</li>
		</ol>
	</div>

	<div class="delivery-container">
		<h2 class="delivery-title">Delivery methods</h2>
		<div class="delivery-types">
			<h4 class="cash-title">Express delivery</h4>
			<ul class="payment">
				<li>courier in Uzhgorod (free)</li>
				<li>in Ukraine: <div class="icons-nova-pochta"></div><div class="icons-ukr-pochta"></div></li>
			</ul>
		</div>
	</div>
	<button class="return-to-top-btn" title="Back to top">
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