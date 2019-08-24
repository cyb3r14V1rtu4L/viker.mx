<?php
if(!empty($this->data))
{
    $properties=$this->data;

}
?>

<div class="">

    <div class="grid-body no-border">

        <div class="page-title">
            <h3>User <strong><?php echo $this->member['member_id']?></strong> Properties</h3>
        </div>

        <div id="properties-list">

            <ul>
                <?php

                if(!empty($properties['data']))
                {
                    foreach($properties['data'] as $key=>$prop)
                    {

                        if($properties['images'][$key]=='sampleResort.png')
                        {
                            $image='/public/img/sample.png';
                        }else{
                            $image="/public/uploads/photos/".$prop['user_company']."/property/".$prop['prop_id']."/".$properties['images'][$key];
                        }


                        ?>
                        <div class="property">
                            <div class="row property-detail">
                                <div class="col-lg-3 col-sm-3 col-xs-12">
                                    <img class="img-responsive" src="<?php echo $image?>" alt="" />
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <span class="vertical">
                                        <h3><a href="/agent/property/edit/<?php echo $prop['prop_id']?>"><?php echo $prop['name'] ?></a></h3>
                                          <p>Publish: <strong><?php echo ($prop['publish']==1 ? 'Yes': 'No' )?></strong></p>
                                        <p>Views: <strong><?php echo $prop['views']?></strong></p>
                                        <p><?php echo ucfirst($prop['type'])?> Price: <strong>$<?php echo number_format($prop['resale_fee'],2,'.',',')?></strong></p>
                                    </span>

                                </div>
                                <div class="col-lg-3 col-sm-3 pull-right text-center">
                                    <span class="vertical">

                                        <a href="/agent/property/edit/<?php echo $prop['prop_id']?>" target="_blank"  class="btn btn-primary">
                                            <i class=" fa fa-edit"></i>
                                        </a>
                                        <a href="/agent/property/photos/<?php echo $prop['prop_id']?>" target="_blank" class="btn btn-success">
                                            <i class=" fa fa-image"></i>
                                        </a>
                                        <button class="btn btn-danger delete"  data-id="<?php echo $prop['prop_id']?>" onclick="deleteProperty(<?php echo $prop['prop_id']?>);" >
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <button type="button" id="preview" class=" btn btn-icon-toggle preview"   data-toggle="modal" data-id="<?php echo $prop['prop_id']?>" onclick="preview(<?php echo $prop['prop_id']?>)">
                                        <i class="fa fa-eye" ></i>
                                        </button>

                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }



                }else{
                    echo '<h2>No properties</h2>';
                }

                ?>

            </ul>
            <div class="border"></div>
            <div class="col-lg-12 text-center m-t-10 ">
                <button class="btn" data-toggle="modal" href="#addPropertyModal"><i class="fa fa-plus fa-4x text-cyan"></i></button>
            </div>

            <input type="hidden" id="addId" value="<?php echo $this->member['user_id']?>"/>

        </div>

    </div>

</div>