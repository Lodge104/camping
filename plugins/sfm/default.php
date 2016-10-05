<?php if(!defined('APPLICATION')) die();


$PluginInfo['sfm'] = array(
	'Version' => '1.3.3',
	'Name' => 'SFM',
	'Description' => 'Simple File Management for users. Upload, View, Download and Delete files in your own folder.',
	'License'=>"GNU GPL2",
        'Author' => "Jack Maessen" 
);


class sfm_Plugin extends Gdn_Plugin {

    public function Base_Render_Before($Sender) {
			
      $Sender->AddJsFile($this->GetResource('js/featherlight.min.js', FALSE, FALSE));
      $Sender->AddJsFile($this->GetResource('js/jquery.noty.packaged.js', FALSE, FALSE));
      $Sender->AddJsFile($this->GetResource('js/sfm.js', FALSE, FALSE));
      
      $Sender->AddCSSFile($this->GetResource('design/sfm.css', FALSE, FALSE));
      $Sender->AddCSSFile($this->GetResource('design/featherlight.min.css', FALSE, FALSE));
      
        $Session = Gdn::Session();
	
	if ($Sender->Menu) {
	$Sender->Menu->AddLink('myfiles', T('MyFiles'), 'sfm');
	}
    }

    public function PluginController_sfm_Create($Sender) {
	
        $Session = Gdn::Session();
	if (! Gdn::Session()->IsValid() ) return;
	

        if ($Sender->Menu) {
            $Sender->ClearCssFiles();
            $Sender->AddCssFile('style.css');
            $Sender->MasterView = 'default';

            $Sender->Render('sfm', '', 'plugins/sfm');
	    
	    
	   
        }
    }
   

    public function OnDisable() {
	          $matchroute = 'sfm';
             
	           Gdn::Router()-> DeleteRoute($matchroute); 
	
	}
    public function Setup() {
  
             $matchroute = 'sfm';
             $target = 'plugin/sfm';
        
             if(!Gdn::Router()->MatchRoute($matchroute))
                  Gdn::Router()->SetRoute($matchroute,$target,'Internal'); 
          
    }
}

