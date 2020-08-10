<!DOCTYPE html>
<html>
<head>
    <title>Instruções para redefinição senha</title>
</head>

<style>
  .btn{
    background-color:rgb(51, 40, 8);
    padding: 12px;
    color:white;
    border-radius: 2px;
    text-transform:uppercase;
    text-decoration: none;
    font-size: 15px;
  }
</style>

<body style="background-image: linear-gradient(0deg, #E6E6F5, white);background-repeat: no-repeat;background-attachment: fixed; font-family: Roboto, sans-serif;">
<div style="background-color: rgb(51, 40, 8); margin:0;padding:0;">
  <p align="center" style="color: white;">LOGO CARALHO</p>
</div>

<div align="center" class="container">
  <h1 style="font-weight: 1;">Instruções para redefinição senha</h1>
  <p style="max-width:450px;color:#666;">Olá, você deve ter esquecido sua senha não é mesmo?</p>
  <p style="max-width:450px;color:#666;padding-bottom:30px;">Clique no botão para redefinir a senha da sua conta</p>
  <a class="btn" href="localhost:8000/resetPassword/?email={{$email}}&id={{$id}}" target="_blank">
    Redefinir senha
  </a>
</div>







</body>

</html>
