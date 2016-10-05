<?php /* Smarty version 2.6.25, created on 2015-12-22 04:13:57
         compiled from /home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'asset', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 4, false),array('function', 'dashboard_link', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 10, false),array('function', 'discussions_link', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 11, false),array('function', 'activity_link', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 12, false),array('function', 'inbox_link', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 13, false),array('function', 'profile_link', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 14, false),array('function', 'custom_menu', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 15, false),array('function', 'signinout_link', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 16, false),array('function', 'searchbox', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 22, false),array('function', 'vanillaurl', '/home/lodge104_app03/app03.lodge104.net/themes/BrandFriendly/views/default.master.tpl', 31, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-ca">
<head>
  <?php echo smarty_function_asset(array('name' => 'Head'), $this);?>

</head>
<body id="<?php echo $this->_tpl_vars['BodyID']; ?>
" class="<?php echo $this->_tpl_vars['BodyClass']; ?>
">
  <div id="Frame">
	 <div class="Banner">
		<ul>
		  <?php echo smarty_function_dashboard_link(array(), $this);?>

		  <?php echo smarty_function_discussions_link(array(), $this);?>

		  <?php echo smarty_function_activity_link(array(), $this);?>

		  <?php echo smarty_function_inbox_link(array(), $this);?>

		  <?php echo smarty_function_profile_link(array(), $this);?>

		  <?php echo smarty_function_custom_menu(array(), $this);?>

		  <?php echo smarty_function_signinout_link(array(), $this);?>

		</ul>
	 </div>
	 <div id="Body">
		<div class="Wrapper">
		  <div id="Panel">
			 <div class="SearchBox"><?php echo smarty_function_searchbox(array(), $this);?>
</div>
			 <?php echo smarty_function_asset(array('name' => 'Panel'), $this);?>

		  </div>
		  <div id="Content">
			 <?php echo smarty_function_asset(array('name' => 'Content'), $this);?>

		  </div>
		</div>
	 </div>
	 <div id="Foot">
		<div><a href="<?php echo smarty_function_vanillaurl(array(), $this);?>
"><span>Powered by Vanilla</span></a></div>
		<?php echo smarty_function_asset(array('name' => 'Foot'), $this);?>

	 </div>
  </div>
</body>
</html>