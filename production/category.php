<?php
	require 'includes/mysql.inc.php';
	require 'includes/header.html';
?>

<main class="main-container">
	<aside class="categories">
	<div class="categories-container">
	<h3 class="categories-title">Категории</h3>
		<ul class="list">
			<?php
			$query_all_categories = 'SELECT id, category FROM categories ORDER BY category';
			$result_all_categories = mysqli_query($dbConnect, $query_all_categories);

			if (!$result_all_categories) {
				die('Invalid query: ' . mysqli_connect_error());
			};

			while (list($id, $category) = mysqli_fetch_array($result_all_categories, MYSQLI_NUM)) {
				echo '<li><a href="category.php?id=' . $id . '" class="list" title="' . $category . '">' . $category . '</a></li>';
			};
			?>
		</ul>
	</div>
	</aside>
	<section class="intro">
		<?php
			if (filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
				$cat_id = $_GET['id'];
				$query_some_products = 'SELECT id, title, category, photo, price, code FROM products WHERE category_id = ' . $cat_id . ' ORDER BY id';
				$result_some_products = mysqli_query($dbConnect, $query_some_products);
			};

			if (!$result_some_products) {
				die('Invalid query: ' . mysqli_connect_error());
			};

			echo '<div class="catalog-container">';

			while (list($id, $title, $category, $photo, $price, $code) = mysqli_fetch_array($result_some_products, MYSQLI_NUM)) {
				echo '<div class="catalog-item">
								<a href="catalog-item.php?id=' . $id . '" class="catalog-item-link" title="' . $title . '">
									<div class="catalog-item-image">
										<img src="images/' . $photo . '.jpg" alt="catalog item" class="item-image">
									</div>
									<div class="catalog-item-name">
										<span><h4>' . $title . '</h4></span>
									</div>
									<div class="catalog-item-price">
										<span class="item-price">' . $price . ' грн</span>
									</div>
									<div class="catalog-item-code">
										<span class="item-code">Артикул ' . $code . '</span>
									</div>
								</a>
								<div class="add-cart-icon" title="Добавить в корзину">
									<span class="add-cart-symbol">
										<i class="fas fa-cart-arrow-down" data-quantity=0></i>
									</span>
								</div>
						</div>';
			}
			?>
			</div>

			<button class="return-to-top-btn" title="Вернуться наверх">
				<span class="up-symbol">
					<i class="fas fa-angle-double-up"></i>
				</span>
			</button>

			<div class="price-filters">
				<div class="price-filters-container">
					<button class="price-filter" title="Фильтр по цене">
						<span class="filter-symbol">
							<i class="fas fa-filter"></i>
						</span>
					</button>
					<div class="price-range">
						<span class="price-label">До&nbsp;</span>
						<input type="range" class="price-filter-slider" name="price-range" min="250" max="1300" step="50" value="250">
						<output class="price-filter-output"></output>
						<span class="price-label">&nbsp;грн</span>
					</div>
				</div>
			</div>
			<div class="price-sort">
				<div class="price-sort-container">
					<button class="price-asc" title="Сортировка по возрастанию">
						<span class="filter-symbol-asc">
							<i class="fas fa-sort-amount-up"></i>
						</span>
					</button>
					<button class="price-dsc" title="Сортировка по убыванию">
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