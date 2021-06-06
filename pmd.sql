-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Mar-2021 às 22:09
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pmd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms`
--

DROP TABLE IF EXISTS `adms`;
CREATE TABLE IF NOT EXISTS `adms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `palavra_passe` varchar(32) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adms`
--

INSERT INTO `adms` (`id`, `palavra_passe`, `senha`, `nome`) VALUES
(15, 'Imperador', '123456', 'Adriano'),
(14, 'Teste', '123456', 'Fernando Lisboa'),
(12, 'intel', '123456', 'Fernando Beira-Mar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_geral`
--

DROP TABLE IF EXISTS `adm_geral`;
CREATE TABLE IF NOT EXISTS `adm_geral` (
  `senha` int(8) NOT NULL,
  PRIMARY KEY (`senha`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adm_geral`
--

INSERT INTO `adm_geral` (`senha`) VALUES
(12345678);

-- --------------------------------------------------------

--
-- Estrutura da tabela `insc_ctt`
--

DROP TABLE IF EXISTS `insc_ctt`;
CREATE TABLE IF NOT EXISTS `insc_ctt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(128) NOT NULL,
  `mensagem` varchar(512) NOT NULL,
  `email` varchar(64) NOT NULL,
  `data` varchar(10) NOT NULL,
  `verificado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `insc_ctt`
--

INSERT INTO `insc_ctt` (`id`, `assunto`, `mensagem`, `email`, `data`, `verificado`) VALUES
(3, 'Preciso que administrem minhas redes sociais', 'Tenho um canal de DOTA com 14 mil inscritos no YouTube e 3 mil seguidores na Twitch. Gostaria de saber como o Projeto Midia poderia me ajudar.', 'leovasc5@hotmail.com', '2021-03-20', 1),
(4, 'Gostaria de criar um canal', 'Quero criar um canal pra poder ter inscritos e acessos di&aacute;rios etc...', 'meuemail@email.com', '2021-03-20', 1),
(6, 'Aaaaa', 'Tenho um canal de DOTA com 14 mil inscritos no YouTube e 3 mil seguidores na Twitch. Gostaria de saber como o Projeto Midia poderia me ajudar.', 'leovasc5@hotmail.com', '2021-03-20', 1),
(8, 'Parceria', 'Tenho um canal sobre administra&ccedil;&atilde;o e gostaria que voc&ecirc;s me ajudassem a impulsion&aacute;-lo!', 'leovasc5@hotmail.com', '2021-03-22', 0),
(7, 'Canal de Fifa', 'Ol&aacute;, tenho um canal e gostaria de ajuda', 'meuemail@email.com', '2021-03-21', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `insc_tc`
--

DROP TABLE IF EXISTS `insc_tc`;
CREATE TABLE IF NOT EXISTS `insc_tc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `idade` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `cidade` varchar(64) NOT NULL,
  `genero` varchar(32) NOT NULL,
  `area_de_atuacao` varchar(64) NOT NULL,
  `voce` varchar(264) NOT NULL,
  `data` varchar(10) NOT NULL,
  `verificado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `insc_tc`
--

INSERT INTO `insc_tc` (`id`, `nome`, `idade`, `email`, `cidade`, `genero`, `area_de_atuacao`, `voce`, `data`, `verificado`) VALUES
(20, 'Leonardo Vasconcelos Paulino', 17, 'leovasc5@hotmail.com', 'Osasco - SP', 'Masculino', 'Programador', 'Fazendo s&oacute; pra testar mesmo', '2021-03-20', 0),
(21, 'Leonardo Vasconcelos Paulino', 17, 'leovasc5@hotmail.com', 'Osasco - SP', 'Masculino', 'Programador', 'Sou eu', '2021-03-20', 0),
(23, 'Leonardo Vasconcelos Paulino', 24, 'meuemail@email.com', 'Osasco - SP', 'Masculino', 'Editor de v&iacute;deo', 'BBBBBBBBBB', '2021-03-20', 1),
(24, 'Juliano Fernando', 20, 'meuemail@email.com', 'Osasco - SP', 'Masculino', 'Editor de v&iacute;deo', 'Tenho experi&ecirc;ncia em edi&ccedil;&atilde;o.', '2021-03-21', 1),
(25, 'Leonardo Vasconcelos Paulino', 17, 'leovasc5@hotmail.com', 'Osasco - SP', 'Masculino', 'Programador', 'Fazendo s&oacute; pra testar mesmo', '2021-03-22', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
