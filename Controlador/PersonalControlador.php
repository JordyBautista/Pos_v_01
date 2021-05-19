<?php

class PersonalControlador {

    static public function ctrMostrarPersonal($item, $valor) {

        $tabla = "Personal";

        $respuesta = PersonalModelos::mdlMostrarPersonal($tabla, $item, $valor);

        return $respuesta;
    }
    
     static public function ctrMostrarPersonalSinUsuario($item, $valor) {

        $tabla = "Personal";

        $respuesta = PersonalModelos::mdlMostrarPersonalSinUsuario($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCrearPersonal() {

        if (isset($_POST["IngresoCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoNombre"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoApellidos"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["IngresoCorreo"])) {


                $ruta = "Vistas/img/Personal/Default/Usuario.png";

                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

                    $directorio = "Vistas/img/Personal/" . $_POST["IngresoCodigo"];

                    mkdir($directorio, 0755);

                    /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "Vistas/img/Personal/" . $_POST["IngresoCodigo"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "Vistas/img/Personal/" . $_POST["IngresoCodigo"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "Personal";

                $datos = array("idPersonal" => $_POST["IngresoCodigo"],
                    "Nombres" => $_POST["IngresoNombre"],
                    "Apellidos" => $_POST["IngresoApellidos"],
                    "Dni" => $_POST["IngresoDni"],
                    "Fecha_Nacimiento" => $_POST["IngresoFechaNacimiento"],
                    "Direccion" => $_POST["IngresoDireccion"],
                    "Correo" => $_POST["IngresoCorreo"],
                    "Telefono" => $_POST["IngresoTelefono"],
                    "Celular" => $_POST["IngresoCelular"],
                    "Foto" => $ruta,
                    "Estado" => $_POST["IngresoEstado"]);

                $respuesta = PersonalModelos::mdlCrearPersonal($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Personal";

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

									window.location = "Personal";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEditarPersonal() {

        if (isset($_POST["EditarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarNombres"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarApellidos"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["EditarCorreo"])) {

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["EditarFoto"]["tmp_name"]) && !empty($_FILES["EditarFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["EditarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

                    $directorio = "Vistas/img/Personal/" . $_POST["EditarCodigo"];

                    /* =============================================
                      PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                      ============================================= */

                    if (!empty($_POST["fotoActual"])) {

                        unlink($_POST["fotoActual"]);
                    } else {

                        mkdir($directorio, 0755);
                    }

                    /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

                    if ($_FILES["EditarFoto"]["type"] == "image/jpeg") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "Vistas/img/Personal/" . $_POST["EditarCodigo"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["EditarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["EditarFoto"]["type"] == "image/png") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "Vistas/img/Personal/" . $_POST["EditarCodigo"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["EditarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }
                $tabla = "Personal";

                $datos = array("idPersonal" => $_POST["EditarCodigo"],
                    "Nombres" => $_POST["EditarNombres"],
                    "Apellidos" => $_POST["EditarApellidos"],
                    "Dni" => $_POST["EditarDni"],
                    "Fecha_Nacimiento" => $_POST["EditarFechaNacimiento"],
                    "Direccion" => $_POST["EditarDireccion"],
                    "Correo" => $_POST["EditarCorreo"],
                    "Telefono" => $_POST["EditarTelefono"],
                    "Celular" => $_POST["EditarCelular"],
                    "Foto" => $ruta,
                    "Estado" => $_POST["EditarEstado"]);

                $respuesta = PersonalModelos::mdlEditarPersonal($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El usuario ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Personal";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El personal no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Personal";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEliminarPersonal() {

        if (isset($_GET["idPersonal"])) {

            $tabla = "personal";
            $datos = $_GET["idPersonal"];

            if ($_GET["fotoPersonal"] != "") {

                unlink($_GET["fotoPersonal"]);
                rmdir('Vistas/img/Personal/' . $_GET["idPersonal"]);
            }

            $respuesta = PersonalModelos::mdlEliminarPersonal($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "El personal ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Personal";

								}
							})

				</script>';
            }
        }
    }

}
