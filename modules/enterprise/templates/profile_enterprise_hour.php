<?php

/*
+----------------+---------+------+-----+---------+----------------+
| Field          | Type    | Null | Key | Default | Extra          |
+----------------+---------+------+-----+---------+----------------+
| hour_id        | int(11) | NO   | PRI | NULL    | auto_increment |
| EnterpriseHO_id  | int(11) | NO   |     | NULL    |                |
| sun_hour_open  | time    | YES  |     | NULL    |                |
| sun_hour_close | time    | YES  |     | NULL    |                |
| mon_hour_open  | time    | YES  |     | NULL    |                |
| mon_hour_close | time    | YES  |     | NULL    |                |
| tue_hour_open  | time    | YES  |     | NULL    |                |
| tue_hour_close | time    | YES  |     | NULL    |                |
| wed_hour_open  | time    | YES  |     | NULL    |                |
| wed_hour_close | time    | YES  |     | NULL    |                |
| thu_hour_open  | time    | YES  |     | NULL    |                |
| thu_hour_close | time    | YES  |     | NULL    |                |
| fri_hour_open  | time    | YES  |     | NULL    |                |
| fri_hour_close | time    | YES  |     | NULL    |                |
| sat_hour_open  | time    | YES  |     | NULL    |                |
| sat_hour_close | time    | YES  |     | NULL    |                |
+----------------+---------+------+-----+---------+----------------+

*/

?>
<input
    type="hidden"  id="hour_id"
    value="<?php echo $this->EnterpriseHO['hour_id'];?>"
/>

<div class="box box-success">
    <div class="box-header with-border">
        <i class="fa fa-user-o"></i><h1 class="box-title">Opening Hours</h1>
    </div>
    <div class="box-body no-padding">
        <table class="table">
            <tbody><tr>
                <th style="width: 10px">&nbsp;</th>
                <th style="width: 15px">Day</th>
                <th>Open Hour</th>
                <th>Close Hour</th>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Sunday</td>
                <td>
                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="sun_hour_open"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['sun_hour_open'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </td>
                <td>

                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="sun_hour_close"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['sun_hour_close'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Monday</td>
                <td>
                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="mon_hour_open"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['mon_hour_open'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </td>
                <td>

                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="mon_hour_close"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['mon_hour_close'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tuesday</td>
                <td>
                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="tue_hour_open"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['tue_hour_open'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </td>
                <td>

                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="tue_hour_close"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['tue_hour_close'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Wednesday</td>
                <td>
                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="wed_hour_open"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['wed_hour_open'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </td>
                <td>

                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="wed_hour_close"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['wed_hour_close'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Thursday</td>
                <td>
                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="thu_hour_open"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['thu_hour_open'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </td>
                <td>

                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="thu_hour_close"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['thu_hour_close'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Friday</td>
                <td>
                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="fri_hour_open"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['fri_hour_open'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </td>
                <td>

                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="fri_hour_close"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['fri_hour_close'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Saturday</td>
                <td>
                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="sat_hour_open"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['sat_hour_open'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </td>
                <td>

                    <div class="input-group clockpicker">
                        <input  type="text"  id="hour_end"
                                f="sat_hour_close"
                                class="form-control" onchange="updateProfileHO(this)"
                                value="<?php echo $this->EnterpriseHO['sat_hour_close'];?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                </td>
            </tr>
            </tbody></table>
    </div><!-- /.box-body -->
    <br/>
</div>
