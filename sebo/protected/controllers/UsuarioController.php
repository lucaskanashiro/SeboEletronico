<?php

class UsuariosController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionCadastrar(){
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            
            
            Usuario::Cadastrar($nome, $email, $telefone, $senha);
        ?>
        <script language = "Javascript">
            alert("Cadastro efetuado com sucesso");
        </script>
        <script language = "Javascript">
        window.location="<?php echo Yii::app()->request->baseUrl; ?>";
        </script>
<?php
            
        }
}