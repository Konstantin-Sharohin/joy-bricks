<?php
$page_title = 'Контакты';
include('includes/header.html');
?>
<main class="contacts-container">
	<h2>Наши контакты</h2>
	<div class="contacts-inner-container">
		<div class="map">
			<img src="../assets/images/dest/map.jpg" alt="Расположение joy-bricks" class="map">
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
		<form name="message" class="contacts-reply">
			<p><b>Оставьте свое сообщение:</b></p>
			<p><input type="text" name="name" placeholder="Ваше имя"></p>
			<p><input type="email" name="email" placeholder="Ваш email" required></p>
			<p><input type="tel" name="tel" placeholder="Ваш номер телефона"></p>
			<p><textarea name="reply-text" placeholder="Ваше сообщение" rows="5" cols="25" required></textarea></p>
			<input name="no_spam1" type="text" style="display:none">
			<p><div class="numbers"><img src="../assets/images/dest/check.jpg" width="150px" height="50px"></div></p>
			<p><input name="no_spam2" id="check" type="text" placeholder="Введите результат" required></p>
			<p>
				<button type="submit" name="send" class="send-reply" title="Отправить">
					<span class="send-span">
						<i class="far fa-paper-plane"></i>
					</span>
					<span class="send-btn-title">
						Отправить
					</span>
				</button>
			</p>
			<p class="message-output"></p>
		</form>
	</div>

	<button class="return-to-top-btn" title="Вернуться наверх">
		<span class="up-symbol">
			<i class="fas fa-angle-double-up"></i>
		</span>
	</button>

	<script src="js/dest/ugly/return-top-btn.js"></script>
	<script src="js/dest/ugly/message-sender.js"></script>
	<script src="js/dest/ugly/header-cart-initialisation.js"></script>
	<script src="js/dest/ugly/reset-local-storage.js"></script>
</main>
<?php
	include('includes/footer.html');
?>