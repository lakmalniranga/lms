CREATE TABLE `users` 
  ( 
     `id`       INT NOT NULL auto_increment, 
     `username` VARCHAR(32) NOT NULL, 
     `email`    VARCHAR(200) NOT NULL, 
     `password` VARCHAR(200) NOT NULL, 
     `admin`    INT(1) NOT NULL DEFAULT '0', 
     `date`     DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
     PRIMARY KEY (`id`) 
  ) 
engine = innodb; 