<?php
/**
 * Created by PhpStorm.
 * User: cyberio
 * Date: 3/22/17
 * Time: 1:39 PM
 */
?>
<section id="hello" class="home bg-mega">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="main_home">
                <div id="form_register_login"class="home_text text-center">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-login wow zoomIn animated animated">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="text-center m-t-50">
                                        <img src="/public/assets/images/logo_mini.png" class=" wow wobble animated animated">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="#" class="active" id="login-form-link">Iniciar Sesión</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#" id="register-form-link">Registrar</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="login-form" action="/login" method="post" role="form" style="display: block;">
                                            <?php  if (isset($this->error)) {
                                                echo '<div class=" wow wobble animated animated "><div class=" label label-danger">' . $this->error . '</div></div>';
                                            } ?>

                                            <div class="form-group">
                                                <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Usuario" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                            </div>
                                            <!--<div class="form-group text-center">
                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                <label for="remember"> Remember Me</label>
                                            </div>-->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="hidden" name="submitButton" value="1">
                                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-warning" value="Iniciar Sesión">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </form>
                                        <form id="register-form" action="" method="post" role="form" style="display: none;">
                                            <div class="form-group">
                                                <div class="input-with-icon  right">
                                                    <i class=""></i>
                                                    <select name="type" id="type" class="form-control reg_info text4rea">
                                                        <option selected value="">Señeccionar Nivel Educativo</option>
                                                        <option value="1" >Primaria</option>
                                                        <option value="2" >Secundaria</option>
                                                        <option value="3" >Bachillerato</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="first_name" id="first_name" tabindex="1" class="form-control reg_info" placeholder="Nombre" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="last_name" id="last_name" tabindex="1" class="form-control reg_info" placeholder="Apellidos"  >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone_number" id="phone_number" tabindex="1" class="form-control reg_info" placeholder="Teléfono"  maxlength="10" onKeyPress="return onlyNum(event)" value="">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="email" id="email" tabindex="1" class="form-control reg_info" placeholder="Correo Electrónico" value="" >
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" tabindex="2" class="form-control reg_info" placeholder="Contraseña">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control reg_info" placeholder="Confirmar Contraseña">
                                            </div>

                                            <div class="form-group">
                                                </br>
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="button" onclick="profileRequest();" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-warning" value="Registrate Ahora!!">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div><!--End off row-->
    </div><!--End off container -->
</section>
<?php
if(isset($this->register))
{
    ?>
    <script>
            activeRegisterForm();
    </script>
    <?php
}
?>

<script>
    window.onload = function(){
        $("#phone_number").mask("(999) 999-9999");
    }
</script>
