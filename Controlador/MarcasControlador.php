<?php

class MarcasControlador {

    static public function ctrMostrarMarcas($item, $valor) {

        $tabla = "Marcas";

        $respuesta = MarcasModelos::mdlMostrarMarcas($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCrearMarca() {

        if (isset($_POST["IngresoCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoMarca"])) {
                $tabla = "Marcas";

                $datos = array("Codigo" => $_POST["IngresoCodigo"],
                    "Marca" => $_POST["IngresoMarca"],
                    "Marca_Corto" => $_POST["IngresoMarcaCorto"],
                    "Estado" => $_POST["IngresoEstado"]);

                $respuesta = MarcasModelos::mdlCrearMarca($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Marca ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Marcas";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡La Marca no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Marcas";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEditarMarca() {

        if (isset($_POST["EditarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarMarca"])) {


                $tabla = "Marcas";

                $datos = array("Codigo" => $_POST["EditarCodigo"],
                    "Marca" => $_POST["EditarMarca"],
                    "Marca_Corto" => $_POST["EditarNombreCorto"],
                    "Estado" => $_POST["EditarEstado"]);

                $respuesta = MarcasModelos::mdlEditarMarca($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Marca ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Marcas";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡La Marca no puede ir vacío o llevar caracteres especiales!",
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

    static public function ctrEliminarMarca() {

        if (isset($_GET["idMarca"])) {

            $tabla = "Marcas";
            $datos = $_GET["idMarca"];


            $respuesta = MarcasModelos::mdlEliminarMarca($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "La Marca ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Marcas";

								}
							})

				</script>';
            }
        }
    }

}
