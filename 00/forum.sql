CREATE DATABASE forum_pw;

USE forum_pw;

CREATE TABLE usr(
    id_usr int unsigned NOT NULL auto_increment,
    nome varchar(32) NOT NULL,
    senha varchar(32) NOT NULL,
    id_img int unsigned NOT NULL,
    PRIMARY KEY (id_usr)
);

CREATE TABLE categoria(
    id_cat int unsigned NOT NULL auto_increment,
    nome_cat varchar(64) NOT NULL,
    PRIMARY KEY(id_cat)   
);

CREATE TABLE post(
    id_post int unsigned NOT NULL auto_increment,
    id_usr int unsigned NOT NULL,
    id_cat int unsigned NOT NULL,
    data_post DATE NOT NULL,
    post_titulo varchar(64) NOT NULL,
    post_texto varchar(2048) NOT NULL,
    PRIMARY KEY (id_post),
    FOREIGN KEY (id_usr) REFERENCES usr(id_usr),
    FOREIGN KEY (id_cat) REFERENCES categoria(id_cat)
);

CREATE TABLE reply(
    id_reply int unsigned NOT NULL auto_increment,
    id_usr int unsigned NOT NULL,
    id_post int unsigned NOT NULL,
    data_reply DATE NOT NULL,
    reply varchar(2048) NOT NULL,
    PRIMARY KEY (id_reply),
    FOREIGN KEY (id_usr) REFERENCES usr(id_usr),
    FOREIGN KEY (id_post) REFERENCES post(id_post)
);
