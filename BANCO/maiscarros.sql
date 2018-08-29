-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Ago-2018 às 22:34
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maiscarros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nomeCliente` varchar(255) NOT NULL,
  `dataNascimento` date NOT NULL,
  `cpf` varchar(25) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nomeCliente`, `dataNascimento`, `cpf`, `telefone`, `email`) VALUES
(4, 'MÃ´nica', '1986-03-29', '000.222.333-12', '(61)9999-9999', 'monicamartinspb@gmail.com'),
(5, 'Wellyson Martins', '1987-11-08', '123.456.789-12', '(61)5645-4565', 'wellysonmartins@gmail.com'),
(6, 'Pedro', '1985-05-12', '232.232.456-78', '(61)7898-8956', 'pedro@gmail.com'),
(7, 'JoÃ£o da Silva', '1980-05-03', '555.999.666-12', '(61)5555-9999', 'joao@gmail.com'),
(8, 'Teste', '1987-11-08', '123456789', '123456789', 'teste@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_veiculo`
--

CREATE TABLE `entrada_veiculo` (
  `id` int(11) NOT NULL,
  `placa` varchar(22) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL,
  `data_hora_entrada` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entrada_veiculo`
--

INSERT INTO `entrada_veiculo` (`id`, `placa`, `modelo`, `cor`, `data_hora_entrada`, `id_cliente`, `id_vaga`) VALUES
(22, '654', '987', '654', '2018-08-26 17:21:54', 7, 7),
(23, 'aaa', 'aaa', 'aaa', '2018-08-26 17:33:26', 5, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisa`
--

CREATE TABLE `pesquisa` (
  `id` int(11) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `de` date NOT NULL,
  `ate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pesquisa`
--

INSERT INTO `pesquisa` (`id`, `total`, `de`, `ate`) VALUES
(1, '2409.59', '2018-06-10', '2018-08-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_hora_entrada` datetime NOT NULL,
  `data_hora_saida` datetime NOT NULL,
  `tempo` varchar(255) NOT NULL,
  `valor` decimal(18,2) NOT NULL,
  `data_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `id_cliente`, `data_hora_entrada`, `data_hora_saida`, `tempo`, `valor`, `data_registro`) VALUES
(1, 4, '2018-06-19 20:36:16', '2018-06-19 22:17:55', '1:41', '8.42', '2018-06-19'),
(2, 5, '2018-06-19 13:17:00', '2018-08-25 13:45:26', '144:28', '722.33', '2018-08-25'),
(3, 4, '2018-06-19 13:16:00', '2018-06-20 00:02:26', '10:46', '53.83', '2018-06-20'),
(4, 6, '2018-06-18 08:13:00', '2018-08-25 13:45:30', '173:32', '867.67', '2018-08-25'),
(5, 4, '2018-06-17 08:00:00', '2018-06-20 00:00:17', '16:00', '80.00', '2018-06-20'),
(6, 7, '2018-06-20 08:16:16', '2018-08-25 13:45:18', '125:29', '627.42', '2018-08-25'),
(7, 6, '2018-08-25 13:46:33', '2018-08-25 13:47:09', '0:00', '0.00', '2018-08-25'),
(8, 4, '2018-08-25 14:31:57', '2018-08-26 00:31:08', '9:59', '49.92', '2018-08-26'),
(9, 5, '2018-08-26 14:24:29', '2018-08-26 14:25:54', '0:01', '0.08', '2018-08-26'),
(10, 4, '2018-08-26 14:26:03', '2018-08-26 14:35:16', '0:09', '0.75', '2018-08-26'),
(11, 4, '2018-08-26 14:35:07', '2018-08-26 14:35:40', '0:00', '0.00', '2018-08-26'),
(12, 4, '2018-08-26 14:35:33', '2018-08-26 14:35:43', '0:00', '0.00', '2018-08-26'),
(13, 4, '2018-08-26 14:40:12', '2018-08-26 14:42:55', '0:02', '0.17', '2018-08-26'),
(14, 4, '2018-08-26 14:45:57', '2018-08-26 14:46:31', '0:00', '0.00', '2018-08-26'),
(15, 5, '2018-08-26 14:46:14', '2018-08-26 14:46:44', '0:00', '0.00', '2018-08-26'),
(16, 8, '2018-08-26 14:46:39', '2018-08-26 14:46:47', '0:00', '0.00', '2018-08-26'),
(17, 5, '2018-08-26 14:46:55', '2018-08-26 14:47:09', '0:00', '0.00', '2018-08-26'),
(18, 5, '2018-08-26 14:47:40', '2018-08-26 15:23:02', '0:35', '2.92', '2018-08-26'),
(19, 7, '2018-08-26 15:50:19', '2018-08-26 17:21:06', '1:30', '8.00', '2018-08-26'),
(20, 4, '2018-08-26 17:21:31', '2018-08-26 17:28:43', '0:07', '1.00', '2018-08-26'),
(21, 5, '2018-08-26 17:21:44', '2018-08-26 17:32:00', '0:10', '5.00', '2018-08-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(100) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`) VALUES
(2, 'Wellyson', 'admin', '202cb962ac59075b964b07152d234b70'),
(6, 'UsuÃ¡rio', 'usuario', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `valor_servico`
--

CREATE TABLE `valor_servico` (
  `id` int(11) NOT NULL,
  `valor` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `valor_servico`
--

INSERT INTO `valor_servico` (`id`, `valor`) VALUES
(1, '5.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrada_veiculo`
--
ALTER TABLE `entrada_veiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valor_servico`
--
ALTER TABLE `valor_servico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `entrada_veiculo`
--
ALTER TABLE `entrada_veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `valor_servico`
--
ALTER TABLE `valor_servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
