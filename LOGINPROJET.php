<?php 
include("bdPROJET.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    extract($_POST);
    $err = "";
    if(!isset($login) || empty($login)) $err.= "<div style='color:red'>Login est vide </div>\n";
    if(!isset($mdp) || empty($mdp)) $err.= "<div style='color:red'>mdp est vide </div>\n";
    if(empty($err)){
        try{
            $req = $con->prepare("SELECT * FROM utilisateur WHERE login= ? AND password = ?");
            $req->execute([$login, $mdp]);
            $info_user = $req->fetch(PDO::FETCH_ASSOC);
            if($req->rowCount()==1){
                session_start();
                $_SESSION['login']=$info_user['login'];
                $_SESSION['mdp']=$info_user['password'];
                $_SESSION['nom']=$info_user['nom'];
                $_SESSION['prenom']=$info_user['prenom'];
                header("Location: welcome.php");
                exit;
            }else{
                $err.="<div style='color:red'>login ou mot de passe errone </div>\n";
            }
        }catch(PDOException $e){
            echo "erreur d'authentification".$e->getMessage();
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="projet.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: #f0f0f0;
}

.container {
    display: flex;
    width: 80%;
    max-width: 1200px;
    background: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

.left-side,
.right-side {
    flex: 1;
}

.left-side {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #6f42c1;
}

.left-side .illustration img {
    width: 450px;
}

.right-side {
    padding: 40px;
    background: #fff;
}

.login-box {
    max-width: 400px;
    margin: 0 auto;
}

.login-box h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.input-box {
    position: relative;
    margin-bottom: 30px;
}

.input-box input {
    width: 100%;
    padding: 10px;
    background: #f9f9f9;
    border: none;
    border-bottom: 2px solid #333;
    outline: none;
}

.input-box label {
    position: absolute;
    top: 10px;
    left: 10px;
    color: #aaa;
    transition: 0.5s;
    pointer-events: none;
}

.input-box input:focus~label,
.input-box input:valid~label {
    top: -20px;
    left: 0;
    color: #6f42c1;
    font-size: 12px;
}

.remember-me {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
}

.remember-me input {
    margin-right: 10px;
}

.remember-me label {
    color: #333;
}

button {
    width: 100%;
    padding: 10px;
    border: none;
    background: #6f42c1;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background: #563d7c;
}

.sign-up {
    text-align: center;
    margin-top: 20px;
}

.sign-up a {
    color: #6f42c1;
    text-decoration: none;
}

.sign-up a:hover {
    text-decoration: underline;
}
</style>

<body>
    <div class="container">
        <div class="left-side">
            <div class="illustration">
                <img src="Premium Vector _ Female teacher checking task of student_.png" alt="Illustration">
            </div>
        </div>
        <div class="right-side">
            <span><?php if(isset($err)) echo $err; ?></span>
            <div class="login-box">
                <h2>Login</h2>
                <form action="#">
                    <div class="input-box">
                        <input type="text" name="login" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <input type="password" name="mdp" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <button type="submit" name="env">Login</button>
                    <p class="sign-up">New here? <a href="#">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>