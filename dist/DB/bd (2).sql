-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Out-2022 às 07:29
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
-- Estrutura da tabela `assinante`
--

CREATE TABLE `assinante` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf_cnpj_assinante` text NOT NULL,
  `endereco_assinante` text NOT NULL,
  `usuario_assinante` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `assinante`
--

INSERT INTO `assinante` (`id`, `nome`, `cpf_cnpj_assinante`, `endereco_assinante`, `usuario_assinante`) VALUES
(1, 'Jefferson Mariano Torres', '501.848.798-41', 'Rua: Tstumo Murakami N: 66 Centro Duartina', 'jefftorres'),
(2, 'Jefferson Mariano Torres', '501.848.798-41', 'Auleriano Aredes N: 268 Centro Duartina', '1445aa'),
(3, 'Heloisa Mariano Colette', '01.123.445/0001-02', 'Rua: Gabriel Simão N: 181 Centro Cabralia', 'aa4s55s');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentos`
--

CREATE TABLE `atendimentos` (
  `id` int(11) NOT NULL,
  `data_atendimento` text NOT NULL,
  `quantidade` int(100) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atendimentos`
--

INSERT INTO `atendimentos` (`id`, `data_atendimento`, `quantidade`, `usuario`) VALUES
(1, '0000-00-00', 0, 'jefferson.torres');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bd_rank`
--

CREATE TABLE `bd_rank` (
  `id_rank` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `qt` int(11) NOT NULL,
  `mes` text NOT NULL,
  `status_rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bd_rank`
--

INSERT INTO `bd_rank` (`id_rank`, `usuario`, `qt`, `mes`, `status_rank`) VALUES
(1, 'jefferson.torres', 0, '0', 1);

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
(1, 'Jefferson', 'Torres', 'jefferson.torres@etec.sp.gov.br', 'jefferson.torres', '0ef6497da3d0d26d1bf3bf31c1ef3254', 'ADM', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cheklist_db`
--

CREATE TABLE `cheklist_db` (
  `Id_checklist` int(11) NOT NULL,
  `Nome_checklist` varchar(50) NOT NULL,
  `Sistema_checklist` varchar(50) NOT NULL,
  `Procedimento_checklist` text NOT NULL,
  `Sequencia_checklist` text NOT NULL,
  `Img_Check` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cheklist_db`
--

INSERT INTO `cheklist_db` (`Id_checklist`, `Nome_checklist`, `Sistema_checklist`, `Procedimento_checklist`, `Sequencia_checklist`, `Img_Check`) VALUES
(1, 'SEM CONEXÃO', 'SGPI', 'Acessar o SGPI com seu login e senha', '1', 'Aonet.png'),
(2, 'SEM CONEXÃO', 'SGPI', 'Servidor MK (Localizar o Usuário e Clicar)', '2', 'Aonet.png'),
(3, 'SEM CONEXÃO', 'SGPI', 'Procurar o cliente', '3', 'Aonet.png'),
(4, 'SEM CONEXÃO', 'SGPI', 'Clicar no Usário ', '4', 'Aonet.png'),
(5, 'SEM CONEXÃO', 'SGPI', 'Clique na ONU para verificar o sinal)', '5', 'Aonet.png'),
(6, 'SEM CONEXÃO', 'ASSINANTE', 'Verificar o Cordão óptico com Led Vermelho(ONU a PTO)', '6', 'Aonet.png'),
(7, 'SEM CONEXÃO', 'COR', 'O.S.', '7', 'Aonet.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `nivel_de_acesso` varchar(250) NOT NULL,
  `status_grupo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`nivel_de_acesso`, `status_grupo`) VALUES
('0', 'ADM'),
('2', 'BLOQUEADO'),
('1', 'SAC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_cheklist`
--

CREATE TABLE `grupo_cheklist` (
  `nome_grupo` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupo_cheklist`
--

INSERT INTO `grupo_cheklist` (`nome_grupo`, `status`) VALUES
('LENTIDÃO', 0),
('SEM CONEXÃO', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id_mensagem` int(11) NOT NULL,
  `assunto_mensagem` text NOT NULL,
  `status_mensagem` int(11) NOT NULL,
  `mensagem_usuario` text NOT NULL,
  `username_mensagem` int(11) NOT NULL,
  `setor_usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`id_mensagem`, `assunto_mensagem`, `status_mensagem`, `mensagem_usuario`, `username_mensagem`, `setor_usuario`) VALUES
(1, 'ERRO NA FINALIZAÇÃO DO ATENDIMENTO', 1, 'TESTE DE MENSAGEM', 1, 'SAC'),
(2, 'PROBLEMAS COM FECHAMENTO DE ATENDIMENTOS', 1, 'Em linguística, a noção de texto é ampla e ainda aberta a uma definição mais precisa. Grosso modo, pode ser entendido como manifestação linguística das ideias de um autor, que serão interpretadas pelo leitor de acordo com seus conhecimentos linguísticos e culturais. Seu tamanho é variável.\r\n\r\n“Conjunto de palavras e frases articuladas, escritas sobre qualquer suporte”.[1]\r\n\r\n“Obra escrita considerada na sua redação original e autêntica (por oposição a sumário, tradução, notas, comentários, etc.)”.[2]\r\n\r\n\"Um texto é uma ocorrência linguística, escrita ou falada de qualquer extensão, dotada de unidade sociocomunicativa, semântica e formal. É uma unidade de linguagem em uso.\"[3]\r\n\r\nO interesse pelo texto como objeto de estudo gerou vários trabalhos importantes de teóricos da Linguística Textual, que percorreram fases diversas cujas características principais eram transpor os limites da frase descontextualizada da gramática tradicional e ainda incluir os relevantes papéis do autor e do leitor na construção de textos.\r\n\r\nUm texto pode ser escrito ou oral e, em sentido lato, pode ser também não verbal.\r\n\r\nTexto crítico é uma produção textual que parte de um processo reflexivo e analítico gerando um conteúdo com crítica construtiva e bem fundamentada.\r\n\r\nEm artes gráficas, o texto é a parte verbal, linguística, por oposição às ilustrações.\r\n\r\nTodo texto tem que ter alguns aspectos formais, ou seja, tem que ter estrutura, elementos que estabelecem relação entre si. Dentro dos aspectos formais temos a coesão e a coerência, que dão sentido e forma ao texto. \"A coesão textual é a relação, a ligação, a conexão entre as palavras, expressões ou frases do texto”.[4] A coerência está relacionada com a compreensão, a interpretação do que se diz ou escreve. Um texto precisa ter sentido, isto é, precisa ter coerência. Embora a coesão não seja condição suficiente para que enunciados se constituam em textos, são os elementos coesivos que lhes dão maior legibilidade e evidenciam as relações entre seus diversos componentes, a coerência depende da coesão.', 1, 'SAC'),
(3, 'VOCÊ FICOU EM DESTAQUE', 1, 'PARABÉNS VOCÊ FICOU EM DESTAQUE, MATENHA O FOCO E A DETERMINAÇÃO QUE VAI LONGE\r\n\r\nBjs', 1, 'SAC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel_de_acesso` int(11) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id_nivel_de_acesso`, `nivel`) VALUES
(0, 'ADM - ACESSO ADM'),
(1, 'SAC - ATENDIMENTO'),
(2, 'BLOQUEADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id_notificacao` int(11) NOT NULL,
  `status_notificacao` int(11) NOT NULL,
  `notificacao_usuario` text NOT NULL,
  `username_notificacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`id_notificacao`, `status_notificacao`, `notificacao_usuario`, `username_notificacao`) VALUES
(2, 0, 'SEJA BEM VINDO ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regra`
--

CREATE TABLE `regra` (
  `id_regra` int(11) NOT NULL,
  `regra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `regra`
--

INSERT INTO `regra` (`id_regra`, `regra`) VALUES
(1, '1 - Não esquecer de atualizar o cadastro'),
(2, '2 - Não esqueça de confirmar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidor`
--

CREATE TABLE `servidor` (
  `id_servidor` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `mensagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servidor`
--

INSERT INTO `servidor` (`id_servidor`, `status`, `mensagem`) VALUES
(1, 1, 'servidor ativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assinante`
--
ALTER TABLE `assinante`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bd_rank`
--
ALTER TABLE `bd_rank`
  ADD PRIMARY KEY (`id_rank`);

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
-- Índices para tabela `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`status_grupo`);

--
-- Índices para tabela `grupo_cheklist`
--
ALTER TABLE `grupo_cheklist`
  ADD PRIMARY KEY (`nome_grupo`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_mensagem`),
  ADD KEY `fk_username_mensagem` (`username_mensagem`);

--
-- Índices para tabela `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel_de_acesso`);

--
-- Índices para tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id_notificacao`),
  ADD KEY `usuario_mensagem` (`username_notificacao`);

--
-- Índices para tabela `regra`
--
ALTER TABLE `regra`
  ADD PRIMARY KEY (`id_regra`);

--
-- Índices para tabela `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`id_servidor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assinante`
--
ALTER TABLE `assinante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `bd_rank`
--
ALTER TABLE `bd_rank`
  MODIFY `id_rank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `bd_usuario`
--
ALTER TABLE `bd_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cheklist_db`
--
ALTER TABLE `cheklist_db`
  MODIFY `Id_checklist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `regra`
--
ALTER TABLE `regra`
  MODIFY `id_regra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `servidor`
--
ALTER TABLE `servidor`
  MODIFY `id_servidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bd_usuario`
--
ALTER TABLE `bd_usuario`
  ADD CONSTRAINT `nivel_de_acesso` FOREIGN KEY (`id_nivel_de_acesso`) REFERENCES `nivel` (`id_nivel_de_acesso`),
  ADD CONSTRAINT `status_grupo` FOREIGN KEY (`status_grupo`) REFERENCES `grupo` (`status_grupo`);

--
-- Limitadores para a tabela `cheklist_db`
--
ALTER TABLE `cheklist_db`
  ADD CONSTRAINT `fk_nome` FOREIGN KEY (`Nome_checklist`) REFERENCES `grupo_cheklist` (`nome_grupo`);

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fk_username_mensagem` FOREIGN KEY (`username_mensagem`) REFERENCES `bd_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `usuario_mensagem` FOREIGN KEY (`username_notificacao`) REFERENCES `bd_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
