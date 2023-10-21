
-- Banco de dados: `blog`

CREATE DATABASE blog;

-- Estrutura da tabela `posts`

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `data_criado` datetime NOT NULL,
  `corpo` text NOT NULL,
  `autor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


