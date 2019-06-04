<?php
	require 'includes/mysql.inc.php';

	//function price_filter($dbConnect) {
		$price_range = isset($_GET['price-range']) ?  htmlspecialchars($_GET['price-range']) : null;
		$price_sort = isset($_GET['price-sort']) ?  htmlspecialchars($_GET['price-sort']) : null;

		function query($price_range, $price_sort, $dbConnect) {
			//If the price range slider has been used
			if ($price_range != null && $price_sort == null) {
            	if (filter_var($price_range, FILTER_VALIDATE_INT)) {
            		$query_some_products = 'SELECT id, title, category, photo, price, code FROM products WHERE price <=' . $price_range . ' ORDER BY id';
					$result_some_products = mysqli_query($dbConnect, $query_some_products);
				}
			}
			//If the price sorting button has been pushed
			elseif ($price_sort != null && $price_range != null) {
					if ($price_sort == "1") {
						$query_some_products = 'SELECT id, title, category, photo, price, code FROM products WHERE price <=' . $price_range . ' ORDER BY price ASC';
						$result_some_products = mysqli_query($dbConnect, $query_some_products);
					}
					elseif ($price_sort == "0") {
						$query_some_products = 'SELECT id, title, category, photo, price, code FROM products WHERE price <=' . $price_range . ' ORDER BY price DESC';
						$result_some_products = mysqli_query($dbConnect, $query_some_products);
					}
			}

			return $result_some_products;
		};

		$result_some_products = query($price_range, $price_sort, $dbConnect);

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
									<i class="fas fa-cart-arrow-down" data-quantity=0></i>
								</span>
							</div>
						</div>';
			}
			echo '</div>';

			echo '<button class="return-to-top-btn" title="Вернуться наверх">
					<span class="up-symbol">
						<i class="fas fa-angle-double-up"></i>
					</span>
				</button>';

				echo '<div class="price-filters">
							<div class="price-filters-container">
								<button class="price-filter" title="Фильтр по цене">
									<span class="filter-symbol">
										<i class="fas fa-filter"></i>
									</span>
								</button>
								<div class="price-range">
									<span class="price-label">До&nbsp;</span>
									<input type="range" class="price-filter-slider" name="price-range" min="250" max="1300" step="50" value="'. $price_range . '">
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
					</div>';