USE `testerevict`;

INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (35199783141,"Amela","1948-01-27","Ap #471-1706 Ultrices Ave","Zuccarello","37835-774");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (10492524653,"Uriel","1950-05-04","1975 Sagittis. Rd.","Stroud","46779-795");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (55231553176,"Hamish","1973-02-19","565-8539 Nunc St.","Cerchio","58058-984");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (60172251584,"Donna","1974-03-24","P.O. Box 298, 7650 Id St.","San Francisco","15123-979");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (24734179535,"Dustin","1960-03-26","Ap #737-734 Tincidunt Rd.","Sibret","62274-609");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (68322803080,"Octavius","1955-08-18","Ap #289-1516 Pharetra. Rd.","Oostkerke","14444-442");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (70867196130,"Germane","1993-07-18","2300 Imperdiet Rd.","Tarakan","18926-523");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (24722254769,"Hall","1973-05-31","6720 Lacus. Road","Estación Central","31358-338");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (70675008771,"Tyrone","1964-07-06","Ap #401-8913 Vel, Ave","Lakewood","82683-348");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (15851408699,"Courtney","1948-09-29","941-1660 Consectetuer St.","Ostra Vetere","63238-731");
INSERT INTO `devedores` (`cpf_cnpj`,`nome`,`nascimento`,`endereco`,`cidade`,`cep`) VALUES (45295257745,"Yeo","1990-08-07","3004 Phasellus Rd.","Ramsey","08980-666");

-- Dividas do mês de janeiro a vencer
-- 
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto', '454.90', '2020-01-23', '35199783141');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Conta de Gás', '54.90', '2020-01-25', '35199783141');

INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Conta de Água', '234.90', '2020-01-22', '15851408699');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto', '54.90', '2020-01-25', '15851408699');

INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Taxa de Juros', '234.40', '2020-01-25', '10492524653');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto', '323.90', '2020-01-23', '10492524653');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto Cartão de Crédito', '132.90', '2020-01-27', '10492524653');

INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto', '454.90', '2020-01-08', '70867196130');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto Cartão de Crédito', '243.90', '2020-01-29', '70867196130');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Conta de Luz', '134.90', '2020-01-25', '70867196130');


-- 
-- Dividas vencidas no mes de janeiro
-- 

INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto', '104.90', '2020-01-10', '35199783141');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto Cartão de Crédito', '303.75', '2020-01-08', '35199783141');

INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Taxa de Juros', '134.40', '2020-01-05', '10492524653');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto', '103.90', '2020-01-03', '10492524653');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto Cartão de Crédito', '432.90', '2020-01-10', '10492524653');

INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto', '104.90', '2020-01-08', '70867196130');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Boleto Cartão de Crédito', '453.90', '2020-01-09', '70867196130');
INSERT INTO `testerevict`.`dividas` (`titulo`, `valor`, `vencimento`, `devedores_cpf/cnpj`) VALUES ('Conta de Luz', '434.90', '2020-01-10', '70867196130');

