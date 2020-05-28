<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th style="width: 40%">Name</th>
                <th style="width: 20%">Price</th>
                <th style="width: 15%">ADD</th>
            </tr>

            <?php
            
           
            $stuff=0;
            $enterprise_id=0;
            if($this->Additionals) {
                foreach ($this->Additionals as $extra) {
                    echo '<tr>';
                    echo '<td>'
                            .'<input type="hidden" id="extra_id_'.$extra['extra_id'].'" value="'.$extra['extra_id'].'">'
                            .'<i class="fa fa-tint"></i>  '.$extra['extra_name']
                          .'</td>';
    
    
                    echo '<td>'
                            .'<input type="hidden" id="extra_price_'.$extra['extra_id'].'" value="'.$extra['extra_price'].'">'
                            .'<i class="fa fa-usd"></i>  '.$extra['extra_price']
                          .'</td>';
                    ?>
                    <td>
                        <?php
                        $checked_activo = '';
                        if(isset($this->Shopping['Enterprise'][$extra['enterprise_id']]['stuff'][$this->stuff_id][$this->stuff_uid]['stuff_data']['Ingredients'])) {
                            $Ingredients = $this->Shopping['Enterprise'][$extra['enterprise_id']]['stuff'][$this->stuff_id][$this->stuff_uid]['stuff_data']['Ingredients'];

                            foreach($Ingredients as $i=>$ingredient) {
                                if($ingredient['extra_id'] == $extra['extra_id']) {
                                    $checked_activo = 'checked';
                                    break;
                                }
                            }
                        }
                        
                        ?>
                          <input type="checkbox" 
                          		id="extra_activo_<?php echo $extra['extra_id'];?>"
                       			f="extra_activo"
                                enterprise_id ="<?php echo $extra['enterprise_id'];?>"  
                       			extra_id ="<?php echo $extra['extra_id'];?>"
                                stuff_id="<?php echo $extra['stuff_id']?>"
                                stuff_uid="<?php echo $this->stuff_uid?>"  
                       			onchange="updateExtraOrder(this, this.checked)"
                       			<?php echo $checked_activo?>>
                  	</td> 
                    
                      
                     
                    <?php 
                    echo '</tr>';
                    
                    $stuff_id = $extra['stuff_id'];
                    $enterprise_id = $extra['enterprise_id'];
                    
                    
                }
            }
            ?>
        </table>    
    </div>
    <button  id="button_confirm" type="button" class="btn btn-warning pull-right" onclick='updatePrices()' >SAVE</button>

</div>

