CREATE TABLE receita (codreceita SERIAL NOT NULL, data timestamp default now(), imagem text NOT NULL, ingrediente text NOT NULL, nomerec varchar(48) NOT NULL, preparo TEXT NOT NULL, sobre text NOT NULL, autor int, primary key(codreceita) );

CREATE TABLE usuario(codusu SERIAL NOT NULL, email varchar(48) NOT NULL, imagem text, nome varchar(48) NOT NULL, senha varchar(32) NOT NULL. sobre text, primary key(codusu));

CREATE TABLE favorito(codreceita int NOT NULL, codusu int NOT NULL);

CREATE TABLE seguidos(seguido int, seguidos int);