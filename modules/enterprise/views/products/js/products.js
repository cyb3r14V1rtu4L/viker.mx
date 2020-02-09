function setFileInputProfile(stuff_id)
{
    $("#photo_product").fileinput({
        uploadUrl: '/enterprise/uploader/photo_product/'+stuff_id,
        maxFilePreviewSize: 10240,
        maxFileCount: 1,
        allowedFileExtensions: ["jpg"],
        overwriteInitial: true,
        initialPreviewAsData: true,
        initialPreviewFileType: 'image',
        showUpload: false,
        showRemove: false,
        append: true
    }).on("filebatchselected", function(event, files){
        $("#photo_product").fileinput("upload");
    }).on('fileuploaded', function(event, data) {
        var filename = data.files[0].name;
        d = new Date();
        
        filename=filename.replace("-","_");

        $(".photo_product_img").attr("src", "/public/uploads/enterprise/stuff/"+stuff_id+"/"+filename+"?"+d.getTime());
        $("#photo_update").val(""+filename+"");
        updateProduct($("#photo_update"));

    });

}

function updateProduct(obj)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();
    //console.log(obj);
    $.ajax({
        url: '/enterprise/products/update_product',
        type: "POST",
        dataType: "json",
        data: {
            stuff_id:$('#stuff_id').val(),
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Product updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function updateCategory(obj)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();
    var category_id = $(obj).attr('cat_id');
    //console.log(obj);
    $.ajax({
        url: '/enterprise/products/update_category',
        type: "POST",
        dataType: "json",
        data: {
            category_id:category_id,
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Category updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function addCategory()
{
    $.ajax({
        url: '/enterprise/products/add_category',
        type: "POST",
        dataType: "json",
        data: {
            enterprise_id:$('#enterprise').val(),
            tab_cat:$('#tab_cat').val(),
            name_cat:$('#name_cat').val(),

        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Category Inserted...");

            setTimeout("location.reload();", 1500);
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}


function activateStuff(stuff_id, e_id, active_stuff)
{
    $.ajax({
        url: "/ajax/activateStuff/",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            active_stuff : active_stuff,
            stock_stuff : active_stuff,
            enterprise_id : e_id,
            stuff_id : stuff_id,
        },
        success:
            function(json)
            {
                console.log(json);
                alertify.set({ delay: 1000 });
                alertify.log(json.message);
                var active = (active_stuff == '1') ? '0' : '1';

                switch (active_stuff) {

                    case '1':
                        $('#btn_active_stuff_' + stuff_id).removeClass('bg-green');
                        $('#btn_active_stuff_' + stuff_id).addClass('bg-grey');
                        $('#btn_active_stuff_' + stuff_id).text('DEACTIVATE');
                        break;
                    case '0':
                        $('#btn_active_stuff_' + stuff_id).removeClass('bg-grey');
                        $('#btn_active_stuff_' + stuff_id).addClass('bg-green');
                        $('#btn_active_stuff_' + stuff_id).text('ACTIVE');

                        break;

                }
                $('#btn_active_stuff_' + stuff_id).attr('onclick',"activateStuff(" + stuff_id + ", " + e_id + ", '" + active + "')");

                return false;
            }
        ,
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(textStatus);
            }
    });
}

function deleteStuff() {
    swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this product!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function() {
            $.ajax({
                url: "/ajax/stockStuff/",
                type: "POST",
                dataType: "json",
                async: false,
                data: {
                    active_stuff : '0',
                    stock_stuff : 0,
                    enterprise_id :  $('#enterprise_id').val(),
                    stuff_id : $('#stuff_id').val()
                },
                success:
                    function(json)
                    {
                        console.log('Result: ',json);
                        swal("Deleted!", json.message, "success");

                        window.location.href = '/enterprise/products/edit/' + $('#enterprise_id').val();
                        return false;
                    }
                ,
                error:
                    function(xhr, textStatus, errorThrown)
                    {
                        console.log(textStatus);
                    }
            });

        });
}

function updateExtra(obj, checked)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();
    var extra_id = $(obj).attr('extra_id');
   
    if (f =='extra_activo') {
    	v = checked;
    }
    $.ajax({
        url: '/enterprise/products/update_extra',
        type: "POST",
        dataType: "json",
        data: {
            extra_id:extra_id,
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Ingredient updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function addExtra()
{
    $.ajax({
        url: '/enterprise/products/add_extra',
        type: "POST",
        dataType: "json",
        data: {
            enterprise_id:$('#enterprise_id').val(),
            stuff_id:$('#stuff_id').val(),
            extra_name:$('#extra_name').val(),
            extra_price:$('#extra_price').val(),

        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Ingredient Inserted...");

            setTimeout("location.reload();", 1500);
        },
        error: function (xhr, textStatus, errorThrown) {
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}