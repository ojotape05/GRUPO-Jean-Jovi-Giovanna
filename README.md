# TRABALHO DE PI:  Título do Trabalho
Trabalho desenvolvido durante a disciplina de Banco de Dados do Integrado

# Sumário

### 1. COMPONENTES<br>
Integrantes do grupo<br>
primeiro_componente_do_grupo:email_primeiro_componente@dominio.com<br>
segundo_componente_do_grupo:email_segundo_componente@dominio.com<br>
...

### 2.INTRODUÇÃO E MOTIVAÇAO<br>
Este documento contém a especificação do projeto integrador <nome do projeto> 
<br>e motivação da escolha realizada. <br>

> A empresa "Devcom Projetos" visa colaborar com desenvolvimento de projetos para uma sociedade melhor. Sabendo-se dos desafios para gerenciar projetos dentro de uma empresa e visando unir as informações relativas a funcionários, departamentos e projetos em um mesmo local, ficamos motivados com o desenvolvimento deste sistema. O Sistema "Devcom" tem como objetivo gerenciar todas as informações ao desenvolvimento das atividades de projetos em diversas localidades do país. Para realizar suas operações adequadamente e empresa necessita que sistema que armazene informações relativas aos Projetos, Departamentos e Empregados, além de também armazenar dados sobre  Dependentes e Históricos de Salário dos empregados. O sistema deverá gerar um conjunto de relatórios que por sua vez atenderá os anseios da empresa/organização em questão.
 

### 3.RASCUNHOS BÁSICOS DA INTERFACE (MOCKUPS)<br>
Neste ponto a codificação não e necessária, somente as ideias de telas devem ser desenvolvidas. O princípio aqui é pensar na criação da interface para identificar possíveis informações a serem armazenadas e/ou descartadas <br>

Sugestão: https://balsamiq.com/products/mockups/<br>

![Alt text](https://github.com/discipbd1/trab01/blob/master/balsamiq.png?raw=true "Title")
![Arquivo PDF do Protótipo Balsamiq feito para Empresa Devcom](https://github.com/discipint/trabalho01/blob/master/arquivos/EmpresaDevcom.pdf?raw=true "Empresa Devcom")


#### 3.1 QUAIS PERGUNTAS PODEM SER RESPONDIDAS COM O SISTEMA PROPOSTO?
    a) O sistema proposto poderá fornecer quais tipos de relatórios e informaçes? 
    b) Crie uma lista com os 5 principais relatórios que poderão ser obtidos por meio do sistema proposto!
    
> A Empresa DevCom precisa inicialmente dos seguintes relatórios:
* Relatório que informe quais são os gerentes de cada departamento incluindo as seguintes informações: número do departamento,  nome do departamento, e nome do gerente.
* Relatório de empregados por projeto incluindo as seguintes informações: número do projeto, nome do projeto, rg do empregado, nome do empregado e quantidade de horas de trabalho do empregado alocadas ao projeto.
* Relatório de empregados com dependentes incluindo as seguintes informações: rg do empregado, nome do empregado, nome do dependente, tipo de relação, data de nascimento do dependente e sexo do dependente.
* Relatório com a quantidade de empregados por cada departamento incluindo as seguintes informações: nome do departamento, supervisor e quantidade de empregados alocados no departamento.
* Relatório de supervisores e supervisionados incluindo as seguintes informações: nome do supervisor e nome do supervisionado.
 

### 4 TABELA DE DADOS DO SISTEMA:
    A) Esta tabela deve conter todos os atributos do sistema e um mínimo de 10 linhas/registros de dados.
    B) Esta tabela tem a intenção de simular um relatório com todos os dados que serão armazenados 
    e deve ser criada antes do modelo conceitual
    C) Após criada esta tabela não deve ser modificada, pois será comparada com os resultados finais na conclusão do trabalho
    
![Exemplo de Tabela de dados da Empresa Devcom](https://github.com/discipint/trabalho01/blob/master/arquivos/TabelaEmpresaDevCom_sample.xlsx?raw=true "Tabela - Empresa Devcom")

 ### 5.MODELO CONCEITUAL<br>
    A) Utilizar a Notação adequada (Preferencialmente utilizar o BR Modelo 3)
    B) O mínimo de entidades do modelo conceitual pare este trabalho será igual a 3 e o Máximo 5.
        * informe quais são as 3 principais entidades do sistema em densenvolvimento<br>(se houverem mais de 3 entidades, pense na importância da entidade para o sistema)       
    C) Principais fluxos de informação/entidades do sistema (mínimo 3). <br>Dica: normalmente estes fluxos estão associados as tabelas que conterão maior quantidade de dados 
    D) Qualidade e Clareza
        Garantir que a semântica dos atributos seja clara no esquema (nomes coerentes com os dados).
        Criar o esquema de forma a garantir a redução de informação redundante, possibilidade de valores null, 
        e tuplas falsas (Aplicar os conceitos de normalização abordados).   
        
![Alt text](https://github.com/discipbd1/trab01/blob/master/images/concept_sample.png?raw=true "Modelo Conceitual")
    
    
        
    
#### 5.1 Validação do Modelo Conceitual
    [Grupo01]: [Nomes dos que participaram na avaliação]
    [Grupo02]: [Nomes dos que participaram na avaliação]

#### 5.2 Descrição dos dados 
    [objeto]: [descrição do objeto]
    
    EXEMPLO:
    CLIENTE: Tabela que armazena as informações relativas ao cliente<br>
    CPF: campo que armazena o número de Cadastro de Pessoa Física para cada cliente da empresa.<br>


### 6	MODELO LÓGICO<br>
        a) inclusão do esquema lógico do banco de dados
        b) verificação de correspondencia com o modelo conceitual 
        (não serão aceitos modelos que não estejam em conformidade)

### 7	MODELO FÍSICO<br>
        a) inclusão das instruções de criacão das estruturas em SQL/DDL 
        (criação de tabelas, alterações, etc..) 
        
       
### 8	INSERT APLICADO NAS TABELAS DO BANCO DE DADOS<br>
        a) inclusão das instruções de inserção dos dados nas tabelas criadas pelo script de modelo físico
        (Drop para exclusão de tabelas + create definição de para tabelas e estruturas de dados + insert para dados a serem inseridos)
        b) Criar um novo banco de dados para testar a restauracao 
        (em caso de falha na restauração o grupo não pontuará neste quesito)
        c) formato .SQL


### 9	TABELAS E PRINCIPAIS CONSULTAS<br>
    OBS: Incluir para cada tópico as instruções SQL + imagens (print da tela) mostrando os resultados.<br>
#### 9.1	CONSULTAS DAS TABELAS COM TODOS OS DADOS INSERIDOS (Todas) <br>
#### 9.2 PRINCIPAIS CONSULTAS DO SISTEMA 
 Inserir as principais consultas (relativas aos 5 principais relatórios) definidas previamente no iten 3.1 deste template.
  a) Você deve apresentar as consultas em formato SQL para cad um dos relatórios.
  b) Além da consulta deve ser apresentada uma imagem com o resultado obtido para cada consulta.

    


    
##### About Formatting
    https://help.github.com/articles/about-writing-and-formatting-on-github/
    
##### Basic Formatting in Git
    
    https://help.github.com/articles/basic-writing-and-formatting-syntax/#referencing-issues-and-pull-requests
   
    
##### Working with advanced formatting
    https://help.github.com/articles/working-with-advanced-formatting/

#### Mastering Markdown
    https://guides.github.com/features/mastering-markdown/

### OBSERVAÇÕES IMPORTANTES

#### Todos os arquivos que fazem parte do projeto (Imagens, pdfs, arquivos fonte, etc..), devem estar presentes no GIT. Os arquivos do projeto vigente não devem ser armazenados em quaisquer outras plataformas.
1. Caso existam arquivos com conteúdos sigilosos, comunicar o professor que definirá em conjunto com o grupo a melhor forma de armazenamento do arquivo.

#### Todos os grupos deverão fazer Fork deste repositório e dar permissões administrativas ao usuário deste GIT, para acompanhamento do trabalho.

#### Os usuários criados no GIT devem possuir o nome de identificação do aluno (não serão aceitos nomes como Eu123, meuprojeto, pro456, etc). Em caso de dúvida comunicar o professor.


Link para BrModelo:<br>
http://sis4.com/brModelo/brModelo/download.html
<br>


Link para curso de GIT<br>
![https://www.youtube.com/curso_git](https://www.youtube.com/playlist?list=PLo7sFyCeiGUdIyEmHdfbuD2eR4XPDqnN2?raw=true "Title")
