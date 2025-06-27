-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/06/2025 às 18:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
  `matriz` varchar(100) NOT NULL,
  `planodecurso` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `imagem` text DEFAULT NULL,
  `locais_ids` varchar(100) NOT NULL,
  `atuacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `descricao`, `tipo`, `matriz`, `planodecurso`, `status`, `imagem`, `locais_ids`, `atuacao`) VALUES
(42, 'curso 2', 'descricao curso 2', 1, '', '', 1, '685e9a9055b76.jfif', '3', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos_imagens`
--

CREATE TABLE `cursos_imagens` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos_imagens`
--

INSERT INTO `cursos_imagens` (`id`, `curso_id`, `nome_arquivo`) VALUES
(1, 42, 'uploads/685e9a9a13458_AlNU3WTK_400x400.jpg'),
(2, 42, 'uploads/685e9a9a173cf_images (1).jfif'),
(3, 42, 'uploads/685e9a9a1a12e_images (2).jfif'),
(4, 42, 'uploads/685e9a9a1ddbc_é.png'),
(5, 42, 'uploads/685e9a9a2da4b_images.jfif');

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
(49, 'aaaa', 'dadadad', 'aaaa', 1, '685e905bbe7a3.jfif');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias_imagens`
--

CREATE TABLE `noticias_imagens` (
  `id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias_imagens`
--

INSERT INTO `noticias_imagens` (`id`, `noticia_id`, `nome_arquivo`) VALUES
(2, 49, 'uploads/685e906739fb9_AlNU3WTK_400x400.jpg'),
(3, 49, 'uploads/685e90673b00d_images (1).jfif'),
(4, 49, 'uploads/685e90673de9d_images (2).jfif'),
(5, 49, 'uploads/685e906740d35_IMG_Academy_Logo.svg.png'),
(6, 49, 'uploads/685e9067437d9_images.jfif'),
(7, 40, 'uploads/685e97bc29b30_2636936256.jpg'),
(8, 40, 'uploads/685e97bc2c852_AlNU3WTK_400x400.jpg'),
(9, 40, 'uploads/685e97bc32e06_images (1).jfif'),
(10, 40, 'uploads/685e97bc3634a_images.jfif'),
(11, 40, 'uploads/685e97bc36fa1_IMG_Academy_Logo.svg.png'),
(12, 41, 'uploads/685e98aa50b9e_images (2).jfif'),
(13, 41, 'uploads/685e98aa518e9_images (1).jfif'),
(14, 41, 'uploads/685e98aa54d86_images.jfif'),
(15, 41, 'uploads/685e98aa55532_IMG_Academy_Logo.svg.png');

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
-- Índices de tabela `cursos_imagens`
--
ALTER TABLE `cursos_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`curso_id`);

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
-- Índices de tabela `noticias_imagens`
--
ALTER TABLE `noticias_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`noticia_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `cursos_imagens`
--
ALTER TABLE `cursos_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `noticias_imagens`
--
ALTER TABLE `noticias_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
