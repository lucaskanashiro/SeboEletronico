<?php
$destinatario = 'levi.moraes@yahoo.com.br';
$mensagem =
' <a href ="www.google.com.br"> 
Visite a pagina do google </a>
<h1> Hello World </h1>';



$subject= 'Existe uma pessoa interessada no seu Livro - Sebo Eletronico'; // Assunto.
$to= $destinatario; // Para.
$body= $mensagem; // corpo do texto.
if (mail($to,$subject,$body,"Content-Type: text/html"))
echo 'e-mail enviado com sucesso!';
else
echo 'e-mail n�o enviado!';
?>