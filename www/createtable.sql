DROP DATABASE IF EXISTS petitchat;
CREATE DATABASE petitchat;
\c petitchat;

CREATE TABLE membres(
    membres_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    membres_pseudo VARCHAR(30) UNIQUE,
    membres_mdp VARCHAR(30)
);

CREATE TABLE chatroom(
    chatroom_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(30)
);

CREATE TABLE messages(
    messages_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    membres_id INTEGER, -- Destinataire
    chatroom_id INTEGER,-- Destination
    messages_contenu LONGTEXT,
    FOREIGN KEY (membres_id) REFERENCES membres(membres_id),
    FOREIGN KEY (chatroom_id) REFERENCES chatroom(chatroom_id)
);

CREATE TABLE estDansChatRoom(
    estDansChatRoom_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    membres_id INTEGER,
    chatroom_id INTEGER
);

INSERT INTO membres (membres_pseudo, membres_mdp) VALUES
('theo', '7938414aed691e4bf32edcad0d7df0c6'),
('david', '172522ec1028ab781d9dfd17eaca4427');

INSERT INTO chatroom (nom) VALUES
('theo et david');

INSERT INTO estDansChatRoom (membres_id, chatroom_id) VALUES
(1, 1),
(2, 1);

INSERT INTO messages (membres_id, messages_contenu, chatroom_id) VALUES
(2, 'Bonjour David', 1),
(1, 'Bonjour Theo', 1);

ALTER TABLE `estdanschatroom` ADD UNIQUE(`membres_id`, `chatroom_id`);

CREATE USER david WITH PASSWORD 'david';
GRANT ALL PRIVILEGES ON DATABASE petitchat TO david;
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO david;
GRANT ALL PRIVILEGES ON TABLE estdanschatroom TO david;
GRANT ALL PRIVILEGES ON TABLE membres TO david;
GRANT ALL PRIVILEGES ON TABLE chatroom TO david;
GRANT ALL PRIVILEGES ON TABLE messages TO david;