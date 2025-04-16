
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;

SET time_zone = "+00:00";


DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(32) NOT NULL,
  `detail` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `products` (`id`, `name`, `brand`, `price`, `detail`, `img`) VALUES
(1, 'YSL Jacket', 'YSL', 299, 'Black saint laurant jacket 2020', 'ysl-jacket.jpg'),
(2, 'Crop Trop', 'Talentless', 69, 'For new generation fashionista', 'womenshort.jpg'),
(4, 'Pink Hoodie', 'Pink Talent', 32332, 'asdfsaf', 'pink.jpg'),
(5, 'Black sleeve', 'long sleeve', 213, 'marketma ayp', 'sleeve.png'),
(7, 'Shadow Cloth', 'Shadow ', 3234, 'adsffsa', 'sleeve.png'),
(8, 'Beast Product', 'sdaf', 3234, 'adfaf', 'goldwatch.jpg'),
(9, 'Yellow TSHirt', 'ello', 345, 'This color suits the dirty fellows', 'yellowt.jpg'),
(10, 'Men White T-Shirt with print', 'Adidas', 782, 'smooth and quality clothes', 'tshirt.jpg');



DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE`employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_id`int(11) NOT NULL ,
  `salary`int(11) NOT NULL DEFAULT 0,
  
  
  PRIMARY KEY (`id`),
  FOREIGN KEY (`u_id`) REFERENCES `users`(`id`)

) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `role`) VALUES
(2, 'johny', '$2y$10$v9rF8ZMOtjRw43i3XSwz1ezLLDGtGgg9HewOdwMI/G3wOlj9AqhFm', '2023-02-16 8:42:21', 'buyer'),
(1, 'aya', '$2y$10$xJVDq3HjKeYFd3jqJU6XTuxXtjaK5sVYVtYE4BM4vh.UJpPC9JI6.', '2023-02-16 05:39:04', 'admin'),
(3, 'hala', '$2y$10$xJVDq3HjKeYFd3jqJU6XTuxXtjaK5sVYVtYE4BM4vh.UJpPC9JI6.', '2023-02-16 05:44:14', 'employee');

INSERT INTO `employee` (`id`, `u_id`, `salary`) VALUES ('1', '3', '0');

CREATE TABLE IF NOT EXISTS `addcart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(8) NOT NULL,
  `u_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `u_address` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `u_contact` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `o_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=canelled, 1= pending, 2 =  shipping, 3 =  delivered',
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  KEY `u_name` (`u_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



ALTER TABLE `orders`
  ADD CONSTRAINT `u_id` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `u_name` FOREIGN KEY (`u_name`) REFERENCES `users` (`username`);



