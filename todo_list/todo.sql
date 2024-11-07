SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `todo` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `data_limite` DATE NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `todo` (`nome`, `data_limite`, `status`) VALUES
('Fazer compra de mercado', '2024-11-03', 'Pendente'),
('Limpar guarda roupas e dar as roupas', '2024-12-01', 'Pendente');

COMMIT;
