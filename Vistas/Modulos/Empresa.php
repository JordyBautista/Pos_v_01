
<div class="content-wrapper ">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h5>Empresa</h5>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-sm "><a href="Inicio" class=" text-dark"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Configuracion</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Empresa</a></li>

                    </ol>


                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <form method="post" class="FormularioEmpresa" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header pt-0 pb-0 pl-0 pr-0 m-0">
                        <div class="row pb-0">
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label >Razon Social</label>
                                            <input type="text" class="form-control" id="EmpRazonSocial" name="EmpRazonSocial" readonly>
                                            <input type="hidden" id="idEmpresa" name="idEmpresa">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>RUC</label>
                                                <input type="number" class="form-control" id="EmpRuc" name="EmpRuc" readonly >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Direccion</label>
                                                <input type="text" class="form-control" id ="EmpDireccion" name="EmpDireccion" readonly >
                                            </div>
                                        </div>



                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Celular</label>
                                                <input type="number" class="form-control" id="EmpCelular" name="EmpCelular" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Telefono</label>
                                                <input type="number" class="form-control" id="EmpTelefono" name="EmpTelefono" readonly>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label >Correo</label>
                                            <input type="email" class="form-control" id="EmpCorreo" name="EmpCorreo" readonly>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>IGV</label>
                                                <div class="input-group input-group">
                                                    <input type="text" class="form-control" id="EmpIGV" name="EmpIGV" readonly>
                                                
                                                <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fas fa-percent"></i></span>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Moneda</label>
                                                <input type="text" class="form-control" id="EmpMoneda1" name="EmpMoneda1" readonly>
                                                <div class="input-group selectMoneda collapse">
                                                    <select class="form-control" name="EmpMoneda"  >
                                                        <option id="EmpMoneda"></option>
                                                        <?php
                                                        $item = null;
                                                        $valor = null;

                                                        $proveedor = EmpresaControlador::ctrMostrarMoneda($item, $valor);

                                                        foreach ($proveedor as $key => $value) {

                                                            echo '<option value="' . $value["idMoneda"] . '">' . $value["Simbolo"] . " - " . $value["UnidadMonetaria"] . " - " . $value["Pais"] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group pb-0 mb-0">
                                            <div class="input-group">
                                                <div class="panel">LOGO MENU </div>
                                            </div>
                                            <div   class="input-group">
                                                <img src="Vistas/img/Empresa/Default/Logo-largo.png" class="img-fluid img-thumbnail previsualizarLogo" width="100px">
                                            </div>

                                            <div   class="input-group LogoEmpresa collapse">
                                                <input type="file" class="nuevoLogo " name="nuevoLogo">
                                                <p class="help-block">Peso máximo de la foto 2MB</p>
                                                <input type="hidden" name="LogoActual" id="LogoActual">
                                            </div>
                                        </div>
                                        <div class="form-group pb-0 mb-0 ">
                                            <div class="input-group">
                                                <div class="panel">LOGO MENU CORTO</div>
                                            </div>
                                            <div   class="input-group">
                                                <img src="Vistas/img/Empresa/Default/Logo-corto.png" class="img-fluid img-thumbnail previsualizarLogoCorto" width="100px">
                                            </div>

                                            <div   class="input-group LogoEmpresa collapse ">
                                                <input type="file" class="nuevoLogoCorto" name="nuevoLogoCorto">
                                                <p class="help-block">Peso máximo de la foto 2MB</p>
                                                <input type="hidden" name="LogoCortoActual" id="LogoCortoActual">
                                            </div>
                                        </div>

                                        <div class="form-group pb-0 mb-0">
                                            <div class="input-group">
                                                <div class="panel">LOGO EMPRESA</div>
                                            </div>
                                            <div  class="input-group ">
                                                <img src="Vistas/img/Empresa/Default/Logo-largo.png" class="img-fluid img-thumbnail previsualizarLogoLogin" width="100px">
                                            </div>

                                            <div   class="input-group LogoEmpresa collapse">
                                                <input type="file" class="nuevoLogoLogin" name="nuevoLogoLogin">
                                                <p class="help-block">Peso máximo de la foto 2MB</p>
                                                <input type="hidden" name="LogoLoginActual" id="LogoLoginActual">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-start">
                        <div class="form-group"> 
                            <button type="button"class="btn btn-success btnModificarEmpresa"> Modificar</button>
                            <button type="submit"class="btn btn-success btnGuardarEmpresa collapse"> Guardar</button>
                            <a href="Empresa" type="button"class="btn btn-danger btnCancelarEmpresa collapse">cancelar</a>
                        </div>
                    </div>
                </div>
            </form>

            <?php
            $empresa = new EmpresaControlador();
            $empresa->ctrEditarEmpresa();
            ?>
        </div>
    </section>
</div>

