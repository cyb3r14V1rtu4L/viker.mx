<section class="">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#new_orders" data-toggle="tab">New Orders</a></li>
                    <li class=""><a href="#req_orders" data-toggle="tab">Request Cyclers</a></li>
                    <li class=""><a href="#aut_orders" data-toggle="tab">Orders Proccesing</a></li>
                    <li class=""><a href="#dev_orders" data-toggle="tab">Delivered</a></li>

                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="new_orders">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Orders</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                if($this->Orders_new)
                                {
                                ?>
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Client</th>
                                            <th>Request Time</th>
                                            <th>Preparation Time</th>
                                            <th>Address</th>
                                            <th>Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        #$this->pr($this->params);

                                        #$this->pr($this->Orders);
                                        foreach ($this->Orders_new as $o)
                                        {
                                        ?>
                                            <tr>
                                                <td style="min-width: 50px"><a href="#"><?php echo str_pad($o['order_id'],5,'0',0);?></a></td>
                                                <td style="min-width: 150px"><?php echo $o['Customer']['first_name'].' '.$o['Customer']['last_name']?></td>
                                                <td style="max-width: 40px"><span class="label label-success"><?php echo substr($o['date_order'],10,6);?></span></td>
                                                <td style="max-width: 50px">
                                                    <div class="input-group clockpicker">
                                                        <input  type="text"  id="time_prepare_<?php echo $o['order_id']?>"
                                                                f="time_prepare" order_id="<?php echo $o['order_id']?>"
                                                                class="form-control" onchange="setTimePrepare(this)"
                                                                value="<?php echo $o['time_prepare'];?>">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td style="max-width: 300px">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">

                                                        <!--<img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyByEQ2dDW61h-4pSBeD1yDhho1uHVsSKbo&center=<?php /*echo $o['geo_lat']*/?>,<?php /*echo $o['geo_lng']*/?>&markers=color:red%7C<?php /*echo $o['geo_lat']*/?>,<?php /*echo $o['geo_lng']*/?>&zoom=18&size=300x100"/>-->
                                                        <img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyC-jEE1mu8KbKoeKEoV0QEmN5ng2FCtMxY&center=<?php echo $o['geo_lat']?>,<?php echo $o['geo_lng']?>&markers=color:red%7C<?php echo $o['geo_lat']?>,<?php echo $o['geo_lng']?>&zoom=18&size=300x100"/>
                                                        <br/>
                                                        <?php echo $o['geo_str']?>
                                                        <br/>
                                                        <?php echo 'Outdoor No: '.$o['geo_ext'];?>
                                                        <?php if(!empty($o['geo_ext'])){echo ' | Interior No: '.$o['geo_ext'];}?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                        switch ($o['status'])
                                                        {
                                                            case 'NEW':
    
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'REQUEST';
                                                                $data_status = 'CYCLER';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/requestDelivery';
                                                                break;
                                                            case 'CYCLER':
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'AUTH PENDING';
                                                                $data_status = 'AUTH';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/authRequest';
                                                                break;
    
                                                            case 'AUTH':
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'AUTHORIZE';
                                                                $data_status = 'PROCESSING';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/deliveryProcessing';
                                                                break;
                                                            case 'PROCESSING':
                                                                $onclick = 'javascript:void(0);';
                                                                $label_href  = 'PROCESSING';
                                                                $data_status = 'ON ROUTE';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '';
                                                                break;
                                                            case 'ON ROUTE':
    
                                                                $onclick = 'javascript:void(0);';
                                                                $label_href  = 'ON ROUTE';
                                                                $data_status = 'DELIVERED';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                break;
                                                            case 'DELIVERED':
                                                                $onclick = '';
                                                                $url = '/orders/deliveryProcessing';
                                                                $label_href  = 'DELIVERED';
                                                                $data_status = 'COMPLETED';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                break;
                                                        }
                                                    ?>
                                                    <button type="button" class="btn btn-icon-toggle btn-default bg-green"
                                                            data-toggle="tooltip" data-placement="top"
                                                            onclick="openModal(this)"
                                                            data-order_id="<?php echo $o['order_id'];?>"
                                                            url="/enterprise/order/authCycler"
                                                            title="Order Details" >
                                                            <?php echo  $fa_icon;?>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                    }else{
                                        echo '<div class="callout callout-warning">
                                        <h4 class="text-white">No orders found!</h4>
                                    </div>';
                                    }
                                ?>
                                <!-- /.table-responsive -->
                            </div>

                        </div>
                    </div>
                    <div class=" tab-pane" id="req_orders">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Auth Cyclers</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                if($this->Orders_cyc)
                                {
                                ?>
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Client</th>
                                            <th>Request Time</th>
                                            <th>Preparation Time</th>
                                            <th>Address</th>
                                            <th>Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        #$this->pr($this->params);

                                        #$this->pr($this->Orders);
                                        foreach ($this->Orders_cyc as $o)
                                        {
                                        ?>
                                            <tr>
                                                <td style="min-width: 50px"><a href="#"><?php echo str_pad($o['order_id'],5,'0',0);?></a></td>
                                                <td style="min-width: 150px"><?php echo $o['Customer']['first_name'].' '.$o['Customer']['last_name']?></td>
                                                <td style="max-width: 40px"><span class="label label-success"><?php echo substr($o['date_order'],10,6);?></span></td>
                                                <td style="max-width: 50px">
                                                    <div class="input-group clockpicker">
                                                        <input  type="text"  id="time_prepare_<?php echo $o['order_id']?>"
                                                                f="time_prepare" order_id="<?php echo $o['order_id']?>"
                                                                class="form-control" onchange="setTimePrepare(this)"
                                                                value="<?php echo $o['time_prepare'];?>">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td style="max-width: 300px">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">

                                                        <!--<img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyByEQ2dDW61h-4pSBeD1yDhho1uHVsSKbo&center=<?php /*echo $o['geo_lat']*/?>,<?php /*echo $o['geo_lng']*/?>&markers=color:red%7C<?php /*echo $o['geo_lat']*/?>,<?php /*echo $o['geo_lng']*/?>&zoom=18&size=300x100"/>-->
                                                        <img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyC-jEE1mu8KbKoeKEoV0QEmN5ng2FCtMxY&center=<?php echo $o['geo_lat']?>,<?php echo $o['geo_lng']?>&markers=color:red%7C<?php echo $o['geo_lat']?>,<?php echo $o['geo_lng']?>&zoom=18&size=300x100"/>
                                                        <br/>
                                                        <?php echo $o['geo_str']?>
                                                        <br/>
                                                        <?php echo 'Outdoor No: '.$o['geo_ext'];?>
                                                        <?php if(!empty($o['geo_ext'])){echo ' | Interior No: '.$o['geo_ext'];}?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                        switch ($o['status'])
                                                        {
                                                            case 'NEW':
    
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'REQUEST';
                                                                $data_status = 'CYCLER';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/requestDelivery';
                                                                break;
                                                            case 'CYCLER':
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'AUTH PENDING';
                                                                $data_status = 'AUTH';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/authRequest';
                                                                break;
    
                                                            case 'AUTH':
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'AUTHORIZE';
                                                                $data_status = 'PROCESSING';
                                                                $fa_icon = '<i class="fa fa-send-o"></i>';
                                                                $url = '/orders/deliveryProcessing';
                                                                break;
                                                            case 'PROCESSING':
                                                                $onclick = 'javascript:void(0);';
                                                                $label_href  = 'PROCESSING';
                                                                $data_status = 'ON ROUTE';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '';
                                                                break;
                                                            case 'ON ROUTE':
    
                                                                $onclick = 'javascript:void(0);';
                                                                $label_href  = 'ON ROUTE';
                                                                $data_status = 'DELIVERED';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                break;
                                                            case 'DELIVERED':
                                                                $onclick = '';
                                                                $url = '/orders/deliveryProcessing';
                                                                $label_href  = 'DELIVERED';
                                                                $data_status = 'COMPLETED';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                break;
                                                        }
                                                    ?>
                                                    <button type="button" class="btn btn-icon-toggle btn-default bg-green"
                                                            data-toggle="tooltip" data-placement="top"
                                                            onclick="openModal(this)"
                                                            data-order_id="<?php echo $o['order_id'];?>"
                                                            url="/enterprise/order/authCycler"
                                                            title="Order Details" >
                                                            <?php echo  $fa_icon;?>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                    }else{
                                        echo '<div class="callout callout-warning">
                                        <h4 class="text-white">No orders found!</h4>
                                    </div>';
                                    }
                                ?>
                                <!-- /.table-responsive -->
                            </div>

                        </div>
                    </div>
                    <div class=" tab-pane" id="aut_orders">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Orders Devilered</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                if($this->Orders_aut)
                                {
                                ?>
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Client</th>
                                            <th>Request Time</th>
                                            <th>Preparation Time</th>
                                            <th>Address</th>
                                            <th>Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        #$this->pr($this->params);

                                        #$this->pr($this->Orders);
                                        foreach ($this->Orders_aut as $o)
                                        {
                                        ?>
                                            <tr>
                                                <td style="min-width: 50px"><a href="#"><?php echo str_pad($o['order_id'],5,'0',0);?></a></td>
                                                <td style="min-width: 150px"><?php echo $o['Customer']['first_name'].' '.$o['Customer']['last_name']?></td>
                                                <td style="max-width: 40px"><span class="label label-success"><?php echo substr($o['date_order'],10,6);?></span></td>
                                                <td style="max-width: 50px">
                                                    <div class="input-group clockpicker">
                                                        <input  type="text"  id="time_prepare_<?php echo $o['order_id']?>"
                                                                f="time_prepare" order_id="<?php echo $o['order_id']?>"
                                                                class="form-control" onchange="setTimePrepare(this)"
                                                                value="<?php echo $o['time_prepare'];?>">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td style="max-width: 300px">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">

                                                        <!--<img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyByEQ2dDW61h-4pSBeD1yDhho1uHVsSKbo&center=<?php /*echo $o['geo_lat']*/?>,<?php /*echo $o['geo_lng']*/?>&markers=color:red%7C<?php /*echo $o['geo_lat']*/?>,<?php /*echo $o['geo_lng']*/?>&zoom=18&size=300x100"/>-->
                                                        <img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyC-jEE1mu8KbKoeKEoV0QEmN5ng2FCtMxY&center=<?php echo $o['geo_lat']?>,<?php echo $o['geo_lng']?>&markers=color:red%7C<?php echo $o['geo_lat']?>,<?php echo $o['geo_lng']?>&zoom=18&size=300x100"/>
                                                        <br/>
                                                        <?php echo $o['geo_str']?>
                                                        <br/>
                                                        <?php echo 'Outdoor No: '.$o['geo_ext'];?>
                                                        <?php if(!empty($o['geo_ext'])){echo ' | Interior No: '.$o['geo_ext'];}?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                        switch ($o['status'])
                                                        {
                                                            case 'NEW':
    
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'REQUEST';
                                                                $data_status = 'CYCLER';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/requestDelivery';
                                                                break;
                                                            case 'CYCLER':
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'AUTH PENDING';
                                                                $data_status = 'AUTH';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/authRequest';
                                                                break;
    
                                                            case 'AUTH':
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'AUTHORIZE';
                                                                $data_status = 'PROCESSING';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/deliveryProcessing';
                                                                break;
                                                            case 'PROCESSING':
                                                                $onclick = 'javascript:void(0);';
                                                                $label_href  = 'PROCESSING';
                                                                $data_status = 'ON ROUTE';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '';
                                                                break;
                                                            case 'ON ROUTE':
    
                                                                $onclick = 'javascript:void(0);';
                                                                $label_href  = 'ON ROUTE';
                                                                $data_status = 'DELIVERED';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                break;
                                                            case 'DELIVERED':
                                                                $onclick = '';
                                                                $url = '/orders/deliveryProcessing';
                                                                $label_href  = 'DELIVERED';
                                                                $data_status = 'COMPLETED';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                break;
                                                        }
                                                    ?>
                                                    <button type="button" class="btn btn-icon-toggle btn-default bg-green"
                                                            data-toggle="tooltip" data-placement="top"
                                                            onclick="openModal(this)"
                                                            data-order_id="<?php echo $o['order_id'];?>"
                                                            url="/enterprise/order/authCycler"
                                                            title="Order Details" >
                                                            <?php echo  $fa_icon;?>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                    }else{
                                        echo '<div class="callout callout-warning">
                                        <h4 class="text-white">No orders found!</h4>
                                    </div>';
                                    }
                                ?>
                                <!-- /.table-responsive -->
                            </div>

                        </div>
                    </div>
                    <div class=" tab-pane" id="dev_orders">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Orders Devilered</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                if($this->Orders_del)
                                {
                                ?>
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Client</th>
                                            <th>Request Time</th>
                                            <th>Preparation Time</th>
                                            <th>Address</th>
                                            <th>Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        #$this->pr($this->params);

                                        #$this->pr($this->Orders);
                                        foreach ($this->Orders_del as $o)
                                        {
                                        ?>
                                            <tr>
                                                <td style="min-width: 50px"><a href="#"><?php echo str_pad($o['order_id'],5,'0',0);?></a></td>
                                                <td style="min-width: 150px"><?php echo $o['Customer']['first_name'].' '.$o['Customer']['last_name']?></td>
                                                <td style="max-width: 40px"><span class="label label-success"><?php echo substr($o['date_order'],10,6);?></span></td>
                                                <td style="max-width: 50px">
                                                    <div class="input-group clockpicker">
                                                        <input  type="text"  id="time_prepare_<?php echo $o['order_id']?>"
                                                                f="time_prepare" order_id="<?php echo $o['order_id']?>"
                                                                class="form-control" onchange="setTimePrepare(this)"
                                                                value="<?php echo $o['time_prepare'];?>">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td style="max-width: 300px">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">

                                                        <!--<img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyByEQ2dDW61h-4pSBeD1yDhho1uHVsSKbo&center=<?php /*echo $o['geo_lat']*/?>,<?php /*echo $o['geo_lng']*/?>&markers=color:red%7C<?php /*echo $o['geo_lat']*/?>,<?php /*echo $o['geo_lng']*/?>&zoom=18&size=300x100"/>-->
                                                        <img src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyC-jEE1mu8KbKoeKEoV0QEmN5ng2FCtMxY&center=<?php echo $o['geo_lat']?>,<?php echo $o['geo_lng']?>&markers=color:red%7C<?php echo $o['geo_lat']?>,<?php echo $o['geo_lng']?>&zoom=18&size=300x100"/>
                                                        <br/>
                                                        <?php echo $o['geo_str']?>
                                                        <br/>
                                                        <?php echo 'Outdoor No: '.$o['geo_ext'];?>
                                                        <?php if(!empty($o['geo_ext'])){echo ' | Interior No: '.$o['geo_ext'];}?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                        switch ($o['status'])
                                                        {
                                                            case 'NEW':
    
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'REQUEST';
                                                                $data_status = 'CYCLER';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/requestDelivery';
                                                                break;
                                                            case 'CYCLER':
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'AUTH PENDING';
                                                                $data_status = 'AUTH';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/authRequest';
                                                                break;
    
                                                            case 'AUTH':
                                                                $onclick = 'openModal(this);return false;';
                                                                $label_href  = 'AUTHORIZE';
                                                                $data_status = 'PROCESSING';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '/orders/deliveryProcessing';
                                                                break;
                                                            case 'PROCESSING':
                                                                $onclick = 'javascript:void(0);';
                                                                $label_href  = 'PROCESSING';
                                                                $data_status = 'ON ROUTE';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                $url = '';
                                                                break;
                                                            case 'ON ROUTE':
    
                                                                $onclick = 'javascript:void(0);';
                                                                $label_href  = 'ON ROUTE';
                                                                $data_status = 'DELIVERED';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                break;
                                                            case 'DELIVERED':
                                                                $onclick = '';
                                                                $url = '/orders/deliveryProcessing';
                                                                $label_href  = 'DELIVERED';
                                                                $data_status = 'COMPLETED';
                                                                $fa_icon = '<i class="fa fa-bicycle"></i>';
                                                                break;
                                                        }
                                                    ?>
                                                    <button type="button" class="btn btn-icon-toggle btn-default bg-green"
                                                            data-toggle="tooltip" data-placement="top"
                                                            onclick="openModal(this)"
                                                            data-order_id="<?php echo $o['order_id'];?>"
                                                            url="/enterprise/order/authCycler"
                                                            title="Order Details" >
                                                            <?php echo  $fa_icon;?>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                    }else{
                                        echo '<div class="callout callout-warning">
                                        <h4 class="text-white">No orders found!</h4>
                                    </div>';
                                    }
                                ?>
                                <!-- /.table-responsive -->
                            </div>

                        </div>
                    </div>
                    
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<script>
    window.onload = function()
    {
        setTimeout('getOrdersNowE($("#enterprise_id").val())',30000);

    }
</script>