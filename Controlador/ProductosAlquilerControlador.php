<?php

class ProductosAlquilerControlador {

    static public function ctrCrearAlquiler($data){
        $id = ProductosAlquilerModelo::mdlCrearAlquiler("alquiler",$data);
        $value = false;
        if($id > 0){
            foreach ($data['items'] as $key => $item) {
                
                $value = ProductosAlquilerModelo::mdlCrearAlquilerDetalle('alquilerdetalle',$item,$id);
                ProductosAlquilerModelo::actualizar_estado('Alquilado', $item->idproducto);
            }
        }
        return $value;
    }
    static function actualizar_observacion($observacion,$idDetalle, $idProducto,$idAlquiler){
        $valor = ProductosAlquilerModelo::actualizar_observacion($observacion,$idDetalle);
        ProductosAlquilerModelo::actualizar_estado('Disponible', $idProducto);
        $cont = 0;
        $detalle = ProductosAlquilerControlador::ctrMostrarAlquilerDetalle($idAlquiler);
        foreach ($detalle as $key => $value) {
            if($value['observacion'] == null){
                $cont++;
            }
        }
        if($cont == 0){
            ProductosAlquilerModelo::actualizar_estado_alquiler('2',$idAlquiler);
        }
        return $valor;
    }
    static public function cancelar_alquiler($idAlquiler){
        $valor = ProductosAlquilerModelo::actualizar_estado_alquiler('0',$idAlquiler);
        $detalle = ProductosAlquilerControlador::ctrMostrarAlquilerDetalle($idAlquiler);
        foreach ($detalle as $key => $value) {
            ProductosAlquilerModelo::actualizar_estado('Disponible', $value['idProductoAlquiler']);
        }
        return $valor;
    }
    static public function ctrGetCode(){
        return ProductosAlquilerModelo::mdlGetCode();
    }
    static public function ctrMostrarProductosAlquiler($item, $valor) {

        $tabla = "ProductosAlquiler";
        return ProductosAlquilerModelo::mdlMostrarProductosAlquiler($tabla, $item, $valor); 
    }
    static public function ctrMostrarAlquiler($item, $valor) {

        $tabla = "alquiler";
        return ProductosAlquilerModelo::mdlMostrarAlquiler($tabla, $item, $valor); 
    }
    static public function ctrMostrarAlquilerDetalle($id) {
        return ProductosAlquilerModelo::mdlMostrarAlquilerDetalle($id); 
    }
    static public function ctrMostrarProductosAlquilerDisponible($item, $valor) {

        $tabla = "ProductosAlquiler";
        return ProductosAlquilerModelo::mdlMostrarProductosAlquilerDisponible($tabla, $item, $valor); 
    }
    static public function ctrCrearProductosAlquiler() {
        if (isset($_POST["IngresoDescripcion"])) {
            
            if($_POST["IngresoDescripcion"] != ''){
                if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["IngresoDescripcion"])) {
                

                    $ruta = "Vistas/img/Productos/Default/DefaultProducto.png";
    
                   if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
                        if ($_FILES["nuevaFoto"]["tmp_name"] != '') {
                            
                            list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
         
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;
         
                            /* =============================================
                              CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PRODUCTO
                              ============================================= */
         
                            $directorio = "Vistas/img/Productos/" . $_POST["IngresoCodigo"];
         
                            mkdir($directorio, 0755);
         
                            /* =============================================
                              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                              ============================================= */
         
                            if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
         
                                /* =============================================
                                  GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                  ============================================= */
         
                                $aleatorio = mt_rand(100, 999);
         
                                $ruta = "Vistas/img/Productos/" . $_POST["IngresoCodigo"] . "/" . $aleatorio . ".jpg";
         
                                $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
         
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
         
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
         
                                imagejpeg($destino, $ruta);
                            }
         
                            if ($_FILES["nuevaFoto"]["type"] == "image/png") {
         
                                /* =============================================
                                  GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                  ============================================= */
         
                                $aleatorio = mt_rand(100, 999);
         
                                $ruta = "Vistas/img/Productos/" . $_POST["IngresoCodigo"] . "/" . $aleatorio . ".png";
         
                                $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
         
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
         
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
         
                                imagepng($destino, $ruta);
                            }
                        }
                   }
    
                    $tabla = "productosalquiler";
    
                    $datos = array("Descripcion" => $_POST["IngresoDescripcion"], 
                                  "idMarca" => $_POST["IngresoMarca"], 
                                  "Serie" => $_POST["IngresoSerie"],
                                  "Placa" => $_POST["IngresarPlaca"],
                                  "Ubicacion" => $_POST["IngresoUbicacion"],
                                  "Observaciones" => $_POST["IngresoObservacion"], 
                                  "PrecioAlquiler" => $_POST["IngresoPrecioAlquiler"],
                                  "Fotografia" => $ruta, 
                                  "Estado" => $_POST["IngresoEstado"]);
                        
                        
    //var_dump($datos);
                    $respuesta = ProductosAlquilerModelo::mdlCrearProductoAlquiler($tabla, $datos);
    
                    if ($respuesta) {
    
                        echo '<script>
    
                        Swal.fire({
    
                            type: "success",
                            title: "¡El Producto ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                            }).then(function(result){
    
                                if(result.value){
    
                                    window.location = "ProductosAlquiler";
    
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
    
                                        window.location = "ProductosAlquiler";
    
                                    }
    
                                    });
    
    
                                    </script>';
                }
            }
            
        }
    }

    static public function ctrModificarProductosAlquiler() {
        if (isset($_POST["EditarDescripcion"])) {
            
            if($_POST["EditarDescripcion"] != ''){
                if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDescripcion"])) {
                

                    $ruta = $_POST['fotoActual'];
    
                   if (isset($_FILES["EditarFoto"]["tmp_name"])) {
                        if ($_FILES["EditarFoto"]["tmp_name"] != '') {
                            
                            list($ancho, $alto) = getimagesize($_FILES["EditarFoto"]["tmp_name"]);
         
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;
         
                            /* =============================================
                              CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PRODUCTO
                              ============================================= */
         
                            $directorio = "Vistas/img/Productos/" . $_POST["IngresoCodigo"];
         
                            mkdir($directorio, 0755);
         
                            /* =============================================
                              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                              ============================================= */
         
                            if ($_FILES["EditarFoto"]["type"] == "image/jpeg") {
         
                                /* =============================================
                                  GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                  ============================================= */
         
                                $aleatorio = mt_rand(100, 999);
         
                                $ruta = "Vistas/img/Productos/" . $_POST["IngresoCodigo"] . "/" . $aleatorio . ".jpg";
         
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
         
                                $ruta = "Vistas/img/Productos/" . $_POST["IngresoCodigo"] . "/" . $aleatorio . ".png";
         
                                $origen = imagecreatefrompng($_FILES["EditarFoto"]["tmp_name"]);
         
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
         
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
         
                                imagepng($destino, $ruta);
                            }
                        }
                   }
    
                    $tabla = "productosalquiler";
    
                    $datos = array("Descripcion" => $_POST["EditarDescripcion"], 
                                  "idProductoAlquiler" => $_POST["EditarId"], 
                                  "idMarca" => $_POST["EditarMarca"], 
                                  "Serie" => $_POST["EditarSerie"],
                                  "Placa" => $_POST["EditarPlaca"],
                                  "Ubicacion" => $_POST["EditarUbicacion"],
                                  "Observaciones" => $_POST["EditarObservacion"], 
                                  "PrecioAlquiler" => $_POST["EditarPrecioAlquiler"],
                                  "Fotografia" => $ruta, 
                                  "Estado" => $_POST["EditarEstado"]);
                        
                        
    //var_dump($datos);
                    $respuesta = ProductosAlquilerModelo::mdlEditarProductoAlquiler($tabla, $datos);
    
                    if ($respuesta) {
    
                        echo '<script>
    
                        Swal.fire({
    
                            type: "success",
                            title: "¡El Producto ha sido modificado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                            }).then(function(result){
    
                                if(result.value){
    
                                    window.location = "ProductosAlquiler";
    
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
    
                                        window.location = "ProductosAlquiler";
    
                                    }
    
                                    });
    
    
                                    </script>';
                }
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
