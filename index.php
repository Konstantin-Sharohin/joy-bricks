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
		<h3 class="categories-title">Категории</h3>
		<ul class="list">
			<?php
			$query = 'SELECT * FROM categories ORDER BY category';
			$result = mysqli_query($dbConnect, $query);
			if (!$result) {
				die('Invalid query: ' . mysqli_error());
			};
			while (list($id, $category) = mysqli_fetch_array($result, MYSQLI_NUM)) {
				echo "<li><a href=\"category.php?id=\"$id\" class=\"list\" title=\"$category\">" . htmlspecialchars($category) . '</a></li>';
			}
			?>
		</ul>
	</aside>
	<section class="intro">

	</section>
</main>
<?php
	include 'includes/footer.html';
?>