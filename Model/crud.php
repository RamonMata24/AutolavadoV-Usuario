<?php 
//SE REQUIERE LA CONEXION PARA PODER PROCESAR LAS CONSULTAS
require_once("conexion.php");

	class Datos extends Conexion {
	  
		//FUNCIO PARA VER LAS PROMOCIONES
		public static function vistaPromo($tabla){
			$stmt = Conexion::get_conexion()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}


		// FUNCION PARA VER LOS PREMIOS
		public static function vistaPremios($tabla){
			$stmt = Conexion::get_conexion()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}

		//FUNCION PARA VER LAS VISITAS
		public static function vistaVisitas($id,$tabla){
			$stmt = Conexion::get_conexion()->prepare("SELECT * FROM $tabla where user = $id");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
		}


		// VISTA DE USUAURIO
		public static function UsuarioModel($id,$tabla){

				$stmt = Conexion::get_conexion()->prepare("SELECT * FROM $tabla where id = :id");
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetch();
				$stmt->close();
		}


		//FUNCION PARA ACTUALIZAR LOS DATOS DEL USUARIO EN ESTE CASO PARA LA CONTRSEÑA
		public static function updateUsuario($datos,$tabla){
		$stmt = Conexion::get_conexion()->prepare("UPDATE $tabla SET nombre = :nombre, apellidos = :apellidos, edad = :edad, usuario =:usuario, contrasena = :contrasena ,correo = :correo WHERE id = :id");		
		$stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(':apellidos', $datos['apellidos'], PDO::PARAM_STR);
		$stmt->bindParam(':edad', $datos['edad'], PDO::PARAM_INT);
		$stmt->bindParam(':usuario', $datos['usuario'], PDO::PARAM_STR);
		$stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
		$stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
		$stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			echo '<script>alert("Contraseña Actualizada")</script>';
			return 'success';
		} else {
			echo '<script>alert("Error al Actualizar!")</script>';
			return 'error';
		}

		$stmt->close();

		}

// FUNCION PARA CONTAR LAS VISITAS DE CADA USUARIO
		public static function count_visitas($id,$tabla){
			$model = new Conexion();
			$conexion = $model->get_conexion();
			$sql = "SELECT COUNT(id) AS total FROM $tabla where user = $id";
			$stm = $conexion->prepare($sql);
			$stm->execute();
			$results = $stm->fetchall();
			$getCount = $results[0]['total'];
			return $getCount;
			
		}
	}
    
?>