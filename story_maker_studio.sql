-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jun-2023 às 05:38
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
-- Banco de dados: `story_maker_studio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id`, `nome`, `categoria`) VALUES
(1, 'Energy Rush', 'Jogo'),
(2, 'O Início de uma Lenda', 'Livro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome_usuario`, `email`, `senha`) VALUES
(1, 'Daisy', 'daisyzevnan@gmail.com', '$2y$10$J8GreM3sE311c4Bz5qPmkOX'),
(2, 'Taylor', 'taylornonen@gmail.com', '$2y$10$4RhK15uWwAj4PgNCTNAyHe0'),
(3, 'Linfred', 'linfredamrak@gmail.com', '$2y$10$GetbZLA9U.UxQui7i8y8vOI'),
(4, 'Aquilies', 'aquiliestosta@gmail.com', '$2y$10$iQRQMGmiPcUXKE97UBn4sOA'),
(5, 'Ash', 'ashigneel@gmail.com', '$2y$10$AjcISp3OP8SePCqejzBGwe0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_projeto`
--

CREATE TABLE `usuario_projeto` (
  `id` int(11) NOT NULL,
  `data_inscricao` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario_projeto`
--

INSERT INTO `usuario_projeto` (`id`, `data_inscricao`, `id_usuario`, `id_projeto`) VALUES
(1, '2023-06-21', 1, 2),
(2, '2023-06-21', 2, 1),
(3, '2023-06-21', 3, 2),
(4, '2023-06-21', 4, 1),
(5, '2023-06-21', 4, 2),
(6, '2023-06-21', 5, 1),
(7, '2023-06-21', 5, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario_projeto`
--
ALTER TABLE `usuario_projeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_projeto` (`id_projeto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario_projeto`
--
ALTER TABLE `usuario_projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuario_projeto`
--
ALTER TABLE `usuario_projeto`
  ADD CONSTRAINT `usuario_projeto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usuario_projeto_ibfk_2` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
