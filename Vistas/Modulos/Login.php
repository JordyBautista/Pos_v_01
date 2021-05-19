

<div id="back"></div>
<div class="login-box  ">




    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">

            <div class="login-logo  pb-0">
                <img src="Vistas/img/logo.png" class="img-fluid " style="padding:0px 50px 0px 50px">
            </div>


            <form method="post">

                <div class="input-group mb-3">
                  <div class="input-group-append">
                        <div class="input-group-text border-right-0 border-left">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control " placeholder="Ingrese Usuario" name="txtUsuario">
                    
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-append">
                        <div class="input-group-text border-right-0 border-left">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="Ingrese contraseña" name="txtContraseña">
                    
                </div>

                <div class="input-group">  

                    <button type="submit" class="btn btn-primary  btn-block "> <i class="fas fa-sign-in-alt "></i>  Ingresar</button>      

                </div>

        </div>
        </form>

        <?php
        $Login = new UsuariosControlador();
        $Login->ctrIngresoUsuario();
        ?>


    </div>
    <!-- /.login-card-body -->
</div>



</div>