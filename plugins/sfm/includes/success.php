
 <script type="text/javascript">
		    function generate(type) {
			var n = noty({
			    text        : '<?php
					    echo '<b>Status: </b>'.'<b>Upload Successful!</b><br />';			
					    echo '<b>File: </b>' . $_FILES["file"]["name"] . '<br />';
					    echo '<b>Type: </b>' . $_FILES["file"]["type"] . '<br />';
					    echo '<b>Size: </b>' . round(($_FILES["file"]["size"] / 1048576), 2) . ' MB';
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
