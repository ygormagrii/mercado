-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 179.188.16.14
-- Generation Time: 04-Maio-2018 às 12:22
-- Versão do servidor: 5.6.35-81.0-log
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lotopro_sistem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `analises`
--

CREATE TABLE `analises` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `status` int(22) NOT NULL,
  `empresa_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `analises`
--

INSERT INTO `analises` (`id`, `nome`, `data`, `fname`, `usuario_id`, `status`, `empresa_id`) VALUES
(54, 'Analise de risco 1', '2018-03-12', 'Etapa 1; 4/5; Nenhum; Ygor; Etapa 2; 5/5; Nenhum; Thiago; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; Ygor; INSIGHT; ; Thiago; INSIGHT; ; ; ; ; ; ; ; ; ; ; ; ; ', 8, 0, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(550) NOT NULL,
  `status` varchar(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `empresa_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`id`, `titulo`, `descricao`, `status`, `usuario_id`, `empresa_id`) VALUES
(3, 'Atendimento exemplar 1', 'Este atendimento está sendo cadastrado como um exemplar', '2', 8, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditorias`
--

CREATE TABLE `auditorias` (
  `id` int(255) NOT NULL,
  `empresa_id` int(255) NOT NULL,
  `procedimento_id` int(255) NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `descricao` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `data` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `auditorias`
--

INSERT INTO `auditorias` (`id`, `empresa_id`, `procedimento_id`, `nome`, `tipo`, `descricao`, `data`) VALUES
(7, 4, 61, 'Auditoria Interna teste 1', 'Auditoria interna', 'testad ', '11/04/2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditorias_importados`
--

CREATE TABLE `auditorias_importados` (
  `id` int(255) NOT NULL,
  `empresa_id` int(255) NOT NULL,
  `caminho_arquivo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nome_arquivo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `auditoria_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(255) NOT NULL,
  `id_empresa` int(255) NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `id_empresa`, `nome`) VALUES
(1, 4, 'TAGOUT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `idt`
--

CREATE TABLE `idt` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `data` varchar(255) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `status` int(22) NOT NULL,
  `empresa_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `idt`
--

INSERT INTO `idt` (`id`, `nome`, `fname`, `content`, `data`, `usuario_id`, `status`, `empresa_id`) VALUES
(54, 'Instrução modelo - INSIGHT', 'Ygor; testando soment; 16/03/2018; Veronica Ferraz; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ; ', '<p>Descreva abaixo o processo de sua instrução de trabalho:</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/129dfdf91fdf2f62e2eb3473ee84cd87ed9cbddc712bce8f_img-1.PNG\" srcset=\"https://16130.cdn.cke-', '02/03/2018', 8, 0, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `idt_importados`
--

CREATE TABLE `idt_importados` (
  `id` int(255) NOT NULL,
  `empresa_id` int(255) NOT NULL,
  `caminho_arquivo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nome_arquivo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `descricao` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `data` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `idt_importados`
--

INSERT INTO `idt_importados` (`id`, `empresa_id`, `caminho_arquivo`, `nome_arquivo`, `nome`, `tipo`, `descricao`, `data`) VALUES
(7, 4, '/home/storage/9/7d/ec/lotopro/public_html/sistema/uploads/ANVISA-AE.pdf', 'ANVISA-AE.pdf', 'Instrução de trabalho importada modelo', 'Auditoria', ' Instrução modelo apenas para forma de teste.', '09/04/2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes`
--

CREATE TABLE `informacoes` (
  `empresa_id` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `informacoes`
--

INSERT INTO `informacoes` (`empresa_id`, `endereco`, `nome`, `logo`, `complemento`, `cidade`, `estado`, `cep`, `pais`, `cnpj`, `telefone`, `celular`, `email`, `usuario_id`) VALUES
(4, 'Rua grã bretanha n 253', 'INSIGHT', '/home/storage/9/7d/ec/lotopro/public_html/sistema/uploads/logos/didaticativa.jpg', 'apt 73', 'Santo André', 'SP', '09060-500', 'Brasil', '19.935.841/0001-19', '11976289695', '11976289695', 'ygor@insight.abc.br', 8),
(18, 'Rua teste 123', 'TAGOUT', '/home/storage/9/7d/ec/lotopro/public_html/sistema/uploads/logos/logo.png', 'ra213', 'Vinhedo', 'SP', '22611202', 'Brasil', '21343253232', '11976289695', '1126692332', 'amanda@tagout.com.br', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `id` int(25) NOT NULL,
  `procedimentos` int(255) DEFAULT '0',
  `idt` int(255) DEFAULT '0',
  `dispositivos` int(255) DEFAULT '0',
  `pdt` int(255) DEFAULT '0',
  `analise` int(255) DEFAULT '0',
  `auditorias` int(255) DEFAULT '0',
  `treinamentos` int(255) DEFAULT '0',
  `usuarios` int(255) DEFAULT '0',
  `informacoes` int(255) DEFAULT '0',
  `usuario_id` int(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id`, `procedimentos`, `idt`, `dispositivos`, `pdt`, `analise`, `auditorias`, `treinamentos`, `usuarios`, `informacoes`, `usuario_id`) VALUES
(2, 1, 1, 1, 1, 1, 1, 1, 0, 0, 17),
(4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 8),
(6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 23),
(7, 1, 0, 0, 0, 0, 0, 0, 0, 0, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pdt`
--

CREATE TABLE `pdt` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `content` longtext NOT NULL,
  `data` varchar(255) NOT NULL,
  `setor` varchar(255) NOT NULL,
  `maquina_ou_local` varchar(255) NOT NULL,
  `funcionarios` varchar(255) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `status` int(22) NOT NULL,
  `empresa_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pdt`
--

INSERT INTO `pdt` (`id`, `nome`, `content`, `data`, `setor`, `maquina_ou_local`, `funcionarios`, `usuario_id`, `status`, `empresa_id`) VALUES
(55, 'Permissão de trabalho modelo', '<h4>Descreva aqui os procedimentos que devem ser seguidos para essa permissão de trabalho:</h4><ul><li>Etapa 1</li><li>Etapa 2</li><li>Etapa 3</li><li>Etapa 4</li><li>Etapa 5</li></ul>', '2018-04-03', 'Ogiva de medição', 'Ogiva de medição', 'Luiz Carlos, Antonio Fonseca, Mario A.T Lonzo', 8, 0, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimentos`
--

CREATE TABLE `procedimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `status` int(22) NOT NULL,
  `status_auditoria` int(11) NOT NULL,
  `status_treinamento` int(255) NOT NULL,
  `empresa_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `procedimentos`
--

INSERT INTO `procedimentos` (`id`, `nome`, `tipo`, `data`, `fname`, `content`, `usuario_id`, `status`, `status_auditoria`, `status_treinamento`, `empresa_id`) VALUES
(59, 'Procedimento de Auditoria Interna', 'Auditoria Interna', '2018-03-02', '04394; Luiz Mario; 03/02/2018', '<p><strong>1.&nbsp;OBJETIVO</strong></p><p>Avaliar os elementos que compõem o Sistema da Qualidade do CLIENTE a fim de determinar o estágio de conformidade, no qual o mesmo se encontra.</p><p><strong>2.&nbsp; REFERÊNCIA NORMATIVA</strong></p><p>Colocar norma de referência.</p><p><strong>3.&nbsp;&nbsp;APLICAÇÃO</strong></p><p>Abrange todas as Áreas diretamente envolvidas no Sistema da Qualidade do CLIENTE.</p><p><strong>4.&nbsp; ÁREAS ENVOLVIDAS</strong></p><ul><li>Equipe de Auditores.</li><li>Áreas Auditadas.</li><li>Diretoria.</li></ul><p><strong>5.&nbsp;&nbsp;DOCUMENTOS DO SISTEMA DA QUALIDADE ENVOLVIDOS</strong></p><ul><li>Programa de Medição, Análise e Melhoria FOR-0XX</li><li>Solicitação de Ação Corretiva e Preventiva FOR-0XX</li><li>Programa de Auditorias das Instruções de Trabalho FOR-0XX</li><li>Perfil geral das funções FOR-0XX</li><li>Procedimento de Ação Corretiva PSQ-0XX</li><li>Monitoramento de Ações Corretivas e Preventivas FOR-0XX</li><li>Relatório de Auditoria Interna FOR-0XX</li><li>Matriz de Autoridade e Responsabilidade FOR-0XX</li></ul>', 8, 0, 0, 1, 4),
(61, 'Procedimento de ação preventiva - VW', 'saab', '2018-02-03', '04394; Lohan; 03/02/2018', '<h4><strong>Para operar este painel deve-se seguir os seguintes passos:&nbsp;</strong></h4><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li><li>Donec sed leo tempus, dapibus libero ut, interdum odio.</li><li>Nunc feugiat sapien non mi tristique elementum.</li><li>Sed sed erat id dui cursus bibendum.</li><li>Donec pulvinar ligula vel suscipit dictum.</li><li>Pellentesque a quam nec elit dignissim volutpat vel ut arcu.</li><li>Fusce gravida sem nec quam egestas iaculis.</li><li>Fusce sed sapien ac lorem imperdiet rutrum sit amet ut neque.</li><li>Phasellus quis quam tincidunt, finibus risus nec, vestibulum velit.</li><li>Vivamus in nisl ut elit aliquet blandit.</li><li>Donec posuere purus vitae feugiat posuere.</li></ul><figure class=\"image image-style-side\"><img src=\"https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png\" srcset=\"https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_120 120w, https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_240 240w, https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_360 360w, https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_480 480w, https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_600 600w, https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_720 720w, https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_840 840w, https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_960 960w, https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_1080 1080w, https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/d16b91961a096df87694523d14f9dc0957534189d446287e_painel-v2.png/w_1200 1200w\" sizes=\"100vw\" width=\"1200\"></figure>', 8, 0, 1, 0, 4),
(62, 'Procedimento teste', 'saab', '2018-03-20', '#03498; ; ', '<p><strong>PRCECECEC</strong></p><ol><li>232</li><li>32</li><li>32</li><li>3232</li></ol>', 8, 0, 0, 0, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimentos_importados`
--

CREATE TABLE `procedimentos_importados` (
  `id` int(255) NOT NULL,
  `empresa_id` int(255) NOT NULL,
  `caminho_arquivo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nome_arquivo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `descricao` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `data` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `status_auditoria` int(11) NOT NULL,
  `status_treinamento` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `procedimentos_importados`
--

INSERT INTO `procedimentos_importados` (`id`, `empresa_id`, `caminho_arquivo`, `nome_arquivo`, `nome`, `tipo`, `descricao`, `data`, `status_auditoria`, `status_treinamento`) VALUES
(6, 4, '/home/storage/9/7d/ec/lotopro/public_html/sistema/uploads/CLCB_Renovado2.pdf', 'CLCB_Renovado2.pdf', 'Procedimento exemplar 2', 'Auditoria Interna', ' teste de descritivo', '09/04/2018', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL,
  `descricao` text,
  `quantidade` varchar(255) DEFAULT NULL,
  `quantidade_recomendada` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `nome_responsavel` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `status` int(22) NOT NULL,
  `empresa_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `tipo`, `descricao`, `quantidade`, `quantidade_recomendada`, `data`, `nome_responsavel`, `foto`, `usuario_id`, `status`, `empresa_id`) VALUES
(11, 'Etiquetas de segurança P32', '', 'Travamento completo Tagout', '15', '20', '09/04/2018', 'Luiz Sérgio', '  <figure class=\"image\"><img src=\"https://www.tagout.com.br/img/produtos/media/kit-bloqueio-disjuntor1.png\" srcset=\"https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/3e843df194ed80243c7540', 8, 0, 4),
(14, 'Cadeato V32', '', 'Utilizado de forma interna', '13', '15', '10/03/2018', '', '<figure class=\"image\"><img src=\"https://www.tagout.com.br/img/produtos/media/a9ddf1b3b53e3f8df5da522661b8b571.jpg\" srcset=\"https://16130.cdn.cke-cs.com/IiFJJsm7UwLAP3uCLQWR/images/3e843df194ed80243c7540', 8, 0, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamentos`
--

CREATE TABLE `treinamentos` (
  `id` int(255) NOT NULL,
  `empresa_id` int(255) NOT NULL,
  `procedimento_id` int(255) NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `descricao` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `data` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `treinamentos`
--

INSERT INTO `treinamentos` (`id`, `empresa_id`, `procedimento_id`, `nome`, `tipo`, `descricao`, `data`) VALUES
(7, 4, 61, 'Treinamento teste', 'Treinamento experimental', 'testad ', '11/04/2018'),
(8, 4, 59, 'Treinamento teste2', 'Modelo 1', ' teste', '11/04/2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `nivel` int(255) DEFAULT '0',
  `cod` varchar(255) NOT NULL,
  `empresa_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `foto`, `status`, `nivel`, `cod`, `empresa_id`) VALUES
(8, 'Ygor Magri', 'ygor@insight.abc.br', 'be8632cfe3dfdb22c4c4f29c1458cd06', 'http://marketingdigitalabc.com.br/ygor.jpg', 0, 1, '532', 4),
(17, 'Amanda', 'amanda@tagout.com.br', 'e10adc3949ba59abbe56e057f20f883e', 'https://dyn.web.whatsapp.com/pp?e=https%3A%2F%2Fpps.whatsapp.net%2Fv%2Ft61.11540-24%2F30815795_166461044182298_1333402558735056896_n.jpg%3Foe%3D5ADB2DA3%26oh%3Dd5244a17a171d67ccfa7e8f4eaba7442&t=l&u=5519988408222%40c.us&i=1523663021', 0, 1, '', 18),
(24, 'João', 'joao@tagout.com.br', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 1, '', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analises`
--
ALTER TABLE `analises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditorias`
--
ALTER TABLE `auditorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditorias_importados`
--
ALTER TABLE `auditorias_importados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idt`
--
ALTER TABLE `idt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idt_importados`
--
ALTER TABLE `idt_importados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informacoes`
--
ALTER TABLE `informacoes`
  ADD PRIMARY KEY (`empresa_id`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdt`
--
ALTER TABLE `pdt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedimentos`
--
ALTER TABLE `procedimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedimentos_importados`
--
ALTER TABLE `procedimentos_importados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treinamentos`
--
ALTER TABLE `treinamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analises`
--
ALTER TABLE `analises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auditorias`
--
ALTER TABLE `auditorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `auditorias_importados`
--
ALTER TABLE `auditorias_importados`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `idt`
--
ALTER TABLE `idt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `idt_importados`
--
ALTER TABLE `idt_importados`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `informacoes`
--
ALTER TABLE `informacoes`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pdt`
--
ALTER TABLE `pdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `procedimentos`
--
ALTER TABLE `procedimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `procedimentos_importados`
--
ALTER TABLE `procedimentos_importados`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `treinamentos`
--
ALTER TABLE `treinamentos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
