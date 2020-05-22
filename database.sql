--
--
--
--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `testno`
--

CREATE TABLE `testno` (
  `id` int(11) NOT NULL,
  `tabela1` varchar(255) NOT NULL,
  `tabela2` varchar(255) NOT NULL,
  `tabela3` varchar(255) NOT NULL,
  `tabela4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



INSERT INTO `testno` (`id`, `tabela1`, `tabela2`, `tabela3`, `tabela4`) VALUES
(1, 'kjkkk', 'kkkk', 'kkkk', 'kkkk'),
(2, 'fxhgfxh', 'xgfhgfxh', 'gfydhyfdgh', 'ydfghfgh'),
(3, 'gsdfgdsfg', 'dsfgsdfg', 'g<sdgfsdgf', 's<dgs<df'),
(4, 'dsfadsf', 'dsfsdf', 'ds<fsdf<s', 'df<sdf<dsf');


ALTER TABLE `testno`
  ADD PRIMARY KEY (`id`);
