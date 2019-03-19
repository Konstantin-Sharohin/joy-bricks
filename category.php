<?php
require('includes/config.inc.php');

require(MYSQL);

if (filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
	$cat_id = $_GET['id'];

	$query = 'SELECT category FROM categories WHERE id=' . $cat_id;
	$result = mysqli_query($dbConnect, $query);
	if (mysqli_num_rows($result) !== 1) {
		$page_title = 'Ошибка!';
		include('includes/header.html');
			echo '<div class="alert">Ошибка при попытке доступа к странице</div>';
		include('includes/footer.html');
		exit();
	};

	list($page_title) = mysqli_fetch_array($result, MYSQLI_NUM);
	include('includes/header.html');
	echo '<h1>' . htmlspecialchars($page_title) . '</h1>';


	$query = 'SELECT id, category, description FROM pages WHERE categories_id=' . $cat_id . ' ORDER BY date_created DESC';
	$result = mysqli_query($dbConnect, $query);
	if (mysqli_num_rows($result) > 0) { // доступные страницы

		// Выборка каждой страницы
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<div><h4><a href="page.php?id=' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</a></h4><p>' . htmlspecialchars($row['description']) . '</p></div>';
		}

	} else {
		echo '<p>Отсутствуют страницы контента, связанные с данной категорией</p>';
	}

} else { // отсутствует корректный код
	$page_title = 'Ошибка!';
	include('includes/header.html');
		echo '<div class="alert alert-danger">Ошибка при доступе к странице.</div>';
}

include('includes/footer.html');
?>