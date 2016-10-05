
 <script type="text/javascript">
		    function generate(type) {
			var n = noty({
			    text        : '<?php
					    echo 'There are <b>'.$unzipped.'</b> files from <b>'.$total.'</b> extracted!';		
					    
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
