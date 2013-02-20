<?php
require_once("vcl/vcl.inc.php");
//Includes
require_once("dmAuth.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class frmLogin extends Page
{
   public $pnLogin = null;
   public $btnLogin = null;
   public $edPassword = null;
   public $edUser = null;
   public $lbPassword = null;
   public $lbUser = null;
   public $Label1 = null;
   function btnLoginClick($sender, $params)
   {
      //Clicking the login button, we set the username and userpassword
      //properties of the ZAuth component to the values entered by the user.
      //After that, redirect to the entry page, so the credentials are validated

      global $dmAuth;

      $dmAuth->ZAuth->UserName = $this->edUser->Text;
      $dmAuth->ZAuth->UserRealm = $this->edUser->Text;
      $dmAuth->ZAuth->UserPassword = $this->edPassword->Text;

      redirect("zaclsample.php");
   }

}

global $application;

global $frmLogin;

//Creates the form
$frmLogin = new frmLogin($application);

//Read from resource file
$frmLogin->loadResource(__FILE__);

//Shows the form
$frmLogin->show();

?>