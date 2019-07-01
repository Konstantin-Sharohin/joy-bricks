<?php
	require 'includes/mysql.inc.php';
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

				if (!$query_all_categories) {
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
			$query_all_products = 'SELECT id, title, category, photo, price, code FROM en_products ORDER BY id';
			$result_all_products = mysqli_query($dbConnect, $query_all_products);

			if (!$result_all_products) {
				die('Invalid query: ' . mysqli_connect_error());
			};
			echo '<div class="catalog-container">';

			while (list($id, $title, $category, $photo, $price, $code) = mysqli_fetch_array($result_all_products, MYSQLI_NUM)) {
				echo '<div class="catalog-item">
							<a href="catalog-item.php?id=' . $id . '" class="catalog-item-link" title="' . $title . '">
								<div class="catalog-item-image">
									<img src="../assets/images/dest/' . $photo . '.jpg" alt="catalog item" class="item-image">
								</div>
								<div class="catalog-item-name">
									<span class="catalog-item-name title"><h4>' . $title . '</h4></span>
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
						</div>';
			}
			?>
			</div>

			<button class="return-to-top-btn" title="Back to top">
				<span class="up-symbol">
					<i class="fas fa-angle-double-up"></i>
				</span>
			</button>

			<div class="price-filters">
					<div class="price-filters-container">
						<button class="price-filter" title="Filter by price">
							<span class="filter-symbol">
								<i class="fas fa-filter"></i>
							</span>
						</button>
						<div class="price-range">
							<span class="price-label">Till&nbsp;</span>
							<input type="range" class="price-filter-slider" name="price-range" min="250" max="1300" step="50" value="250">
							<output class="price-filter-output"></output>
							<span class="price-label">&nbsp;uah</span>
						</div>
					</div>
			</div>
			<div class="price-sort">
					<div class="price-sort-container">
						<button class="price-asc" title="Sort Ascending">
							<span class="filter-symbol-asc">
								<i class="fas fa-sort-amount-up"></i>
							</span>
						</button>
						<button class="price-dsc" title="Sort descending">
							<span class="filter-symbol-dsc">
								<i class="fas fa-sort-amount-down"></i>
							</span>
						</button>
					</div>
			</div>
	</section>
	<script src="js/dest/ugly/return-top-btn.js"></script>
	<script src="js/dest/ugly/add-to-cart.js"></script>
	<script src="js/dest/ugly/price-filter.js"></script>
	<script src="js/dest/ugly/price-sorting.js"></script>
</main>
<?php
	include 'includes/footer.html';
?>