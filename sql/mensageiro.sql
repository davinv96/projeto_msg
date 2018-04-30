-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Abr-2018 às 14:14
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mensageiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversas`
--

CREATE TABLE `conversas` (
  `id` int(11) NOT NULL,
  `usuario1` int(11) NOT NULL,
  `usuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conversas`
--

INSERT INTO `conversas` (`id`, `usuario1`, `usuario2`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 6, 2),
(7, 6, 3),
(8, 6, 4),
(9, 6, 5),
(10, 2, 3),
(11, 2, 4),
(12, 0, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `id_conversa` int(11) NOT NULL,
  `usuario_envio` int(11) NOT NULL,
  `usuario_destino` int(11) NOT NULL,
  `mensagens` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `id_conversa`, `usuario_envio`, `usuario_destino`, `mensagens`) VALUES
(1, 1, 2, 1, 'a'),
(2, 1, 2, 1, 'b'),
(3, 1, 1, 2, 'j'),
(4, 1, 1, 2, 'aaa'),
(5, 1, 1, 2, 'pppp'),
(6, 1, 1, 2, 'aaaa'),
(7, 1, 1, 2, 'ooooooo'),
(8, 1, 1, 2, 'lllllllll'),
(9, 1, 1, 2, 'aaaaaaaa'),
(10, 1, 1, 2, 'kkkkkk'),
(11, 1, 1, 2, 'tetet'),
(12, 1, 1, 2, 'oloco bichow'),
(13, 1, 1, 2, 'aaihs'),
(14, 1, 1, 2, 'aaa'),
(15, 1, 1, 2, 'ooo'),
(16, 1, 1, 2, 'aaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
(1, 'Aluno', 'cc03e747a6afbbcbf8be7668acfebee5'),
(2, 'Professor', 'cc03e747a6afbbcbf8be7668acfebee5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversas`
--
ALTER TABLE `conversas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversas`
--
ALTER TABLE `conversas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
