-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/07/2025 às 21:44
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
  `usuario_id` int(11) NOT NULL,
  `local_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `horariofin` time NOT NULL,
  `observacao` text DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendas`
--

INSERT INTO `agendas` (`id`, `usuario_id`, `local_id`, `data`, `horario`, `horariofin`, `observacao`, `criado_em`) VALUES
(4, 1, 1, '2025-07-04', '08:20:00', '09:10:00', '', '2025-07-04 13:57:20'),
(5, 3, 2, '2025-07-04', '07:30:00', '08:20:00', '', '2025-07-04 17:07:09'),
(6, 3, 2, '2025-07-04', '08:20:00', '09:10:00', '', '2025-07-04 17:07:09'),
(7, 3, 2, '2025-07-04', '09:10:00', '10:00:00', '', '2025-07-04 17:07:09'),
(8, 3, 3, '2025-07-05', '07:30:00', '08:20:00', '', '2025-07-04 17:07:22'),
(9, 3, 3, '2025-07-05', '08:20:00', '09:10:00', '', '2025-07-04 17:07:23'),
(10, 1, 1, '2025-07-04', '07:30:00', '08:20:00', '', '2025-07-04 17:08:03'),
(11, 3, 8, '2025-07-04', '07:30:00', '08:20:00', 'd', '2025-07-04 19:29:23');

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
(1, 'Fotos', '2025-07-02', 1);

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
(1, 1, 'uploads/6862e83b6ff91_Administracao.jpg');

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
(1, 'Desenvolvimento de Sistemas', 'O Técnico em Desenvolvimento de Sistemas é um profissional capacitado para projetar, desenvolver e manter softwares e aplicações. Ele atua em todas as etapas do desenvolvimento de sistemas, desde a análise de requisitos até os testes e a implementação, com foco em eficiência, inovação e qualidade. Este profissional também se destaca na aplicação de boas práticas de programação, segurança da informação e integração de sistemas, contribuindo para a automação de processos e a competitividade das organizações no setor tecnológico.', 1, '6862ea8d69d07.pdf', '6862ea8d69f74.pdf', 1, '6862e322be9a5.jpg', '2,3', 'O curso técnico em Análise e Desenvolvimento de Sistemas na modalidade integrada ao Ensino Médio proporciona uma formação completa, unindo os conhecimentos do ensino regular com as competências técnicas necessárias para atuar na área de tecnologia da informação.\r\n\r\nDurante os três anos de formação, os alunos aprendem desde os fundamentos da programação até o desenvolvimento de sistemas completos, incluindo banco de dados, desenvolvimento web, aplicativos móveis, além de realizar projetos práticos que simulam situações reais do mercado de trabalho.\r\n\r\nObjetivos\r\nFormar profissionais técnicos em desenvolvimento de sistemas com sólidos conhecimentos teóricos e práticos\r\nDesenvolver habilidades para analisar, projetar e implementar sistemas computacionais\r\nCapacitar para o desenvolvimento de aplicações web e móveis\r\nPromover o conhecimento em banco de dados e infraestrutura de TI\r\nPreparar para a atuação em equipes de desenvolvimento de software\r\nPerfil do Egresso\r\nO técnico em Análise e Desenvolvimento de Sistemas estará apto a:\r\n\r\nDesenvolver sistemas computacionais seguindo metodologias de desenvolvimento\r\nProjetar e implementar bancos de dados\r\nCriar interfaces gráficas para aplicações desktop, web e móveis\r\nRealizar testes e manutenção de sistemas\r\nTrabalhar em equipes de desenvolvimento de software\r\nDocumentar sistemas e processos de desenvolvimento'),
(2, 'Desenvolvimento de Sistemas', 'O Técnico em Desenvolvimento de Sistemas é um profissional capacitado para projetar, desenvolver e manter softwares e aplicações. Ele atua em todas as etapas do desenvolvimento de sistemas, desde a análise de requisitos até os testes e a implementação, com foco em eficiência, inovação e qualidade. Este profissional também se destaca na aplicação de boas práticas de programação, segurança da informação e integração de sistemas, contribuindo para a automação de processos e a competitividade das organizações no setor tecnológico.', 0, '6862eaa8f12d8.pdf', '6862eaa8f149f.pdf', 1, '6862e32fe5616.jpg', '2,3', 'O Técnico em Desenvolvimento de Sistemas é um profissional capacitado para projetar, desenvolver e manter softwares e aplicações. Ele atua em todas as etapas do desenvolvimento de sistemas, desde a análise de requisitos até os testes e a implementação, com foco em eficiência, inovação e qualidade. Este profissional também se destaca na aplicação de boas práticas de programação, segurança da informação e integração de sistemas, contribuindo para a automação de processos e a competitividade das organizações no setor tecnológico.');

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
(1, 1, 'uploads/6862e9a03790a_Administracao.jpg'),
(2, 1, 'uploads/6862e9a038af0_agricultura.jpg'),
(3, 1, 'uploads/6862e9a04035d_avatar.png'),
(4, 1, 'uploads/6862e9a040c79_Agronegocio.jpg'),
(5, 1, 'uploads/6862e9a044764_Desenvolvimento.jpg'),
(6, 1, 'uploads/6862e9a047eef_ceep.png'),
(7, 1, 'uploads/6862e9a04a50e_edicacoes.jpeg'),
(8, 1, 'uploads/6862e9a04afbe_destaque.jpg'),
(9, 1, 'uploads/6862e9a04e49a_eletrotecnica.jpeg'),
(10, 1, 'uploads/6862e9a04f15f_Edificacao.jpg'),
(11, 2, 'uploads/6862e9a630e7a_edicacoes.jpeg'),
(12, 2, 'uploads/6862e9a631805_Edificacao.jpg'),
(13, 2, 'uploads/6862e9a63782c_Eletrotecnica.jpg'),
(14, 2, 'uploads/6862e9a637daf_eletrotecnica.jpeg'),
(15, 2, 'uploads/6862e9a644d62_email.png'),
(16, 2, 'uploads/6862e9a6459b4_enfermagem.jpeg'),
(17, 2, 'uploads/6862e9a64fb1d_estacionamento.jpeg'),
(18, 2, 'uploads/6862e9a65225b_enfermagem.jpg'),
(19, 2, 'uploads/6862e9a654a3e_estetica.jpeg'),
(20, 2, 'uploads/6862e9a6550d2_estetica.jpg'),
(21, 2, 'uploads/6862e9a658889_face.png'),
(22, 2, 'uploads/6862e9a659c00_FACHADA.jpg'),
(23, 2, 'uploads/6862e9a65eb9e_farmacia.jpeg'),
(24, 2, 'uploads/6862e9a6617a3_Farmacia.jpg'),
(25, 2, 'uploads/6862e9a6663d3_formaturaadm.jpg');

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
('<strong>Secretaria<br />\r\nSegunda a Sexta:</strong><br />\r\n8:00&nbsp;<strong>&agrave;s</strong> 17:00<br />\r\n<strong>S&aacute;bado:</strong><br />\r\n8:00&nbsp;<strong>&agrave;s </strong>12:00<br />\r\n<strong>Domingo:</strong><br />\r\nFechado<br />\r\n<br />\r\n&nbsp;', '<strong>Aulas<br />\r\nManh&atilde;:</strong><br />\r\n7:30 <strong>&aacute;s </strong>11:50<br />\r\n<strong>Tarde:</strong><br />\r\n13:00&nbsp;<strong>&aacute;s</strong>&nbsp;17:20<br />\r\n<strong>Noite:</strong><br />\r\n18:40&nbsp;<strong>&aacute;s</strong> 23:00');

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
(1, 'Quadra', 1, ''),
(2, 'Sala de Notebooks', 1, ''),
(3, 'Lab. Informática', 1, ''),
(4, 'Lab. Desenho', 1, ''),
(5, 'Lab. Matemática', 1, ''),
(6, 'Lab. Química', 1, ''),
(7, 'Biblioteca ', 1, ''),
(8, 'Auditório ', 1, '');

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
  `imagem` text DEFAULT NULL,
  `destaque` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `resumo`, `texto`, `status`, `imagem`, `destaque`) VALUES
(1, 'Novo Site', 'Ceep lança novo site para facilitar o acesso às informações escolares.', 'O Colégio Ceep acaba de lançar seu novo site oficial! A plataforma foi totalmente reformulada para oferecer uma navegação mais rápida, moderna e acessível. No novo portal, pais, alunos e professores poderão encontrar facilmente calendários, comunicados, boletins e muito mais. A iniciativa visa melhorar a comunicação entre a escola e a comunidade escolar', 1, '6862d607f3e5a.png', 1),
(2, 'Feira de Ciências', 'Projetos inovadores chamam a atenção de jurados e visitantes durante evento regional.', 'Estudantes do Ceep participaram da tradicional Feira Regional de Ciências e surpreenderam com projetos nas áreas de tecnologia, sustentabilidade e robótica. O destaque foi para o projeto ', 1, '6862d616b473f.png', 0),
(3, 'Semana da Saúde', 'Atividades educativas e esportivas incentivam hábitos saudáveis na comunidade escolar.', 'Durante a Semana da Saúde, o Ceep realizou uma série de ações para conscientizar alunos e colaboradores sobre a importância do bem-estar físico e mental. Foram realizadas palestras com profissionais da saúde, oficinas de alimentação saudável, aulas de yoga e torneios esportivos. A iniciativa fez parte do projeto ', 1, '6862d6212e381.png', 0),
(4, 'Sala de Notebooks', 'Espaço moderno oferece tecnologia de ponta para alunos de cursos técnicos.', 'Foi inaugurado no Ceep uma nova Sala de Notebooks, equipado com maquinas de última geração, acesso à internet de alta velocidade e softwares atualizados. O espaço será utilizado especialmente pelos alunos dos cursos técnicos em informática. A iniciativa reforça o compromisso da instituição com a inovação e a excelência no ensino.', 1, '6862d62daae1c.png', 0);

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
(2, 1, 'uploads/6862e85d2f941_agricultura.jpg'),
(3, 1, 'uploads/6862e85d30469_Agronegocio.jpg'),
(4, 1, 'uploads/6862e85d3744f_avatar.png'),
(5, 1, 'uploads/6862e8fa5ecb1_destaque.jpg'),
(6, 1, 'uploads/6862e8fa5f7a3_edicacoes.jpeg'),
(7, 1, 'uploads/6862e8fa6175f_Edificacao.jpg'),
(8, 2, 'uploads/6862e939785ff_Administracao.jpg'),
(9, 2, 'uploads/6862e93978d32_agricultura.jpg'),
(10, 2, 'uploads/6862e9397c778_avatar.png'),
(11, 2, 'uploads/6862e9397eadf_Agronegocio.jpg'),
(12, 2, 'uploads/6862e93987bd4_ceep.png'),
(13, 2, 'uploads/6862e9398a248_Desenvolvimento.jpg'),
(14, 2, 'uploads/6862e93990af5_destaque.jpg'),
(15, 2, 'uploads/6862e939955b8_edicacoes.jpeg'),
(16, 2, 'uploads/6862e939992a0_Edificacao.jpg'),
(17, 3, 'uploads/6862e94008415_edicacoes.jpeg'),
(18, 3, 'uploads/6862e9400aa00_Edificacao.jpg'),
(19, 3, 'uploads/6862e9400ddd2_destaque.jpg'),
(20, 3, 'uploads/6862e9401760a_eletrotecnica.jpeg'),
(21, 3, 'uploads/6862e94019a9b_Eletrotecnica.jpg'),
(22, 3, 'uploads/6862e9401fa45_email.png'),
(23, 3, 'uploads/6862e94020898_enfermagem.jpeg'),
(24, 3, 'uploads/6862e9402591c_enfermagem.jpg'),
(25, 3, 'uploads/6862e9402708c_estacionamento.jpeg'),
(26, 3, 'uploads/6862e94029d57_estetica.jpeg'),
(27, 3, 'uploads/6862e9402a4fa_estetica.jpg'),
(28, 4, 'uploads/6862e96241bdf_estetica.jpeg'),
(29, 4, 'uploads/6862e96242ee9_estacionamento.jpeg'),
(30, 4, 'uploads/6862e9624f5d9_face.png'),
(31, 4, 'uploads/6862e96251ae5_estetica.jpg'),
(32, 4, 'uploads/6862e9625c97a_FACHADA.jpg'),
(33, 4, 'uploads/6862e9625dd2b_farmacia.jpeg'),
(34, 4, 'uploads/6862e9626346c_formaturaadm.jpg'),
(35, 4, 'uploads/6862e96264849_Farmacia.jpg'),
(36, 4, 'uploads/6862e96266cd1_insta.png'),
(37, 4, 'uploads/6862e9626c3e0_logo.png'),
(38, 4, 'uploads/6862e9626cc1c_logo-ceep.png'),
(39, 4, 'uploads/6862e96272f03_Parana.png'),
(40, 4, 'uploads/6862e96273933_noticia.png'),
(41, 4, 'uploads/6862e96276ec7_quadra1.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Estrutura para tabela `slides`
--

CREATE TABLE `slides` (
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `slides`
--

INSERT INTO `slides` (`img1`, `img2`, `img3`) VALUES
('img1_6862da19669725.07444775.png', 'img2_6862da1966b061.65530308.png', 'img3_6862da1966c3a9.21589778.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(150) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `cargo` tinyint(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `cargo`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(3, 'professor', 'professor@gmail.com', '3f9cd3c7b11eb1bae99dddb3d05da3c5', 0, 1),
(4, 'gestor', 'gestor@gmail.com', 'a55607442fca264cf37e935503d646c2', 2, 1);

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
-- Índices de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Índices de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Índices de tabela `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Índices de tabela `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Índices de tabela `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Índices de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Índices de tabela `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Índices de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Índices de tabela `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Índices de tabela `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Índices de tabela `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Índices de tabela `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Índices de tabela `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Índices de tabela `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `albuns`
--
ALTER TABLE `albuns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `albuns_imagens`
--
ALTER TABLE `albuns_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cursos_imagens`
--
ALTER TABLE `cursos_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `noticias_imagens`
--
ALTER TABLE `noticias_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
