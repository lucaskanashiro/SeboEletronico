-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jul 07, 2013 as 02:20 PM
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `Sebo Eletronico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `id_livro` int(64) NOT NULL AUTO_INCREMENT,
  `id_comprador` int(64) DEFAULT NULL,
  `titulo_livro` varchar(64) DEFAULT NULL,
  `editora` varchar(64) DEFAULT NULL,
  `autor` varchar(64) DEFAULT NULL,
  `edicao` int(64) DEFAULT NULL,
  `genero` varchar(64) DEFAULT NULL,
  `estado_conserv` varchar(64) DEFAULT NULL,
  `tipo_operacao` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_livro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabela Relacionada ao Livro' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `livro`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(64) NOT NULL AUTO_INCREMENT COMMENT 'Identificador do Usuario',
  `nome_usuario` varchar(64) DEFAULT NULL COMMENT 'Nome do Usuario',
  `senha_usuario` varchar(64) DEFAULT NULL COMMENT 'Senha do Usuario',
  `telefone_usuario` int(64) DEFAULT NULL COMMENT 'Telefone do Usuario',
  `email_usuario` varchar(64) DEFAULT NULL COMMENT 'Email do Usuario',
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabela Relacionada ao Usuario' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `usuario`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
