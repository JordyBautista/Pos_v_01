<?php

class ClientesControlador {

    static public function ctrMostrarClientes($item, $valor) {

        $tabla = "Clientes";

        $respuesta = ClientesModelo::mdlMostrarClientes($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCrearCliente() {

        if (isset($_POST["IngresoCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoNombre"]) &&
                    preg_match('/^[0-9]+$/', $_POST["IngresoDni"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["IngresoCorreo"])) {
                $tabla = "Clientes";

                $datos = array("idCliente" => $_POST["IngresoCodigo"],
                    "Nombres" => $_POST["IngresoNombre"],
                    "Dni" => $_POST["IngresoDni"],
                    "Direccion" => $_POST["IngresoDireccion"],
                    "Correo" => $_POST["IngresoCorreo"],
                    "Telefono" => $_POST["IngresoTelefono"],
                    "Celular" => $_POST["IngresoCelular"],
                    "FechaNacimiento" => $_POST["IngresoFechaNacimiento"]);
               
                $respuesta = ClientesModelo::mdlCrearCliente($tabla, $datos);
                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Cliente ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Clientes";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El Cliente no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Clientes";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEditarClientes() {

        if (isset($_POST["EditarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarNombre"]) &&
                    preg_match('/^[0-9]+$/', $_POST["EditarDni"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["EditarCorreo"])) {

                
                $tabla = "Clientes";

                $datos = array("idCliente" => $_POST["EditarCodigo"],
                    "Nombres" => $_POST["EditarNombre"],
                    "Dni" => $_POST["EditarDni"],
                    "Direccion" => $_POST["EditarDireccion"],
                    "Correo" => $_POST["EditarCorreo"],
                    "Telefono" => $_POST["EditarTelefono"],
                    "Celular" => $_POST["EditarCelular"],
                    "FechaNacimiento" => $_POST["EditarFechaNacimiento"]);
                var_dump($datos);

                $respuesta = ClientesModelo::mdlEditarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Cliente ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Clientes";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El Cliente no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Clientes";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEliminarCliente() {

        if (isset($_GET["idCliente"])) {

            $tabla = "Clientes";
            $datos = $_GET["idCliente"];

 
            $respuesta = ClientesModelo::mdlEliminarCliente($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "El Cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Clientes";

								}
							})

				</script>';
            }
        }
    }

}
