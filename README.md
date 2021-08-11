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

![Arquivo PDF das Tabelas](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/TabelaeExemplo.pdf?raw=true "Tabelas")

### 5.PMC<br>

![Alt text](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/PMC%20JP%2CJV%2CGF.jpg?raw=true "PMC")
 
### 6.MODELO CONCEITUAL<br>

![Alt text](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/ModeloConceitual.jpeg?raw=true "Modelo Conceitual")    
    
### 7	MODELO LÓGICO<br>

![Modelo Lógico](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/L%C3%B3gico_1.brM3?raw=true "Modelo Lógico")  

### 8	MODELO FÍSICO<br>
> CREATE TABLE Receita (
    CodReceita int PRIMARY KEY,
    NomeRec Varchar(25)
);

> CREATE TABLE Usuario (
    CodigoUsu int  PRIMARY KEY,
    Nome varchar(25),
    CorFonte int,
    TamanhoFonte int,
    TipoFonte int,
    TipoVoz int
);

> CREATE TABLE Comentario (
    CodigoComent int PRIMARY KEY,
    Conteudo varchar(500),
    dataPost date,
    fk_Comentario_CodigoComent int,
    fk_Usuario_CodigoUsu int ,
    fk_Receita_CodReceita int
);

> CREATE TABLE Favorito (
    fk_Usuario_CodigoUsu int ,
    fk_Receita_CodReceita int
);
 
> ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_2
    FOREIGN KEY (fk_Comentario_CodigoComent)
    REFERENCES Comentario (CodigoComent);
 
> ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_3
    FOREIGN KEY (fk_Usuario_CodigoUsu)
    REFERENCES Usuario (CodigoUsu)
    ON DELETE SET NULL;
 
> ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_4
    FOREIGN KEY (fk_Receita_CodReceita)
    REFERENCES Receita (CodReceita)
    ON DELETE SET NULL;
 
> ALTER TABLE Favorito ADD CONSTRAINT FK_Favorito_1
    FOREIGN KEY (fk_Usuario_CodigoUsu)
    REFERENCES Usuario (CodigoUsu)
    ON DELETE SET NULL;
 
> ALTER TABLE Favorito ADD CONSTRAINT FK_Favorito_2
    FOREIGN KEY (fk_Receita_CodReceita)
    REFERENCES Receita (CodReceita)
    ON DELETE SET NULL;
    
> insert into receita(CodReceita, nomerec) values(1,'lasanha');

> insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (1,'Jose Vitor',1,1,1,1);

> insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu,  fk_Receita_CodReceita) values (1,'Incrivel!', '2011-03-20', 1,1)
        
       
### 9	INSERT APLICADO NAS TABELAS DO BANCO DE DADOS<br>

insert into receita(CodReceita, nomerec) values(1,'lasanha');<br>
insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (1,'Jose Vitor',1,1,1,1);<br>
insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu,  fk_Receita_CodReceita) values (1,'Incrivel!', '2011-03-20', 1,1)<br>

### 10 TABELA E PRINCIPAIS CONSULTAS<br>

![Tabela1](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/Tabela1.jpeg?raw=true "Tabela1")
> insert into comentario (codigocoment, Conteudo, dataPost, fk_Usuario_CodigoUsu,  fk_Receita_CodReceita) values (1,'Incrivel!', '2011-03-20', 1,1)

![Tabela3](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/Tabela3.jpeg?raw=true "Tabela3")
> insert into receita(CodReceita, nomerec) values(1,'lasanha');

![Tabela4](https://github.com/jpbpissineli/GRUPO-Jean-Jovi/blob/main/arquivos/Tabela4.jpeg?raw=true "Tabela4")
> insert into usuario(codigousu, nome, corfonte, tamanhofonte, tipofonte,tipovoz) values (1,'Jose Vitor',1,1,1,1);
