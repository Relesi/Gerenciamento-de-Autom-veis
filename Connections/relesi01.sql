-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 30/06/2016 às 20:00
-- Versão do servidor: 10.0.17-MariaDB
-- Versão do PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `relesi01`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_manutencao`
--

CREATE TABLE `cadastro_manutencao` (
  `titulo` text NOT NULL,
  `descricao` text NOT NULL,
  `que_executou` text NOT NULL,
  `data_servico` date NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_veiculo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_user`
--

CREATE TABLE `cadastro_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(242) NOT NULL,
  `email` varchar(242) NOT NULL,
  `senha` varchar(242) NOT NULL,
  `chave_recuperar_senha` text NOT NULL,
  `apelido` varchar(242) NOT NULL,
  `cpf` varchar(242) NOT NULL,
  `nasc` varchar(242) NOT NULL,
  `end` varchar(242) NOT NULL,
  `num` varchar(242) NOT NULL,
  `comp` varchar(242) NOT NULL,
  `bairro` varchar(242) NOT NULL,
  `cidade` varchar(242) NOT NULL,
  `estado` varchar(242) NOT NULL,
  `pais` varchar(242) NOT NULL,
  `cep` varchar(242) NOT NULL,
  `telefone` varchar(242) NOT NULL,
  `celular` varchar(242) NOT NULL,
  `administrador` int(1) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cadastro_user`
--

INSERT INTO `cadastro_user` (`id`, `nome`, `email`, `senha`, `chave_recuperar_senha`, `apelido`, `cpf`, `nasc`, `end`, `num`, `comp`, `bairro`, `cidade`, `estado`, `pais`, `cep`, `telefone`, `celular`, `administrador`, `date`, `time`) VALUES
(1, 'Renato Lessa da Silva', 'renatolessa.2011@hotmail.com', '1001', '', 'Renato', 'CPF 24352345243', '01/01/1980', 'Rua asdfasdf asdf adsfasdf', '1435125', 'Apto 26 - Bloco A', 'Fsdfghsdf sdf gsdfg sdfg sfdg ', 'SÃ£o Paulo', 'SÃ£o Paulo', 'Brasil', '2345245', '23452345', '24352345243', 1, '2014-11-16', '20:40:20'),
(2, 'Ednilson Nery', 'desbravadornery@gmail.com', 'c9d9a47300cb8eac365e15e3c59b7da58ab091cf', '', 'Nery', '234562345234527', '3452345777', 'sdfghsdfgsdf', '3456777', 'sdfghsdfgsdfg777', 'gsdfgsdfgsdfg777', 'SÃ£o Paulo', 'SÃ£o Paulo', 'Brasil', '23452345777', '23452345777', '23452345234777', 1, '2014-11-16', '20:57:34'),
(3, 'Ednilson', 'desbravadornery@hotmail.com', 'c9d9a47300cb8eac365e15e3c59b7da58ab091cf', '', 'Nery', '214352345245', '2345245245', 'fdghsfdgh', '23456234', 'sfdghsdfghsfd', 'sdfgsdfg', 'SÃ£o Paulo', 'SÃ£o Paulo', 'Brasil', '24562456s', '243523452345', '234523452345243', 0, '2014-11-17', '13:35:18'),
(4, '', 'robson.tecnologia@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2014-11-17', '20:17:25'),
(5, '', 'relesi@bol.com.br', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2014-11-18', '20:01:04'),
(6, '', 'eduardoflc@chaves.com.br', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2014-11-20', '16:29:58'),
(7, 'dfgsdfgs', 'desbravadornery@gmail.com2', 'c9d9a47300cb8eac365e15e3c59b7da58ab091cf', '', 'dfgsdfgs', 'dfgsdfgs', 'dfgsdfg', 'sdfgsdfg', '3456777', 'sdfghsdfgsdfg777', 'gsdfgsdfgsdfg777', 'SÃ£o Paulo', 'SÃ£o Paulo', 'Brasil', 'sdfgsdfg', 'sdfgsdfg', 'sdfgsdfg', 0, '2014-11-22', '01:53:46'),
(8, '', 'renato@rubim.com.br', '8cb2237d0679ca88db6464eac60da96345513964', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2014-11-24', '08:14:11'),
(9, '', 'rerier@fforif.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2014-11-24', '08:15:52'),
(10, '', 'joaa@joia.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2014-11-24', '10:35:10'),
(11, '', 'nery', 'e5380c31e100cc5c8f52efe9fe42231175e33949', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2015-11-12', '16:35:50'),
(12, 'renato', 'hendix.page@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '29503641870', '6', 'mjxgfjkfjkvo', '1515', 'gjmgj', 'gmkgjgft', 'jdjdjd', 'jkf66666666767676767676', 'jfj', '000000', '', '', 1, '2015-11-12', '16:50:56'),
(13, '', 'contato@relesi.com.br', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2015-11-22', '11:14:09'),
(14, '', 'docsystem@dosystem.com.br', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2015-12-18', '16:03:44'),
(15, 'robson alves dos santos', 'robbson1412@hotmail.com', '816d20a556f8d2bea2445d25f0ea17198cf0c6d9', '', '', '283.027.328-18', '14/12/1980', 'robert bird', '137', '', 'JD INGAI', 'SÃ£o Paulo', 'SP', 'brasil', '04467060', '1156141298', '1156141298', 0, '2016-02-11', '20:05:16'),
(16, 'renato', 'renato@teste.com.br', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'relesi', '11111123232323', '1212121', 'ewewe', '4344', '4343', 'rdfdf', 'errerw', 'rwere', 'rwrwer', '434343', '232434343493', '111111111111', 0, '2016-03-10', '22:45:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_veiculo`
--

CREATE TABLE `cadastro_veiculo` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `renavam` varchar(50) NOT NULL,
  `marca` varchar(242) NOT NULL,
  `modelo` varchar(242) NOT NULL,
  `cor` varchar(242) NOT NULL,
  `combustivel` varchar(242) NOT NULL,
  `ano_fab` varchar(10) NOT NULL,
  `ano_mod` varchar(10) NOT NULL,
  `imagem` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cadastro_veiculo`
--

INSERT INTO `cadastro_veiculo` (`id`, `id_user`, `placa`, `renavam`, `marca`, `modelo`, `cor`, `combustivel`, `ano_fab`, `ano_mod`, `imagem`, `date`, `time`) VALUES
(3, 1, 'BBB 1564', '15441144411', 'Camaro', 'Chevrolet', 'Amarelo', 'FlÃ©x', '2010', '2010', 'ab27a240c499756700a9776cb9970e36_-8506623496.png', '2014-11-17', '13:55:59'),
(4, 2, 'ABC2635', '123451435143534', 'Chevrolet', 'Opala Comodoro', 'Preta', 'Gasolina', '1990', '1991', '66b2ffcdc2e6fbc48aafebf3da8e4e3d_-8938081956.jpg', '2014-11-17', '13:56:58'),
(5, 4, 'teste', '', '', '', '', '', '', '', '', '2014-11-17', '20:18:34'),
(8, 5, '154', '154', 'ldldl', 'ldldl''', 'dldld''', 'dldld', '154', '154', '', '2014-11-18', '20:02:38'),
(10, 2, 'DEF5688', '65436543657658', 'MERCEDES-BENZ', 'KJHGKJ', 'PRATA', 'FLEX', '2014', '2014', 'e69678c1cf1e919d8a48149b686e2695_336123452.jpg', '2014-11-19', '13:13:50'),
(11, 1, 'CGM 123499', '3293913919131', 'Wolksvagem', 'Fusca', 'Vermelho', 'Gasolina', '1976', '1970', 'd81cb29625a50b8b2be31c2d8e378c3a_185753280.jpg', '2014-11-19', '16:15:33'),
(12, 6, 'edu0210', '0123456789', 'Mitsubishi ', 'Launcher Evo', 'Prata', 'Ãlcool', '2013', '3015', '', '2014-11-20', '16:33:00'),
(14, 2, 'KHJ8856', '65436543657658', 'FIAT', 'UNO', 'VERMELHO', 'FLEX', '2012', '2013', '7598b55f1e325450b990c4208bb5948f_-4555212358.jpg', '2014-11-20', '23:38:45'),
(16, 2, 'PKJ9643', '97483567', 'Chevrolet', 'Camaro', 'amarelo', 'flex', '2014', '2015', '92fe99d036af3e1c050e0feccfae0829_-3345518031.jpg', '2014-11-21', '17:45:31'),
(19, 10, '3434343', '434343', '334343', '43434', '43434', '343434', '434343', '34343', '767e0942b575f867891a99763a071945_-9141765192.png', '2014-11-24', '10:35:39'),
(20, 11, 'w', 'w', 'w', 'w', 'w', 'w', 'w', 'w', '', '2015-11-12', '16:36:39'),
(22, 12, '12345', '1', 'ssssssssssssssss', 'ss', 'ss', 'ss', '11', '45', '3e1858916e95c5f8aaf15e075706df50_-8960852549.jpg', '2015-11-21', '20:39:49'),
(23, 12, '8675676576', '5', '565756765756767657657657657567567657567657657', '5', '566666677777776666666666', '5', '5', '89', '', '2015-11-21', '21:02:59'),
(24, 13, '11111', '1', 'dw', '12', 'SWQ', 'EQWE', '11', '11', '', '2015-11-22', '11:15:30'),
(25, 12, '<br /><b>N', '<br /><b>Notice</b>:  Undefined variable: incluirR', '<br /><b>Notice</b>:  Undefined variable: incluirMarca in <b>/opt/lampp/htdocs/adminauto/MeusVeiculos.php</b> on line <b>149</b><br />', '<br /><b>Notice</b>:  Undefined variable: incluirModelo in <b>/opt/lampp/htdocs/adminauto/MeusVeiculos.php</b> on line <b>153</b><br />', '<br /><b>Notice</b>:  Undefined variable: incluirCor in <b>/opt/lampp/htdocs/adminauto/MeusVeiculos.php</b> on line <b>157</b><br />', '<br /><b>Notice</b>:  Undefined variable: incluirCombustivel in <b>/opt/lampp/htdocs/adminauto/MeusVeiculos.php</b> on line <b>161</b><br />', '<br /><b>N', '<br /><b>N', '', '2016-03-10', '22:43:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `listar_manutencao`
--

CREATE TABLE `listar_manutencao` (
  `titulo` text NOT NULL,
  `descricao` text NOT NULL,
  `quem_executou` text NOT NULL,
  `data_servico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `nome` varchar(242) NOT NULL,
  `login` varchar(242) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `chave_recuperar_senha` text NOT NULL,
  `nivel` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `date_atual` date NOT NULL,
  `time_atual` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `iduser` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cadastro_user`
--
ALTER TABLE `cadastro_user`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cadastro_veiculo`
--
ALTER TABLE `cadastro_veiculo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_user`
--
ALTER TABLE `cadastro_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `cadastro_veiculo`
--
ALTER TABLE `cadastro_veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
