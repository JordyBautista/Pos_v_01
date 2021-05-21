<?php

class PerfilControlador {

    static public function ctrMostrarPerfil($item, $valor, $orden) {

        $tabla = "perfil";

        return PerfilModelo::mdlMostrarPerfil($tabla, $item, $valor, $orden);
    }
 
    static public function ctrCrearPerfil() {

        if (isset($_POST["IngresoidPerfil"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoPerfil"])) {

                $tabla = "Perfil";
                $datos = array("idPerfil" =>$_POST["IngresoidPerfil"],
                    "Perfil" => $_POST["IngresoPerfil"],
                    "Descripcion" => $_POST["IngresoDescripcion"]);

                $respuesta = PerfilModelo::mdlCrearPerfil($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El perfil ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Perfil";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El perfil no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Perfil";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEditarPerfil() {

        if (isset($_POST["EditaridPerfil"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarPerfil"])) {


                $tabla = "Perfil";

                $datos = array("idPerfil" => $_POST["EditaridPerfil"],
                    "Perfil" => $_POST["EditarPerfil"],
                    "Descripcion" => $_POST["EditarDescripcion"]);

                $respuesta = PerfilModelo::mdlEditarPerfil($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Perfil ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Perfil";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡La Perfil no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Maracas";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEliminarPerfil() {

        if (isset($_GET["idPerfil"])) {

            $tabla = "Perfil";
            $datos = $_GET["idPerfil"];

            $respuesta = PerfilModelo::mdlEliminarPerfil($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "El perfil ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Perfil";

								}
							})

				</script>';
            }
        }
    }

}
