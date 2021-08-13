create table tb_status(
	id_status int not null PRIMARY KEY AUTO_INCREMENT,
    nome_status varchar(20) not null
);

INSERT INTO tb_status(nome_status)VALUES('usuario'),('administrador');

create table tb_usuario(
	id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(50) NOT NULL,
    senha_usuario varchar(16) not null,
    id_status int not null DEFAULT 1,
    FOREIGN KEY(id_status) REFERENCES tb_status(id_status)
);