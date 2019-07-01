<?php
	$page_title = 'Cart';
	include('includes/header.html');
?>
<main class="cart-page-container">
	<h1 class="cart-page-main-title">Cart</h1>
	<div class="cart-page-inner-container">
		<h2 class="cart-page-title">Selected tinker toys</h2>
		<div class="container-table">
			<div class="wrap-table">
					<div class="table">
						<div class="row header">
								<div class="cell">
									Title
								</div>
								<div class="cell">
									Quantity (pcs)
								</div>
								<div class="cell">
									Price (a piece)
								</div>
						</div>
						<div class="row header total-header">
								<div class="cell">
									Total
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
										<button class="cart-submit-btn">Checkout</button>
									</a>
								</div>
						</div>
					</div>
			</div>
		</div>
	</div>

	<button class="return-to-top-btn" title="Back to top">
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