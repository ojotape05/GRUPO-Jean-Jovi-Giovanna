-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 25-Jan-2022 às 01:15
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_comecome`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `codreceita` int(11) NOT NULL,
  `codusu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `favorito`
--

INSERT INTO `favorito` (`codreceita`, `codusu`) VALUES
(16, 6),
(17, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `CodReceita` int(11) NOT NULL,
  `NomeRec` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Preparo` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagem` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_Usuario_CodigoUsu` int(11) DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ingredientes` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`CodReceita`, `NomeRec`, `Preparo`, `imagem`, `fk_Usuario_CodigoUsu`, `descricao`, `ingredientes`, `data`) VALUES
(16, 'MOUSSE DE MARACUJÃ COM COBERTURA DE CHOCOLATE', 'Bata todos os ingredientes do mousse no liquidificador por 5 minutos.&#13;&#10;Coloque em uma tigela e leve Ã  geladeira.&#13;&#10;Derreta o chocolate em banho - maria.&#13;&#10;Desligue o fogo e misture o creme de leite.&#13;&#10;ApÃ³s o creme esfriar, cubra o mousse e decore com coco ralado.&#13;&#10;Leve Ã  geladeira novamente.&#13;&#10;Sirva gelado.', '61e9715a04e2b.jpg', 5, 'Mousse de maracujÃ¡ cremoso', '<ul><li> 2 latas de leite condensado </li><li> 2 latas de creme de leite sem soro </li><li> 2 latas de creme de leite sem soro </li><li> 1 barra de 200 g de chocolate ao leite </li><li> 1 caixinha de creme de leite (200 g) </li><li> Coco ralado para decorar </li></ul>', '2022-01-20 14:27:38'),
(17, 'Pastel de Feira', 'Coloque a farinha misturada com o sal em uma vasilha ou uma mesa e abra um buraco no meio.&#13;&#10;&#13;&#10;Nesse buraco, coloque o Ã³leo, a aguardente e um pouco de Ã¡gua.&#13;&#10;&#13;&#10;Misture a Ã¡gua e a farinha aos poucos, cada vez pegando um pouco mais de farinha da borda do buraco.&#13;&#10;&#13;&#10;Quando a massa estiver ficando dura, coloque mais Ã¡gua.&#13;&#10;&#13;&#10;A massa deve ficar macia.&#13;&#10;&#13;&#10;Se estiver um pouco grudenta, nÃ£o tem problema.&#13;&#10;&#13;&#10;Se estiver muito grudenta, coloque mais farinha.&#13;&#10;&#13;&#10;Se estiver dura, coloque mais Ã¡gua.&#13;&#10;&#13;&#10;Em uma superfÃ­cie enfarinhada, abra a massa com o auxÃ­lio de um rolo, de forma que ela fique bem fina.&#13;&#10;&#13;&#10;Se nÃ£o ficar fina, ela nÃ£o fica crocante depois de fritar.&#13;&#10;&#13;&#10;Recheie a gosto, e feche com um garfo ou com o verso de uma faca.&#13;&#10;&#13;&#10;Frite em Ã³leo quente (nÃ£o muito) em fogo mÃ©dio-alto e escorra com o auxÃ­lio de ', '61e97279db6a1.jpg', 7, 'Tradicional pastel de feira, fÃ¡cil de fazer.', '<ul><li> 3 xÃ­caras de farinha de trigo </li><li> 1 xÃ­cara de Ã¡gua morna (ou um pouco mais) </li><li> 1 xÃ­cara de Ã¡gua morna (ou um pouco mais) </li><li> 1 colher (sopa) de aguardente </li><li> 1 colher (sopa) rasa de sal </li><li> farinha de trigo para trabalhar a massa </li></ul>', '2022-01-20 14:32:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguidos`
--

CREATE TABLE `seguidos` (
  `seguido` int(11) DEFAULT NULL,
  `seguidos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CodigoUsu` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CorFonte` int(11) DEFAULT NULL,
  `TamanhoFonte` int(11) DEFAULT NULL,
  `TipoFonte` int(11) DEFAULT NULL,
  `TipoVoz` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricaoPerfil` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CodigoUsu`, `nome`, `CorFonte`, `TamanhoFonte`, `TipoFonte`, `TipoVoz`, `email`, `senha`, `foto`, `descricaoPerfil`) VALUES
(5, 'Jonathan Rodriguez', NULL, NULL, NULL, NULL, 'jrodriguez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '61dc98273d57b.jpg', NULL),
(6, 'Jean Pedro Bremer Pissineli', NULL, NULL, NULL, NULL, 'jpbpissineli05@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '61deeb585ddd2.jpg', NULL),
(7, 'Jose Vitor Williams Wotzasek', NULL, NULL, NULL, NULL, 'josevww@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '61e1ddace8450.jpeg', 'Um cara gente fina'),
(8, 'Giovanna Ferreira Fiorio', NULL, NULL, NULL, NULL, 'ggiovannaffiorio@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '61e60d2ddf458.jpg', 'uma menina bacana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`CodReceita`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CodigoUsu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receita`
--
ALTER TABLE `receita`
  MODIFY `CodReceita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CodigoUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
