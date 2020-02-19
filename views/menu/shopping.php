    <?php
/**
 * Created by PhpStorm.
 * User: cyberio
 * Date: 21/03/17
 * Time: 11:20 PM
 */
?>

<section id="pricing" class="pricing lightbg">
    <div class="container">
        <div class="row">
            <div class="main_pricing roomy-100">
                <?php
                $Enterprise = Session::get('Shopping');
                #$Enterprise = $this->Enterprise;
                #$this->pr($Enterprise);
                if(!empty($Enterprise))
                {
                    echo '<form id="shopping_data" action="" method="post" >';

                    $gtotal = 0;
                    foreach ($Enterprise['Enterprise'] as $e => $enterprise)
                    {
                        ?>
                        <div class="col-md-4 col-sm-12">

                            <div class="pricing_item sm-m-top-30">
                                <div class="pricing_top_border"></div>
                                <div class="pricing_head p-top-30 text-center">
                                    <h4 class="text-uppercase"><?php echo $enterprise['enterprise_data']['name_enterprise']; ?></h4>
                                </div>
                                <?php
                                echo '<ul class="cart-list">';

                                foreach ($enterprise as $e_id => $stuff)
                                {
                                    //$this->pr($stuff);
                                    if($e_id !== 'enterprise_data')
                                    {
                                        $subtotal = 0;
                                        $s=0;
                                         
                                        foreach ($stuff as $s_id => $Stuff)
                                        {

                                            if(is_array($Stuff)) {
                                                foreach($Stuff as $stuff)
                                                {
                                                   
                                                    ?>
                                                <li>
                                                    
                                                    <a href="#" class="photo">
                                                        <img class="cart-thumb" alt=""
                                                             src="/public/uploads/enterprise/stuff/<?php echo $stuff['stuff_data']['stuff_id'];?>/<?php echo $stuff['stuff_data']['photo_stuff']; ?>"
                                                             />
                                                    </a>
                                                    
                                                    <h6>
                                                        <a href="#"><?php echo $stuff['stuff_data']['name_stuff']; ?> </a>
                                                        
                                                        <div class="product-img pull-right">
                                                            <!--
                                                            <span
                                                                id="item_how2_cart_<?php echo $e . '-' . $s_id; ?>"
                                                                class="label label-danger"
                                                            >   <?php echo $stuff['how_many'].' '; ?>
                                                            </span>
                                                            -->
                                                            <span style="margin:10px;"
                                                                id="item_subt_cart_<?php echo $e . '-' . $s_id; ?>"
                                                                class="label label-success text-center subtotal_<?php echo $stuff['price']; ?>"
                                                            >
                                                                <?php 
                                                                # $final_price = $Stuff['price'] * $Stuff['how_many'];
                                                                
                                                                echo number_format($stuff['price'], 2, '.', ','); ?>
                                                            </span>
                                                            <button type="button" class="btn btn-icon bg-yellow" 
                                                                data-toggle="tooltip" data-placement="top" title="Add Ingredients"
                                                                onclick="addIngredients(this)" 
                                                                data-stuff_id="<?php echo $stuff['stuff_data']['stuff_id']?>"
                                                                data-stuff_uid="<?php echo $stuff['stuff_uid']?>"
                                                                url="/ajax/addIngredients" 
                                                                title="" 
                                                                style="padding-top: 10px;" >
                                                                <li class="fa fa-th-list"></li>
                                                            </button>

                                                            <button type="button" class="btn btn-icon bg-red"
                                                                data-toggle="tooltip" data-placement="top" title="Delete Item"
                                                                onclick='window.location="/menu/delete_stuff/<?php echo $stuff['stuff_data']['enterprise_id'];?>/<?php echo $stuff['stuff_data']['stuff_id'];?>/<?php echo $stuff['stuff_uid']?>"' role="button">
                                                                <li class="fa fa-trash"></li>
                                                            </button>

                                                            
                                                        </div>

                                                    </h6>
                                                    <p class="m-top-10">

                                                    <div class="product-info">
                                                        
                                                        <div class="form-group has-success" style="width: 100%">
                                                            
                                                            <!-- <input id="item_cart_<?php echo $e . '-' . $s_id; ?>"
                                                                   type="text" class="item_cart"
                                                                   data-slider-min="1"
                                                                   data-slider-max="20"
                                                                   data-slider-step="1"
                                                                   data-slider-value="<?php echo $Stuff['how_many']; ?>"
                                                                   e_id="<?php echo $e; ?>"
                                                                   s_id="<?php echo $s_id; ?>"/>

                                                            <input type="hidden"
                                                                   class="item_price"
                                                                   id="item_price_<?php echo $e . '-' . $s_id; ?>"
                                                                   e_id="<?php echo $e; ?>"
                                                                   s_id="<?php echo $s_id; ?>"
                                                                   value="<?php echo $Stuff['price']; ?>">
                                                                   -->
                                                                   
                                                        </div>
                                                        
                                                    </div>
                                                    </p>
                                                </li>
                                                <?php
                                                $subtotal += $stuff['price'];
                                                $s++;
                                                }
                                            }
                                            
                                            
                                        }
                                        echo '</ul>';

                                       }
                                }
                                ?>

                            <?php
                            #echo $s;
                            if($s>0){
                            ?>
                            <div class="pricing_body bg-white padding-20">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <hr>
                                    <h6>Comments</h6>
                                    <div class="form-group has-warning">
                                        <textarea id="item_note_<?php echo $e; ?>"
                                              name="item_note_<?php echo $e; ?>" class="form-control" rows="3"
                                              placeholder="Write a note for the kitchener..."></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="skill_bottom_item">
                                            <h6><em>Subtotal</em></h6>
                                            <div class="separator_small"></div>
                                            <h6 class="statistic-counter" id="subtotal_<?php echo $e; ?>">
                                               <?php echo number_format($subtotal, 2, '.', ','); ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <?php
                                    $subtotal += CYCLER;
                                    ?>
                                    <input type="hidden"
                                           class="Subtotal"
                                           id="gSubtotal_<?php echo $e; ?>"
                                           e_id="<?php echo $e; ?>"
                                           value="<?php echo $subtotal; ?>">
                                </div>
                            </div>
                            <?php
                            }else{
                                ?>
                                <hr>
                                <div class="callout callout-warning">
                                    <div class="text-center"><i class="fa fa-bicycle fa-4x text-white"></i></div>
                                    <h6 class="text-white text-center">no items</h6>
                                    
                                </div>
                                
                                <div class="row text-center">
                                    <a href="/menu/showMenu/<?php echo $enterprise['enterprise_data']['enterprise_id'];?>" class="btn btn-primary">
                                        <span class="badge " style=" color: #f39c12 !important;">
                                        0</span>
                                            <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    </div>
                                    <br/>
                            <?php
                            }
                            ?>
                        </div>
                    </div><!-- End off col-md-4 -->
                <?php
                        $gtotal += $subtotal;
                    }
                }else{
                    ?>
                    <hr>
                    <div class="callout callout-warning">
                        <div class="text-center"><i class="fa fa-bicycle fa-4x text-white"></i></div>
                        <h6 class="text-white text-center">Cart doesn't have items</h6>
                    </div>
                    <?php
                }
                echo '</form>';
                ?>
            </div>
        </div><!--End off row-->
        <div class="row pull-right">
        <a class="btn btn-warning" onclick="startCheckout();">
            <span class="badge " style=" color: #f39c12 !important;" id="how_many_2">CHECKOUT ORDER</span>
            <i class="fa fa-shopping-bag"></i>
        </a>
            <hr/>
        </div>
    </div><!--End off container -->
</section> <!--End off Pricing section -->





<script>

    jQuery(document).ready(function($) {
        $('.item_cart').each(function (){
            $("#"+this.id).slider();
            $("#"+this.id).on("slide", function(slideEvt) {
                e_id = $("#"+this.id).attr("e_id");
                s_id = $("#"+this.id).attr("s_id");

                $("#item_how2_cart_"+e_id+"-"+s_id).text(slideEvt.value);
                cantItems(slideEvt.value,this.id,e_id,s_id);
                updateCart(e_id,s_id,'0');
            });
        });


        function cantItems(v,id,e_id,s_id)
        {
            $("#item_cart_"+e_id+"-"+s_id).val(v);
            cant = parseFloat(v);
            price= parseFloat($('#item_price_'+e_id+"-"+s_id).val());
            subt = parseFloat(cant*price).toFixed(2);
            $("#item_subt_cart_"+e_id+"-"+s_id).text(subt);
            $("#"+id).attr('data-slider-value',v);

            Subtotal = 0;
            $('.subtotal_'+e_id).each(function (){
                sub = parseFloat($("#"+this.id).text());
                Subtotal += parseFloat(sub);

            });
            Subtotal = parseFloat(Subtotal).toFixed(2);
            $("#subtotal_"+e_id).text(addCommas(Subtotal));
            $("#gSubtotal_"+e_id).val(Subtotal);

            gSubtotal = 0;
            $('.Subtotal').each(function () {
                gsub = parseFloat($('#'+this.id).val());
                gSubtotal += parseFloat(gsub);
            });

            $("#total_pay_real").val(gSubtotal);

            var gSubtotalCycler = parseFloat($("#granTotal_cycler_float").val());

            gSubtotal = parseFloat(gSubtotal).toFixed(2);

            var granTotal = parseFloat(gSubtotalCycler)+parseFloat(gSubtotal);
            $("#granTotal_float").val(granTotal);
            $("#granTotal_cycler_amount").text('$'+addCommas(granTotal));
            getTOTAL(gSubtotal);

        }

        function updateCart(e_id,s_id) {

            $.ajax({
                url: "/ajax/updStuff",
                type: "POST",
                dataType: "json",
                async: false,
                data: {
                    stuff_id    : s_id,
                    enterprise  : e_id,
                    price       : $('#item_price_'+e_id+'-'+s_id).val(),
                    how_many    : $('#item_how2_cart_'+e_id+'-'+s_id).text(),
                },
                success:
                    function(json)
                    {
                        console.log(json);
                        if($('#pay_with').val() !=='') {
                            getChange();
                        }
                        return false;
                    }
                ,
                error:
                    function(xhr, textStatus, errorThrown)
                    {
                        console.log(json);
                    }
            });

        }

        getTOTAL(<?=Session::get('gtotal')?>);

    });

</script>









