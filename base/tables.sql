CREATE TABLE usuarios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE usuarios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    curso VARCHAR(100) NOT NULL,
    profesor VARCHAR(255) NOT NULL,
    55 INT(10) NOT NULL
);