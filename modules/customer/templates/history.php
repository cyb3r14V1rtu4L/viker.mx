<?php
/**
 * Created by PhpStorm.
 * User: cyberio
 * Date: 2/5/16
 * Time: 11:09 AM
 */
$data = $this->data;


if($data['events'])
{
    ?>

    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4>History for <span class="semi-bold"><?php echo $data['mid'];?></span></h4>
                </div>
                <div class="grid-body ">
                    <table class="table table-striped" id="example2" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Username</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $class = 'odd gradeX';

                        foreach ($data['events'] as $rs)
                        {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $rs['id'];?></td>
                                <td style="width: 400px"><?php echo $rs['description'];?></td>
                                <td><?php echo $rs['first_name'].' '.$rs['last_name'];?></td>
                                <td><?php echo date('d-M-Y H:i:s',strtotime($rs['created_date']));?></td>
                            </tr>
                            <?php
                            $class = ($class == 'even gradeC') ? : 'odd gradeX';
                        }

                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
else
{
    echo '<div class="alert alert-info">No Events for member '.$data['mid'].'</div>';
}
?>

<?php

if(!empty($data['ass']))
{
    if($data['ass']!='No Data')
    {
        ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <h4>History From ASS for <span class="semi-bold"><?php echo $data['mid'];?></span></h4>
                    </div>
                    <div class="grid-body ">
                        <table class="table table-striped" id="example2" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Username</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $class = 'odd gradeX';

                            foreach ($data['ass'] as $rs) {
                                ?>
                                <tr>
                                    <td><?php echo $rs['blog_id']; ?></td>
                                    <td style="width: 400px"><?php echo $rs['entry']; ?></td>
                                    <td><?php echo $rs['name']; ?></td>
                                    <td><?php echo date('d-M-Y H:i:s',strtotime($rs['date']));?></td>

                                </tr>
                                <?php
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

else
{
    echo '<div class="alert alert-info">No Events from ASS for member '.$data['mid'].'</div>';
}

?>

