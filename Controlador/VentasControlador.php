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

    static public function ctrCrearVenta($data) {
        $id = VentasModelo::mdlCrearVenta("ventas",$data);
        $value = false;
        if($id > 0){
            foreach ($data['items'] as $key => $item) {
                $value = VentasModelo::mdlCrearVentaDetalle('detalleventa',$item,$id);
                if($data['tipoVenta'] == 'venta'){
                    $producto = ProductosModelo::mdlMostrarProductos('productos','idProducto',$item->idProducto)[0];
                    $nuevo_stock = $producto['Stock'] - $item->cantidad;
                    ProductosModelo::actualizar_stock($nuevo_stock, $item->idProducto);
                }
            }
        }
        return $value;
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
