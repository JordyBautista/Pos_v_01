<?php

class ProveedoresControlador {

    static public function ctrMostrarProveedores($item, $valor) {

        $tabla = "Proveedor";

        $respuesta = ProveedoresModelos::mdlMostrarProveedores($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCrearProveedor() {

        if (isset($_POST["IngresoCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoRazonSocial"]) &&
                    preg_match('/^[0-9]+$/', $_POST["IngresoRuc"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["IngresoCorreo"])) {

                $tabla = "Proveedor";

                $datos = array("Codigo" => $_POST["IngresoCodigo"],
                    "RazonSocial" => $_POST["IngresoRazonSocial"],
                    "Ruc" => $_POST["IngresoRuc"],
                    "Direccion" => $_POST["IngresoDireccion"],
                    "Correo" => $_POST["IngresoCorreo"],
                    "Telefono" => $_POST["IngresoTelefono"],
                    "Celular" => $_POST["IngresoCelular"]);


                $respuesta = ProveedoresModelos::mdlCrearProveedor($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Proveedor ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Proveedores";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El Proveedor no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Proveedores";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEditarProveedores() {

        if (isset($_POST["EditarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarRazonSocial"]) &&
                    preg_match('/^[0-9]+$/', $_POST["EditarRuc"]) &&
                    preg_match('/^[0-9]+$/', $_POST["EditarCodigo"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["EditarCorreo"])) {


                $tabla = "Proveedor";

                $datos = array("Codigo" => $_POST["EditarCodigo"],
                    "RazonSocial" => $_POST["EditarRazonSocial"],
                    "Ruc" => $_POST["EditarRuc"],
                    "Direccion" => $_POST["EditarDireccion"],
                    "Correo" => $_POST["EditarCorreo"],
                    "Telefono" => $_POST["EditarTelefono"],
                    "Celular" => $_POST["EditarCelular"]);
             

                $respuesta = ProveedoresModelos::mdlEditarProveedor($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Proveedor ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Proveedores";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El Proveedor no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Proveedores";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEliminarProveedor() {

        if (isset($_GET["idProveedor"])) {

            $tabla = "Proveedor";
            $datos = $_GET["idProveedor"];


            $respuesta = ProveedoresModelos::mdlEliminarProveedor($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "El Proveedor ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Proveedores";

								}
							})

				</script>';
            }
        }
    }

}
