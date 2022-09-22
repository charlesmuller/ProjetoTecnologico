CREATE TABLE `charlesmuller02`.`usuarios` 
(
     `id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'chave primaria' , 
     `nome` VARCHAR(80) NOT NULL , 
     `email` VARCHAR(80) NOT NULL , 
     `senha` VARCHAR(40) NOT NULL , 
     PRIMARY KEY (`id`) 
) ENGINE = InnoDB COMMENT = 'Tabela de usuários';

CREATE TABLE `charlesmuller02`.`colecao` 
( 
    `idColecao` INT NOT NULL AUTO_INCREMENT , 
    `nomeColecao` INT NOT NULL , 
    PRIMARY KEY (`idColecao`) 
) ENGINE = InnoDB;

CREATE TABLE `charlesmuller02`.`dados_hq` 
( 
    `id_hq` INT(10) NOT NULL AUTO_INCREMENT , 
    `titulo_hq` VARCHAR(100) NOT NULL , 
    `personagem_hq` VARCHAR(100) NOT NULL , 
    `numero_edicao_hq` INT(10) NOT NULL , 
    `ano_lancamento_hq` DATE NOT NULL , 
    `observacao_hq` VARCHAR(200) NOT NULL , 
    PRIMARY KEY (`id_hq`) 
    ) ENGINE = InnoDB;