<?php
#$this->pr($params['templates']);
?>

<div class="row">
    <div class="col-xs-12 col-lg-6">
        <?php
        require_once $params['templates'][5]; //profile_enterprise_user_data
        ?>
    </div>
    <div class="col-xs-12 col-lg-6">
        <?php
        require_once $params['templates'][4]; //profile_enterprise_user_data_e
        ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-lg-6">
    <?php
    require_once $params['templates'][3];
    ?>
    </div>
    <div class="col-xs-12 col-lg-6">
        <div class="box box-gr">
            <div class="box-header with-border">
                <i class="fa  fa-map-marker"></i><h1 class="box-title">Change Address</h1>
            </div>
            <div class="box-body">
                <div class="col-lg-12">
                    <label class="pull-right">Drag the marker for the new address</label>

                    <?php
                    require_once $params['templates'][1];
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <br/>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-xs-12 col-lg-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <i class="fa fa-connectdevelop"></i><h1 class="box-title">Logo Enterprise</h1>
            </div>
            <div class="box-body">
                <div class="col-lg-12">
                    <?php
                    require_once $params['templates'][0];
                    ?>
                </div>
                <div class="col-lg-12">
                    <div>
                        <div class="panel panel-danger" style="background-color: white">
                            <div class="panel-heading">Change Logotype</div>
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

    <div class="col-xs-12 col-lg-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <i class="fa fa-connectdevelop"></i><h1 class="box-title">Logo Profile</h1>
            </div>
            <div class="box-body">
                <div class="col-lg-12">
                    <?php
                    require_once $params['templates'][2];
                    ?>
                </div>
                <div class="col-lg-12">
                    <div>
                        <div class="panel panel-danger" style="background-color: white">
                            <div class="panel-heading">Change Logotype</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input id="profile_photo" name="profile_photo[]" type="file" multiple class="file-loading">
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
</div>

<div class="row">

</div>
<?php
# s$this->pr($params['templates']);
?>


<script>
    window.onload = function()
    {
        //setImportFile(<?php echo $this->customerID;?>);
        setFileInputProfile(<?php echo $this->Enterprise['enterprise_id'];?>, <?php echo $this->Enterprise['user_id'];?>);
        setFileInputProfilePhoto(<?php echo $this->Enterprise['enterprise_id'];?>, <?php echo $this->Enterprise['user_id'];?>);
        $('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true
        });
    };
</script>