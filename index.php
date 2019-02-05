<?php
require 'includes\config.inc.php';

/*$_SESSION['user_id'] = 1;
$_SESSION['user_admin'] = true;
$_SESSION['user_not_expired'] = true;
$_SESSION=array();*/

require MYSQL;

/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
include('includes\login.inc.php');
};*/

require 'includes\header.html';
?>

<main class="row">
	<aside class="categories">
		<h3 class="success">Категории</h3>
		<ul class="list">
			<?php
$query = 'SELECT * FROM categories ORDER BY category';
$result = mysqli_query($dbc, $query);
if (!$result) {
	die('Invalid query: ' . mysqli_error());
};
while (list($id, $category) = mysqli_fetch_array($result, MYSQLI_NUM)) {
echo "<li><a href=\"category.php?id= . $id . \" class=\"list\" title=\" . $category . \">" . htmlspecialchars($category) . '</a></li>';}
?>
			<a href="pdfs.php" class="list" title="PDF">Конструкторы</a>
		</ul>
	</aside>

	<?php
if (!isset($_SESSION['user_id'])) {
require('includes/login_form.inc.php');
}?>

	<section class="intro">
		<h1>Добро пожаловать</h1>
		<p class="lead">Добро пожаловать в магазин Joy Bricks! Здесь Вы найдете игровой конструктор на любой вкус.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent consectetur volutpat nunc, eget vulputate quam
			tristique sit amet. Donec suscipit mollis erat in egestas. Morbi id risus quam. Sed vitae erat eu tortor tempus
			consequat. Morbi quam massa, viverra sed ullamcorper sit amet, ultrices ullamcorper eros. Mauris ultricies rhoncus
			leo, ac vehicula sem condimentum vel. Morbi varius rutrum laoreet. Maecenas vitae turpis turpis. Class aptent
			taciti
			sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce leo turpis, faucibus et consequat
			eget, adipiscing ut turpis. Donec lacinia sodales nulla nec pellentesque. Fusce fringilla dictum purus in
			imperdiet.
			Vivamus at nulla diam, sagittis rutrum diam. Integer porta imperdiet euismod.
		</p>

		<h3>Lorem Ipsum</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent consectetur volutpat nunc, eget vulputate quam
			tristique sit amet. Donec suscipit mollis erat in egestas. Morbi id risus quam. Sed vitae erat eu tortor tempus
			consequat. Morbi quam massa, viverra sed ullamcorper sit amet, ultrices ullamcorper eros. Mauris ultricies rhoncus
			leo, ac vehicula sem condimentum vel. Morbi varius rutrum laoreet. Maecenas vitae turpis turpis. Class aptent
			taciti
			sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce leo turpis, faucibus et consequat
			eget, adipiscing ut turpis. Donec lacinia sodales nulla nec pellentesque. Fusce fringilla dictum purus in
			imperdiet.
			Vivamus at nulla diam, sagittis rutrum diam. Integer porta imperdiet euismod.
		</p>
	</section>
</main>
<?php
include 'includes/footer.html';
?>