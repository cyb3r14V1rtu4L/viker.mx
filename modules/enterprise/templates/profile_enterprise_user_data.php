<div class="box box-warning">
    <div class="box-header with-border">
        <i class="fa fa-user-o"></i><h1 class="box-title">Customer Profile</h1>
    </div>
    <div class="box-body">
        <input id="user_id" type="hidden" value="<?php echo $this->Customer['user_id'];?>">
        <input id="enterprise_id" type="hidden" value="<?php echo $this->enterpriseID;?>">
        <div class="col-lg-6">

            <label>First Name</label>

            <div class="input-group">
                <input type="text" class="form-control" f="first_name" onchange="updateProfileU(this)"
                       placeholder="First Name"
                       value="<?php echo $this->Customer['first_name'];?>"
                >
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
            </div>
        </div>
        <div class="col-lg-6">
            <label>Last Name</label>

            <div class="input-group">
                <input type="text" class="form-control" f="last_name" onchange="updateProfileU(this)"
                       placeholder="Last Name"
                       value="<?php echo $this->Customer['last_name'];?>"
                >
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
            </div>
        </div>
        <div class="col-lg-6">
            <label>Username</label>
            <div class="input-group">
                <input type="text" class="form-control"
                       placeholder="Username"
                       value="<?php echo $this->Customer['username'];?>"
                       readonly>
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            </div>
        </div>
        <div class="col-lg-6">
            <label>Password</label>

            <div class="input-group">
                <input type="text" class="form-control" f="password_clean" onchange="updateProfileU(this)"
                       placeholder="Password"
                       value="<?php echo $this->Customer['password_clean'];?>"
                >
                <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
            </div>
        </div>
    </div>
    <br/>
</div>