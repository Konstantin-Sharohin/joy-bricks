<?php
	require 'includes/config.inc.php';

/*$_SESSION['user_id'] = 1;
$_SESSION['user_admin'] = true;
$_SESSION['user_not_expired'] = true;
$_SESSION=array();*/

	require MYSQL;

/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
include('includes/login.inc.php');
};*/

	require 'includes/header.html';
?>

<main class="row">
	<aside class="categories">
	<div class="categories-container">
	<h3 class="categories-title">Категории</h3>
		<ul class="list">
			<?php
			$query_all_categories = 'SELECT * FROM categories ORDER BY category';
			$result_all_categories = mysqli_query($dbConnect, $query_all_categories);

			$query_all_products = 'SELECT id, title, category, photo, price, code FROM products ORDER BY id';
			$result_all_products = mysqli_query($dbConnect, $query_all_products);

			if (!$query_all_categories) {
				die('Invalid query: ' . mysqli_error());
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
			if (!$result_all_products) {
				die('Invalid query: ' . mysqli_error());
			};
			echo '<div class="catalog-container">';
			while (list($id, $title, $category, $photo, $price, $code) = mysqli_fetch_array($result_all_products, MYSQLI_NUM)) {
				echo '<div class="catalog-item">
							<a href="catalog-item.php?id=' . $id . '" class="catalog-item-link" title="' . $title . '">
								<div class="catalog-item-image">
									<img src="images/' . $photo . '.jpg" alt="catalog item" class="item-image">
								</div>
								<div class="catalog-item-name">
									<span class="catalog-item-name title"><h4>' . $title . '</h4></span>
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
									<i class="fas fa-cart-arrow-down" data-action="0" data-action-code="' . $id . '"></i>
								</span>
							</div>
					</div>';
			}
			echo '<button class="return-to-top-btn" title="Вернуться наверх">
					<span class="up-symbol">
						<i class="fas fa-angle-double-up"></i>
					</span>
				</button></div>';

		?>
	</section>
	<script src="js/return-top-btn.js"></script>
	<script src="js/add-to-cart.js"></script>
</main>
<?php
	include 'includes/footer.html';
?>