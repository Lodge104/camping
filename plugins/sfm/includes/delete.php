
 <script type="text/javascript">
		    function generate(type) {
			var n = noty({
			    text        : '<?php
					    echo '<b>'.basename($_POST['deletefile']).'</b> successfull deleted!<br />';			
					    
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
			var success = generate('success');		
			setTimeout(function () {
			    $.noty.close(success.options.id);
			}, 5000);		
		    });
		</script>
