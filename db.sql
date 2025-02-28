CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username TEXT NOT NULL,
    epasts VARCHAR(255) NOT NULL UNIQUE,
    roles ENUM('Worker', 'Admin') NOT NULL,
    parole TEXT NOT NULL
);