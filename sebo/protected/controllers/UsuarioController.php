<?php

class UsuarioController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionAltera(){
            $this->render('alteraUsuario');
        }
        
        public function actionDeleta(){
            $this->render('excluiUsuario');
        }
        
        public function actionLista(){
            $this->render('tabelaUsuarios');
        }
        
        public function actionCadastra(){
            $this->render('cadastrarUsuario');
        }
        
        public function actionFEmail(){
            $this->render('frameEmail');
        }
        
	public function actionCadastrar(){
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            
            
            Usuario::SalvarUsuario($nome, $email, $telefone, $senha);
        ?>
        <script language = "Javascript">
            alert("Cadastro efetuado com sucesso");
        </script>
        <script language = "Javascript">
        window.location="<?php echo Yii::app()->request->baseUrl; ?>/index.php";
        </script>
<?php     
        }
        
        public function actionChecaCadastro(){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $resultado = Usuario::checaCadastro($email, $senha);
            $id_pessoa = $resultado[0]['id_pessoa'];
            
            ?>
            <script language = "Javascript">
            window.location="<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/altera?idPessoa=<?php echo $id_pessoa?>";
            </script><?php
        }
        
        public function actionChecaCadastroId($id){
            return Usuario::getCadastradosPorId($id);
        }
        
        public function actionChecaSenhaId($idSenha){
            return Usuario::getSenhaPorId($idSenha);
        }

        public function actionAlterarCadastro(){
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            $id = $_POST['id_pessoa'];
            
            Usuario::Alterar($nome, $email, $telefone, $senha,$id);
        ?>
        <script language = "Javascript">
            alert("Cadastro efetuado com sucesso");
        </script>
        <script language = "Javascript">
        window.location="<?php echo Yii::app()->request->baseUrl; ?>/index.php";
        </script>
<?php
            
        }
        
        public function actionDeletaCadastro(){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            Usuario::Deletar($email, $senha);
            ?>
            <script language = "Javascript">
            window.location="<?php echo Yii::app()->request->baseUrl; ?>/index.php";
            </script><?php
        }


        public function actionListaCadastros(){
            return Usuario::getCadastrados();
        }
            
}
