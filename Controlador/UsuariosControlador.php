<?php

class UsuariosControlador {

    static public function ctrMostrarUsuarios($item, $valor) {
        $tabla = "Usuarios";
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

                $tabla = "Usuarios";
                $item = "Usuario";
                $valor = $_POST["txtUsuario"];
                $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);

                if ($respuesta["Usuario"] == $_POST["txtUsuario"] && $respuesta["Password"] == $_POST["txtContraseña"]) {


                    if ($respuesta["Estado"] == 1) {

                        $_SESSION["iniciarSesion"] = "ok";

                        $item1 = "idPersonal";
                        $valor1 = $respuesta["idUsuario"];
                        $Personal = PersonalControlador::ctrMostrarPersonal($item1, $valor1);
                        $item2 = 'idPerfil';
                        $valor = $respuesta["idPerfil"];
                        $orden = 'idPerfil';
                        $Perfil = PerfilControlador::ctrMostrarPerfil($item, $valor, $orden);

                        $_SESSION["idPersonal"] = $Personal["idPersonal"];
                        $_SESSION["Nombres"] = $Personal["Nombres"];
                        $_SESSION["Apellidos"] = $Personal["Apellidos"];
                        $_SESSION["Foto"] = $Personal["Foto"];
                        $_SESSION["Perfil"] = $respuesta["Perfil"];

                    echo '<script>window.location = "Inicio";</script>';
                    } else {
                        echo '<br><div class="alert alert-danger">El usuario aún no está activado</div>';
                    }
                } else {

                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }



            }
        }
    }

    static public function ctrCrearUsuario() {

        if (isset($_POST["IngresoPersonal"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoUsuario"])) {
                $tabla = "Usuarios";

                $encriptar = crypt($_POST["IngresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("idUsuario" => $_POST["IngresoPersonal"],
                    "idPerfil" => $_POST["IngresoPerfil"],
                    "Usuario" => $_POST["IngresoUsuario"],
                    "Password" => $encriptar);
                $respuesta = UsuariosModelo::mdlCrearUsuario($tabla, $datos);


                if ($respuesta == "ok") {
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

        if (isset($_POST["EditarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarCategoria"])) {


                $tabla = "Categorias";

                $datos = array("Codigo" => $_POST["EditarCodigo"],
                    "Categoria" => $_POST["EditarCategoria"],
                    "Estado" => $_POST["EditarEstado"]);

                $respuesta = UsuariosModelo::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {

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
            $tabla = "Usuarios";
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
