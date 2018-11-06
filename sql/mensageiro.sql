-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Nov-2018 às 18:05
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nome` text COLLATE latin1_general_ci NOT NULL,
  `senha` text COLLATE latin1_general_ci NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `senha`, `email`) VALUES
(1, 'admin', 'cc03e747a6afbbcbf8be7668acfebee5', 'admin@admin.com');

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
(12, 0, 5),
(13, 0, 1),
(14, 4, 3),
(15, 1, 15),
(39, 2, 18),
(40, 2, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disc` int(11) NOT NULL,
  `nome_disc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disc`, `nome_disc`) VALUES
(1, 'Disciplina I'),
(4, 'Disciplina II');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `id_conversa` int(11) NOT NULL,
  `usuario_envio` int(11) NOT NULL,
  `usuario_destino` int(11) NOT NULL,
  `mensagens` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lida` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `id_conversa`, `usuario_envio`, `usuario_destino`, `mensagens`, `timestamp`, `lida`) VALUES
(1, 1, 2, 1, 'a', '2018-05-07 22:04:04', 1),
(2, 1, 2, 1, 'b', '2018-05-07 22:04:04', 1),
(3, 1, 1, 2, 'j', '2018-05-07 22:04:04', 1),
(4, 1, 1, 2, 'aaa', '2018-05-07 22:04:04', 1),
(5, 1, 1, 2, 'pppp', '2018-05-07 22:04:04', 1),
(6, 1, 1, 2, 'aaaa', '2018-05-07 22:04:04', 1),
(7, 1, 1, 2, 'ooooooo', '2018-05-07 22:04:04', 1),
(8, 1, 1, 2, 'lllllllll', '2018-05-07 22:04:04', 1),
(9, 1, 1, 2, 'aaaaaaaa', '2018-05-07 22:04:04', 1),
(10, 1, 1, 2, 'kkkkkk', '2018-05-07 22:04:04', 1),
(11, 1, 1, 2, 'tetet', '2018-05-07 22:04:04', 1),
(12, 1, 1, 2, 'oloco bichow', '2018-05-07 22:04:04', 1),
(13, 1, 1, 2, 'aaihs', '2018-05-07 22:04:04', 1),
(14, 1, 1, 2, 'aaa', '2018-05-07 22:04:04', 1),
(15, 1, 1, 2, 'ooo', '2018-05-07 22:04:04', 1),
(16, 1, 1, 2, 'aaaaa', '2018-05-07 22:04:04', 1),
(17, 1, 1, 2, 'opa', '2018-05-07 22:04:04', 1),
(18, 1, 1, 2, 'coÃ©', '2018-05-07 22:04:04', 1),
(19, 1, 2, 1, 'opa', '2018-05-07 22:04:04', 1),
(20, 1, 2, 1, 'fala manin blz', '2018-05-07 22:04:04', 1),
(21, 1, 2, 1, 'uehehueh', '2018-05-07 22:04:04', 1),
(22, 1, 2, 1, 'ola', '2018-05-07 22:04:04', 1),
(23, 1, 1, 2, 'coÃ©', '2018-05-07 22:04:04', 1),
(24, 1, 2, 1, 'opa', '2018-05-07 22:04:04', 1),
(25, 1, 1, 2, 'opa', '2018-05-07 22:04:04', 1),
(26, 1, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-05-07 22:04:04', 1),
(27, 1, 2, 1, 'Hello', '2018-05-07 22:04:04', 1),
(28, 1, 1, 2, 'Fala alemÃ£o', '2018-05-07 22:04:04', 1),
(29, 1, 1, 2, 'Tudo top?', '2018-05-07 22:04:04', 1),
(30, 1, 1, 2, 'aaa', '2018-05-07 22:04:04', 1),
(31, 1, 1, 2, 'OlÃ¡', '2018-05-07 22:09:30', 1),
(32, 1, 1, 2, 'Teste', '2018-05-07 22:20:28', 1),
(33, 1, 1, 2, 'a', '2018-05-07 22:30:01', 1),
(34, 1, 1, 2, 'aaa', '2018-05-07 22:33:55', 1),
(35, 1, 2, 1, 'Opa', '2018-05-07 22:48:46', 1),
(36, 1, 2, 1, 'Teste', '2018-05-07 23:01:01', 1),
(37, 1, 2, 1, 'Teste', '2018-05-08 23:41:56', 1),
(38, 1, 1, 2, 'kkkkk', '2018-05-09 22:30:32', 1),
(39, 1, 2, 1, 'OlÃ¡ Aluno, boa noite', '2018-05-13 23:04:10', 1),
(40, 1, 2, 1, 'Teste', '2018-05-13 23:04:49', 1),
(41, 1, 1, 2, 'Teste de mensagem', '2018-05-13 23:43:32', 1),
(42, 1, 1, 2, 'teste', '2018-05-13 23:47:00', 1),
(43, 1, 1, 2, 'Teste de envio', '2018-05-13 23:52:38', 1),
(44, 1, 1, 2, 'Teste', '2018-05-13 23:54:34', 1),
(45, 1, 1, 2, 'TESTE', '2018-05-14 00:03:17', 1),
(46, 1, 1, 2, 'teste', '2018-05-14 00:05:10', 1),
(47, 1, 2, 1, 'OlÃ¡', '2018-05-14 00:14:42', 1),
(48, 1, 1, 2, 'OlÃ¡', '2018-05-14 00:16:41', 1),
(49, 1, 2, 1, 'OlÃ¡', '2018-05-14 00:19:19', 1),
(50, 1, 2, 1, 'OlÃ¡', '2018-05-14 00:33:58', 1),
(51, 1, 1, 2, '123', '2018-05-14 01:00:02', 1),
(52, 1, 2, 1, 'Teste', '2018-05-14 21:25:48', 1),
(53, 1, 2, 1, 'OlÃ¡', '2018-05-16 18:52:34', 1),
(54, 1, 2, 1, 'QualÃ©', '2018-05-16 21:42:57', 1),
(55, 1, 2, 1, 'qual foi', '2018-05-16 21:43:27', 1),
(56, 1, 2, 1, 'Opa', '2018-05-16 21:43:42', 1),
(57, 1, 1, 2, 'aaaaaa', '2018-05-16 21:58:18', 1),
(58, 1, 1, 2, 'Qual Ã© professor', '2018-05-16 22:08:56', 1),
(59, 1, 1, 2, 'Qual queÃ© a tua', '2018-05-16 22:13:34', 1),
(60, 1, 2, 1, 'Qual Ã©', '2018-05-16 23:18:11', 1),
(61, 1, 2, 1, 'bah qual q deu', '2018-05-16 23:18:28', 1),
(62, 1, 1, 2, 'OlÃ¡', '2018-05-17 22:26:11', 1),
(63, 1, 1, 2, 'Testando', '2018-06-01 18:39:29', 1),
(64, 10, 2, 3, 'OlÃ¡ Aluno1, boa noite', '2018-06-02 00:16:18', 1),
(65, 1, 1, 2, 'OlÃ¡', '2018-06-06 19:44:53', 1),
(66, 1, 1, 2, 'Teste', '2018-07-28 00:41:01', 1),
(67, 1, 2, 1, 'Opa, boa noite', '2018-08-30 23:01:01', 1),
(68, 1, 2, 1, 'olÃ¡', '2018-10-01 20:04:59', 1),
(108, 30, 2, 1, 'teste', '2018-10-06 17:28:57', 1),
(109, 10, 2, 3, 'teste', '2018-10-06 17:28:57', 1),
(110, 17, 2, 18, 'teste', '2018-10-06 17:28:57', 1),
(111, 18, 2, 19, 'teste', '2018-10-06 17:28:57', 1),
(117, 37, 2, 1, 'teste', '2018-10-08 23:20:20', 1),
(118, 1, 2, 1, 'teste', '2018-10-09 00:34:58', 1),
(119, 10, 2, 3, 'teste', '2018-10-09 00:34:58', 1),
(120, 39, 2, 18, 'teste', '2018-10-09 00:34:58', 1),
(121, 40, 2, 19, 'teste', '2018-10-09 00:34:58', 1),
(122, 1, 2, 1, 'Boa noite a todos,\r\nNÃ£o comparecerei a aula de hoje devido a motivos pessoais', '2018-10-25 01:18:50', 1),
(123, 10, 2, 3, 'Boa noite a todos,\r\nNÃ£o comparecerei a aula de hoje devido a motivos pessoais', '2018-10-25 01:18:50', 1),
(124, 39, 2, 18, 'Boa noite a todos,\r\nNÃ£o comparecerei a aula de hoje devido a motivos pessoais', '2018-10-25 01:18:50', 1),
(125, 40, 2, 19, 'Boa noite a todos,\r\nNÃ£o comparecerei a aula de hoje devido a motivos pessoais', '2018-10-25 01:18:50', 1),
(126, 1, 1, 2, 'pppppp', '2018-10-26 23:06:37', 1),
(127, 1, 2, 1, 'iuuuuyy', '2018-10-26 23:08:25', 1),
(128, 10, 2, 3, 'iuuuuyy', '2018-10-26 23:08:25', 1),
(129, 39, 2, 18, 'iuuuuyy', '2018-10-26 23:08:25', 1),
(130, 40, 2, 19, 'iuuuuyy', '2018-10-26 23:08:25', 0),
(131, 1, 2, 1, 'teste', '2018-11-02 20:20:06', 1),
(132, 10, 2, 3, 'teste', '2018-11-02 20:20:06', 1),
(133, 39, 2, 18, 'teste', '2018-11-02 20:20:06', 1),
(134, 40, 2, 19, 'teste', '2018-11-02 20:20:06', 0),
(135, 1, 2, 1, 'teste', '2018-11-02 20:20:15', 1),
(136, 10, 2, 3, 'teste', '2018-11-02 20:20:15', 1),
(137, 39, 2, 18, 'teste', '2018-11-02 20:20:15', 1),
(138, 40, 2, 19, 'teste', '2018-11-02 20:20:15', 0),
(139, 1, 2, 1, 'aa', '2018-11-02 20:20:53', 1),
(140, 1, 2, 1, 'aa', '2018-11-02 20:20:53', 1),
(141, 10, 2, 3, 'aa', '2018-11-02 20:20:53', 1),
(142, 39, 2, 18, 'aa', '2018-11-02 20:20:53', 1),
(143, 40, 2, 19, 'aa', '2018-11-02 20:20:53', 0),
(144, 1, 2, 1, 'teste', '2018-11-02 20:24:18', 1),
(145, 1, 2, 1, 'aaa', '2018-11-02 20:40:22', 1),
(146, 1, 2, 1, 'aaa', '2018-11-02 20:40:22', 1),
(147, 10, 2, 3, 'aaa', '2018-11-02 20:40:22', 1),
(148, 0, 1, 1, 'teste', '2018-11-02 20:40:40', 1),
(149, 2, 1, 3, 'teste', '2018-11-02 20:40:40', 1),
(150, 0, 1, 1, 'teste', '2018-11-02 20:42:12', 1),
(151, 2, 1, 3, 'teste', '2018-11-02 20:42:12', 1),
(152, 1, 2, 1, 'teste', '2018-11-02 20:44:29', 1),
(153, 1, 2, 1, 'testando', '2018-11-02 20:44:57', 1),
(154, 1, 2, 1, 'testando', '2018-11-02 20:44:57', 1),
(155, 10, 2, 3, 'testando', '2018-11-02 20:44:57', 1),
(156, 1, 2, 1, 'interaÃ§Ã£o nova', '2018-11-02 20:45:20', 1),
(157, 1, 2, 1, 'interaÃ§Ã£o nova', '2018-11-02 20:45:20', 1),
(158, 10, 2, 3, 'interaÃ§Ã£o nova', '2018-11-02 20:45:20', 1),
(159, 1, 2, 1, 'teste 1', '2018-11-02 20:46:22', 1),
(160, 1, 2, 1, 'teste 1', '2018-11-02 20:46:22', 1),
(161, 10, 2, 3, 'teste 1', '2018-11-02 20:46:22', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `senha` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `num_matricula` text NOT NULL,
  `email` text NOT NULL,
  `professor` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `status`, `num_matricula`, `email`, `professor`) VALUES
(1, 'Aluno', 'cc03e747a6afbbcbf8be7668acfebee5', 0, '11223344', 'aluno@aluno.com', 0),
(2, 'Professor', 'cc03e747a6afbbcbf8be7668acfebee5', 0, '22334455', 'prof@prof.com', 1),
(15, 'Professor2', 'cc03e747a6afbbcbf8be7668acfebee5', 0, '1233444', 'prof2@prof2.com', 1),
(20, 'Aluno1', 'cc03e747a6afbbcbf8be7668acfebee5', 0, '1233444', 'aluno1@aluno1.com', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_has_disciplina`
--

CREATE TABLE `usuarios_has_disciplina` (
  `usuarios_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_has_disciplina`
--

INSERT INTO `usuarios_has_disciplina` (`usuarios_id`, `disciplina_id`) VALUES
(1, 1),
(20, 1),
(20, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversas`
--
ALTER TABLE `conversas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disc`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_conversa` (`id_conversa`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_has_disciplina`
--
ALTER TABLE `usuarios_has_disciplina`
  ADD PRIMARY KEY (`usuarios_id`,`disciplina_id`),
  ADD KEY `fk_usuarios_has_disciplina_disciplina1_idx` (`disciplina_id`),
  ADD KEY `fk_usuarios_has_disciplina_usuarios1_idx` (`usuarios_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conversas`
--
ALTER TABLE `conversas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuarios_has_disciplina`
--
ALTER TABLE `usuarios_has_disciplina`
  ADD CONSTRAINT `fk_usuarios_has_disciplina_disciplina1` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id_disc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios_has_disciplina_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
