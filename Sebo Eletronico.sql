-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jul 11, 2013 as 05:00 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sebo eletronico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `id_livro` int(64) NOT NULL AUTO_INCREMENT,
  `id_dono` int(64) DEFAULT NULL,
  `titulo_livro` varchar(64) DEFAULT NULL,
  `editora` varchar(64) DEFAULT NULL,
  `autor` varchar(64) DEFAULT NULL,
  `edicao` int(64) DEFAULT NULL,
  `genero` varchar(64) DEFAULT NULL,
  `estado_conserv` varchar(64) DEFAULT NULL,
  `venda` varchar(45) NOT NULL,
  `troca` varchar(45) NOT NULL,
  PRIMARY KEY (`id_livro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela Relacionada ao Livro' AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `livro`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `senha`
--

CREATE TABLE IF NOT EXISTS `senha` (
  `id_senha` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_senha` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_senha`),
  UNIQUE KEY `id_senha` (`id_senha`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `senha`
--

INSERT INTO `senha` (`id_senha`, `codigo_senha`) VALUES
(5, 121212),
(6, 121212);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador do Usuario',
  `nome_usuario` varchar(64) DEFAULT NULL COMMENT 'Nome do Usuario',
  `senha_usuario` varchar(64) DEFAULT NULL COMMENT 'Senha do Usuario',
  `telefone_usuario` int(64) DEFAULT NULL COMMENT 'Telefone do Usuario',
  `email_usuario` varchar(64) DEFAULT NULL COMMENT 'Email do Usuario',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`),
  KEY `nome_usuario` (`nome_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tabela Relacionada ao Usuario' AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `senha_usuario`, `telefone_usuario`, `email_usuario`) VALUES
(4, 'MacÃ¡rio Cruz', '5', 81322019, 'macario.junior@gmail.com'),
(5, 'joao', '5', 82235587, 'joao@hot.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
