<?php

class CategoriasControlador {

    static public function ctrMostrarCategorias($item, $valor) {

        $tabla = "Categorias";
        $respuesta = CategoriasModelos::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrCrearCategoria() {

        if (isset($_POST["IngresoCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoCategoria"])) {
                $tabla = "Categorias";

                $datos = array("Codigo" => $_POST["IngresoCodigo"],
                    "Categoria" => $_POST["IngresoCategoria"],
                    "Estado" => $_POST["IngresoEstado"]);

                $respuesta = CategoriasModelos::mdlCrearCategoria($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Categoria ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Categorias";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡La Categoria no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Categorias";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEditarCategoria() {

        if (isset($_POST["EditarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarCategoria"])) {


                $tabla = "Categorias";

                $datos = array("Codigo" => $_POST["EditarCodigo"],
                    "Categoria" => $_POST["EditarCategoria"],
                    "Estado" => $_POST["EditarEstado"]);

                $respuesta = CategoriasModelos::mdlEditarCategoria($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La Categoria ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Categorias";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡La Categoria no puede ir vacío o llevar caracteres especiales!",
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

    static public function ctrEliminarCategoria() {

        if (isset($_GET["idCategoria"])) {

            $tabla = "Categorias";
            $datos = $_GET["idCategoria"];


            $respuesta = CategoriasModelos::mdlEliminarCategoria($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "La Categoria ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Categorias";

								}
							})

				</script>';
            }
        }
    }

}
