<?php

class PresentacionControlador {

    static public function ctrMostrarPresentacion($item, $valor) {

        $tabla = "Presentacion";

        $respuesta = PresentacionModelos::mdlMostrarPresentacion($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCrearPresentacion() {

        if (isset($_POST["IngresoCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoPresentacion"])) {
                $tabla = "Presentacion";

                $datos = array("Codigo" => $_POST["IngresoCodigo"],
                    "Presentacion" => $_POST["IngresoPresentacion"],
                    "Descripcion" => $_POST["IngresoDescripcion"],
                    "Estado" => $_POST["IngresoEstado"]);

                $respuesta = PresentacionModelos::mdlCrearPresentacion($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Presentacion ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Presentacion";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡La Presentacion no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Presentacion";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEditarPresentacion() {

        if (isset($_POST["EditarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarPresentacion"])) {


                $tabla = "Presentacion";

                $datos = array("Codigo" => $_POST["EditarCodigo"],
                    "Presentacion" => $_POST["EditarPresentacion"],
                    "Descripcion" => $_POST["EditarDescripcion"],
                    "Estado" => $_POST["EditarEstado"]);

                $respuesta = PresentacionModelos::mdlEditarPresentacion($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Presentacion ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Presentacion";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡La Presentacion no puede ir vacío o llevar caracteres especiales!",
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

    static public function ctrEliminarPresentacion() {

        if (isset($_GET["idPresentacion"])) {

            $tabla = "Presentacion";
            $datos = $_GET["idPresentacion"];


            $respuesta = PresentacionModelos::mdlEliminarPresentacion($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "La Presentacion ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Presentacion";

								}
							})

				</script>';
            }
        }
    }

}
