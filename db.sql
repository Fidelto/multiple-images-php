CREATE multiple;
use multiple;
CREATE TABLE products(
id int not null auto_increment primary key,
name varchar(255)
);
CREATE TABLE images(
id int not null auto_increment primary key,
idProduct int,
FOREIGN KEY(idProduct) REFRENCES products(id) ON DELETE CASCADE
)