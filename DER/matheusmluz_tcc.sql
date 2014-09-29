-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Set 17, 2014 as 01:38 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `matheusmluz_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigoUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(30) NOT NULL,
  `sobrenomeUsuario` varchar(30) NOT NULL,
  `loginUsuario` varchar(30) NOT NULL,
  `senhaUsuario` varchar(32) NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  `acessoUsuario` varchar(1) NOT NULL,
  PRIMARY KEY (`codigoUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigoUsuario`, `nomeUsuario`, `sobrenomeUsuario`, `loginUsuario`, `senhaUsuario`, `emailUsuario`, `acessoUsuario`) VALUES
(1, 'Matheus', 'Luz', 'admin', 'f5bb0c8de146c67b44babbf4e6584cc0', 'matheusmluz@gmail.com', 'p');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
