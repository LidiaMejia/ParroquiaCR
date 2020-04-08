CREATE SCHEMA `parroquia`;
-- MySQL < 8
-- CREATE USER 'userparr'@'%' IDENTIFIED BY 'r3suc1t4d0';

-- MySQL >=8 y MariaDB
CREATE USER 'userparr'@'%' IDENTIFIED WITH mysql_native_password BY 'r3suc1t4d0';

GRANT ALL ON parroquia.* TO 'userparr'@'%'; 
