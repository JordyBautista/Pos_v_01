<?php

class VentasControlador {

    static public function ctrMostrarVentas($item, $valor) {
        $tabla = "Ventas";
        $respuesta = VentasModelo::mdlMostrarVentas($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrGetCode() {
        return VentasModelo::mdlGetCode();
    }

    static public function ctrCrearVenta() {
      if (isset($_POST["codigoVenta"])) {
          
          
          print_r('hola');
      }

    /*echo"<script>
            Swal.fire({
              title: 'VENTA',
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              text: 'Desea guardar la venta!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText:'Si, guardar',
              cancelButtonText:'No, cancelar',
              allowOutsideClick:false,
              allowEscapeKey:false,
              allowEnterKey:false,
              stopKeydownPropagation:false,
              reverseButtons: false
              }).then(function(result){
                if(result.value){
                  Swal.fire({
                  type:'warning',
                  title: 'Desea imprimir el comprobante de pago?',
                  icon: 'warning',
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  showCancelButton: true,
                  confirmButtonText: 'SI, Guardar',
                  cancelButtonText: 'No, Guardar!',
                  allowOutsideClick:false,
                  allowEscapeKey:false,
                  allowEnterKey:false,
                  stopKeydownPropagation:false,
                  reverseButtons: false
                  }).then(function(resultt){
                    if(resultt.value){
                      Swal.fire({
                                type: 'success',
                                title: '¡La venta a sido guardado satisfactoriamente!',
                                showConfirmButton: true,
                                confirmButtonText: 'Cerrar'

                        }).then(function(resulttt){
                    if(resulttt.value){
                            window.open('http://localhost/Pos_v_01/Categorias', 'Comprobante de pago' , 'top=100,left=100,width=900,height=500,scrollbars=YES')
                       window.location ='Ventas';
                                }})

                      }else if(resultt.dismiss === Swal.DismissReason.cancel){
                                  Swal.fire({
                                            type: 'success',
                                            title: '¡La venta a sido guardado satisfactoriamente!',
                                            showConfirmButton: true,
                                            confirmButtonText: 'Cerrar'
                                    }).then(function(resulttt){
                    if(resulttt.value){
                             window.location ='Ventas';
                        }})

                                          }



                             })
                        }
                        });
        </script>";*/
        

//        if (isset($_POST["codigoVenta"])) {
//            if (preg_match('/^[0-9]+$/', $_POST["codigoVenta"])) {
//
//                var_dump($_POST["SubTotal"]);
//                var_dump($_POST["Total"]);
//                var_dump($_POST["IGV"]);
//
//
//                $tabla = "Ventas";
//                //    `idVenta`, `Codigo`, `idCliente`, `idVendedor`, `Impuesto`, `Neto`, `Descuento`, `Total`, `MetodoPago`, `Fecha`, `Estado` 
//
//                $datos = array("Codigo" => $_POST["CodigoVenta"],
//                    "idCliente" => $_POST["IngresoCliente"],
//                    "idVendedor" => $_SESSION["idPersonal"]);
//                var_dump($datos);
//
////
////                $respuesta = ProductosModelo::mdlCrearProducto($tabla, $datos);
////
////                if ($respuesta == "ok") {
////
////                    echo '<script>
////
////					Swal.fire({
////
////						type: "success",
////						title: "¡El usuario ha sido guardado correctamente!",
////						showConfirmButton: true,
////						confirmButtonText: "Cerrar"
////
////						}).then(function(result){
////
////							if(result.value){
////
////								window.location = "Productos";
////
////							}
////
////							});
////
////
////							</script>';
////                }
//            } else {
//
//                echo '<script>
//
//						Swal.fire({
//
//							type: "error",
//							title: "¡La venta no puede ir vacío o llevar caracteres especiales!",
//							showConfirmButton: true,
//							confirmButtonText: "Cerrar"
//
//							}).then(function(result){
//
//								if(result.value){
//
//									window.location = "CrearVenta";
//
//								}
//
//								});
//
//
//								</script>';
//            }
//        }
//    
//        
    }

    static public function ctrEditarProducto() {

        if (isset($_POST["EditarProducto"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarProducto"])) {

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["EditarFoto"]["tmp_name"]) && !empty($_FILES["EditarFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["EditarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* =============================================
                      CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                      ============================================= */

                    $directorio = "Vistas/img/Productos/" . $_POST["EditarCodigo"];

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

                        $ruta = "Vistas/img/Productos/" . $_POST["EditarCodigo"] . "/" . $aleatorio . ".jpg";

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

                        $ruta = "Vistas/img/Productos/" . $_POST["EditarCodigo"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["EditarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }
                $tabla = "Productos";

                $datos = array("idProducto" => $_POST["EditarCodigo"],
                    "CodigoProveedor" => $_POST["EditarProveedor"],
                    "NombreProducto" => $_POST["EditarProducto"],
                    "Descripcion" => $_POST["EditarDescripcion"],
                    "CodigoMarca" => $_POST["EditarMarca"],
                    "CodigoPresentacion" => $_POST["EditarPresentacion"],
                    "CodigoCategoria" => $_POST["EditarCategoria"],
                    "Fotografia" => $ruta);

                $respuesta = ProductosModelo::mdlEditarProducto($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El Producto ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "Productos";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El Producto no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "Productos";

								}

								});


								</script>';
            }
        }
    }

    static public function ctrEliminarProductos() {

        if (isset($_GET["idProducto"])) {

            $tabla = "Productos";
            $datos = $_GET["idProducto"];

            if ($_GET["fotoProducto"] != "") {

                unlink($_GET["fotoProducto"]);
                rmdir('Vistas/img/Productos/' . $_GET["idProducto"]);
            }

            $respuesta = ProductosModelo::mdlEliminarProducto($tabla, $datos);

            if ($respuesta == "ok") {

                echo'<script>

				Swal.fire({
					  type: "success",
					  title: "El Producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "Productos";

								}
							})

				</script>';
            }
        }
    }

    static public function ctrActualizarStockProductos() {

        if (isset($_POST["StockNombreProducto"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["StockNombreProducto"])) {

                $tabla = "Productos";

                $datos = array("idProducto" => $_POST["StockCodigo"],
                    "Stock" => $_POST["StockProducto"],
                    "StockMaximo" => $_POST["StockMaximo"],
                    "StockMinimo" => $_POST["StockMinimo"],
                    "PrecioCompra" => $_POST["StockPrecioCompra"],
                    "PrecioVenta" => $_POST["StockPrecioVenta"]);


                $respuesta = ProductosModelo::mdlActualizarStockProducto($tabla, $datos);
                if ($respuesta == "ok") {

                    echo '<script>

					Swal.fire({

						type: "success",
						title: "¡El stock se modifico correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){

								window.location = "StockProductos";

							}

							});


							</script>';
                }
            } else {

                echo '<script>

						Swal.fire({

							type: "error",
							title: "¡El stock no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){

									window.location = "StockProductos";

								}

								});


								</script>';
            }
        }
    }

}
