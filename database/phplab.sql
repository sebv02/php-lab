CREATE TABLE users (
 id INT(11) NOT NULL AUTO_INCREMENT,
 username VARCHAR(30) NOT NULL,
 pwd VARCHAR(255) NOT NULL,
 email VARCHAR(100) NOT NULL,
 created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (id)
);
CREATE TABLE comments (
 id INT(11) NOT NULL AUTO_INCREMENT,
 username VARCHAR(30) NOT NULL,
 comment_text TEXT NOT NULL,
 created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 users_id INT(11),
 PRIMARY KEY (id),
 FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE SET NULL
);
INSERT INTO users (username, pwd, email) VALUES
('bold', '1234', 'bold@mail.com'),
('saraa', '5678', 'saraa@mail.com'),
('temuujin', 'abcd', 'temuujin@mail.com');
INSERT INTO comments (username, comment_text, users_id) VALUES
('bold', 'PHP сонирхолтой байна', 1),
('saraa', 'Форм боловсруулалт ойлгомжтой', 2),
('bold', 'Тооны машин ажиллалаа', 1);