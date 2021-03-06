<?php
	require 'includes/mysql.inc.php';
	$page_title = '';
	require 'includes/header.html';
?>
<main class="main-container">
	<aside class="categories">
		<div class="categories-container">
			<h3 class="categories-title">Categories</h3>
			<ul class="list">
				<?php
			$query_all_categories = 'SELECT id, category FROM en_categories ORDER BY category';
			$result_all_categories = mysqli_query($dbConnect, $query_all_categories);

			if (!$result_all_categories) {
				die('Invalid query: ' . mysqli_connect_error());
			};

			while (list($id, $category) = mysqli_fetch_array($result_all_categories, MYSQLI_NUM)) {
				echo '<li><a href="category.php?id=' . $id . '" class="list" title="' . $category . '">' . htmlspecialchars($category) . '</a></li>';
			}
			?>
			</ul>
		</div>
	</aside>
	<section class="intro">
		<?php
			if (filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
				$prod_id = $_GET['id'];

				$query_one_product = 'SELECT title, category, `description`, photo, price, code FROM en_products WHERE id = ' . $prod_id . '';
				$result_one_product = mysqli_query($dbConnect, $query_one_product);

			if (!$result_one_product) {
				die('Invalid query: ' . mysqli_connect_error());
			};

			echo '<div class="catalog-container">';

			while (list($title, $category, $description, $photo, $price, $code) = mysqli_fetch_array($result_one_product, MYSQLI_NUM)) {
			echo '<div class="item-container">
						<h2 class="item-title">' . $title . '</h2>
						<div class="item-inner-container">
							<div class="catalog-single-item">
								<a class="catalog-item-link" title="' . $title . '">
									<div class="catalog-item-image">
										<img src="../assets/images/dest/' . $photo . '.jpg" alt="catalog item" class="item-image">
									</div>
									<div class="catalog-item-price">
										<span class="item-price">' . $price . ' uah</span>
									</div>
									<div class="catalog-item-code">
										<span class="item-code">Vendor code ' . $code . '</span>
									</div>
								</a>
								<div class="add-cart-icon" title="Add to cart">
									<span class="add-cart-symbol">
										<i class="fas fa-cart-arrow-down" data-quantity=0></i>
									</span>
								</div>
							</div>
							<div class="item-description">
								<p>' . $description . '</p>
							</div>
						</div>
				</div>';
			}
		}
			?>
			</div>

			<button class="return-to-top-btn" title="Back to top">
				<span class="up-symbol">
					<i class="fas fa-angle-double-up"></i>
				</span>
			</button>

	</section>
	<script src="js/dest/ugly/return-top-btn.js"></script>
	<script src="js/dest/ugly/add-to-cart.js"></script>
	<script src="js/dest/ugly/reset-local-storage.js"></script>
</main>
<?php
	include 'includes/footer.html';
?>