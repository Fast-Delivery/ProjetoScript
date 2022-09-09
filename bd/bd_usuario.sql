-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Set-2022 às 18:32
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bd_usuario`
--

CREATE TABLE `bd_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(250) NOT NULL,
  `sobrenome_usuario` varchar(250) NOT NULL,
  `email_usuario` varchar(250) NOT NULL,
  `username_usuario` varchar(250) NOT NULL,
  `senha_usuario` varchar(250) NOT NULL,
  `status_grupo` varchar(250) NOT NULL,
  `id_nivel_de_acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bd_usuario`
--

INSERT INTO `bd_usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `username_usuario`, `senha_usuario`, `status_grupo`, `id_nivel_de_acesso`) VALUES
(1, 'JEFFERSON', 'TORRES', '0', 'JEFFERSON.TORRES', 'TSESS', 'ADM', 1),
(2, 'kkkdaksd', 'adkaksd', '0', 'kda', 'sdk', 'ADM', 1),
(3, 'Jefferson', 'Torres', 'Jefferson.Torres', 'jefferson.torres@etec.sp.gov.br', 'sasa', 'ADM', 2),
(4, 'Jefferson', 'Torres', 'Jefferson.Torres', 'jefferson.torres@etec.sp.gov.br', 'sasa', 'ADM', 2),
(5, 'Jefferson', 'Torres', 'Jefferson.Torres', 'jefferson.torres@etec.sp.gov.br', 'sasa', 'ADM', 1),
(6, 'jefferson', 'torres', 'jefferson.torres', 'jefferson.torres@aonet.com.br', 'Sasa8078', 'ADM', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bd_usuario`
--
ALTER TABLE `bd_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `status_grupo` (`status_grupo`),
  ADD KEY `nivel_de_acesso` (`id_nivel_de_acesso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bd_usuario`
--
ALTER TABLE `bd_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bd_usuario`
--
ALTER TABLE `bd_usuario`
  ADD CONSTRAINT `nivel_de_acesso` FOREIGN KEY (`id_nivel_de_acesso`) REFERENCES `nivel` (`id_nivel_de_acesso`),
  ADD CONSTRAINT `status_grupo` FOREIGN KEY (`status_grupo`) REFERENCES `grupo` (`status_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
