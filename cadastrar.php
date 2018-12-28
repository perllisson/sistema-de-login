<?php
/* 
* @PerlissonArtur
* @EstudanteWeb
* @Facebook: https://www.facebook.com/perlisson.artur.332
*
*
*
*
*/
require_once 'classes/usuarios.php';
$u = new Usuario;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Sistema de usuario</title>
	<link rel="stylesheet" href="..css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	    <div class="container">
        <div class="row">
            <div class="span12" style="text-align:center; margin: 0 auto;">
                <form class="form-horizontal" style="width: 400px; margin: 0 auto;" method="post">
                    <fieldset>
                        <legend>Please Register</legend>
                        <div class="control-group">
                            <label class="control-label">Nome</label>
                            <div class="controls">
                                <input type="text" name="nome" class="form-control" id="inputEmail4" placeholder="Nome" />
                            </div>
                            <div class="control-group">
                            <label class="control-label">usuario</label>
                            <div class="controls">
                                <input  type="text" name="usuario" class="form-control" id="inputAddress2" placeholder="Seu usuario" />
                            </div>
                            <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input  type="email" name="email" placeholder="Seu Email" class="form-control" id="inputCity" />
                            </div>
                            
                            <div class="control-group">
                            <label class="control-label">Senha</label>
                            <div class="controls">
                                <input type="password" class="form-control" id="inputAddress" placeholder="Sua Senha" name="senha" />
                            </div>
                            <div class="control-group">
                            <label class="control-label">Confirmar Senha</label>
                            <div class="controls">
                                <input  type="password" name="ConfSenha" class="form-control" id="inputAddress2" placeholder="Sua Senha" />
                            </div>
                        <br>
   						<input type="Submit" name="" value="Cadastrar" class="btn btn-success">
   						<a href="../index.php">  <buttom class="btn btn-secondary"> Logar </buttom></a>
   						<br>
   						

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

<?php 
	//verificar se o usuario clicou no botão
	if(isset($_POST['nome']))
	{
		$nome = addslashes($_POST['nome']);
		$usuario = addslashes($_POST['usuario']);
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$ConfSenha = addslashes($_POST['ConfSenha']);
		//verificar se esta tudo preenchido
		if(!empty($nome) &&  !empty($usuario) && !empty($email) && !empty($senha) && !empty($ConfSenha))
		{
			$u->conectar("login", "localhost","root","33541155");
			if($u->msgErro == "")// se esta tudo ok
			{	
				if($senha == $ConfSenha)
				{
					if($u->cadastrar($nome,$usuario,$email,$senha,$ConfSenha))
					{
						?>
						<br>
						<div class="alert alert-success" style="width: 400px; margin: 0 auto; color: green; border:2px solid rgba(0,255,0);">
						Cadastrado com Sucesso! Acesse para entrar!
						</div>
						<?php 
					}
					else
					{
						?>
						<div class="alert alert-danger" style="width: 400px; margin: 0 auto; background-color: rgba(255,0,0,0.3); border: 1px solid rgba(255,99,71,0.3);">
						Usuario ja cadastrado
						</div>
						<?php
					}
				}
				else
				{
					?>
					<div class="alert alert-danger" style="width: 400px; margin: 0 auto;">
					Senha e confirmar senha não corresponde!
					</div>
					<?php
				}
				
			}
			else
			{
				?>
				<div class="msg-erro" style="width: 400px; margin: 0 auto;">
				<?php echo "Erro: ".$u->msgErro;?>
				</div>
				<?php
			}
		}else
		{
			?>
			<br>
			<div class="msg-erro" style="width: 400px; margin: 0 auto; background-color: rgba(165,42,42,0.3); border: 1px solid rgba(165,42,42,0.3);">
			Preencha todos os campos!
			</div>
			<?php
		}
	}

	?>
</body>
</html>