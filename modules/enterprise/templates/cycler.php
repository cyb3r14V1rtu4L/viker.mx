<?php
#$this->pr($this->Order);
#$this->pr($this->Cycler);
#$this->pr($this->Customer);

?>

<?php
if(!empty($this->Cycler)) {
    ?>
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-yellow-active">
            <h3 class="widget-user-username text-center"><?php echo $this->Cycler['first_name'] . ' ' . $this->Cycler['last_name']; ?></h3>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="/public/img/user/<?php echo $this->Cycler['user_id'] ?>/profile/profile.jpg"
                 alt="User Avatar">
        </div>
        <div class="box-footer">
            <div class="row text-center">
                <div>
                    <button type="button" class="btn btn-icon-toggle btn-default bg-green"
                            data-toggle="tooltip" data-placement="top"

                            order_id="<?php echo $this->Order['order_id']; ?>"
                            title="Send Message to Cycler">
                        <i class="fa fa-comment-o"></i>
                    </button>
                    <?php
                    $onclick = ($this->Order['status'] == 'AUTH' || $this->Order['status'] == 'DELIVERED') ? '' : 'confirmProcessing(this);' ;
                    $title = ($this->Order['status'] == 'AUTH' || $this->Order['status'] == 'DELIVERED') ? 'Cycler Confirmed' : 'Confirm Request Cycler' ;
                    $callout = ($this->Order['status'] == 'AUTH' || $this->Order['status'] == 'DELIVERED') ? 'danger' : 'success' ;
                    $btn_bg = ($this->Order['status'] == 'AUTH' || $this->Order['status'] == 'DELIVERED') ? 'red' : 'yellow' ;
                    $btn_ic = ($this->Order['status'] == 'AUTH' || $this->Order['status'] == 'DELIVERED') ? 'fa-bell' : 'fa-bicycle' ;
                    ?>
                    


                </div>
                <hr>
                <div class="callout callout-<?php echo $callout;?>">
                    <div class="text-center"><i class="fa fa-bicycle fa-4x text-white"></i></div>
                    <h6 class="text-white text-center"><?php echo $title ?></h6>
                    <button type="button" class="btn btn-icon-toggle btn-default bg-<?php echo $btn_bg;?>"
                            data-toggle="tooltip" data-placement="top"
                            onclick="<?php echo $onclick; ?>"
                            order_id="<?php echo $this->Order['order_id']; ?>"
                            title="<?php echo $title; ?>">
                        <i class="fa <?php echo $btn_ic; ?> "></i>
                    </button>
                </div>

            </div>
            <!-- /.row -->
        </div>
    </div>
<?php
}else{
    ?>
    <div class="callout callout-warning">
        <div class="text-center"><i class="fa fa-bicycle fa-4x text-white"></i></div>
        <h6 class="text-white text-center">Cycler Request Not yet</h6>
    </div>
    <?php
}
?>