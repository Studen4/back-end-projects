CREATE TABLE `users` ( 
  `ID` INT AUTO_INCREMENT NOT NULL COMMENT 'Унікальний ідентифікатор' ,
  `username` VARCHAR(50) NOT NULL COMMENT 'Ім’я користувача' ,
  `password` VARCHAR(255) NOT NULL COMMENT 'Захешований пароль' ,
  `role` ENUM('user','admin') NOT NULL COMMENT 'Роль користувача' ,
  CONSTRAINT `PRIMARY` PRIMARY KEY (`ID`)
);


INSERT INTO `users` (`ID`, `username`, `password`, `role`) VALUES (1, 'testuser', 'testpass', 'user');
