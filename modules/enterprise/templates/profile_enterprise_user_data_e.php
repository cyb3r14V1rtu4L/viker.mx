<div class="box box-warning">
    <div class="box-header with-border">
        <i class="fa fa- fa-building-o"></i><h1 class="box-title">Your Enterprise</h1>
    </div>
    <div class="box-body">
        <div class="col-lg-12">
            <label>Company Name</label>

            <div class="input-group">
                <input type="text" class="form-control"
                       placeholder="First Name"
                       value="<?php echo $this->Enterprise['name_enterprise'];?>"
                       f="name_enterprise"
                       class="form-control"  onchange="updateProfileE(this)"
                >
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
            </div>
        </div>
        <div class="col-lg-12">
            <label>Category Name</label>

            <div class="input-group">
                <input type="text" class="form-control"
                       placeholder="Category"
                       value="<?php echo $this->Enterprise['category'];?>"
                       f="category"
                       class="form-control"  onchange="updateProfileE(this)"
                >
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
            </div>
        </div>
        <div class="clear"></div>

    </div>
    <br/>
</div>