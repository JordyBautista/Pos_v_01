<?php

class ContactosControlador {

    static public function ctrMostrarContactos($item, $valor) {

        $tabla = "Contactos";

        $respuesta = ContactosModelos::mdlMostrarContactos($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrCrearContacto() {

        if (isset($_POST["IngresoCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoNombre"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoApellidos"]) &&
                    preg_match('/^[0-9]+$/', $_POST["IngresoCodigo"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["IngresoCorreo"])) {
                $tabla = "contactos";

                $datos = array("Codigo" => $_POST["IngresoCodigo"],
                    "Nombres" => $_POST["IngresoNombre"],
                    "Apellidos" => $_POST["IngresoApellidos"],
                    "DNI" => $_POST["IngresoDni"],
                    "Direccion" => $_POST["IngresoDireccion"],
                    "Correo" => $_POST["IngresoCorreo"],
                    "Telefono" => $_POST["IngresoTelefono"],
                    "Celular" => $_POST["IngresoCelular"],
                    "Empresa" => $_POST["IngresoEmpresa"]);

                $respuesta = ContactosModelos::mdlCrearContacto($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Contacto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Contactos";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El Contacto no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Contactos";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEditarContactos() {

        if (isset($_POST["EditarCodigo"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarNombres"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarApellidos"]) &&
                    preg_match('/^[0-9]+$/', $_POST["EditarCodigo"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["EditarCorreo"])) {

                
                $tabla = "contactos";

                $datos = array("Codigo" => $_POST["EditarCodigo"],
                    "Nombres" => $_POST["EditarNombres"],
                    "Apellidos" => $_POST["EditarApellidos"],
                    "DNI" => $_POST["EditarDni"],
                    "Direccion" => $_POST["EditarDireccion"],
                    "Correo" => $_POST["EditarCorreo"],
                    "Telefono" => $_POST["EditarTelefono"],
                    "Celular" => $_POST["EditarCelular"],
                    "Empresa" => $_POST["EditarEmpresa"]);

                $respuesta = ContactosModelos::mdlEditarContacto($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Contacto ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Contactos";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El Contacto no puede ir vacío o llevar caracteres especiales!",
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

    static public function ctrEliminarContacto() {

        if (isset($_GET["idContacto"])) {

            $tabla = "contactos";
            $datos = $_GET["idContacto"];

 
            $respuesta = ContactosModelos::mdlEliminarContacto($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "El Contacto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Contactos";

								}
							})

				</script>';
            }
        }
    }

}
