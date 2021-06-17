<?php

class UsuariosControlador {

    static public function ctrMostrarUsuarios($item, $valor) {
        $tabla = "Usuario";
        $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    /* =============================================
      INGRESO DE USUARIO
      ============================================= */

    static public function ctrIngresoUsuario() {

        if (isset($_POST["txtUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtUsuario"]) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtContraseña"])) {

                $encriptar = crypt($_POST["txtContraseña"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "Usuario";
                $item = "Usuario";
                $valor = $_POST["txtUsuario"];
                $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);
                if ($respuesta) {
                    
                    if ($respuesta["Usuario"] == $_POST["txtUsuario"] && $respuesta["Contrasena"] == $encriptar) {
    
    
                        if ($respuesta["Estado"] == 1) {
                            $_SESSION["iniciarSesion"] = "ok";
    
                            $item1 = "idPersonal";
                            $valor1 = $respuesta["idUsuario"];
                            $Personal = PersonalControlador::ctrMostrarPersonal($item1, $respuesta["idPersonal"]);
                            $item2 = 'idPerfil';
                            $valor = $respuesta["idPerfil"];
                            $orden = 'idPerfil';
                            $Perfil = PerfilControlador::ctrMostrarPerfil($orden, $respuesta['idPerfil'], $orden);
    
                            $_SESSION["idPersonal"] = $Personal["idPersonal"];
                            $_SESSION["idUsuario"] = $respuesta["idUsuario"];
                            $_SESSION["Nombres"] = $Personal["Nombres"];
                            $_SESSION["Apellidos"] = $Personal["Apellidos"];
                            $_SESSION["Foto"] = $Personal["Foto"];
                            $_SESSION["Perfil"] = $Perfil["Perfil"];
    
                            echo '<script>window.location = "Inicio";</script>';
                        } else {
                            echo '<br><div class="alert alert-danger">El usuario aún no está activado</div>';
                        }
                    } else {
    
                        echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }
                }else{
                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }



            }
        }
    }

    static public function ctrCrearUsuario() {

        if (isset($_POST["IngresoUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoUsuario"])) {
                $tabla = "usuario";

                $encriptar = crypt($_POST["IngresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array(
                    "idPersonal" => $_POST["IngresoPersonal"],
                    "idPerfil" => $_POST["IngresoPerfil"],
                    "Usuario" => $_POST["IngresoUsuario"],
                    "Password" => $encriptar);
                $respuesta = UsuariosModelo::mdlCrearUsuario($tabla, $datos);


            if ($respuesta) {
                    echo '<script>
					Swal.fire({
						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if(result.value){
								window.location = "Usuarios";

							}
							});
							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Usuarios";

								}

								});


								</script>';
            
        }
    }
}
    static public function ctrEditarUsuario() {

        if (isset($_POST["EditarUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarUsuario"])) {


                $tabla = "usuario";

                $datos = array("usuario" => $_POST["EditarUsuario"],
                    "idUsuario" => $_POST["idUsuario"],
                    "perfil" => $_POST["EditarPerfil"],
                    "Estado" => $_POST["EditarEstado"]);

                $respuesta = UsuariosModelo::mdlEditarUsuario($tabla, $datos);

                if ($respuesta) {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El usuario ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Usuarios";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Usuarios";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEliminarUsuario() {

        if (isset($_GET["idUsuario"])) {
            $tabla = "Usuario";
            $datos = $_GET["idUsuario"];
            $respuesta = UsuariosModelo::mdlEliminarUsuario($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Usuarios";

								}
							})

				</script>';
            }
        }
    }

}
