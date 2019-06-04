<?php
require('includes/mysql.inc.php');

	$first_name = htmlspecialchars($_POST['name']);
	$last_name = htmlspecialchars($_POST['surname']);
	$email = htmlspecialchars($_POST['email']);
	$phone = htmlspecialchars($_POST['tel']);
	$address_to_send = htmlspecialchars($_POST['address']);
	$no_spam1 = htmlspecialchars($_POST['no_spam1']);
	$no_spam2 = htmlspecialchars($_POST['no_spam2']);
	$order = json_decode($_POST['order'], true);
	$cart_total_price = json_decode($_POST['cart_total_price'], true);

	//Create text for the message
	function createOrderText($order, $cart_total_price, $address_to_send) {
		$text = '<table>
					<tr>
			  			<th>Наименование</th>
			  			<th>Цена</th>
						<th>Количество</th>
						<th>Адрес&nbsp;отправки</th>
					</tr>';
		foreach ($order as $key => $values) {
			$text .= '<tr>
			  			<td>' . $values['title'] . '</td>
			  			<td>' . $values['price'] . '</td>
						<td>' . $values['quantity'] . '</td>
					</tr>';
		};
		$text .=  '	<tr>
	  					<th>Итого</th>
  					</tr>
					<tr>
	  					<td>' . $cart_total_price[0] . '</td>
 					</tr>
				</table>';
		$text .=  '	<tr>
	  					<th>Адрес&nbsp;отправки</th>
  					</tr>
					<tr>
	  					<td>' . $address_to_send . '</td>
 					</tr>
				</table>';

		$spec_symbols = ["\r","\n","\t"];

		$text = str_replace($spec_symbols, "", $text);
		$text = preg_replace('/\s+/', '', $text);

		return $text;
	}

	$text = createOrderText($order, $cart_total_price, $address_to_send);


	//Check if the user exists in the database
	$user_id = "SELECT id FROM users WHERE email = '{$email}'";
	$query_result = mysqli_query($dbConnect, $user_id);

	if (!$query_result) {
		die('Invalid query: ' . mysqli_connect_error());
	}

	//If so, add an order
	if (mysqli_num_rows($query_result) > 0) {
		list($id) = mysqli_fetch_array($query_result);
		$add_order = "INSERT INTO orders (users_id, title, code, price, quantity, payment_amount) VALUES ";

		foreach ($order as $key => $values) {
			if (current($order) == end($order)) {
				$add_order .= "($id, {$values['title']}, {$values['code']}, {$values['price']}, {$values['quantity']}, {$cart_total_price})";
			} else {
				$add_order .= "($id, {$values['title']}, {$values['code']}, {$values['price']}, {$values['quantity']}, {$cart_total_price}), ";
			}
		}

		$add_order_query_result = mysqli_query($dbConnect, $add_order);

			if (!$add_order_query_result) {
				die('Invalid query: ' . mysqli_connect_error());
			}

	//Otherwise add a new user and then the order
	} elseif (mysqli_num_rows($query_result) == 0) {
		$add_new_user = "INSERT INTO users (email, phone, address, first_name, last_name) VALUES ('{$email}', '{$phone}', '{$address_to_send}', '{$first_name}', '{$last_name}')";
		$add_user_query_result = mysqli_query($dbConnect, $add_new_user);

			if (!$add_user_query_result) {
				die('Invalid query: ' . mysqli_connect_error());
			}

		$new_user_id = "SELECT id FROM users WHERE email = '{$email}'";
		$new_user_id_query_result = mysqli_query($dbConnect, $new_user_id);

			if (!$new_user_id_query_result) {
				die('Invalid query: ' . mysqli_connect_error());
			}

		list($new_id) = mysqli_fetch_array($new_user_id_query_result);
		$add_new_order = "INSERT INTO orders (users_id, title, code, price, quantity, payment_amount) VALUES ";

			foreach ($order as $key => $values) {
				if (current($order) == end($order)) {
					$add_new_order .= "('$new_id', '{$values['title']}', '{$values['code']}', '{$values['price']}', '{$values['quantity']}', '{$cart_total_price}')";
				} else {
					$add_new_order .= "('$new_id', '{$values['title']}', '{$values['code']}', '{$values['price']}', '{$values['quantity']}', '{$cart_total_price}'), ";
				}
			}

		$add_new_order_query_result = mysqli_query($dbConnect, $add_new_order);

			if (!$add_new_order_query_result) {
				die('Invalid query: ' . mysqli_connect_error());
			}
	}

	echo "<p><b>Спасибо за заказ!</b></p>
		<p>Подтверждение покупки отправлено на указанный Вами адрес электронной почты</p>";

	//Sending mail to the client
	/* $to_client = $email;
	$subject = 'Магазин Joy-Bricks';
	$message = 'Спасибо за покупку!<br><br>Ваш заказ:<br><br>' . $text;
	$headers = 'From: info@joy-bricks.co.ua\r\n';
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n"; */

	 /* if ((preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $to_client)) && empty($no_spam1) && ($no_spam2 == 9) && ($email != "")) {
			if (mail($to_client, $subject, $message, $headers)) {
				echo 'Спасибо, Ваше сообщение отправлено';
			} else {
				echo 'К сожалению, при отправке сообщения возникла ошибка';
			}
		} else {
			echo 'К сожалению, форма заполнена неверно';
		}; */

	//Sending mail to admin
	/* $to_admin = 'ksharohin@gmail.com';
	$subject = 'Заказ Joy-Bricks';
	$message = 'Создан заказ:<br>' . $text;
	$headers = "From: kos@localhost.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n"; */