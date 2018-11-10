<?php
    session_start();//incia sesion
    session_unset();//
    session_destroy();//se desstruye la session

    require_once("Model/conexion.php"); //se rquiere la coexion

    $usuario = filter_input(INPUT_POST,'usuario');//se filtra el username
    $contrasena = filter_input(INPUT_POST, 'password');//se filtra la password

    // validacion que los campos no esten vacios
    if($usuario === false || $usuario === NULL || $usuario === '' || 
        $contrasena === false || $contrasena === NULL || $contrasena === ''){

        header('Location: login.php');
        exit();
    }

    //Validacion del usuario
    // con una consulta mediante PDO
	$stmt = Conexion::get_conexion()->prepare('SELECT * FROM usuarios where usuario = :usuario');
    $stmt ->bindParam(':usuario',$usuario);
    $stmt ->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    if($r){
        //se inicia la sesion 
        if($r['contrasena'] === $contrasena){
            session_start();
			$_SESSION['validar'] = true;
            $_SESSION['usuario_id'] = (int)$r['id'];
            $_SESSION['usuario'] = $r['usuario'];
            $_SESSION['contrasena'] = $r['contrasena'];
            header('Location: index.php');
            exit();
        }
    }

    //session_start();
    //$usuario_id = $_SESSION['id'];

   // $stmt= ("insert into usuario (id_usuario) values ('".$_SESSION['id']."')",$conectar);
    



    header('Location: index.php');
?>