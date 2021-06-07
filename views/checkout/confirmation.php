
<script>
    $(document).ready(function () {
        swal('Viker','Your order has been Received');
        setTimeout(function() {
            window.location.href = '/';
        }, 2500);
        alertify.set({ delay: 15000 });
        alertify.log("Shortly a Cycler will take the order...");
    });
</script>
