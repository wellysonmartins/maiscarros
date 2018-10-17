<?php

  class Database {

    private $host  = "localhost";
    private $user  = "root";
    private $pass  = "081187";
    private $banco = "maiscarros";

    public function connect() {
      try {
        $pdo = new PDO("mysql:host=$this->host;dbname=$this->banco", $this->user, $this->pass);
      } catch( PDOException $e ) {
        $e->getMessage();
      }

      return $pdo;
    }

    public function sessionStart() {
      session_start();

      if( empty($_SESSION['login']) || empty($_SESSION['senha']) ) {
        header("Location: ../home.php");
      }
    }

    public function login() {
      $pdo = $this->connect();
      $login = $_POST['login'];
      $senha = md5($_POST['senha']);

      $usuario = $pdo->prepare("SELECT * FROM usuario WHERE login=:login and senha=:senha");
      $usuario->bindValue(':login', $login);
      $usuario->bindValue(':senha', $senha);
      $usuario->execute();
      $rowUsuario = $usuario->rowCount();
      $dadosUsuario = $usuario->fetchAll(PDO::FETCH_ASSOC);

      if( $rowUsuario > 0 ) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['id'] = $dadosUsuario[0]['id'];

        if(($login == "admin") || ($login == "ADMIN")) {
        header("Location: ../view/home_admin.php");
        } else {
          header("Location: ../view/home_func.php");
        }
      } else {
        session_start();
        $_SESSION['danger'] = 'Usuário não encontrado! Tente novamente!';
        header("Location: ../index.php");
      }
    }
  }
?>