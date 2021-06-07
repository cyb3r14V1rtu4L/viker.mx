function setFileInputProfile(e_id, u_id) //Logo Empresa
{
    $("#photo_profile").fileinput({
        uploadUrl: '/enterprise/uploader/photo_profile/'+e_id,
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
        $("#photo_profile").fileinput("upload");
    }).on('fileuploaded', function(event, data) {
        alertify.set({ delay: 1000 });
        alertify.log("Enterprise updated...");
        d = new Date();
        $(".photo_profile").attr("src", "/public/uploads/enterprise/profile/"+e_id+"/profile.jpg?"+d.getTime());

    });

}

function setFileInputProfilePhoto(e_id, u_id) //Logo Profile
{

    $("#profile_photo").fileinput({
        uploadUrl: '/enterprise/uploader/profile_photo/' + u_id,
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
        $("#profile_photo").fileinput("upload");
    }).on('fileuploaded', function(event, data) {
        alertify.set({ delay: 1000 });
        alertify.log("Profile updated...");
        d = new Date();
        $(".photo_profile_img_e").attr("src", "/public/uploads/customer/profile/"+u_id+"/profile.jpg?"+d.getTime());


    });

}

function updateProfileU(obj)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();

    $.ajax({
        url: '/enterprise/profile/update_profile',
        type: "POST",
        dataType: "json",
        data: {
            user_id:$('#user_id').val(),
            enterprise_id:$('#enterprise_id').val(),
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Profile updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function updateProfileE(obj)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();

    $.ajax({
        url: '/enterprise/profile/update_enterprise',
        type: "POST",
        dataType: "json",
        data: {
            user_id:$('#user_id').val(),
            enterprise_id:$('#enterprise_id').val(),
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Enterprise updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function updateAddressE()
{

    $.ajax({
        url: '/enterprise/profile/update_address',
        type: "POST",
        dataType: "json",
        data: {
            user_id:$('#user_id').val(),
            enterprise_id:$('#enterprise_id').val(),
            geo_lat:$('#geo_lat').val(),
            geo_lng:$('#geo_lng').val(),
            geo_str:$('#geo_str').val(),
            geo_int:$('#geo_int').val(),
            geo_ext:$('#geo_ext').val(),
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Address Enterprise updated...");
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}

function updateProfileHO(obj)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();
    days_open_arr = ['sun_day_open','mon_day_open','tue_day_open','wed_day_open','thu_day_open','fri_day_open','sat_day_open'];
    var es_bool = $.inArray(f, days_open_arr)
    
    
    if (es_bool !== -1) {
    	v = $(obj).is(':checked');
    }
    console.log('value', v);

    $.ajax({
        url: '/enterprise/profile/update_enterprise_ho',
        type: "POST",
        dataType: "json",
        data: {
            user_id:$('#user_id').val(),
            enterprise_id:$('#enterprise_id').val(),
            f:f,
            v:v,
        }
        ,
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log(json.message);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
            showMessage("VIKER: " + errorThrown + ". " + textStatus, 'error');
        }
    });
}


