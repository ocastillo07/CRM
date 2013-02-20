<?php
/**
*  This file is part of the VCL for PHP project
*
*  Copyright (c) 2004-2008 qadram software S.L. <support@qadram.com>
*
*  Checkout AUTHORS file for more information on the developers
*
*  This library is free software; you can redistribute it and/or
*  modify it under the terms of the GNU Lesser General Public
*  License as published by the Free Software Foundation; either
*  version 2.1 of the License, or (at your option) any later version.
*
*  This library is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
*  Lesser General Public License for more details.
*
*  You should have received a copy of the GNU Lesser General Public
*  License along with this library; if not, write to the Free Software
*  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307
*  USA
*
*/

require_once("vcl/vcl.inc.php");
use_unit("Zend/zcommon.inc.php");
use_unit("classes.inc.php");

//Include all Zend Framework stuff required
use_unit("Zend/framework/library/Zend/Mail.php");
use_unit("Zend/framework/library/Zend/Mail/Transport/Smtp.php");
use_unit("Zend/framework/library/Zend/Mail/Transport/Sendmail.php");

/**
* A non-visual component to let you send e-mail easily
*
* Use this component if you need to send e-mail in your application. This Zend Framework
* based component allows you to decide the transport (SMTP, Sendmail, etc) and provide properties
* to let you set the target of the e-mails, the Cc, the Bcc, etc.
* Is also able to send e-mail in HTML and include attachments.
*/
class ZMail extends Component
{
    protected $_bodytext="";

    /**
    * Use this property to specify the body of the e-mail in plain-text format.
    *
    * This property is a string property you can use to set the contents of the
    * e-mail in plain-text format.
    *
    * @return string
    */
    function getBodyText() { return $this->_bodytext; }
    function setBodyText($value) { $this->_bodytext=$value; }
    function defaultBodyText() { return ""; }

    protected $_bodyhtml="";

    /**
    * Use this property to specify the body of the e-mail in HTML format
    *
    * You can use it in combination with BodyText to send a multipart e-mail in
    * which the contents can be selected to be shown in plain-text or in HTML.
    *
    * @return string
    */
    function getBodyHTML() { return $this->_bodyhtml; }
    function setBodyHTML($value) { $this->_bodyhtml=$value; }
    function defaultBodyHTML() { return ""; }

    protected $_subject="";

    /**
    * Specifies the subject of the e-mail to be sent
    *
    * @return string
    */
    function getSubject() { return $this->_subject; }
    function setSubject($value) { $this->_subject=$value; }
    function defaultSubject() { return ""; }

    protected $_fromname="";

    /**
    * It allows you to select the name of the sender of the e-mail
    *
    * Use it in combination with FromEmail to add the real name of the sender
    *
    * i.e.  John Doe <john.doe@unknown.com>
    *
    * John Doe is the FromName property, while john.doe@unknown.com is FromEmail
    *
    * @return string
    */
    function getFromName() { return $this->_fromname; }
    function setFromName($value) { $this->_fromname=$value; }
    function defaultFromName() { return ""; }

    protected $_fromemail="";

    /**
    * It allows you to select the email of the sender
    *
    * Use it in combination with FromName to add e-mail of the sender
    *
    * i.e.  John Doe <john.doe@unknown.com>
    *
    * John Doe is the FromName property, while john.doe@unknown.com is FromEmail
    *
    * @return string
    */
    function getFromEmail() { return $this->_fromemail; }
    function setFromEmail($value) { $this->_fromemail=$value; }
    function defaultFromEmail() { return ""; }

    protected $_transport=null;

    /**
    * Use this property to specify the transport to use to send the e-mail
    *
    * By default, the sendmail method is used, is basically like using the PHP mail() function, this method
    * is used if no transport is attached.
    *
    * But you can also customize the process by using some ZMailTransport class, like ZMailTransportSMTP or
    * ZMailTransportSendmail.
    * Those components also have properties can be modified to customize the sending process.
    *
    * @return ZMailTransport
    */
    function getTransport() { return $this->_transport; }
    function setTransport($value) { $this->_transport=$this->fixupProperty($value); }
    function defaultTransport() { return null; }

    function loaded()
    {
        parent::loaded();
        $this->setTransport($this->_transport);
    }

    protected $_to=array();

    /**
    * This property specifies the targets of the e-mail
    *
    * This is an array property to allow you specify the recipients of the e-mail
    * you want to send.
    *
    * The array has a form of:
    *
    * <code>
    * array(
    * 'e-mail 1'=>'recipient name 1',
    * 'e-mail 2'=>'recipient name 2'
    * );
    * </code>
    *
    * At design-time, you can use the property editor to make up this array.
    *
    * @return array
    */
    function getTo() { return $this->_to; }
    function setTo($value) { $this->_to=$value; }
    function defaultTo() { return array(); }

    protected $_cc=array();

    /**
    * This property specifies the copies of the e-mail
    *
    * This is an array property to allow you specify the extra recipients of the e-mail
    * you want to send.
    *
    * The array has a form of:
    *
    * <code>
    * array(
    * 'e-mail 1'=>'recipient name 1',
    * 'e-mail 2'=>'recipient name 2'
    * );
    * </code>
    *
    * At design-time, you can use the property editor to make up this array.
    *
    * @return array
    */
    function getCc() { return $this->_cc; }
    function setCc($value) { $this->_cc=$value; }
    function defaultCc() { return array(); }

    protected $_bcc=array();

    /**
    * This property specifies the hidden copies of the e-mail
    *
    * This is an array property to allow you specify the extra hidden recipients of the e-mail
    * you want to send.
    *
    * The array has a form of:
    *
    * <code>
    * array(
    * 'e-mail 1'=>'recipient name 1',
    * 'e-mail 2'=>'recipient name 2'
    * );
    * </code>
    *
    * At design-time, you can use the property editor to make up this array.
    *
    * @return array
    */
    function getBcc() { return $this->_bcc; }
    function setBcc($value) { $this->_bcc=$value; }
    function defaultBcc() { return array(); }

    protected $_attachments=array();

    /**
    * This property specifies the attachments you want to add to the e-mail
    *
    * This is an array property to allow you specify the attachments you want to
    * add to the e-mail
    *
    * The array has a form of:
    *
    * <code>
    * array(
    * '0'=>'pathtothefile 1',
    * '0'=>'pathtothefile 2'
    * );
    * </code>
    *
    * At design-time, you can use the property editor to make up this array.
    *
    * By default, the attachments are interpreted as paths to the files you want to
    * attach, but if you want to customize the attachments to include other information,
    * or to customize the way attachments are handled, use the OnCustomizeAttachment, which
    * let's you select the content, mimetype, disposition and filename for an attachment.
    *
    * @return array
    */
    function getAttachments() { return $this->_attachments; }
    function setAttachments($value) { $this->_attachments=$value; }
    function defaultAttachments() { return array(); }

    protected $_oncustomizeattachment=null;

    /**
    * This event allows you to customize how attachments are handled.
    *
    * Use this event if you want to change the way attachments are handled, this event
    * is fired just before add the attachment to the e-mail, and you get in $params
    * the information of the attachment. Index key and name you set on the Attachments property.
    *
    * To modify the way to handle an specific attachment, return an array with the new information.
    *
    * The $params property has this form:
    *
    * <code>
    * array(
    * '0'=>'attachment 1',
    * '1'=>'attachment 2'
    * );
    * </code>
    *
    * You have to return an array which can have the following values:
    * <code>
    * array(
    * 'body'=>'binary content for the attachment', // If this is not set, the contents will be gathered from a file
    * 'mimetype'=>'type of the attachment',        // i.e.: image/gif, you can use the Zend_Mime constants
    * 'disposition'=>'attachment',                 // You can use attachment or inline
    * 'encodign'=>'base64',                        // You can use the Zend_Mime constants
    * 'filename'=>'nameforthefile'                 // Name of the file to be shown
    * );
    * </code>
    *
    * If some of the values are not present, the default value will be used.
    *
    * <code>
    *  function zmCustomCustomizeAttachment($sender, $params)
    *  {
    *   $result=array();
    *   list($key, $attachment)=each($params);
    *   if ($attachment=='index.php')
    *   {
    *       $result['mimetype']=Zend_Mime::TYPE_TEXT;
    *       $result['disposition']=Zend_Mime::DISPOSITION_INLINE;
    *   }
    *   return($result);
    *  }
    * </code>
    *
    * @return mixed
    */
    function getOnCustomizeAttachment() { return $this->_oncustomizeattachment; }
    function setOnCustomizeAttachment($value) { $this->_oncustomizeattachment=$value; }
    function defaultOnCustomizeAttachment() { return null; }

    protected $_headers=array();

    /**
    * If you need to add your custom headers to the message, use this property
    *
    * This property allows you to add your own headers to the mail message, it's
    * an array property in the form:
    *
    * <code>
    * array(
    * '0'=>'header=value',
    * '1'=>'header=value'
    * );
    * </code>
    *
    * You can use the same header name several times, so the values will be added
    *
    * @return array
    */
    function getHeaders() { return $this->_headers; }
    function setHeaders($value) { $this->_headers=$value; }
    function defaultHeaders() { return array(); }

    /**
    * Sends the e-mail
    *
    * Use this method once all the properties and attachments are set. This method also
    * fires the OnCustomizeAttachment when is adding attachments to the e-mail.
    */
    function send()
    {
        $mail = new Zend_Mail();

        if (trim($this->_fromemail)!='') $mail->setFrom($this->_fromemail,$this->_fromname);

        if (trim($this->_bodytext)!='') $mail->setBodyText($this->_bodytext);

        if (trim($this->_bodyhtml)!='') $mail->setBodyHtml($this->_bodyhtml);

        if (trim($this->_subject)!='') $mail->setSubject($this->_subject);

        if (count($this->_to)>=1)
        {
            reset($this->_to);
            while(list($email, $name)=each($this->_to)) $mail->addTo($email,$name);
        }

        if (count($this->_cc)>=1)
        {
            reset($this->_cc);
            while(list($email, $name)=each($this->_cc)) $mail->addCc($email,$name);
        }

        if (count($this->_bcc)>=1)
        {
            reset($this->_bcc);
            while(list($email, $name)=each($this->_bcc)) $mail->addBcc($email,$name);
        }

        if (count($this->_attachments)>=1)
        {
            reset($this->_attachments);
            while(list($key, $path)=each($this->_attachments))
            {
                $contents='';
                $mimetype=Zend_Mime::TYPE_OCTETSTREAM;
                $disposition=Zend_Mime::DISPOSITION_ATTACHMENT;
                $encoding=Zend_Mime::ENCODING_BASE64;
                $filename=basename($path);
                $params=array();

                if ($this->_oncustomizeattachment!=null)
                {
                    $params=$this->callEvent('oncustomizeattachment',array($key=>$path));
                }

                if (isset($params['body'])) $body=$params['body'];
                else $body=file_get_contents($path);

                if (isset($params['mimetype'])) $mimetype=$params['mimetype'];
                if (isset($params['disposition'])) $disposition=$params['disposition'];
                if (isset($params['encoding'])) $encoding=$params['encoding'];
                if (isset($params['filename'])) $filename=$params['filename'];

                $mail->createAttachment($body,$mimetype,$disposition,$encoding,$filename);
            }
        }

        if (count($this->_headers)>=1)
        {
            $keys=array();
            reset($this->_headers);
            while(list($key, $line)=each($this->_headers))
            {
                $parts=explode('=',$line);
                $header=$parts[0];
                $value=$parts[1];
                $append=array_key_exists($header,$keys);
                $mail->addHeader($header,$value,$append);
                $keys[$header]=1;
            }

        }

        $transport=null;

        if (is_object($this->_transport))  $transport=$this->_transport->readTransport();

        $mail->send($transport);
    }
}

define('saNone','saNone');
define('saPlain','saPlain');
define('saLogin','saLogin');
define('saCRAM_MD5','saCRAM_MD5');

/**
* Base class for transports
*
* Inherit from this class if you want to create your own transport
*/
class ZMailTransport extends Component
{
}

/**
* Allows ZMail to use an SMTP server for sending e-mails
*
* This class inherits from ZMailTransport and allows you to customize every aspect
* of the mail sending, like host, authentication, etc.
*/
class ZMailTransportSMTP extends ZMailTransport
{
    protected $_host="127.0.0.1";

    /**
    * Use this property to specify the SMTP server
    *
    * This property must contain the SMTP server to use, it can be an IP address
    * or a host name.
    *
    * @return string
    */
    function getHost() { return $this->_host; }
    function setHost($value) { $this->_host=$value; }
    function defaultHost() { return "127.0.0.1"; }

    protected $_authentication=saNone;

    /**
    * Specifies the authentication method to use
    *
    * Valid values are:
    *
    * saNone
    * saPlain
    * saLogin
    * saCRAM_MD5
    *
    * @return string
    */
    function getAuthentication() { return $this->_authentication; }
    function setAuthentication($value) { $this->_authentication=$value; }
    function defaultAuthentication() { return saNone; }

    protected $_username="";

    /**
    * If the authentication method requires a user name, must be set on this
    * property.
    *
    * @return string
    */
    function getUserName() { return $this->_username; }
    function setUserName($value) { $this->_username=$value; }
    function defaultUserName() { return ""; }


    protected $_userpassword="";

    /**
    * If the authentication method requires a password, must be set on this
    * property.
    *
    * @return string
    */
    function getUserPassword() { return $this->_userpassword; }
    function setUserPassword($value) { $this->_userpassword=$value; }
    function defaultUserPassword() { return ""; }

    /**
    * This method creates the Zend_Mail transport, set the properties and returns
    * it.
    *
    * This method is called by ZMail component to create and customize the transport
    * to be used for sending e-mails.
    *
    * @return Zend_Mail_Transport_Smtp
    */
    function readTransport()
    {
        $config=array();

        switch ($this->_authentication)
        {
            case saPlain: $config['auth']='plain'; break;
            case saLogin: $config['auth']='login'; break;
            case saCRAM_MD5: $config['auth']='crammd5'; break;
        }

        if ($this->_username!='') $config['username']=$this->_username;
        if ($this->_userpassword!='') $config['password']=$this->_userpassword;

        $result=new Zend_Mail_Transport_Smtp($this->_host,$config);

        return($result);
    }

}

/**
* Allows ZMail to use sendmail for sending e-mails
*
* This class inherits from ZMailTransport and allows you add sendmail parameters
* for the mail sending.
* This transport is basically like using the PHP mail() function
*
*/
class ZMailTransportSendmail extends ZMailTransport
{
    protected $_parameters="";

    /**
    * This property allows you to set parameters to be sent to sendmail
    *
    * Use this property to specify parameters to sendmail
    * i.e. '-freturn_to_me@example.com'
    *
    * @return string
    */
    function getParameters() { return $this->_parameters; }
    function setParameters($value) { $this->_parameters=$value; }
    function defaultParameters() { return ""; }

    /**
    * This method creates the Zend_Mail transport, set the properties and returns
    * it.
    *
    * This method is called by ZMail component to create and customize the transport
    * to be used for sending e-mails.
    *
    * @return Zend_Mail_Transport_Sendmail
    */
    function readTransport()
    {
        $result=new Zend_Mail_Transport_Sendmail($this->_parameters);
        return($result);
    }

}

?>