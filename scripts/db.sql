
CREATE DATABASE retreatin;

CREATE USER 'retreatin'@'localhost' IDENTIFIED BY 'retreatin';

GRANT ALL ON retreatin.* TO 'retreatin'@'localhost';

FLUSH PRIVILEGES;

