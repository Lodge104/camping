
 <script type="text/javascript">
    function generate(type) {
        var n = noty({
            text        : '<?php
                            echo'<b>You have reached your available storage!<br>';
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
        var error = generate('error');		
        setTimeout(function () {
            $.noty.close(error.options.id);
        }, 5000);		
    });
</script>
