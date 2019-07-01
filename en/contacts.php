<?php
$page_title = 'Contacts';
include('includes/header.html');
?>
<main class="contacts-container">
	<h2>Our contacts</h2>
	<div class="contacts-inner-container">
		<div class="map">
			<img src="../assets/images/dest/map.jpg" alt="Joy-bricks location" class="map">
		</div>
		<div class="contacts-text-container">
			<p>Ukraine, Transcarpathian&nbsp;region,&nbsp;Uzhgorod</p>
			<address class="address">
				<p><i class="fas fa-phone"></i> <span class="sales-department-phone"><a href="tel:+380661174263"
							rel="nofollow">+38(066)117-42-63</a></span></p>
				(Mon-Fri: 10:00-18:00)
				<p><i class="far fa-envelope"></i> <span class="sales-department-email"><a
							href="mailto:info@joy-bricks.co.ua">info@joy-bricks.co.ua</a></span></p>
			</address>
		</div>
		<form name="message" class="contacts-reply">
			<p><b>Leave your message:</b></p>
			<p><input type="text" name="name" placeholder="Your name"></p>
			<p><input type="email" name="email" placeholder="Your email" required></p>
			<p><input type="tel" name="tel" placeholder="Your phone number"></p>
			<p><textarea name="reply-text" placeholder="Your message" rows="5" cols="25" required></textarea></p>
			<input name="no_spam1" type="text" style="display:none">
			<p><div class="numbers"><img src="../assets/images/dest/check.jpg" width="150px" height="50px"></div></p>
			<p><input name="no_spam2" id="check" type="text" placeholder="Enter the result" required></p>
			<p>
				<button type="submit" name="send" class="send-reply" title="Send">
					<span class="send-span">
						<i class="far fa-paper-plane"></i>
					</span>
					<span class="send-btn-title">
						Send
					</span>
				</button>
			</p>
			<p class="message-output"></p>
		</form>
	</div>

	<button class="return-to-top-btn" title="Back to top">
		<span class="up-symbol">
			<i class="fas fa-angle-double-up"></i>
		</span>
	</button>

	<script src="js/dest/ugly/return-top-btn.js"></script>
	<script src="js/dest/ugly/message-sender.js"></script>
	<script src="js/dest/ugly/header-cart-initialisation.js"></script>
</main>
<?php
	include('includes/footer.html');
?>