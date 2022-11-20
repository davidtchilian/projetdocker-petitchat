DROP DATABASE IF EXISTS petitchat;
CREATE DATABASE petitchat;
\c petitchat;

CREATE TABLE membres(
    membres_id SERIAL PRIMARY KEY NOT NULL ,
    membres_pseudo TEXT UNIQUE,
    membres_mdp TEXT
);

CREATE TABLE chatroom(
    chatroom_id SERIAL PRIMARY KEY NOT NULL,
    nom TEXT
);

CREATE TABLE messages(
    messages_id SERIAL PRIMARY KEY NOT NULL,
    membres_id INT, -- Destinataire
    chatroom_id INT,-- Destination
    messages_contenu TEXT,
    FOREIGN KEY (membres_id) REFERENCES membres(membres_id),
    FOREIGN KEY (chatroom_id) REFERENCES chatroom(chatroom_id)
);

CREATE TABLE estDansChatRoom(
    estDansChatRoom_id SERIAL PRIMARY KEY NOT NULL,
    membres_id INT,
    chatroom_id INT
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

ALTER TABLE estdanschatroom ADD UNIQUE(membres_id, chatroom_id);

CREATE USER docker WITH PASSWORD 'docker';
GRANT ALL PRIVILEGES ON DATABASE petitchat TO docker;
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO docker;
GRANT ALL PRIVILEGES ON TABLE estdanschatroom TO docker;
GRANT ALL PRIVILEGES ON TABLE membres TO docker;
GRANT ALL PRIVILEGES ON TABLE chatroom TO docker;
GRANT ALL PRIVILEGES ON TABLE messages TO docker;
