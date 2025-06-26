-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/06/2025 às 20:18
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sitefinal`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendas`
--

CREATE TABLE `agendas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `local_id` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `arquivo` text DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `horariofin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendas`
--

INSERT INTO `agendas` (`id`, `usuario_id`, `local_id`, `data`, `arquivo`, `observacao`, `horario`, `horariofin`) VALUES
(81, 1, 1, '2025-06-03', NULL, 'fdfswdfwf', '08:20:00', '09:10:00'),
(82, 1, 1, '2025-06-02', NULL, '', '11:00:00', '11:50:00'),
(85, 1, 5, '2025-06-26', NULL, 'aaa', '08:20:00', '09:10:00'),
(86, 1, 5, '2025-06-24', NULL, '', '07:30:00', '08:20:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `albuns`
--

CREATE TABLE `albuns` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `albuns`
--

INSERT INTO `albuns` (`id`, `nome`, `data`, `status`) VALUES
(6, 'Desenvolvimento de Sistema', '2025-06-18', 1),
(7, 'Teste de Album', '2025-06-26', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `albuns_imagens`
--

CREATE TABLE `albuns_imagens` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `albuns_imagens`
--

INSERT INTO `albuns_imagens` (`id`, `album_id`, `nome_arquivo`) VALUES
(6, 7, 'uploads/685c7ea2ce844_6fab7d97b582930b5abca622b42e5802.gif'),
(7, 7, 'uploads/685c7ea4be0e2_Hadda-3.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `imagem` text DEFAULT NULL,
  `locais_ids` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `descricao`, `tipo`, `status`, `imagem`, `locais_ids`) VALUES
(37, 'DEV', 'wdwd', 1, 1, '685d76526c660.jpg', '3'),
(38, 'agronégocio', 'dfswd', 0, 1, '685d7bac681c8.jpg', '3'),
(39, 'Desenvolvimento ', 'O Técnico em Desenvolvimento de Sistemas é um profissional capacitado para projetar, desenvolver e manter softwares e aplicações. Ele atua em todas as etapas do desenvolvimento de sistemas, desde a análise de requisitos até os testes e a implementação, com foco em eficiência, inovação e qualidade. Este profissional também se destaca na aplicação de boas práticas de programação, segurança da informação e integração de sistemas, contribuindo para a automação de processos e a competitividade das organizações no setor tecnológico.', 0, 1, '685d7be35c536.jpg', '3,5');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios`
--

CREATE TABLE `horarios` (
  `secretaria` text DEFAULT NULL,
  `aulas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `horarios`
--

INSERT INTO `horarios` (`secretaria`, `aulas`) VALUES
('Secretaria\r\nSegunda a Sexta: 8h às 17h\r\nSábado: 8h às 12h\r\nDomingo: Fechado', 'Aulas\r\nManhã: 7h30 às 11h30\r\nTarde: 13h às 17h\r\nNoite: 19h às 22h30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `locais`
--

CREATE TABLE `locais` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `cor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `locais`
--

INSERT INTO `locais` (`id`, `nome`, `status`, `cor`) VALUES
(1, 'Laboratório Informatica', 1, 'blue'),
(3, 'Laboratório Desenho Técnico', 1, 'orange'),
(5, 'Quadra', 1, 'red'),
(10, 'Laboratório de Matemática', 1, 'green'),
(13, 'Sala Notebooks', 0, '#000000'),
(17, 'Sala de Cadeiras', 0, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `resumo` varchar(254) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `imagem` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `resumo`, `texto`, `status`, `imagem`) VALUES
(33, 'noticia 1', 'a', 'O retorno às aulas marca o início de mais um ciclo de descobertas, desafios e conquistas. Estamos extremamente felizes em receber nossos alunos para mais um ano letivo repleto de aprendizado, amizades e crescimento pessoal. Nossa equipe está preparada para oferecer um ambiente acolhedor, seguro e estimulante, onde cada estudante possa desenvolver todo o seu potencial. Desde o primeiro dia, queremos que todos se sintam motivados, curiosos e prontos para viver novas experiências.          Reforçamos também a importância das medidas de segurança: o uso de máscaras continua sendo necessário em ambientes fechados, e o uso de álcool em gel está disponível em diversos pontos da escola. A saúde de todos é nossa prioridade. Desejamos um excelente ano letivo a todos! Que seja uma jornada inspiradora, produtiva e cheia de boas memórias. Sejam bem-vindos de volta!         Reforçamos também a importância das medidas de segurança: o uso de máscaras continua sendo necessário em ambientes fechados, e o uso de álcool em gel está disponível em diversos pontos da escola. A saúde de todos é nossa prioridade. Desejamos um excelente ano letivo a todos! Que seja uma jornada inspiradora, produtiva e cheia de boas memórias. Sejam bem-vindos de volta!          Reforçamos também a importância das medidas de segurança: o uso de máscaras continua sendo necessário em ambientes fechados, e o uso de álcool em gel está disponível em diversos pontos da escola. A saúde de todos é nossa prioridade. Desejamos um excelente ano letivo a todos! Que seja uma jornada inspiradora, produtiva e cheia de boas memórias. Sejam bem-vindos de volta!', 1, '685d50a026d9d.jpg'),
(43, 'dadada', 'dadadad', 'adadada', 1, '685d4dce701c3.jpg'),
(44, 'teste', 'teste', 'teste teste', 1, '685d508307705.jpg'),
(45, 'dadadada12', 'adadad', 'dadada', 1, '685d7d8290636.jpg'),
(46, 'dwdqwdqwdqw4534', '343432asfd3', 'adawdadwd', 1, '685d7da047028.jpg'),
(47, 'aaaa', 'dadadad', 'aaaa', 1, '685d7f90d2963.jpg'),
(48, 'dadada', 'teste', 'aaaa', 1, '685d7fa05f983.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(150) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `cargo` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `cargo`, `status`) VALUES
(1, 'teste', 'teste@gmail.com', '1324', 1, 1),
(4, 'Joao', 'joao@gmail.com', '1324', 0, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `local_id` (`local_id`);

--
-- Índices de tabela `albuns`
--
ALTER TABLE `albuns`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `albuns_imagens`
--
ALTER TABLE `albuns_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de tabela `albuns`
--
ALTER TABLE `albuns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `albuns_imagens`
--
ALTER TABLE `albuns_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `agendas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `agendas_ibfk_2` FOREIGN KEY (`local_id`) REFERENCES `locais` (`id`);

--
-- Restrições para tabelas `albuns_imagens`
--
ALTER TABLE `albuns_imagens`
  ADD CONSTRAINT `albuns_imagens_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albuns` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
