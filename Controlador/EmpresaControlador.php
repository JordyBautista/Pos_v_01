<?php

class EmpresaControlador {

    static public function ctrMostrarMoneda($item, $valor) {
        $tabla = "Moneda";
        $respuesta = EmpresaModelo::mdlMostrarRegistros($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrMostrarEmpresa($item, $valor) {
        $tabla = "Empresa";
        $respuesta = EmpresaModelo::mdlMostrarRegistros($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrEditarEmpresa() {

        if (isset($_POST["idEmpresa"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EmpRazonSocial"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["EmpCorreo"])) {

                $Logo = $_POST["LogoActual"];
                $LogoLogin = $_POST["LogoLoginActual"];
                $LogoCorto = $_POST["LogoCortoActual"];


                if (isset($_FILES["nuevoLogo"]["tmp_name"]) && !empty($_FILES["nuevoLogo"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevoLogo"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 107;

                    /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

                    $directorio = "Vistas/img/Empresa/Empresa";

                    /* =============================================
                      PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                      ============================================= */

                    if (!empty($_POST["LogoActual"])) {

                        unlink($_POST["LogoActual"]);
                    } else {

                        mkdir($directorio, 0755);
                    }

                    /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

                    if ($_FILES["nuevoLogo"]["type"] == "image/jpeg") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $Logo = "Vistas/img/Empresa/Empresa/" . $_POST["EmpRuc"] . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevoLogo"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $Logo);
                    }

                    if ($_FILES["nuevoLogo"]["type"] == "image/png") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio = mt_rand(100, 999);

                        $Logo = "Vistas/img/Empresa/Empresa/" . $_POST["EmpRuc"] . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevoLogo"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);

                        imagesavealpha($destino, TRUE);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $Logo);
                    }
                }


                if (isset($_FILES["nuevoLogoCorto"]["tmp_name"]) && !empty($_FILES["nuevoLogoCorto"]["tmp_name"])) {

                    list($ancho1, $alto1) = getimagesize($_FILES["nuevoLogoCorto"]["tmp_name"]);

                    $nuevoAncho1 = 121;
                    $nuevoAlto1 = 107;

                    /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

                    $directorio1 = "Vistas/img/Empresa/Empresa";

                    /* =============================================
                      PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                      ============================================= */

                    if (!empty($_POST["LogoCortoActual"])) {

                        unlink($_POST["LogoCortoActual"]);
                    } else {

                        mkdir($directorio1, 0755);
                    }

                    /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

                    if ($_FILES["nuevoLogoCorto"]["type"] == "image/jpeg") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio1 = mt_rand(100, 999);

                        $LogoCorto = "Vistas/img/Empresa/Empresa/" . $_POST['EmpRuc'] . $aleatorio1 . ".jpg";

                        $origen1 = imagecreatefromjpeg($_FILES["nuevoLogoCorto"]["tmp_name"]);

                        $destino1 = imagecreatetruecolor($nuevoAncho1, $nuevoAlto1);

                        imagecopyresized($destino1, $origen1, 0, 0, 0, 0, $nuevoAncho1, $nuevoAlto1, $ancho1, $alto1);

                        imagejpeg($destino1, $LogoCorto);
                    }

                    if ($_FILES["nuevoLogoCorto"]["type"] == "image/png") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio1 = mt_rand(100, 999);

                        $LogoCorto = "Vistas/img/Empresa/Empresa/" . $_POST['EmpRuc'] . $aleatorio1 . ".png";

                        $origen1 = imagecreatefrompng($_FILES["nuevoLogoCorto"]["tmp_name"]);

                        $destino1 = imagecreatetruecolor($nuevoAncho1, $nuevoAlto1);
                        imagealphablending($destino1, FALSE);

                        imagesavealpha($destino1, TRUE);

                        imagecopyresized($destino1, $origen1, 0, 0, 0, 0, $nuevoAncho1, $nuevoAlto1, $ancho1, $alto1);

                        imagepng($destino1, $LogoCorto);
                    }
                }


                if (isset($_FILES["nuevoLogoLogin"]["tmp_name"]) && !empty($_FILES["nuevoLogoLogin"]["tmp_name"])) {

                    list($ancho2, $alto2) = getimagesize($_FILES["nuevoLogoLogin"]["tmp_name"]);

                    $nuevoAncho2 = 1500;
                    $nuevoAlto2 = 1000;

                    /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

                    $directorio2 = "Vistas/img/Empresa/Empresa";

                    /* =============================================
                      PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                      ============================================= */

                    if (!empty($_POST["LogoLoginActual"])) {

                        unlink($_POST["LogoLoginActual"]);
                    } else {

                        mkdir($directorio2, 0755);
                    }

                    /* =============================================
                      DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                      ============================================= */

                    if ($_FILES["nuevoLogoLogin"]["type"] == "image/jpeg") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio2 = mt_rand(100, 999);

                        $LogoLogin = "Vistas/img/Empresa/Empresa/" . $_POST["EmpRuc"] . $aleatorio2 . ".jpg";

                        $origen2 = imagecreatefromjpeg($_FILES["nuevoLogoLogin"]["tmp_name"]);

                        $destino2 = imagecreatetruecolor($nuevoAncho2, $nuevoAlto2);

                        imagecopyresized($destino2, $origen2, 0, 0, 0, 0, $nuevoAncho2, $nuevoAlto2, $ancho2, $alto2);

                        imagejpeg($destino2, $LogoLogin);
                    }

                    if ($_FILES["nuevoLogoLogin"]["type"] == "image/png") {

                        /* =============================================
                          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                          ============================================= */

                        $aleatorio2 = mt_rand(100, 999);

                        $LogoLogin = "Vistas/img/Empresa/Empresa/" . $_POST["EmpRuc"] . $aleatorio2 . ".png";

                        $origen2 = imagecreatefrompng($_FILES["nuevoLogoLogin"]["tmp_name"]);

                        $destino2 = imagecreatetruecolor($nuevoAncho2, $nuevoAlto2);
                        imagealphablending($destino2, FALSE);

                        imagesavealpha($destino2, TRUE);

                        imagecopyresized($destino2, $origen2, 0, 0, 0, 0, $nuevoAncho2, $nuevoAlto2, $ancho2, $alto2);

                        imagepng($destino2, $LogoLogin);
                    }
                }







                $tabla = "Empresa";
                $datos = array("idEmpresa" => $_POST["idEmpresa"],
                    "RazonSocial" => $_POST["EmpRazonSocial"],
                    "Ruc" => $_POST["EmpRuc"],
                    "idMoneda" => $_POST["EmpMoneda"],
                    "IGV" => $_POST["EmpIGV"],
                    "Direccion" => $_POST["EmpDireccion"],
                    "Correo" => $_POST["EmpCorreo"],
                    "Telefono" => $_POST["EmpTelefono"],
                    "Celular" => $_POST["EmpCelular"],
                    "Logo" => $Logo,
                    "LogoLogin" => $LogoLogin,
                    "LogoCorto" => $LogoCorto);
                $respuesta = EmpresaModelo::mdlEditarEmpresa($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡La informacion de la empresa ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Empresa";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡Los campos de la empresa no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Empresa";

								}

								});


								</script>';
            }
        }
    }

    public function SubirImagen($Namefile, $Ruta, $ImagenName, $ImgActual) {

        if (isset($_FILES[$Namefile]["tmp_name"]) && !empty($_FILES[$Namefile]["tmp_name"])) {

            list($ancho, $alto) = getimagesize($_FILES[$Namefile]["tmp_name"]);

            $nuevoAncho = 500;
            $nuevoAlto = 500;

            /* =============================================
              CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
              ============================================= */

            $directorio = $Ruta;

            /* =============================================
              PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
              ============================================= */

            if (!empty($_POST[$ImgActual])) {

                unlink($_POST[$ImgActual]);
            } else {

                mkdir($directorio, 0755);
            }

            /* =============================================
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
              ============================================= */

            if ($_FILES[$Namefile]["type"] == "image/jpeg") {

                /* =============================================
                  GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                  ============================================= */

                $aleatorio = mt_rand(100, 999);

                $Logo = $Ruta . $ImagenName . $aleatorio . ".jpg";

                $origen = imagecreatefromjpeg($_FILES[$Namefile]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $Logo);
            }

            if ($_FILES[$Namefile]["type"] == "image/png") {

                /* =============================================
                  GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                  ============================================= */

                $aleatorio = mt_rand(100, 999);

                $Logo = $Ruta . $ImagenName . $aleatorio . ".png";

                $origen = imagecreatefrompng($_FILES[$Namefile]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $Logo);
            }
        }
    }

}
