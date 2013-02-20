<?php
require_once("vcl/vcl.inc.php");
//Includes
use_unit("comctrls.inc.php");
use_unit("Zend/zmail.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class ZMailSample extends Page
{
       public $cbIncludeAttachments = null;
       public $btnSend = null;
       public $reBody = null;
       public $edSubject = null;
       public $cbPlainTextOnly = null;
       public $edSMTPServer = null;
       public $meBcc = null;
       public $meCC = null;
       public $meTo = null;
       public $edFrom = null;
       public $Label6 = null;
       public $Label5 = null;
       public $Label4 = null;
       public $Label3 = null;
       public $Label2 = null;
       public $Label1 = null;
       public $zmCustom = null;
       public $zmtSMTP = null;
       function zmCustomCustomizeAttachment($sender, $params)
       {
        $result=array();
        list($key, $attachment)=each($params);
        if ($attachment=='index.php')
        {
            $result['mimetype']=Zend_Mime::TYPE_TEXT;
            $result['disposition']=Zend_Mime::DISPOSITION_INLINE;
        }
        return($result);
       }

       function btnSendClick($sender, $params)
       {
            $this->zmtSMTP->Host=$this->edSMTPServer->Text;

            $this->zmCustom->FromEmail=$this->edFrom->Text;
            $this->zmCustom->Subject=$this->edSubject->Text;
            $this->zmCustom->BodyText=strip_tags($this->reBody->Text);
            if (!$this->cbPlainTextOnly->Checked) $this->zmCustom->BodyHTML=$this->reBody->Text;
            else $this->zmCustom->BodyHTML='';
            if (count($this->meTo->Lines)>=1) $this->zmCustom->To=array_combine($this->meTo->Lines, array_fill(0,count($this->meTo->Lines),""));
            if (count($this->meCC->Lines)>=1) $this->zmCustom->Cc=array_combine($this->meCC->Lines, array_fill(0,count($this->meCC->Lines),""));
            if (count($this->meBcc->Lines)>=1) $this->zmCustom->Bcc=array_combine($this->meBcc->Lines, array_fill(0,count($this->meBcc->Lines),""));
            if ($this->cbIncludeAttachments->Checked)
            {
                $this->zmCustom->Attachments=array(0=>'index.php',1=>'index.xml.php');
            }
            else
            {
                $this->zmCustom->Attachments=array();
            }
            $this->zmCustom->send();
       }

}

global $application;

global $ZMailSample;

//Creates the form
$ZMailSample=new ZMailSample($application);

//Read from resource file
$ZMailSample->loadResource(__FILE__);

//Shows the form
$ZMailSample->show();

?>