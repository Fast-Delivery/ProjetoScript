-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Set-2022 às 19:35
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cheklist_db`
--

CREATE TABLE `cheklist_db` (
  `Id_checklist` int(11) NOT NULL,
  `Nome_checklist` varchar(50) NOT NULL,
  `Sistema_checklist` varchar(50) NOT NULL,
  `Procedimento_checklist` text NOT NULL,
  `Sequencia_checklist` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cheklist_db`
--

INSERT INTO `cheklist_db` (`Id_checklist`, `Nome_checklist`, `Sistema_checklist`, `Procedimento_checklist`, `Sequencia_checklist`) VALUES
(1, 'SEM CONEXÃO', 'SGPI', 'Acessar o SGPI com seu login e senha', '1'),
(2, 'SEM CONEXÃO', 'SGPI', 'Servidor MK (Localizar o Usuário e Clicar)', '2'),
(3, 'SEM CONEXÃO', 'SGPI', 'Procurar o cliente', '3'),
(4, 'SEM CONEXÃO', 'SGPI', 'Clicar no Usário ', '4'),
(5, 'SEM CONEXÃO', 'SGPI', 'Clique na ONU para verificar o sinal)', '5'),
(6, 'SEM CONEXÃO', 'ASSINANTE', 'Verificar o Cordão óptico com Led Vermelho(ONU a PTO)', '6'),
(7, 'SEM CONEXÃO', 'COR', 'O.S.', '7'),
(8, 'LENTIDÃO', 'Assinante', 'Reiniciar o roteaor', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `nivel_de_acesso` varchar(250) NOT NULL,
  `status_grupo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_cheklist`
--

CREATE TABLE `grupo_cheklist` (
  `nome_grupo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupo_cheklist`
--

INSERT INTO `grupo_cheklist` (`nome_grupo`) VALUES
('LENTIDÃO'),
('SEM CONEXÃO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel_de_acesso` varchar(250) NOT NULL,
  `nivel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Índices para tabela `cheklist_db`
--
ALTER TABLE `cheklist_db`
  ADD PRIMARY KEY (`Id_checklist`),
  ADD KEY `fk_nome` (`Nome_checklist`);

--
-- Índices para tabela `grupo_cheklist`
--
ALTER TABLE `grupo_cheklist`
  ADD PRIMARY KEY (`nome_grupo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bd_usuario`
--
ALTER TABLE `bd_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cheklist_db`
--
ALTER TABLE `cheklist_db`
  MODIFY `Id_checklist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cheklist_db`
--
ALTER TABLE `cheklist_db`
  ADD CONSTRAINT `fk_nome` FOREIGN KEY (`Nome_checklist`) REFERENCES `grupo_cheklist` (`nome_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
