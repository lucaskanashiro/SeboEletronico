function livrosDisponiveis(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/livrosDisponiveis.php";
}

function meusLivros(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/meusLivros.php";
}

function home(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/indexLogin.php";
}

function user(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/indexUsuario.php";
}

function cadastra(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/cadastrarUsuario.php";
}

function altera(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/alteraUsuario.php";
}

function deleta(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/excluiUsuario.php";
}

function pesquisa(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/pesquisarUsuario.php";
}

function cadastraLivro(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/cadastrarLivro.php";
}

function pesquisaLivro() {
    window.location="http://localhost/SeboEletronicov2.0/Visao/pesquisarLivro.php";
}

function deletaLivro() {
    window.location="http://localhost/SeboEletronicov2.0/Visao/excluirLivro.php";
}

function livro(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/indexLivro.php";
}
function login(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/entrarLogin.php";
}
function sair(){
    window.location="http://localhost/SeboEletronicov2.0/Visao/site.php";
}
function loginsuccessfully(id){
    window.location='http://localhost/SeboEletronicov2.0/Visao/indexLogin.php?idUser=id';
}
function loginfailed(){
    setTimeout("window.location='http://localhost/SeboEletronicov2.0/Visao/entrarLogin.php'",0);
}