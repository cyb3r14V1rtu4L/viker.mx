<?php
#$this->pr($params['templates']);
?>

<div class="row">

</div>
<div class="container">
    <div class="stepwizard col-md-offset-3">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Paso 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Paso 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Paso 3</p>
            </div>
        </div>
    </div>

    <form role="form" action="" method="post">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                    <h3>Datos Generales Guía</h3>
                    <div class="form-group" id="clasification">
                        <div class="input-with-icon  right">
                            <select name="clasificacion" id="idclasificacion" class="form-control" onchange="">
                                <option value="">Seleccionar Nivel Educativo</option>
                                <option value="1" >Primaria</option>
                                <option value="2" >Secundaria</option>
                                <option value="3" >Bachillerato</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <input maxlength="100" type="text" required="required" class="form-control" placeholder="Ingresar el nombre de la Guía">
                    </div>
                    <div class="form-group">
                        <input maxlength="100" type="text" required="required" class="form-control" placeholder="Descripción de la Guía">
                    </div>
                    <div class="form-group">
                        <input maxlength="100" type="text" required="required" class="form-control" placeholder="Carpeta para almacenar las páginas de la Guía">
                    </div>
                    <div class="form-group">
                        <input type="number" required="required" class="form-control" placeholder="Número de páginas">
                    </div>
                    <div class="form-group">
                        <input type="number" required="required" class="form-control" placeholder="Número de páginas adicionales">
                    </div>
                    <div class="form-group">
                        <input maxlength="100" type="text" required="required" class="form-control" placeholder="CLAVE del Producto (Guía, ej. BP2T2MIX)">
                    </div>

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        <h3>Seleccionar Portada de la Guía</h3>
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <i class="fa fa-book"></i><h1 class="box-title">Portada Guía</h1>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-12">

                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <div class="panel panel-danger" style="background-color: white">
                                            <div class="panel-heading">Portada Guía</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input id="photo_profile" name="photo_profile[]" type="file" multiple class="file-loading">
                                                        <div id="errorBlock" class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br/>
                        </div>
                    </div>
                    <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Anterior</button>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente</button>
                </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                    <h3>Seleccionar Páginas (Contenido) de la Guía</h3>
                    <div class="box box-danger">
                            <div class="box-header with-border">
                                <i class="fa fa-connectdevelop"></i><h1 class="box-title">Generar Páginas Guía</h1>
                            </div>
                            <div class="box-body">

                                <div class="col-lg-12">
                                    <div>
                                        <div class="panel panel-danger" style="background-color: white">
                                            <div class="panel-heading">EdiQ Páginas</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input id="ediq_photo" name="ediq_photo[]" type="file" multiple class="file-loading">
                                                        <div id="errorBlock" class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                        </div>
                    <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
# s$this->pr($params['templates']);
?>


<script>
    window.onload = function()
    {
        setFileInputEdiQ();
        setFileInputProfile(<?php echo $this->Enterprise['enterprise_id'];?>, <?php echo $this->Enterprise['user_id'];?>);

        /*$('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true
        });*/



    };
</script>
