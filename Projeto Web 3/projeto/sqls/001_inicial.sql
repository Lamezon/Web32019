CREATE DATABASE locacao COLLATE 'utf8_unicode_ci';

CREATE TABLE `usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`login` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `carros` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`marca` varchar(255) NOT NULL,
	`modelo` varchar(255) NOT NULL,
	`ano` INT(255) NOT NULL,
	`cor` varchar(255) NOT NULL,
	`preco` DECIMAL NOT NULL DEFAULT '50',
	`disponibilidade` INT NOT NULL DEFAULT 1,
	`custo` DECIMAL NOT NULL DEFAULT '0',
	`lucro` DECIMAL NOT NULL DEFAULT '0',
	`placa` varchar (255) DEFAULT 'ABC-1234',
	`numero_reparos` INT(255) DEFAULT '0',
	`numero_locacoes` INT(255) DEFAULT '0',

	PRIMARY KEY (`id`)
);
