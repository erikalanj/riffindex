--In phpmyAdmin, create a database called RiffIndex (matches hardcoded host in db_connect.php), and then paste this script 
--into the SQL window under the RiffIndex database. 

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('casual', 'fan', 'superfan', 'admin') NOT NULL,
    phone VARCHAR(15)
);
