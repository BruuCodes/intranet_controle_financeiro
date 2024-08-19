select nome_usuario, email_usuario
	from tb_usuario;
    
select nome_usuario, nome_categoria, email_usuario
	from tb_categoria
inner join tb_usurio
		on tb_categoria.id_usuario = tb_usuario.id_usuario;
    
select nome_usuario, nome_categoria, banco_conta, saldo_conta
	from tb_usuario
inner join tb_categoria
	on tb_categoria.id_usuario = tb_usuario.id_usuario
inner join tb_conta
	on tb_conta.id_usuario = tb_usuario.id_usuario;
    
select * from tb_categoria where id_usuario = 1;

select * from tb_empresa where id_usuario = 1;

select * from tb_movimento where id_usuario = 1;

select nome_usuario from tb_usuario where nome_usuario like '%u%';

select nome_usuario, data_cadastro
	from tb_usuario 
where data_cadastro between '2023-01-01' and '2024-04-30';

select nome_usuario, nome_categoria, banco_conta
	from tb_usuario
inner join tb_categoria
	on tb_categoria.id_usuario = tb_usuario.id_usuario
inner join tb_conta
	on tb_conta.id_usuario = tb_usuario.id_usuario
where tb_usuario.id_usuario = 1;

select nome_usuario, 
	   email_usuario,
       senha_usuario,
       data_cadastro,
       nome_categoria,
       nome_empresa,
       endereco_empresa,
       banco_conta,
       agencia_conta,
       numero_conta,
       saldo_conta,
       tipo_movimento,
       data_movimento, 
       valor_movimento, 
       obs_movimento
from tb_usuario as us 
	inner join tb_categoria
on tb_categoria.id_usuario = us.id_usuario
	inner join tb_empresa
on tb_empresa.id_usuario = us.id_usuario
	inner join tb_conta
on tb_conta.id_usuario = us.id_usuario
	inner join tb_movimento
on tb_movimento.id_usuario = us.id_usuario;
    
select * from tb_usuario, tb_categoria, tb_empresa, tb_conta, tb_movimento; 