
 <script type="text/javascript">
    function generate(type) {
        var n = noty({
            text        : '<?php
                            echo '<b>'.basename($_POST['old_name']).'</b> renamed to <b>'.$_POST['new_name'].'</b>';
                         ?>',
            type        : type,
            dismissQueue: false,
            layout      : 'topCenter',
            theme       : 'defaultTheme'
        });
        console.log(type + ' - ' + n.options.id);
        return n;
    }
    $(document).ready(function () {			
        var alert = generate('alert');		
        setTimeout(function () {
            $.noty.close(alert.options.id);
        }, 5000);		
    });
</script>
