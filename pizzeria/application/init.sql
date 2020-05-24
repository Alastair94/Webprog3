CREATE DATABASE IF NOT EXISTS `BK8CWX`;

CREATE TABLE IF NOT EXISTS `users`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(255) NOT NULL,
    `user_email` varchar(255) NOT NULL,
    `user_role` varchar(5) NOT NULL,
    `user_password` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
)