<?php

class EstadosControlador {

    static public function ctrMostrarEstados($item, $valor) {

        $tabla = "Estados";

        $respuesta = EstadosModelo::mdlMostrarEstados($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCrearEstado() {

        if (isset($_POST["IngresoCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoEstado"])) {
                $tabla = "Estados";

                $datos = array("Codigo" => $_POST["IngresoCodigo"],
                    "Estado" => $_POST["IngresoEstado"],
                    "Estado_Corto" => $_POST["IngresoEstadoCorto"],
                    "Estado" => $_POST["IngresoEstado"]);

                $respuesta = EstadosModelos::mdlCrearEstado($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Estado ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Estados";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡La Estado no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Estados";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEditarEstado() {

        if (isset($_POST["EditarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarEstado"])) {


                $tabla = "Estados";

                $datos = array("Codigo" => $_POST["EditarCodigo"],
                    "Estado" => $_POST["EditarEstado"],
                    "Estado_Corto" => $_POST["EditarNombreCorto"],
                    "Estado" => $_POST["EditarEstado"]);

                $respuesta = EstadosModelos::mdlEditarEstado($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Estado ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Estados";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡La Estado no puede ir vacío o llevar caracteres especiales!",
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

    static public function ctrEliminarEstado() {

        if (isset($_GET["idEstado"])) {

            $tabla = "Estados";
            $datos = $_GET["idEstado"];


            $respuesta = EstadosModelos::mdlEliminarEstado($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "La Estado ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Estados";

								}
							})

				</script>';
            }
        }
    }

}
