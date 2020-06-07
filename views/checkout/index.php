<?php
/**
 * Created by PhpStorm.
 * User: cyberio
 * Date: 21/05/17
 * Time: 1:08 AM
 */
#$this->pr($_SESSION);
?>
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <small class="pull-right">  <?php echo $today = date("F j, Y | H:i");?></small>
                <img class="img-responsive" width="32px" height="32px" src="/public/img/logo_open.png" alt="" /></div>

        </h2>
    </div>
    <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-xs-6 table-responsive">

            <?php
            $Enterprise = Session::get('Shopping');
            #$Enterprise = $this->Enterprise;
            #$this->pr($Enterprise);
            $cycler = 0;
            if(!empty($Enterprise))
            {
                foreach ($Enterprise['Enterprise'] as $e => $enterprise)
                {
                    ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Product</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $subtotal = 0;
                        foreach ($enterprise as $e_id => $stuff)
                        {
                            if ($e_id !== 'enterprise_data') {
                                $subtotal = 0;
                                foreach ($stuff as $s_id => $Stuff) {
                                    #$this->pr($Stuff);
                                    if(is_array($Stuff)) {
                                        foreach($Stuff as $stuff)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $stuff['how_many']; ?></td>
                                                <td><?php echo $stuff['stuff_data']['name_stuff']; ?></td>
                                                <td class="pull-right" >$<?php echo number_format($stuff['how_many']*$stuff['price'],2,'.',','); ?></td>
                                            </tr>

                                            <?php
                                            $subtotal +=($stuff['how_many']*$stuff['price']);

                                        }
                                    }
                                }
                            } else{
                                $paypal = $stuff['paypal_account'];
                                $currency = $stuff['paypal_currency'];
                            }
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php
                    $cycler += CYCLER;
                }
            }
            //$this->pr($params);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12" id="addressClient">
            <?php require_once $params['templates'][0];?>
        </div><!-- /.col -->

    </div><!-- /.row -->


    <!-- paypalPayment -->

    <div class="row p-bottom-40">
        <!-- accepted payments column -->

        <!-- /.col -->
        <div class="col-xs-6">
            <div class="row" id="paypalPayment" style="display: none;">
                <?php
                $error = false;
                $amount = '';
                $concept = 'Food and Stuff Delivery';
                $order = date('ymdHis');

                if (isset($_GET['error']))
                    $error = $_GET['error'];

                if (isset($_GET['amount']))
                    $amount = $_GET['amount'];

                if (isset($_POST['submitPayment'])) {

                    $amount = $_POST['amount'];


                    ?>

                    <div class="loading">Please Wait...</div>

                    <form id="realizarPago" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                        <input name="cmd" type="hidden" value="_cart" />
                        <input name="upload" type="hidden" value="1" />
                        <input name="business" type="hidden" value="<?php echo $paypal;?>" />
                        <input name="shopping_url" type="hidden" value="/" />
                        <input name="currency_code" type="hidden" value="<?php echo $currency;?>" />
                        <input name="return" type="hidden" value="https://viker.mx/checkout/confirmation" />
                        <input name="notify_url" type="hidden" value="https://viker.mx/ipn.php" />

                        <input name="rm" type="hidden" value="2" />
                        <input name="item_number_1" type="hidden" value="<?php echo $order; ?>" />
                        <input name="item_name_1" type="hidden" value="<?php echo $concept; ?>" />
                        <input name="amount_1" type="hidden" value="<?php echo $amount; ?>" />
                        <input name="quantity_1" type="hidden" value="1" />

                    </form>


                    <script>
                        $(document).ready(function () {
                            $("#realizarPago").submit();
                        });
                    </script>

                <?php
                }
                else {
                ?>
                    <form class="form-amount" action="/checkout/index" method="post">
                        <div class="form-group">
                            <input type="hidden" id="concept" name="concept" class="form-control" value="<?php echo $concept; ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="amount" name="amount" class="form-control" value="1.00">
                        </div>
                        <input class="btn btn-lg btn-primary btn-block" name="submitPayment" onclick="orderCheckout('paypal');" type="submit" value="Order NOW!!">

                    </form>
                    <?php
                }
                ?>

            </div>
        </div>
        <!-- /.col -->

        <div class="col-xs-6">


        </div>
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <!-- <div class="row no-print">
         <div class="col-xs-12">
             <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
             <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
             </button>
             <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                 <i class="fa fa-download"></i> Generate PDF
             </button>
         </div>
     </div>-->
</section>
