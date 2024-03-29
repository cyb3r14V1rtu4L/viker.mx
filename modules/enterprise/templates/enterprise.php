<?php
$rastaCSS = array(0=>'warning',1=>'danger',2=>'success');
$rastabgCSS = array(0=>'bg-yellow',1=>'bg-red',2=>'bg-green');

?>

<div class="col-md-12">
    <?php
    if(is_array($this->Enterprises)){
        foreach($this->Enterprises as $E)
    {
    $box = array_rand($rastaCSS);
    ?>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <!-- Profile Image -->
        <div class="box box-<?php echo $rastaCSS[$box]; ?>">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle"
                     src="/public/uploads/enterprise/profile/<?php echo $E['enterprise_id']; ?>/profile.jpg"
                     alt="User profile picture">

                <h3 class="profile-username text-center"><?php echo $E['name_enterprise']; ?></h3>
                <p class="text-muted text-center text-<?php echo $rastaCSS[$box]; ?>"><?php echo $E['category']; ?></p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <!--<b>New Orders</b> <a class="pull-right text-<?php /*echo $rastaCSS[$box];*/
                        ?>"><?php /*echo number_format($E['newOrders']['count'],0,'',',');*/
                        ?></a>-->
                    </li>
                    <li class="list-group-item"></li>
                </ul>
                <?php
                $onClick = ($this->function == 'getProfile') ? "location.href='/enterprise/profile/edit/" . $E['enterprise_id'] . "'" : $this->function . '(' . $E['enterprise_id'] . ');'
                ?>

                <a href="#" onclick="<?php echo $onClick; ?>"
                   class="btn btn-default <?php echo $rastabgCSS[$box]; ?> btn-block"><b>VIEW</b></a>
                <?php

                $active_btn = ($E['active_enterprise'] == '0') ? 'ACTIVATE' : 'DEACTIVATE';
                $active_val = ($E['active_enterprise'] == '0') ? '1' : '0';
                $active_color = ($E['active_enterprise'] == '0') ? 'bg-green' : 'bg-grey';


                if ($this->function == 'getProfile') {

                ?>
                <a href="#" id="btn_active_enterprise"
                   onclick="activateCompany(<?php echo $E['enterprise_id']; ?>,'<?php echo $active_val; ?>')"
                   class="btn btn-default <?php echo $active_color; ?> btn-block"><b><?php echo $active_btn; ?></b></a>
                <?php
                }
                ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->

                <!-- /.box -->
            </div>
            <?php
        }
    }
    ?>

</div>