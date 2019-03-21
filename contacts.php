<?php
if(isset($_POST['send'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['tel'];
	$message = $_POST['reply-text'];
	$no_spam1 = $_POST['no_spam1'];
	$no_spam2 = $_POST['no_spam2'];
	$subject = 'Форма отправки сообщений';
	$to = require CONTACT_EMAIL;
	$headers = "From: kos@localhost\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";

	if ((!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) && empty($no_spam1) && ($no_spam2 == 9) && ($email != " ") && ($subject != " ") && ($message != " ")) {
try {
mail($to, $subject, $message, $headers);
} catch (Exception $e) {
echo 'Ошибка при отправке почты: ',  $e->getMessage(), "\n";
}
echo 'Собщение отправлено';
} else {
	echo 'Ошибка заполнения';
}
};
	require('includes/config.inc.php');

	$page_title = 'Контакты';
	include('includes/header.html');
?>
<main class="contacts-container">
	<h2>Наши контакты</h2>
	<div class="contacts-inner-container">
		<div class="map">
			<img src="images/map.jpg" alt="Расположение joy-bricks" class="map">
		</div>
		<div class="contacts-text-container">
			<p>Украина, Закарпатская область, г.&nbsp;Ужгород</p>
			<address class="address">
				<p><i class="fas fa-phone"></i> <span class="sales-department-phone"><a href="tel:+380661174263"
							rel="nofollow">+38(066)117-42-63</a></span></p>
				(Пн-Пт: 10:00-18:00)
				<p><i class="far fa-envelope"></i> <span class="sales-department-email"><a
							href="mailto:info@joy-bricks.co.ua">info@joy-bricks.co.ua</a></span></p>
			</address>
		</div>
		<form action="contacts.php" method="post" class="contacts-reply">
				<p><b>Оставьте свое сообщение:</b></p>
				<p><input type="text" name="name" placeholder="Ваше имя"></p>
				<p><input type="email" name="email" placeholder="Ваш email" required></p>
				<p><input type="tel" name="tel" placeholder="Ваш номер телефона"></p>
				<p><textarea name="reply-text" placeholder="Ваше сообщение" required></textarea></p>
				<input name="no_spam1" type="text" style="display:none" value=""/>
				<p>
					<label for="check"><div class="numbers"><img src="./images/check.jpg" width="150px" height="50px"></div></label>
					<input name="no_spam2" id="check" type="text" placeholder="Введите результат" required/>
				</p>
				<p><button type="submit" name="send" class="send-reply">Отправить</button></p>
			</form>
	</div>
</main>
<?php
	include('includes/footer.html');
?>