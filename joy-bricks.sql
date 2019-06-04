CREATE DATABASE joy_bricks;

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_UNIQUE` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE categories AUTO_INCREMENT=5;

INSERT INTO `categories` (`id`, `category`) VALUES
(4, 'BELA'),
(3, 'BRICK'),
(1, 'LEPIN'),
(2, 'SLUBAN');



CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `photo` char(40) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `code` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE products AUTO_INCREMENT=13;

INSERT INTO `products` (`id`, `category_id`, `title`, `category`, `type`, `description`, `photo`, `price`, `quantity`, `code`) VALUES
(1, 3, 'Aztek&nbsp;Prison', 'BRICK', 'Пираты', '<b>Детский конструктор на 328 деталей.</b><br>Окунитесь в прошлое цивилизации Ацтеков.', '47970f1190b86bdb3010cdef348ff376602dd287', 211, 3, 1720),
(2, 3, 'Fire&nbsp;Rescue', 'BRICK', 'Пожарная охрана', '<b>Детский конструктор на 364 детали.</b><br>Не дайте пожару ни единого шанса.', 'bbd76f501b989ab52b437ee0a1466f3e655eb4db', 244, 2, 1721),
(3, 3, 'Submarine', 'BRICK', 'Морской флот', '<b>Детский конструктор на 382 детали.</b><br>Исследуйте неизвестные глубины океана.', 'dae9b8a071f1888a328382bbcfecc556c9bca3ef', 333, 3, 1722),
(4, 4, 'Urban&nbsp;Police', 'BELA', 'Полиция', '<b>Детский конструктор на 528 деталей.</b><br>Не дайте уйти грабителям банка.', 'e12fdaa84bf8457d9fe3166ced42516d96ed70b1', 801, 2, 1723),
(5, 4, 'City&nbsp;Police', 'BELA', 'Полиция', '<b>Детский конструктор на 691 деталь.</b><br>Управляйте полицейским блокпостом.', 'd3f44712ef306d1a60271afd11cafbebc41b4ee3', 804, 1, 1724),
(6, 4, 'My&nbsp;World', 'BELA', 'Minecraft', '<b>Детский конструктор на 747 деталей.</b><br>Создайте свою историю.', '3361148773fa1105c4e8fb51d168f4fa69a47876', 900, 2, 1725),
(7, 2, 'Aviation', 'SLUBAN', 'Авиация', '<b>Детский конструктор на 259 деталей.</b><br>Управляйте пассажирским вертолетом.', 'ef92ea0e975882944cbfb0fb2cb774a7676ed331', 247, 1, 1726),
(8, 2, 'Town&nbsp;Farm', 'SLUBAN', 'Ферма', '<b>Детский конструктор на 512 деталей.</b><br>Управляйте личной фермой.', '404f9bb6723076ace03b5a4e83514a2e4403d103', 588, 1, 1727),
(9, 2, 'Town&nbsp;Shop', 'SLUBAN', 'Магазин', '<b>Детский конструктор на 149 деталей.</b><br>Управляйте личным магазином.', '0f899c5dbb6d54657a5ab0019589c5ffcfcd4643', 205, 1, 1728),
(10, 1, 'Superheroes<br>School', 'LEPIN', 'Школа супергероев', '<b>Детский конструктор на 712 деталей.</b><br>Постройте свою школу супергероев.', 'ef13d8c429b062731aad107a47916386a7a5c3ad', 1291, 1, 1729),
(11, 1, 'Ninja&nbsp;Saga', 'LEPIN', 'Танки', '<b>Детский конструктор на 977 деталей.</b><br>Постройте ледяной танк и устройте снежный апокалипсис.', 'bad756b795c07cb173b3191ca818a23d1f787fcb', 1171, 1, 1730),
(12, 1, 'Ninja&nbsp;Saga', 'LEPIN', 'Роботы', '<b>Детский конструктор на 1010 деталей.</b><br>Постройте огненного меха и отправляйтесь на барбекю.', 'e5f2a3389d320fab9d782dee8885d8d56e40a83b', 1133, 1, 1731);



CREATE TABLE `users` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`type` ENUM('member','admin') NOT NULL DEFAULT 'member',
	`username` VARCHAR(45),
	`email` VARCHAR(80) NOT NULL,
  `phone` VARCHAR(20),
  `address` VARCHAR(255) NOT NULL,
	`pass` VARCHAR(255),
	`first_name` VARCHAR(45) NOT NULL,
	`last_name` VARCHAR(45) NOT NULL,
	`date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `username_UNIQUE` (`username` ASC),
	UNIQUE INDEX `email_UNIQUE` (`email` ASC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `orders` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT UNSIGNED NOT NULL,
	`title` VARCHAR(45) NOT NULL,
	`code` VARCHAR(45) NOT NULL,
  `price` INT UNSIGNED NOT NULL,
  `quantity` INT UNSIGNED NOT NULL,
	`payment_amount` INT UNSIGNED NOT NULL,
	`date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	INDEX `date_created` (`date_created` ASC),
		FOREIGN KEY (`user_id`)
		REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `error_logs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `order_id` INT UNSIGNED NOT NULL,
  `error_log` VARCHAR(255) NOT NULL,
  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `date_created` (`date_created` ASC),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `order_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;