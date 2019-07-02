<?php
	$page_title = 'Order form';
	include('includes/header.html');
?>
<main class="order-submit-container">
	<h1 class="order-submit-main-title">Order form</h1>
	<div class="order-submit-inner-container">
		<h2>Enter your details</h2>
		<form class="order-form">
			<p><input type="text" name="name" placeholder="Your first name" required></p>
			<p><input type="text" name="surname" placeholder="Your last name" required></p>
			<p><input type="email" name="email" placeholder="Your email" required></p>
			<p><input type="tel" name="tel" placeholder="Your phone number"></p>
			<p><input type="text" name="address" placeholder="Address to send" required></p>
			<input name="no_spam1" type="text" style="display:none" value="" />
			<p>
				<label for="check">
					<div class="numbers"><img src="../assets/images/dest/check.jpg" width="150px" height="50px"></div>
				</label>
				<input name="no_spam2" id="check" type="text" placeholder="Enter the result" required />
			</p>
		</form>

		<div class="cart-summary-container">
			<h2>Your order</h2>
			<div class="cart-summary-header">
				<p class="cart-summary-header-title">Title</p>
				<p class="cart-summary-header-quantity">Quantity</p>
				<p class="cart-summary-header-price">Price</p>
			</div>
		</div>
	</div>

	<button class="return-to-top-btn" title="Back to top">
		<span class="up-symbol">
			<i class="fas fa-angle-double-up"></i>
		</span>
	</button>
</main>
<script src="js/dest/ugly/cart-summary.js"></script>
<script src="js/dest/ugly/order-sender.js"></script>
<script src="js/dest/ugly/reset-local-storage.js"></script>
<?php
	include('includes/footer.html');
?>