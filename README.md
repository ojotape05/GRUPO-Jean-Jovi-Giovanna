# TRABALHO DE PI:  Desenvolvimento de APP e Programa sobre Receitas
Trabalho desenvolvido durante a disciplina de Banco de Dados do Integrado

# Sumário

### 1. COMPONENTES<br>
Integrantes do grupo<br>
Jean Pedro Bremer Pissineli : jpbpissineli05@gmail.com<br>
José Vítor Williams Wotzasek : josevww@gmail.com<br>
Giovanna Ferreira Fiorio : <email><br>

### 2.MINIMUNDO<br>
> O sistema proposto tem duas faces, sendo elas site e aplicativo. No Usuário serão armazenados o nome do usuário, e suas configurações do aplicativo, como: tipo de voz, cor da fonte, tamanho e o tipo. Será gerado para cada usuário um Código de Usuário. Na Receita serão armazenados somente o nome da receita. Será gerado para cada receita um Código de Receita. No Comentário serão armazenados a data de publicação, o comentário pai (que poderá ser NULO), assim como seu conteúdo. Será gerado para cada comentáro um Código de Comentário. Vale destacar que cada Usuário poderá fazer quantos Comentários quiser e os comentários devem estar obrigatóriamente alocados a um Usuário. Os Comentários, por sua vez, poderão ter respostas à ele, mas não obrigatóriamente, e aparecerão exclusivamente na receita onde o usuário fez o post. As Receitas poderão ter diversos comentários, obrigatóriamente alocadas a um usuário assim como serem 'favoritadas' por ele, indicando que esta dada receita é uma das suas favoritas.<br>
 
### 3.RASCUNHOS BÁSICOS DA INTERFACE (MOCKUPS)<br>
![Arquivo PDF do WireFrame](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/tree/main/arquivos/Wireframe.pdf?raw=true "Ideias de telas")

#### 3.1 QUAIS PERGUNTAS PODEM SER RESPONDIDAS COM O SISTEMA PROPOSTO?
    
> O Projeto precisa inicialmente dos seguintes relatórios:
* Informações do Usuário, como: Nome, Tipo de Voz, Cor da Fonte, Tamanho da Fonte e Tipo de Fonte.

### 4 TABELA DE DADOS DO SISTEMA:

![Arquivo PDF das Tabelas](https://github.com/jpbpissineli/GRUPO-Jean-Jovi-Giovanna/blob/main/arquivos/Tabelas/tabelas.pdf?raw=true "Tabelas")

### 5.PMC<br>

![Alt text](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/PMC%20JP%2CJV%2CGF.jpg?raw=true "PMC")
 
### 6.MODELO CONCEITUAL<br>

![Modelo Conceitual](https://github.com/jpbpissineli/GRUPO-Jean-Jovi-Giovanna/blob/main/arquivos/NOVO%20Modelo%20Conceitual.jpeg?raw=true "Modelo Conceitual")    
    
### 7	MODELO LÓGICO<br>

![Modelo Lógico](https://github.com/jpbpissineli/GRUPO-Jean-Jovi-Giovanna/blob/main/arquivos/NOVO%20Modelo%20L%C3%B3gico.jpeg?raw=true "Modelo Lógico")  

### 8	MODELO FÍSICO<br>
/* Lógico_2: */<br>

CREATE TABLE Receita (<br>
    CodReceita int PRIMARY KEY,<br>
    NomeRec Varchar(25),<br>
    fk_Usuario_CodigoUsu int<br>
);<br>
<br>
CREATE TABLE Usuario (<br>
    CodigoUsu int  PRIMARY KEY,<br>
    Nome varchar(25),<br>
    CorFonte int,<br>
    TamanhoFonte int,<br>
    TipoFonte int,<br>
    TipoVoz int<br><br>
);<br>
<br>
CREATE TABLE Comentario (<br>
    CodigoComent int PRIMARY KEY,<br>
    Conteudo varchar(500),<br>
    dataPost date,<br>
    fk_Comentario_CodigoComent int,<br>
    fk_Usuario_CodigoUsu int ,<br>
    fk_Receita_CodReceita int<br><br>
);<br>
<br>
CREATE TABLE Favorito (<br>
    fk_Receita_CodReceita int,<br>
    fk_Usuario_CodigoUsu int <br>
);<br>
 <br>
ALTER TABLE Receita ADD CONSTRAINT FK_Receita_2<br>
    FOREIGN KEY (fk_Usuario_CodigoUsu)<br>
    REFERENCES Usuario (CodigoUsu)<br>
    ON DELETE SET NULL;<br>
 <br>
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_2<br>
    FOREIGN KEY (fk_Comentario_CodigoComent)<br>
    REFERENCES Comentario (CodigoComent);<br>
<br> 
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_3<br>
    FOREIGN KEY (fk_Usuario_CodigoUsu)<br>
    REFERENCES Usuario (CodigoUsu)<br>
    ON DELETE SET NULL;<br>
<br> 
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_4<br>
    FOREIGN KEY (fk_Receita_CodReceita)<br>
    REFERENCES Receita (CodReceita)<br>
    ON DELETE SET NULL;<br>
<br> 
ALTER TABLE Favorito ADD CONSTRAINT FK_Favorito_1<br>
    FOREIGN KEY (fk_Receita_CodReceita)<br>
    REFERENCES Receita (CodReceita)<br>
    ON DELETE SET NULL;<br>
<br> 
ALTER TABLE Favorito ADD CONSTRAINT FK_Favorito_2<br>
    FOREIGN KEY (fk_Usuario_CodigoUsu)<br>
    REFERENCES Usuario (CodigoUsu)<br>
    ON DELETE SET NULL;<br>
<br>      
       
### 9	INSERT APLICADO NAS TABELAS DO BANCO DE DADOS<br>

insert into receita(CodReceita, nomerec,usuAutor) values(1,'lasanha',1);<br>
insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (1,'Jose Vitor',1,1,1,1);<br>
insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu,  fk_Receita_CodReceita) values (1,'Incrivel!', '2011-03-20', 1,1)
<br>
 
insert into receita(CodReceita, nomerec,usuAutor) values(2,'Bolo',2);<br>
insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (2,'Giovanna',2,3,1,4);<br>
insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu, fk_Receita_CodReceita) values (2,'Delícia', '2021-07-29',1,2);
<br>

insert into receita(CodReceita, nomerec,usuAutor) values(3,'Moqueca',3);<br>
insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (3,'Paulo',2,1,2,3);<br>
insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu, fk_Receita_CodReceita) values (3,'Gostoso', '2021-08-20',3,3);
<br>
 
insert into receita(CodReceita, nomerec,usuAutor) values(4,'Torta de Frango',4);<br>
insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (4,'Pedro',3,1,2,1);<br>
insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu, fk_Receita_CodReceita) values (4,'Bom demais', '2021-07-4', 1,4);
<br>
 
insert into receita(CodReceita, nomerec,usuAutor) values(5,'Pudim',5);<br>
insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (5,'Marcos',2,2,3,5);<br>
insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu, fk_Receita_CodReceita) values (5,'Dlc', '2021-08-19',5,5);
<br>
 
insert into receita(CodReceita, nomerec,usuAutor) values(6,'Bobó de camarão',6);<br>
insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (6,'Marcela',2,3,4,1);<br>
insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu, fk_Receita_CodReceita) values (6,'Deu certo!!', '2021-07-15',6 ,6);
<br>

### 10 TABELA E PRINCIPAIS CONSULTAS<br>

![Tabela1](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/Tabela1.jpeg?raw=true "Tabela1")
> insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu,  fk_Receita_CodReceita) values (1,'Incrivel!', '2011-03-20', 1,1)

![Tabela3](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/Tabela3.jpeg?raw=true "Tabela3")
> insert into receita(CodReceita, nomerec) values(1,'lasanha');

![Tabela4](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/Tabela4.jpeg?raw=true "Tabela4")
> insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (1,'Jose Vitor',1,1,1,1);
