CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL
);


CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `actor` varchar(50) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `special` tinyint(4) DEFAULT NULL,
  `common_id` int(11) NOT NULL
);

CREATE TABLE `orderlines` (
  `id` smallint NOT NULL,
  `line` smallint NOT NULL,
  `order_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `quantity` smallint NOT NULL,
  `order_date` date NOT NULL
);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orderlines`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `orderlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;





