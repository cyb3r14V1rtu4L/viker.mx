
function updateExtraOrder(obj, checked)
{
    var f = $(obj).attr('f');
    var v = $(obj).val();
    var extra_id  = $(obj).attr('extra_id');
    var enterprise_id  = $(obj).attr('enterprise_id');
    var stuff_id  = $(obj).attr('stuff_id');
    var stuff_uid = $(obj).attr('stuff_uid');
    if (f =='extra_activo' || f =='extra_default') {
    	v = checked;
    }
    
    $.ajax({
        url: '/menu/updateExtraOrder',
        type: "POST",
        dataType: "json",
        data: {
            extra_id:extra_id,
            enterprise_id:enterprise_id,
            stuff_id:stuff_id,
            stuff_uid:stuff_uid,
            f:f,
            v:v,
        },
        success: function (json) {
            //console.log(json);
            alertify.set({ delay: 1000 });
            alertify.log("Ingredient added...");
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}

function updatePrices() {
    window.location = '/menu/shopping';
    alertify.set({ delay: 1000 });
    alertify.log("Products updated...");
}
