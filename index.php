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
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>




	<div class="container">
        <div class="row">
            <div class="span12" style="text-align:center; margin: 0 auto;">
	
	<fieldset>
            <legend>Por favor Entre</legend>
	<div class="control-group">
	<form  method="POST" class="form-horizontal" style="width: 400px; margin: 0 auto;">

		<input type="text" name="usuario" class="form-control" placeholder="Usuario">
		<input type="password" name="senha" placeholder="senha" class="form-control">
		<br><input type="Submit" value="Entrar" class="btn btn-primary">
		<a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se!</strong></a>
	</form>
	</div>
	</div>
</div>

	<?php 
	if(isset($_POST['usuario']))
	{
		$usuario = addslashes($_POST['usuario']);
		$senha = addslashes($_POST['senha']);
		//verificar se esta tudo preenchido
		if(!empty($usuario) && !empty($senha))
		{
			$u->conectar("login", "localhost","root","33541155");
			if($u->msgErro == "")
			{
				if($u->logar($usuario,$senha))
				{
					header("location: paginas/areaprivada.php");

				}
				else
				{
					?>
					<div class="alert alert-warning" role="alert" style="width: 400px; margin: 0 auto;">
					Usuario e/ou senha estão incorretos, ou não existe!
					</div>
					<?php
				}
			}
			else
			{
				echo "Erro: ".$u->msgErro;
			}
		}else
		{
			?>
			<div class="alert alert-success" role="alert" style="width: 400px; margin: 0 auto; background-color: rgba(165,42,42,0.3); border: 1px solid rgba(165,42,42,0.3);">
			Preencha todos os campos!,
			</div>
		<?php
		}
	}


	?>
</body>
</html>