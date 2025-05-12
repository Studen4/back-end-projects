CREATE TABLE `comments` ( 
  `id` INT AUTO_INCREMENT NOT NULL COMMENT 'Унікальний ідентифікатор' ,
  `message` TEXT NOT NULL COMMENT 'Текст повідомлення' ,
  `created_at` DATETIME NOT NULL COMMENT 'Дата та час публікації' ,
  `is_approved` TINYINT NOT NULL COMMENT 'Схвалено модератором чи ні' ,
  `user_id` INT NOT NULL COMMENT 'ID автора (зв’язок з users)' ,
  CONSTRAINT `PRIMARY` PRIMARY KEY (`id`)
);

INSERT INTO `comments` (`id`, `message`, `created_at`, `is_approved`, `user_id`) VALUES (1, 'PHP звісно дуже гарна штука, Back-end ще краще,
але робити ці практики на Linux коли в тебе кожна друга програма видає помилку на сумістність, такий собі експірієнс.', '2025-05-12 23:26:28', 1, 1);
