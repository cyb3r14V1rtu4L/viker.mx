<section id="hello" class="home bg-mega">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="main_home">
                <div class="home_text text-center">
                    <div class="col-lg-12 col-xs-12" style="text-align: center;">
                        <div class='animatedParent' data-sequence='500' >
                            <img class="hidden-xs image-responsive animated growIn slower go" style="width: 30%" src="/public/img/logo_open.png" alt="" />
                            <img class="visible-xs image-responsive text-center animated growIn slower go" style="width: 100%;text-align: center;" src="/public/img/logo_open.png" alt="" />
                        </div>

                    </div>

                    <div class='buttons-inline animated fadeInUp slower' data-id='4'>
                        <?php
                        $href = (Session::get('autenticado') == 1) ? '/logout' : '/login';
                        $label_href = (Session::get('autenticado') == 1) ? 'Cerrar Sesión' : 'Iniciar Sesión';
                        ?>
                        <a class='btn btn-default ' href='<?php echo $href;?>'><?php echo $label_href; ?></a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div><!--End off row-->
    </div><!--End off container -->
</section>
<!--End off Home Sections-->




