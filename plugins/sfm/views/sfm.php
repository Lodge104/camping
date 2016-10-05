<?php  if(!defined('APPLICATION')) die();

/* EDIT SETTINGS BELOW */
$LimitStorage = 5971520; // set the limit of storage you want for the users available; e.g 20971520 is 20MB
$MaxUploadSize = 2097152; // set your max upload filesize; set is 2 MB
$AllowedExts = array("gif", "jpeg", "jpg", "JPG", "png", "tif", "tiff", "bmp", "zip", "rar", "js", "css", "txt", "less", "pdf", "mp3"); // set allowed extensions
$ViewFiles =  array('jpg', 'png', 'gif', 'tif', 'tiff', 'bmp', 'pdf'); // edit this array for the files you want to appear a view icon
date_default_timezone_set('Europe/Amsterdam'); // set this to your own needs
setlocale(LC_ALL,'en_US.UTF-8');
/* END EDIT */


/* VANILLA VARIABLES */
$Session = Gdn::Session();
$UserID = md5(Gdn::session() ->UserID);


/* SET DIRECTORY */
$dir = 'uploads/sfm/'.$UserID;

$MainDir = 'uploads/sfm/'.$UserID;


// read actual dir from url
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$strArr = explode("=",$actual_link);
$CurrentPath = $strArr[1];

if(isset($_GET['dir'])) {
$dir = $CurrentPath;
}
// check if a folder contains real files
$realfiles = array_filter(glob($dir . '/*'), 'is_file'); 

/* CALCULATE USED STORAGE */
if (is_dir($MainDir)) { // we MUST check if the main directory of user already exists; otherwise we get a "something is wrong page"
    $iterator = new RecursiveIteratorIterator(
	new RecursiveDirectoryIterator($MainDir)
    );

    $SumStorage = 0;
    foreach ($iterator as $file) {
	$SumStorage += $file->getSize();
    }
    $UsedStorage = $SumStorage/$LimitStorage*100;
}



/* FUNCTION SIZE OF FOLDER */
 function recursive_directory_size($directory, $format=FALSE) {
     $size = 0;
     if(substr($directory,-1) == '/')
     {
         $directory = substr($directory,0,-1);
     }
     if(!file_exists($directory) || !is_dir($directory) || !is_readable($directory))
     {
         return -1;
     }
     if($handle = opendir($directory))
     {
         while(($file = readdir($handle)) !== false)
         {
             $path = $directory.'/'.$file;
             if($file != '.' && $file != '..')
             {
                 if(is_file($path))
                 {
                     $size += filesize($path);
                 }elseif(is_dir($path))
                 {
                     $handlesize = recursive_directory_size($path);
                     if($handlesize >= 0)
                     {
                         $size += $handlesize;
                     }else{
                         return -1;
                     }
                 }
             }
         }
         closedir($handle);
     }
     
     return $size;
}



/* FUNCTION convert bytes to Kb, Mb en Gb */
function sizeFormat($bytes){ 
    $kb = 1024;
    $mb = $kb * 1024;
    $gb = $mb * 1024;
    $tb = $gb * 1024;
    
    if (($bytes >= 0) && ($bytes < $kb)) {
    return $bytes . ' B';
    
    } elseif (($bytes >= $kb) && ($bytes < $mb)) {
    return ceil($bytes / $kb) . ' KB';
    
    } elseif (($bytes >= $mb) && ($bytes < $gb)) {
    return round($bytes / $mb, 2) . ' MB';
    
    } elseif (($bytes >= $gb) && ($bytes < $tb)) {
    return ceil($bytes / $gb) . ' GB';
    
    } elseif ($bytes >= $tb) {
    return ceil($bytes / $tb) . ' TB';
    } else {
    return $bytes . ' B';
    }
}

/* FUNCTION ZIP DIR */
function Zip($source, $destination)
{
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true)
    {
        //$zipfiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
	$zipfiles = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::LEAVES_ONLY);


        foreach ($zipfiles as $zipfile)
        {
            $zipfile = str_replace('\\', '/', $zipfile);

            // Ignore "." and ".." folders
            if( in_array(substr($zipfile, strrpos($zipfile, '/')+1), array('.', '..')) )
                continue;

            $zipfile = realpath($zipfile);

            if (is_dir($zipfile) === true)
            {
                $zip->addEmptyDir(str_replace($source . '/', '', $zipfile . '/'));
            }
            else if (is_file($zipfile) === true)
            {
                $zip->addFromString(str_replace($source . '/', '', $zipfile), file_get_contents($zipfile));
            }
        }
    }
    else if (is_file($source) === true)
    {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}



// FUNCTION recursive delete directory
function removeDirectory($path) {
 	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? removeDirectory($file) : unlink($file);
	}
	rmdir($path);
 	return;
}

?>
<!-- LOAD FONT AWESOME ICONS AND JS FOR AJAX */ -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<script src="http://malsup.github.com/jquery.form.js"></script>

<?php

    
/* PROTECT MANIPULATING VIA URL */
	 $protectedDirectories = array( 
				     array( 'uploads', 'sfm', $UserID  ) 
				 );
	 $directory = str_replace('\\','',$_GET['dir']);
	 $directory = trim($directory,'/');
	 $directory = preg_replace('#[\/]{1,}#','/',$directory);
	 $stats = false; // True = Protected , False = Cannot enter this directory.
	 $seperate = explode('/',$directory);
	 $cntSeperate = count( $seperate );
	 
	 foreach($protectedDirectories as $pattern ){
	     if( count( $pattern ) > $cntSeperate ){
		 continue;
	     }
	     $innerStats = true;
	 
	     foreach( $pattern as $key => $val ){
		 if( $seperate[ $key ] !== $val ){
		     $innerStats = false;
		     break;
		 }
	     }
	     if( $innerStats == false ){
		 continue;
	     }
	     $stats = true;
	     break;
	 }
	 
	 if( $stats == true )  {
	 
	     //echo 'allowed';
	 
	 }
	 
	// we make an exception when url = /sfm and when in the url is a delete, compress or extract string,  which contains at least: delete=uploads/sfm/'.$UserID
	 elseif ($_SERVER['QUERY_STRING'] != 'p=sfm'
		 and strpos($_SERVER['QUERY_STRING'], 'delete=uploads/sfm/'.$UserID) != true 
		 and strpos($_SERVER['QUERY_STRING'], 'compress=uploads/sfm/'.$UserID) != true
		 and strpos($_SERVER['QUERY_STRING'], 'extract=uploads/sfm/'.$UserID) != true ) {
	 	    
	     //echo 'no access';
	     $location = '/sfm';
	     header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
	     die();
	 
	 } 
	 
/* END PROTECT URL */

    
///////////////////////////// MAKEDIR ////////////////////////////////////////////
if(isset($_POST['mkdir'])){
	$DirectoryName = preg_replace('#[^a-z0-9]#i', '', $_POST['dirname']); // only allow a-z, A-Z and 0-9 for directory name
	mkdir($dir.'/'.$DirectoryName, 0777, true);
	include('plugins/sfm/includes/created.php');
	exit;
	
} // endif $_POST['mkdir'];
/////////////////////////////////// END MAKEDIR //////////////////////////////////////////////


/////////////////////////////////// DELETE //////////////////////////////////////////////
if(isset($_POST['deleteall'])) {
    
    $files = glob($dir.'/*'); // get all file names
    foreach($files as $file){ // iterate files
	if(is_file($file)) {
	   unlink($file); // delete file
	   include('plugins/sfm/includes/deleteall.php'); // echo
	   
	   
	  
	}
	
    }
    exit; 
}

if(isset($_POST['delete'])) {
		    //protect manipulating deletefile_name via browser inspector
		    $pieces = explode("/", $_POST['deletefile']);
		    $protectedstring = $pieces[0].'/'.$pieces[1].'/'.$pieces[2];
		    if($MainDir != $protectedstring) {
			$location = '/sfm';
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			die();
		    }
					
		    // if is directory -> remove dir
		    if(is_dir($_POST['deletefile'])){
			
		    removeDirectory($_POST['deletefile']);
		    include('plugins/sfm/includes/delete.php'); // echo
		    exit;
			
		    }
		    // else (must be a file) -> unlink file
		    else {
					   
		    unlink($_POST['deletefile']);
		    include('plugins/sfm/includes/delete.php'); // echo
		    exit;
		    }
		     
}
/////////////////////////////////// END DELETE //////////////////////////////////////////////


/////////////////////////////////// EXTRACT //////////////////////////////////////////////
if(isset($_POST['extract'])) {
		    //protect manipulating extractfile_name via browser inspector
		    $pieces = explode("/", $_POST['extractfile']);
		    $protectedstring = $pieces[0].'/'.$pieces[1].'/'.$pieces[2];
		    if($MainDir != $protectedstring) {
			$location = '/sfm';
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			die();
		    }
		    $zip = new ZipArchive;
		    if ($zip->open($_POST['extractfile']) === TRUE) {
			
			$unzipped = 0; 
			$fails = 0; 
			$total = 0; 
			for ($i = 0; $i < $zip->numFiles; $i++) {
			    $path_info = pathinfo($zip->getNameIndex($i));
			    $ext = $path_info['extension'];
			    $total ++; 
			    
			    if(in_array($ext, $AllowedExts)) { // only files with allowed Exts can be extracted
				if($SumStorage < $LimitStorage) { // do not allow extracting if limitstorage is exceeded
				    $zip->extractTo(dirname($_POST['extractfile']), $zip->getNameIndex($i)); // extract in the same folder as where the zip file is
				    $unzipped ++; 
				}
			    }
			    else {
				$fails ++; 
				 
			    }
							    
			}
			include('plugins/sfm/includes/extract.php'); // echo 
			
			
			$zip->close();
			exit;
			
		    }
						    
}
/////////////////////////////////// END EXTRACT //////////////////////////////////////////////


/////////////////////////////////// RENAME //////////////////////////////////////////////
if(isset($_POST['rename'])) {
    
                    //protect manipulating old_name via browser inspector
                    $pieces = explode("/", $_POST['old_name']);
		    $protectedstring = $pieces[0].'/'.$pieces[1].'/'.$pieces[2];
		    if($MainDir != $protectedstring) {
			$location = '/sfm';
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
			die();
		    }
		    if(is_dir($_POST['old_name'])){
			$NewDirName = $dir.'/'.preg_replace('#[^a-z0-9]#i', '', $_POST['new_name']); // only allow a-z, A-Z and 0-9
			rename($_POST['old_name'], $NewDirName);
			include('plugins/sfm/includes/renamefolder.php'); // echo
			exit;
			
						
		    }
		    
		    elseif(!is_dir($_POST['old_name'])) {
			 $FileExtension = pathinfo($_POST['old_name'], PATHINFO_EXTENSION);
			$NewFileName = $dir.'/'.preg_replace('#[^a-z0-9]#i', '', $_POST['new_name']).'.'.$FileExtension; // only allow a-z, A-Z and 0-9
			rename($_POST['old_name'], $NewFileName);
		        include('plugins/sfm/includes/renamefile.php'); // echo
			exit;
			
			  
		    }
		   
		   					
}
/////////////////////////////////// END RENAME //////////////////////////////////////////////

//////////////////////////////////COMPRESS///////////////////////////////////////////////////
 if(isset($_GET['compress'])) {
			    // create a tmp folder for the zip file
			    $tmpfolder = 'uploads/sfm/'.$UserID.'/tmpzip';
                            if (!is_dir($tmpfolder)) {
				@mkdir($tmpfolder, 0777, true);
			    }
			    
			    // compress folder and sent compressed zip to tmpzip
			    Zip($_GET['compress'], $tmpfolder."/compressed.zip");
			    
			    if(file_exists($tmpfolder.'/compressed.zip')){
				// set variables
				$filename = "compressed.zip";
				$filepath = $tmpfolder."/";
				
				// http headers for zip downloads
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment; filename=\"".$filename."\"");
				header("Content-Transfer-Encoding: binary");
				header("Content-Length: ".filesize($filepath.$filename));
				
				while (ob_get_level()) {
				    ob_end_clean();
				}
				@readfile($filepath.$filename);
				unlink($tmpfolder.'/compressed.zip'); // unlink compressed.zip
				rmdir($tmpfolder); // remove tmpdir
				die();
				
			    }
			    
			    
			}
/////////////////////////////////END COMPRESS////////////////////////////////////////////////


/////////////////////////// UPLOAD//////////////////////////////////////////////
if(!$_POST['rename'] && !$_POST['deleteall'] && !$_POST['delete'] && !$_POST['extract'] ) {
    if($_SERVER['REQUEST_METHOD'] == "POST") {    
	/* vanilla variables */
	$Session = Gdn::Session();
	//$UserName = md5($Session->User->Name); 
	$UserID = md5(Gdn::session() ->UserID);
     
     
        $extensionName = explode(".", $_FILES["file"]["name"]);	
	$extension = end($extensionName);
	     
	$root = '/'.$dir.'/';
	if (!is_dir($root))
	{
	    // create folder "uploads/sfm/$UserID" if not already exist
	    @mkdir($dir, 0777, true);
	}		    
	    
	if($SumStorage > $LimitStorage) { // if max available storage is reached
	    //echo'<div class="sfmfailed">You have reached your available storage!</div><br />';
	    include('plugins/sfm/includes/outstorage.php');
	    die();
	}
	elseif($_FILES["file"]["size"] > $MaxUploadSize) { // if maxupload size is exceeded
	    //echo '<div class="sfmfailed">File is too big!</div><br />';
	    include('plugins/sfm/includes/toobig.php');
	    
	}
	elseif(in_array($extension, $AllowedExts)==0) { // if extension is not allowed
	    //echo '<div class="sfmfailed">File type is not allowed!</div><br />';
	    include('plugins/sfm/includes/notallowed.php');
	    
	    
	}
	else {
	    
	    //foreach($_FILES['file']['tmp_name'] as $key => $tmp_name )
	    //{
	    	// file is ready to be uploaded	   
		$tmpFilePath = $_FILES['file']['tmp_name'];            
		$newFilePath = $dir.'/' . $_FILES['file']['name'];     
		
		    if(move_uploaded_file($tmpFilePath, $newFilePath)) {    
		    
			// echo's when upload is successful; we make a smooth echo with js
			include('plugins/sfm/includes/success.php'); // echo
			
    			/*echo '<b>Status: </b>'.'<span class="success"><b>Upload Successful!</b></span><br />';			
			echo '<b>File: </b>' . $_FILES["file"]["name"] . '<br />';
    			echo '<b>Type: </b>' . $_FILES["file"]["type"] . '<br />';
			echo '<b>Size: </b>' . round(($_FILES["file"]["size"] / 1048576), 2) . ' MB';
			echo '<br /><br />';*/
		     			
		    }
		   
	    //}
	}	    

        exit; 
    }// endif $_POST['REQUESTMETHOD'];
       
} // endif $_POST['rename'] && !$_POST['delete'] && !$_POST['extract'];
/////////////////////////// END UPLOAD//////////////////////////////////////////////



/* SCANDIR */
$files = scandir($dir);


/* SORT FOLDERS first, then by type, then alphabetically */
usort ($files, create_function ('$a,$b', '
	return	is_dir ($a)
		? (is_dir ($b) ? strnatcasecmp ($a, $b) : -1)
		: (is_dir ($b) ? 1 : (
			strcasecmp (pathinfo ($a, PATHINFO_EXTENSION), pathinfo ($b, PATHINFO_EXTENSION)) == 0
			? strnatcasecmp ($a, $b)
			: strcasecmp (pathinfo ($a, PATHINFO_EXTENSION), pathinfo ($b, PATHINFO_EXTENSION))
		))
	;
'));



?>

<!--  DIV In which the echos come-->
<div id="customContainer"></div>
<div id="status"></div>

    <div class="uploads">
	
<script>
$(document).ready(function() {
    
    /* spinner div */
    var $loading = $('.uploadspinner').hide();
    
    $(document)
    .ajaxStart(function () {
      $loading.show();
    })
    .ajaxStop(function () {
      $loading.hide();
    });
    	
});


    function createFormData(sfmfile) {
	    var formFile = new FormData();
	    formFile.append('file', sfmfile[0]);
	    uploadFormData(formFile);
    }


    function uploadFormData(formData) {

	$.ajax({
	    url: "<?php 'sfm?dir='.$dir; ?>",
	    type: "POST",
	    data: formData,
	    contentType:false,
	    cache: false,
	    processData: false,
	    success: function(data){
		
		//$('#drop-area').append(data);
		$('#status').append(data);
		$('.myFiles').load(document.URL +  ' .myFiles');
		
	    }
	    
        });
    }

</script>
        <!-- DRAG AND DROP AREA AND UPLOADFORM -->
	<div id="drop-area">
	    
	    <h3 class="drop-text">Drag and Drop Files Here<br /><br />or..</h3>
	
	<form id="uploadform" class="sfmform" action="" method="post" enctype="multipart/form-data">	    
	    <input type="file" name="file" id="file" />
	    <!--<input type="submit" class="Button Primary" name="upload" value="Upload" />-->	    
	</form>
	
	</div>
	
	
		
    </div>
    
       
    <!-- SPINNER DURING UPLOAD -->
<br />
  <div class="uploadspinner"><img src="plugins/sfm/design/img/ajax-loader.gif" /></div>
    
    <!-- CREATE DIR FORM -->         
    <form class="sfmform" action="" method="post">
	<br />
     <b>Create Folder</b>
     <br />
	<input type="text" name="dirname"  placeholder="only a-z, A-Z and 0-9" />
			
	
	<input type="submit" class="Button Primary" name="mkdir" value="Create Folder" />
	<br /><br />
	
    </form>
    


<!-- START div myFiles -->
<div class="myFiles">
    
<?php


 /* OUTPUT USED STORAGE */
if (is_dir($MainDir)) {

    if(round($UsedStorage, 2) < 100) {
        echo 'Used<b> '.round($SumStorage/1048576, 2).' </b>MB of <b>'.round($LimitStorage/1048576, 2).'</b> MB<br />';
	echo '<b>'.round($UsedStorage, 2).' %</b><br />';
    }
    else {
	// in css; max_exceed is red colored
        echo 'Used<b class="max_exceed"> '.round($SumStorage/1048576, 2).' </b>MB of <b>'.round($LimitStorage/1048576, 2).'</b> MB<br />';
        echo '<b class="max_exceed">'.round($UsedStorage, 2).' %.<br /> You have reached your available storage!</b>';
	
	
    }
    
    
}

?>

<!-- STORAGE BAR-->
        <div id="myProgress">
	    
	    <div id="myBar" style="width: <?php echo round($UsedStorage, 2); ?>%"></div>
        </div>
        <br />
	
	<?php

	
/* BREADCRUMBS */
$crumbs = explode('/', $dir); 
$url_pre = ''; 

foreach($crumbs as $crumb){
    
	$url_pre .= $crumb;
	    if($crumb != 'uploads' and $crumb != 'sfm') { // eliminate slashes from uploads and sfm folders
		// eliminate "uploads" en "sfm" form crumbs and rename the md5 hash to "Root"
		echo '<a href="?dir='.$url_pre.'">'.str_replace(array("uploads","sfm","$UserID"),array(" "," ","Root"),$crumb).' / '.'</a>'; 
	    }
	$url_pre .= '/'; // dir does not start with a /
        
}
	
	
?>

   <!-- START TABLE FOR OUTPUT -->
        <table class="sfmtable">

<?php
 

            // show delete all icon only if > 1 files in dir
            if(count($realfiles) > 1 ) {	   
?>
	     <tr class="sfmrow">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>
		    <form class="sfmform" method="post" action="">
			<!--<input type="hidden" name="deletefile" value=" " />-->
			<input class="sfmdelete" type="submit" name="deleteall" value=" " />
		    </form>
		</td>
		<td>Delete all files in
		   <span class="sfmcrumb"> 
			<?php
			if(basename($dir) == $UserID) {
			    echo 'Root';
			}
			else {
			    echo basename($dir);
			}
			 ?>
		   </span>
		</td>
	    </tr>
<?php
	    } // endif count($realfiles)
?>
	    <tr class="sfmrow">
		<td><b>File</b></td>
		<td><b>Type</b></td>
		<td><b>Time</b></td>
		<td><b>Size</b></td>
		<td><b>View</b></td>
		<td><b>Down</b></td>
		<td><b>Del</b></td>
		<td><b>Rename</b></td>
	    </tr>
<?php
	    


/* RENDER THE FILES */
    foreach ($files as $file) {
	if ($file != '.' && $file != '..') { // don't show links to previous folders
	    $MimeFileType = mime_content_type($dir.'/'.$file);
	    $FileExtension = pathinfo($file, PATHINFO_EXTENSION);
	    $ClassExtension = 'sfm_'.$FileExtension;
	    
	    
		
?>
    	   
	    <tr class="sfmrow">
		
		<td>
		    
		    <?php
		    // FILENAME
		    if(is_dir($dir.'/'.$file)) {
						
			$folderanchor = "<a href='?dir=".$dir.'/'.$file."'>$file</a>";
			echo '<div class="sfmfolder">'.$folderanchor.'</div>';									     
		    }
		    else {			
			echo "<div class='$ClassExtension'>".' '.$file.'</div>';		    			
		    }
		    		    
                    
		    ?>
		</td>
		<td>
		    <?php
		        // TYPE;
			echo $FileExtension;
		    ?>
		</td>
		<td>
		    <?php
		         // DATE 
			echo date("M d 'y H:i",filemtime($dir.'/'.$file));
		    ?>
		</td>
		<td>
		    <?php
		        // SIZE
			if(!is_dir($dir.'/'.$file)){
		           echo sizeFormat(filesize($dir . '/' . $file));
			   
			}
			else {
			    // calculate size of folder
			    echo sizeFormat(recursive_directory_size($dir . '/' . $file));
			}
		    ?>
		</td>
		
		<td><?php
		        // VIEW/EXTRACT
			// extract zip files; show unlock icon for extracting in the VIEW column for .zip files
			
			// anchors -> eye icon
			if(!is_dir($dir.'/'.$file)){
			   // filter extensions for view icon
			   if ( in_array( strtolower($FileExtension), $ViewFiles ) ) {
				echo "<div class='view'>";
				// image files
			        if(in_array($FileExtension,array('jpg', 'jpeg', 'png', 'gif', 'tif', 'tiff'))) {
				   echo "<a href='" . $dir . "/" . $file . "' data-featherlight='image' target='_blank'></a>";
				}
				else {
				// other files 
				   echo "<a href='" . $dir . "/" . $file . "' target='_blank'></a>";
				   
				}
				echo "</div>";
			   }
			   // zip files -> extract icon
			   elseif(in_array($FileExtension,array('zip'))) {
			    ?>
			     <form class="sfmform" method="post" action="">
				<input type="hidden" name="extractfile" value="<?php echo $dir.'/'.$file; ?>" />
				<input class="sfmextract" type="submit" name="extract" value=" " />
			    </form>
			    <?php
			        
			   }
			}
		    ?>
		    
		</td>
		<td><?php
		        // DOWNLOAD					
		        if(!is_dir($dir.'/'.$file)){
			   
			    echo "<div class='download'>"
			    ."<a href=" . $dir . "/" . $file . " download></a>"
			    ."</div>";
			    
		        }
			// if folder is not empty and if has subfolders, but also not empty 
			elseif(sizeFormat(recursive_directory_size($dir . '/' . $file)) != 0 && count(scandir($dir.'/'.$file)) != 2){ 
						
			    echo "<div class='download'>"
			    ."<a href='?compress=".$dir.'/'.$file."'></a>"
			    ."</div>";
			    		   
			}
		    ?>
		</td>
		
		<td>
		<!-- DELETE -->
		<form class="sfmform" method="post" action="">
		    <input type="hidden" name="deletefile" value="<?php echo $dir.'/'.$file; ?>" />
		    <input class="sfmdelete" type="submit" name="delete" value=" " />
		</form> 
		
		</td>
		<td>
		<!-- RENAME -->
		<form class="sfmform" method="post" action="">
		    <input type="hidden" name="old_name" value="<?php echo $dir.'/'.$file; ?>" />
		    <input class="new_name" type="text" name="new_name" placeholder="only a-z, A-Z and 0-9" value="" />
		    <input type="submit" class="rename" name="rename" value="Go" />      
		    
		</form>
		
		</td>
	    </tr>
	    
	   
	  
    <?php
	    
	} // endif $file != '.' && $file != '..'
	
	
    } // endif foreach
    ?>
	    
	</table><!-- end table -->
</div> <!-- end div myFiles -->

  
    
<?php






















