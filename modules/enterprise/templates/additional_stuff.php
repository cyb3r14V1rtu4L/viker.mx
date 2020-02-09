<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th>Name</th>
                <th style="width: 20%">Price</th>
                <th >ACTIVE</th>
            </tr>

            <?php
            $stuff=0;
            $enterprise_id=0;
            foreach($this->Additionals as $extra)
            {
                $active1 = ($extra['extra_activo'] == 1 ) ? 'active' : '';
                $active2 = ($extra['extra_activo'] == 1 ) ? '' : 'active';
                echo '<tr>';
                echo '<td>
                        <div class="input-group">
                            <input type="text" class="form-control" onchange="updateExtra(this)"
                                   placeholder="Extra Name" f="extra_name" extra_id ="'.$extra['extra_id'].'"
                                   value="'.$extra['extra_name'].'">
                            <span class="input-group-addon"><i class="fa fa-tint"></i></span>
                        </div>
                      </td>';


                echo '<td>
                        <div class="input-group">
                            <input type="text" class="form-control" onchange="updateExtra(this)"  extra_id ="'.$extra['extra_id'].'"
                                   placeholder="Extra Price" f="extra_price"
                                   value="'.$extra['extra_price'].'" >
                            <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                        </div>
                      </td>';
                ?>
                <td>
                <?php 
                $checked = ($extra['extra_activo'] == 0) ? '':'checked';
                ?>
                  <input type="checkbox" <?php echo $checked;?> 
              			data-toggle="toggle" 
               			data-onstyle="success" 
               			data-offstyle="danger"
               			f="extra_activo"
               			extra_id ="<?php echo $extra['extra_id'];?>"
               			onchange="updateExtra(this, this.checked)"
               			>
                  </td> 
                <?php 
                echo '</tr>';
                $stuff_id = $extra['stuff_id'];
                $enterprise_id = $extra['enterprise_id'];
                
            }
            ?>
        </table>    
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <table class="table">

            <tbody>
            <tr>
                <td><div class="input-group">
                        <input type="text" class="form-control"
                               placeholder="New Ingredient" id="extra_name"
                               value="">
                        <span class="input-group-addon"><i class="fa fa-tint"></i></span>
                    </div>
                </td>
                <td colspan="2" style="width: 20%"><div class="input-group">
                        <input type="text" class="form-control"
                               placeholder="0" id="extra_price"
                               value="" >
                        <span class="input-group-addon"><i class="fa  fa-usd"></i></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                 <input type="hidden" class="form-control"
                               placeholder="New Ingredient" id="stuff_id"
                               value="<?php echo $stuff_id;?>">
               	 <input type="hidden" class="form-control"
                               placeholder="New Ingredient" id="enterprise_id"
                               value="<?php echo $enterprise_id;?>">
                </td>
                <td  class="pull-right"></td>
                <td><button type="button" class="btn btn-block btn-default" onclick="addExtra();">Add Ingredient</button></td>
            </tr>
            </tbody>
        </table>
        
    </div>
</div>