<?php
// Clase controlador
class Controller{
	
		//funcion para mostrar la pagina
		public function pagina(){
			include('Views/template.php');
		}


		//funcion de enlaces
		public function enlacesPaginasController(){
					// trabajar con los enlaces de las paginas
			//validamos si la variable "action" viene vacia , es decir , cuando se abre la pagina por primera vez se debe cargar la vista index1.php


			if (isset($_GET['action'])) {
				//guardar el valor de la variable action en "Views/modules/navegacion.php en el cual se recibe mediante el metodo GET esa variable "

				$enlacesController = $_GET['action'];

			}else{
				//si viene vacio inicializo con index

				$enlacesController = "index";
			}
			
			$respuesta = Paginas::enlacesPaginasModel($enlacesController);
			include $respuesta;

		}




		public function PromoController(){
				//se le asigna la clase Datos con la funcion de vista con el parametro que es el nombre de la tabla 
				
				$respuesta = Datos::vistaPromo('promociones');
				//foreach para traer los datos
				foreach ($respuesta as $datos => $item) {
					echo '<tr>
						<td>'.$item["id"].'</td>
						<td>'.$item["promociones"].'</td>
						<td>'.$item["fecha_vencimiento"].'</td>
						</tr>';
				}	
		}

	    public function VisitasController(){
			$id = $_SESSION['usuario_id'];
				//se le asigna la clase Datos con la funcion de vista con el parametro que es el nombre de la tabla 
				$respuesta = Datos::vistaVisitas($id,'visitas');
				//foreach para traer los datos
				foreach ($respuesta as $datos => $item) {
					echo '<tr>
						<td>'.$item["id"].'</td>
						<td>'.$item["fecha"].'</td>
						<td>'.$item["user"].'</td>
						<td>'.$item["servicio"].'</td>
						<td>'.$item["estado"].'</td>
						</tr>';
				}	
		}


		public function PremiosController(){
			
				//se le asigna la clase Datos con la funcion de vista con el parametro que es el nombre de la tabla 
				$respuesta = Datos::vistaPremios('premios');
				//foreach para traer los datos
				foreach ($respuesta as $datos => $item) {
					echo '<tr>
						<td>'.$item["id"].'</td>
						<td>'.$item["premio"].'</td>
						<td>'.$item["detalles"].'</td>
						<td>'.$item["num_visitas"].'</td>
						</tr>';
				}	
		}





		//funcion controller para cargar los jugadores al momento de querer actualizar
		public function getUsuarioController(){
			//se obtiene el id del jugador mediante el get 
			$id = $_SESSION['usuario_id'];
				//hacemos la consulta rapida mediante el metodo getJugador y el nombre de la tabla
				$respuesta = Datos::UsuarioModel($id, 'usuarios');
				//en la tabla traemos los valores con la variable respuesta 
				echo '
				<div class="row">
    			<div class="col-sm-10 col-md-10 col-xs-10">
				<!-- Horizontal Form -->
					<div class="box box-info">
						<div class="box-header with-border">
						<h3 class="box-title">Llene el campo para cambiar la contraseña</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form class="form-horizontal">
						<div class="box-body">
							<div class="form-group">
							

							<input type="hidden" name="id" value="'.$respuesta["id"].'">
							
							<input type="hidden" name="nombre" value="'.$respuesta["nombre"].'">
							
							<input type="hidden" name="apellidos" value="'.$respuesta["apellidos"].'">

							<input type="hidden" name="edad" value="'.$respuesta["edad"].'">
							

                    		<input type="hidden" name="usuario" value="'.$respuesta["usuario"].'">
                  
                </div>
                <div class="form-group">
                  <label for="pass" class="col-sm-2 control-label">Contraseña Actual</label>

                  <div class="col-sm-4">
                    <input type="password" class="form-control" id="pass"  name = "pass" value="'.$respuesta["contrasena"].'"  disabled=”disabled”>
                  </div>
                </div>
                 <div class="form-group">

                  <label for="newpass" class="col-sm-2 control-label">Nueva Contraseña</label>

                  <div class="col-sm-4">
                    <input type="password" class="form-control" id="newpass"  name = "newpass" placeholder="Contraseña" required>
                  </div>
                </div>
				
				<input type="hidden" name="correo" value="'.$respuesta["correo"].'">

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-default"><a href = "index.php?action=inicio">Cancelar</a></button>
                <button type="submit" class="btn btn-info pull-right">Cambiar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
</div>
					';
			
			}


				//funcion controller para actualizar un usuario
				public function ActualizarUsuarioController(){
					//mediante el id recibido 
					if (isset($_POST['id'])) {
						//mandamos los datos del post en el array 
						$datos = array(
							'id' => $_POST['id'],
							'nombre' => $_POST['nombre'],
							'apellidos' => $_POST['apellidos'],
							'edad' => $_POST['edad'],
							'usuario'=> $_POST['usuario'],
							'contrasena' => $_POST['newpass'],
							'correo' => $_POST['correo']
						);
						//hacemos uso de la funcion updateJugador mandando dos parametros los datos y el nombre de la tabla
						$respuesta = Datos::updateUsuario($datos, 'usuarios');
						// condicion para la correcta ejecucion del update
						if($respuesta == "success"){
							echo "Contraseña actualiza!";
							
						} else {
							echo "Error al cambiar la contraseña!";
						}
					}
						
				}
	

				//funcion controller para el conteo de las visitas 
			public function visitas(){
				$id = $_SESSION['usuario_id'];
				$count = Datos::count_visitas($id,'visitas');
				echo ($count);		
			}

			
		}

?>