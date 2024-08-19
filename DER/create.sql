-- CRUD (Create - Read - Update - Delete).
-- Create - Criar, cadastrar.

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
Values
('Bruna Vieira', 'bruna.vieira@gmail.com', 'bru123', '2024-06-03');
insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
Values
('Alisson Fernando', 'alissonfernando@gmail.com', 'ali123', '2024-06-03');
insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
Values
('Diego Souza', 'diegosouza@outlook.com', 'diego123', '2024-06-03');
insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
Values
('Marcia Vieira', 'marciavieira@outlook.com', 'marcia123', '2024-06-03');
insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
Values
('Heloiza Vieira','helovieira@gmail.com', 'helo123', '2024-06-03');

insert into tb_categoria
(nome_categoria, id_usuario)
values
('faculdade', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('mercado', 2);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('loja', 3);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('mecanico', 4);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('igreja', 5 );

insert into tb_categoria
(nome_categoria, id_usuario)
values
('shooping', 6);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('salario', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('empresa', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('aluguel', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('cliente', 2);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('usuario', 2);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('contrato', 2);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('imobiliaria', 3);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('carteira motorista', 3);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('ingresso', 3);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('nota fiscal', 4);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('hospital', 4);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('cinema', 4);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('clinica', 5);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('padaria', 5);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('escola', 5);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('curso', 6);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('viagem', 6);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('aeroporto', 6);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itau', 719, 4068-9, 6500, 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('UNOPAR', 4333225500, 'Rua Comercial, Nº100', 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('TCS', 4333224469, 'Rua Napoleão, Nº1005', 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Muffato', 4333254879, 'Av Jk, Nº 5485', 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Unicesumar', 4333554712, 'Av Santa Monica, Nº 125', 1);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Brasil', 045, 15248-9, 65050, 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Musamar', 4332425588, 'Av Rio Branco, Nº 5487', 2);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('UEL', 4332425877, 'Av Manringá, Nº 444', 2);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Posto piloto', 4333254875, 'Rua Calixto, Nº 1855', 2);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Ravenna', 4332541875, 'Rua João Candido, Nº 369', 2);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Bradesco', 046, 122587-7, 10248, 2);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Wil', 0254, 214875-6, 154872, 2);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Biggs', 4333264587, 'Av Higienópolis, Nº 55', 3);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Lanche Magrelo', 433325511, 'Av Rio de janeiro, Nº 33', 3);
 
Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Lanhe da curva', 4333221544, 'Av Tiradentes, Nº 30', 3);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Isaias', 4333254871, 'Av Goias, Nº 777', 3);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Nubank', 055, 6413329-07, 1502158, 3);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', 099, 0000125-1, 365847, 3);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Adidas', 4333524780, 'Rua Raposo Tavares, Nº 1141', 4);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Bolonha', 4333226598, 'Rua Maitha, Nº 452', 4);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Mc Donaldts', 433366985214, 'Rua Monteira Lobato Nº 5628', 4);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('KFC', 4333245100, 'Av Saul Eulkind, Nº 17', 4);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Inter', 094, 032149-8, 3625471, 4);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('c6 banck', 015, 2015688-1, 3621498, 4);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('OndontoClinc', 435624871, 'Av Bandeirantes, Nº 02', 5);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Vanita', 4333224587, 'Rua Paranaguá, Nº 274', 5);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('VsGold', 4333556895, 'Pará, Nº 250', 5);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Burguer King', 436254770, 'Rua Souza Naves, Nº 1700', 5);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Safra', 011, 0000-98, 7851249, 5);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Sicob', 077, 25555668-88, 1220033, 5);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Centauro', 4332425659, 'Rua Espirito Santo, Nº 170', 6);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('C&A', 433254879, 'Rua Mato Grosso, Nº 225', 6);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Pernanbucanas', 43225481119, 'Rua Piaui, Nº 5624', 6);

Insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Americanas', 4332564874, 'Rua Tocantins, Nº 1203', 6);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('PicPay', 0655, 78451298, 1254, 6);

Insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Sicob', 07, 40028922-2, 15487962, 6);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values
(2, '2024-06-17', 700, null, 1, 1, 2, 1);

insert into tb_movimento 
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values 
(1, '2024-05-12', 2530, null, 14, 10, 6, 3);

insert into tb_movimento 
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values 
(2, '2024-06-09', 2031, null, 24, 11, 6, 3);

insert into tb_movimento 
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values 
(1, '2024-08-09', 4526, null, 37, 17, 8, 4);

insert into tb_movimento 
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values 
(2, '2024-07-05', 8542, null, 18, 16, 8, 4);

insert into tb_movimento 
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values 
(1, '2024-10-12', 7456, null, 19, 19, 11, 5);

insert into tb_movimento 
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values 
(2, '2024-03-04', 9654, null, 21, 21, 10, 5);


