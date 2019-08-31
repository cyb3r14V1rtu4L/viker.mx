function getOrders(e_id)
{
    $('#enterprise_id').val(e_id);
    getOrdersNowE($('#enterprise_id').val());
    setTimeout('getOrders($("#enterprise_id").val())',30000);
}

function getOrdersNow()
{
    $.ajax({
        url: 'orders/get_orders',
        type: "POST",
        dataType: "json",
        data: {
            user_id:$("#user_id").val(),
        }
        ,
        success: function (json) {
            console.log(json);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(xhr);
        }
    });
}


function getOrdersNowE(e_id)
{
    $('#enterprise_id').val(e_id);
    $.ajax({
        url: '/ajax/get_orders_e',
        type: "POST",
        dataType: "json",
        data: {
            enterprise_id:e_id,
        }
        ,
        success: function (json)
        {
            $("#orders_results").html(json.html_orders);

            $('.clockpicker').clockpicker({
                placement: 'right',
                align: 'left',
                autoclose: true
            });

        },
        error: function (xhr, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
    });

}

function setTimePrepare(obj)
{
    var order_id = $(obj).attr('order_id');
    var time_prepare = $(obj).val();

    $.ajax({
        url: '/enterprise/order/setTimePrepare',
        type: "POST",
        dataType: "json",
        data: {
            order_id:order_id,
            time_prepare:time_prepare,
        }
        ,
        success: function (json)
        {
            alertify.set({ delay: 15000 });
            alertify.log(json.messageo);
        },
        error: function (xhr, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
    });

}

function confirmProcessing(obj) {
    var order_id = $(obj).attr('order_id');

    $.ajax({
        url: '/enterprise/order/confirmProcessing',
        type: "POST",
        dataType: "json",
        data: {
            order_id:order_id,
            status:'AUTH',
        }
        ,
        success: function (json)
        {
            alertify.set({ delay: 15000 });
            alertify.log(json.messageo);
        },
        error: function (xhr, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
    });
}

function pauseOrders() {
    setTimeout('getOrdersNowE($("#enterprise_id").val())',99999);
    _removeTimeout;
}

function activateCompany(e_id, active_enterprise)
{
    $.ajax({
        url: "/ajax/activateCompany/",
        type: "POST",
        dataType: "json",
        async: false,
        data: {
            active_enterprise    : active_enterprise,
            enterprise_id : e_id,
        },
        success:
            function(json)
            {
                console.log(json);
                alertify.set({ delay: 1000 });
                alertify.log(json.message);
                var active = (active_enterprise == '1') ? '0' : '1';

                switch (active_enterprise) {

                    case '1':
                        $('#btn_active_enterprise').removeClass('bg-green');
                        $('#btn_active_enterprise').addClass('bg-grey');
                        $('#btn_active_enterprise').text('DEACTIVATE');
                        break;
                    case '0':
                        $('#btn_active_enterprise').removeClass('bg-grey');
                        $('#btn_active_enterprise').addClass('bg-green');
                        $('#btn_active_enterprise').text('ACTIVE');

                        break;

                }
                $('#btn_active_enterprise').attr('onclick',"activateCompany(" + e_id + ", '" + active + "')");

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