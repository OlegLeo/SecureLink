-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Out-2022 às 23:45
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exemplophp3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `camera`
--

CREATE TABLE `camera` (
  `id` int(11) NOT NULL,
  `activity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `camera`
--

INSERT INTO `camera` (`id`, `activity`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoutilizador`
--

CREATE TABLE `tipoutilizador` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipoutilizador`
--

INSERT INTO `tipoutilizador` (`id`, `descricao`) VALUES
(1, 'administrador'),
(2, 'user normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_tipoUtilizador` int(11) DEFAULT NULL,
  `id_camera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id`, `username`, `password`, `foto`, `email`, `id_tipoUtilizador`, `id_camera`) VALUES
(1, 'admin', '$2y$10$lHzvD093e.LChlY9RnizaOW/LqGkyO2y4dRzZoVYezTIkIZPxgBia', NULL, 'ethicalhackingtest123@gmail.com', 1, 1),
(60, '123', '$2y$10$PGNrAPtkDSPWRtug5sKwie1JpSgqDoTvuo7nmgxjp3W4kraWQ0mNy', NULL, 'oleg_leonidov@hotmail.com', 2, 2),
(62, 'aaa', '$2y$10$JlE3CrxiDIXqMffdFZlPbe2udxmraxKFLXzuvO8GAeaGmF/i9TC/6', NULL, NULL, 2, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_tipoUtilizador` (`id_tipoUtilizador`),
  ADD KEY `id_camera` (`id_camera`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `camera`
--
ALTER TABLE `camera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`id_tipoUtilizador`) REFERENCES `tipoutilizador` (`id`),
  ADD CONSTRAINT `utilizador_ibfk_2` FOREIGN KEY (`id_camera`) REFERENCES `camera` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
