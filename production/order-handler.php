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
		if ($order && $cart_total_price && $address_to_send) {
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
		$text .= '<table>
					<tr>
	  					<th>Итого</th>
  					</tr>
					<tr>
	  					<td>' . $cart_total_price . '</td>
 					</tr>';
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

		} else {
			throw new Exception('Отсутствуют параметры для createOrderText');
		}
	}

	function save_log($id, $new_id, $email, $dbConnect, $error) {
		$user_id = $id ? $id : $new_id;

		$get_order_id = "SELECT id FROM users WHERE email = '{$email}'";
		$get_order_id_result = mysqli_query($dbConnect, $user_id);
		list($order_id) = mysqli_fetch_array($get_order_id_result);

		$add_new_log = "INSERT INTO error_logs ('user_id', 'order_id', 'error_log') VALUES ('{$user_id}', '{$order_id}', '{$error}')";
		mysqli_query($dbConnect, $add_new_log);
	}

	try {
		$text = createOrderText($order, $cart_total_price, $address_to_send);
	} catch (Exception $e) {
		echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
	}



	//Check if the user exists in the database
	$get_user_id = "SELECT id FROM users WHERE email = '{$email}'";
	$get_user_id_query_result = mysqli_query($dbConnect, $get_user_id);

	if (!$get_user_id_query_result) {
		die('Ошибка соединения с базой данных' . mysqli_connect_error());
	}

	//If so, add an order
	if (mysqli_num_rows($get_user_id_query_result) > 0) {
		list($id) = mysqli_fetch_array($get_user_id_query_result);
		$add_order = "INSERT INTO orders (user_id, title, code, price, quantity, payment_amount) VALUES ";

		foreach ($order as $key => $values) {
			if ($order[$key] === $order[array_key_last($order)]) {
				$add_order .= "('$id', '{$values['title']}', '{$values['code']}', '{$values['price']}', '{$values['quantity']}', '{$cart_total_price}')";
			} else {
				$add_order .= "('$id', '{$values['title']}', '{$values['code']}', '{$values['price']}', '{$values['quantity']}', '{$cart_total_price}'), ";
			}

		}

		$add_order_query_result = mysqli_query($dbConnect, $add_order);

			if (!$add_order_query_result) {
				die('Ошибка соединения с базой данных' . mysqli_connect_error());
			}

	//Otherwise add a new user and then the order
	} elseif (mysqli_num_rows($get_user_id_query_result) == 0) {
		$add_new_user = "INSERT INTO users (email, phone, address, first_name, last_name) VALUES ('{$email}', '{$phone}', '{$address_to_send}', '{$first_name}', '{$last_name}')";
		$add_user_query_result = mysqli_query($dbConnect, $add_new_user);

			if (!$add_user_query_result) {
				die('Ошибка соединения с базой данных' . mysqli_connect_error());
			}

		$get_new_user_id = "SELECT id FROM users WHERE email = '{$email}'";
		$new_user_id_query_result = mysqli_query($dbConnect, $get_new_user_id);

			if (!$new_user_id_query_result) {
				die('Ошибка соединения с базой данных' . mysqli_connect_error());
			}

		list($new_id) = mysqli_fetch_array($new_user_id_query_result);
		$add_new_order = "INSERT INTO orders (user_id, title, code, price, quantity, payment_amount) VALUES ";

			foreach ($order as $key => $values) {
				if ($order[$key] === $order[array_key_last($order)]) {
					$add_new_order .= "('$new_id', '{$values['title']}', '{$values['code']}', '{$values['price']}', '{$values['quantity']}', '{$cart_total_price}')";
				} else {
					$add_new_order .= "('$new_id', '{$values['title']}', '{$values['code']}', '{$values['price']}', '{$values['quantity']}', '{$cart_total_price}'), ";
				}
			}

		$add_new_order_query_result = mysqli_query($dbConnect, $add_new_order);

			if (!$add_new_order_query_result) {
				die('Ошибка соединения с базой данных' . mysqli_connect_error());
			}
	}

	//Sending mail to the client
	$to_client = $email;
	$subject = 'Магазин Joy-Bricks';
	$message = 'Спасибо за покупку!<br><br>Ваш заказ:<br><br>' . $text;
	$headers = 'From: info@joy-bricks.co.ua\r\n';
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";

	  if ((preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $to_client)) && empty($no_spam1) && ($no_spam2 == 9) && ($email != "")) {
			try {
				if (!mail($to_client, $subject, $message, $headers)) {
					throw new Exception('Не удалось отправить сообщение клиенту');
				}
			} catch (Exception $e) {
				echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
			}

			echo '<div class="order-server-reply">
						<p><b>Спасибо за заказ!</b></p>
						<p>Подтверждение покупки отправлено на указанный Вами адрес электронной почты</p>
				</div>';

		} else {
			echo '<div class="order-server-reply"
						<p><b>К сожалению, форма заполнена неверно</b></p>
				</div>';
		};

	//Sending mail to admin
	$to_admin = 'info@joy-bricks.co.ua';
	$subject = 'Заказ Joy-Bricks';
	$message = 'Создан заказ:<br>' . $text;
	$headers = 'From: ' . $email . '\r\n';
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";

	if (!mail($to_admin, $subject, $message, $headers)) {
		$error = error_get_last();
		save_log($id, $new_id, $email, $dbConnect, $error);
	};