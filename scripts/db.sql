
CREATE DATABASE retreatin;

CREATE USER 'retreatin'@'localhost' IDENTIFIED BY 'retreatin';

GRANT ALL ON retreatinsourz.* TO 'retreatin'@'localhost';

FLUSH PRIVILEGES;

