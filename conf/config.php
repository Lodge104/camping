<?php if (!defined('APPLICATION')) exit();

// BasicPages
$Configuration['BasicPages']['Version'] = '2.1.6';

// Conversations
$Configuration['Conversations']['Version'] = '2.2';

// Database
$Configuration['Database']['Name'] = 'lodge104_app03';
$Configuration['Database']['Host'] = 'mysql.lodge104.net';
$Configuration['Database']['User'] = 'lodge104_app03';
$Configuration['Database']['Password'] = '!CQ^tkC4@$Jw4+P+';

// DiscussionExtender
$Configuration['DiscussionExtender']['Fields']['Location']['Type'] = 'TextBox';
$Configuration['DiscussionExtender']['Fields']['Location']['Position'] = 'body';
$Configuration['DiscussionExtender']['Fields']['Location']['Label'] = 'Location Address';
$Configuration['DiscussionExtender']['Fields']['Location']['Options'] = '';
$Configuration['DiscussionExtender']['Fields']['Location']['Required'] = false;
$Configuration['DiscussionExtender']['Fields']['Location']['Display'] = '1';
$Configuration['DiscussionExtender']['Fields']['Location']['Column'] = '1';
$Configuration['DiscussionExtender']['Fields']['Location']['Name'] = 'Location';
$Configuration['DiscussionExtender']['Fields']['Cost']['Type'] = 'TextBox';
$Configuration['DiscussionExtender']['Fields']['Cost']['Position'] = 'body';
$Configuration['DiscussionExtender']['Fields']['Cost']['Label'] = 'Cost';
$Configuration['DiscussionExtender']['Fields']['Cost']['Options'] = '';
$Configuration['DiscussionExtender']['Fields']['Cost']['Display'] = '1';
$Configuration['DiscussionExtender']['Fields']['Cost']['Column'] = '1';
$Configuration['DiscussionExtender']['Fields']['Cost']['Required'] = false;
$Configuration['DiscussionExtender']['Fields']['Cost']['Name'] = 'Cost';
$Configuration['DiscussionExtender']['Fields']['Website']['Type'] = 'TextBox';
$Configuration['DiscussionExtender']['Fields']['Website']['Position'] = 'body';
$Configuration['DiscussionExtender']['Fields']['Website']['Label'] = 'Website';
$Configuration['DiscussionExtender']['Fields']['Website']['Options'] = '';
$Configuration['DiscussionExtender']['Fields']['Website']['Display'] = '1';
$Configuration['DiscussionExtender']['Fields']['Website']['Column'] = '1';
$Configuration['DiscussionExtender']['Fields']['Website']['Required'] = false;
$Configuration['DiscussionExtender']['Fields']['Website']['Name'] = 'Website';

// EnabledApplications
$Configuration['EnabledApplications']['Conversations'] = 'conversations';
$Configuration['EnabledApplications']['Vanilla'] = 'vanilla';
$Configuration['EnabledApplications']['BasicPages'] = 'basicpages';

// EnabledPlugins
$Configuration['EnabledPlugins']['GettingStarted'] = false;
$Configuration['EnabledPlugins']['HtmLawed'] = 'HtmLawed';
$Configuration['EnabledPlugins']['Facebook'] = true;
$Configuration['EnabledPlugins']['Twitter'] = true;
$Configuration['EnabledPlugins']['GooglePlus'] = true;
$Configuration['EnabledPlugins']['Flagging'] = true;
$Configuration['EnabledPlugins']['OpenID'] = true;
$Configuration['EnabledPlugins']['cleditor'] = false;
$Configuration['EnabledPlugins']['ButtonBar'] = true;
$Configuration['EnabledPlugins']['Emotify'] = false;
$Configuration['EnabledPlugins']['FileUpload'] = false;
$Configuration['EnabledPlugins']['editor'] = true;
$Configuration['EnabledPlugins']['IndexPhotos'] = false;
$Configuration['EnabledPlugins']['PrivateCommunity'] = true;
$Configuration['EnabledPlugins']['VanillaInThisDiscussion'] = true;
$Configuration['EnabledPlugins']['ProfileExtender'] = true;
$Configuration['EnabledPlugins']['SplitMerge'] = true;
$Configuration['EnabledPlugins']['StopForumSpam'] = true;
$Configuration['EnabledPlugins']['Tagging'] = true;
$Configuration['EnabledPlugins']['VanillaStats'] = true;
$Configuration['EnabledPlugins']['SimplePages'] = true;
$Configuration['EnabledPlugins']['Participated'] = true;
$Configuration['EnabledPlugins']['Pockets'] = true;
$Configuration['EnabledPlugins']['RoleTitle'] = true;
$Configuration['EnabledPlugins']['Bump'] = true;
$Configuration['EnabledPlugins']['NoBump'] = true;
$Configuration['EnabledPlugins']['registrationmessage'] = false;
$Configuration['EnabledPlugins']['shortprofileurls'] = true;
$Configuration['EnabledPlugins']['bootstrapmarkdown'] = false;
$Configuration['EnabledPlugins']['Ignore'] = true;
$Configuration['EnabledPlugins']['JumpToTop'] = false;
$Configuration['EnabledPlugins']['Spoof'] = true;
$Configuration['EnabledPlugins']['Disqus'] = false;
$Configuration['EnabledPlugins']['Gravatar'] = true;
$Configuration['EnabledPlugins']['bot'] = true;
$Configuration['EnabledPlugins']['ImgurUpload'] = true;
$Configuration['EnabledPlugins']['EmojiExtender'] = true;
$Configuration['EnabledPlugins']['vanillicon'] = true;
$Configuration['EnabledPlugins']['DiscussionExtender'] = true;
$Configuration['EnabledPlugins']['sfm'] = false;
$Configuration['EnabledPlugins']['BetterNotifications'] = true;
$Configuration['EnabledPlugins']['avatarfirstletter'] = true;

// Garden
$Configuration['Garden']['Title'] = 'Occoneechee Lodge | Where to go Camping';
$Configuration['Garden']['Cookie']['Salt'] = 'j2gvXsH1dJ0Uhswt';
$Configuration['Garden']['Cookie']['Domain'] = '';
$Configuration['Garden']['Registration']['ConfirmEmail'] = '1';
$Configuration['Garden']['Registration']['SendConnectEmail'] = '1';
$Configuration['Garden']['Registration']['Method'] = 'Captcha';
$Configuration['Garden']['Registration']['CaptchaPrivateKey'] = '6LfdiRMTAAAAACCQ1Z-ChZzWl02IzXKxOs0vfdmN';
$Configuration['Garden']['Registration']['CaptchaPublicKey'] = '6LfdiRMTAAAAAKeKMeG0-2vPr_wxTveMHdKoe0eo';
$Configuration['Garden']['Registration']['InviteExpiration'] = '1 week';
$Configuration['Garden']['Registration']['InviteRoles']['3'] = '0';
$Configuration['Garden']['Registration']['InviteRoles']['4'] = '0';
$Configuration['Garden']['Registration']['InviteRoles']['8'] = '0';
$Configuration['Garden']['Registration']['InviteRoles']['16'] = '0';
$Configuration['Garden']['Registration']['InviteRoles']['32'] = '0';
$Configuration['Garden']['Email']['SupportName'] = 'Where to go Camping';
$Configuration['Garden']['Email']['SupportAddress'] = 'support@lodge104.com';
$Configuration['Garden']['Email']['UseSmtp'] = false;
$Configuration['Garden']['Email']['SmtpHost'] = 'smtp-pulse.com';
$Configuration['Garden']['Email']['SmtpUser'] = 'nickanderson1998@gmail.com';
$Configuration['Garden']['Email']['SmtpPassword'] = 'esurohex';
$Configuration['Garden']['Email']['SmtpPort'] = '465';
$Configuration['Garden']['Email']['SmtpSecurity'] = 'ssl';
$Configuration['Garden']['Email']['Format'] = 'text';
$Configuration['Garden']['SystemUserID'] = 1;
$Configuration['Garden']['InputFormatter'] = 'Wysiwyg';
$Configuration['Garden']['Version'] = '2.2.1';
$Configuration['Garden']['Cdns']['Disable'] = false;
$Configuration['Garden']['CanProcessImages'] = true;
$Configuration['Garden']['Installed'] = true;
$Configuration['Garden']['InstallationID'] = '8416-34686057-795C2EEF';
$Configuration['Garden']['InstallationSecret'] = 'f67e245837b9ffcc916fb70d555c0afef54a2c86';
$Configuration['Garden']['Theme'] = 'vanilla-bootstrap-2.5.1';
$Configuration['Garden']['MobileInputFormatter'] = 'TextEx';
$Configuration['Garden']['AllowFileUploads'] = true;
$Configuration['Garden']['PrivateCommunity'] = false;
$Configuration['Garden']['Embed']['Allow'] = true;
$Configuration['Garden']['HomepageTitle'] = 'Where to go Camping | Occoneechee Lodge';
$Configuration['Garden']['Description'] = '';
$Configuration['Garden']['ThemeOptions']['Styles']['Key'] = 'Flatly';
$Configuration['Garden']['ThemeOptions']['Styles']['Value'] = '%s_flatly';
$Configuration['Garden']['EditContentTimeout'] = '-1';
$Configuration['Garden']['FavIcon'] = 'favicon_1b85a4476d735296.ico';
$Configuration['Garden']['ShareImage'] = '09AU5SJ9T3CC.png';
$Configuration['Garden']['Messages']['Cache'] = array('Vanilla/Discussion/Index', 'Vanilla/Post/Discussion');

// Plugins
$Configuration['Plugins']['GettingStarted']['Dashboard'] = '1';
$Configuration['Plugins']['GettingStarted']['Categories'] = '1';
$Configuration['Plugins']['GettingStarted']['Registration'] = '1';
$Configuration['Plugins']['GettingStarted']['Plugins'] = '1';
$Configuration['Plugins']['GettingStarted']['Discussion'] = '1';
$Configuration['Plugins']['GettingStarted']['Profile'] = '1';
$Configuration['Plugins']['Facebook']['ApplicationID'] = '1705758682976298';
$Configuration['Plugins']['Facebook']['Secret'] = 'ad26cf764e1dd42ab567460579defd35';
$Configuration['Plugins']['Facebook']['UseFacebookNames'] = '1';
$Configuration['Plugins']['Facebook']['SocialSignIn'] = '1';
$Configuration['Plugins']['Facebook']['SocialReactions'] = '1';
$Configuration['Plugins']['Facebook']['SocialSharing'] = '1';
$Configuration['Plugins']['Twitter']['ConsumerKey'] = 'jo3aiv5YQaAsYQVyfon8HvPxx';
$Configuration['Plugins']['Twitter']['Secret'] = 'JDvgIMyGPp6iXOTCME4SU9mMmjIaJxaHWI0lzJJhKmJ0thqY1l';
$Configuration['Plugins']['Twitter']['SocialSignIn'] = '1';
$Configuration['Plugins']['Twitter']['SocialReactions'] = '1';
$Configuration['Plugins']['Twitter']['SocialSharing'] = '1';
$Configuration['Plugins']['GooglePlus']['ClientID'] = '867161452260-oo7jggng8h1q1sgraovmvpft0smd2kjb';
$Configuration['Plugins']['GooglePlus']['Secret'] = 'GwT3EAP5Wdtot2l71InT28cG';
$Configuration['Plugins']['GooglePlus']['SocialReactions'] = '1';
$Configuration['Plugins']['GooglePlus']['SocialSharing'] = '1';
$Configuration['Plugins']['GooglePlus']['UseAvatars'] = '1';
$Configuration['Plugins']['GooglePlus']['Default'] = '';
$Configuration['Plugins']['OpenID']['DisableSignIn'] = '';
$Configuration['Plugins']['editor']['ForceWysiwyg'] = '1';
$Configuration['Plugins']['StopForumSpam']['UserID'] = 3;
$Configuration['Plugins']['ImgurUpload']['ClientID'] = '8370b3348ddfb54';
$Configuration['Plugins']['ImgurUpload']['ProcessImageURLs'] = '1';
$Configuration['Plugins']['ImgurUpload']['ResizeImages'] = '';
$Configuration['Plugins']['ImgurUpload']['ShowImagesBtn'] = '1';
$Configuration['Plugins']['Flagging']['NotifyUsers'] = array('2');
$Configuration['Plugins']['Vanillicon']['Type'] = 'v1';

// ProfileExtender
$Configuration['ProfileExtender']['Fields']['FirstandLastName']['FormType'] = 'TextBox';
$Configuration['ProfileExtender']['Fields']['FirstandLastName']['Label'] = 'First and Last Name';
$Configuration['ProfileExtender']['Fields']['FirstandLastName']['Options'] = '';
$Configuration['ProfileExtender']['Fields']['FirstandLastName']['Required'] = '1';
$Configuration['ProfileExtender']['Fields']['FirstandLastName']['OnRegister'] = '1';
$Configuration['ProfileExtender']['Fields']['FirstandLastName']['OnProfile'] = '1';

// RegistrationMessage
$Configuration['RegistrationMessage']['Message'] = 'Hi %%NAME%%, welcome to the community!';

// Routes
$Configuration['Routes']['DefaultController'] = array('categories', 'Internal');
$Configuration['Routes']['XkAoLiop'] = array('profile/$1', 'Internal');
$Configuration['Routes']['c2l0ZS1ydWxlcyguKik='] = array('page/site-rules$1', 'Internal');
$Configuration['Routes']['cHJpdmFjeS1wb2xpY3koLiop'] = array('page/privacy-policy$1', 'Internal');
$Configuration['Routes']['cm9hZC1tYXAoLiop'] = array('page/road-map$1', 'Internal');

// Vanilla
$Configuration['Vanilla']['Version'] = '2.2.1';
$Configuration['Vanilla']['Discussions']['Layout'] = 'modern';
$Configuration['Vanilla']['Discussions']['PerPage'] = '30';
$Configuration['Vanilla']['Discussions']['SortField'] = 'd.DateLastComment';
$Configuration['Vanilla']['Categories']['Layout'] = 'mixed';
$Configuration['Vanilla']['Categories']['MaxDisplayDepth'] = '0';
$Configuration['Vanilla']['Categories']['DoHeadings'] = false;
$Configuration['Vanilla']['Categories']['HideModule'] = false;
$Configuration['Vanilla']['AdminCheckboxes']['Use'] = '1';
$Configuration['Vanilla']['Comments']['AutoRefresh'] = NULL;
$Configuration['Vanilla']['Comments']['PerPage'] = '30';
$Configuration['Vanilla']['Archive']['Date'] = '';
$Configuration['Vanilla']['Archive']['Exclude'] = false;
$Configuration['Vanilla']['Comment']['MaxLength'] = '8000';
$Configuration['Vanilla']['Comment']['MinLength'] = '';

// Last edited by NicksToon (152.10.99.215)2016-10-05 02:00:33