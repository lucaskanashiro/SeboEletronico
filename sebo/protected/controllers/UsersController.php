<?php

class UsersController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAdd(){
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            
            
            User::Add($nome, $email, $telefone, $senha);
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