<?php
<object class="ZMailSample" name="ZMailSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">ZMail Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">ZMailSample</property>
  <property name="Width">816</property>
  <object class="Edit" name="edFrom" >
    <property name="Height">21</property>
    <property name="Left">19</property>
    <property name="Name">edFrom</property>
    <property name="Top">58</property>
    <property name="Width">477</property>
  </object>
  <object class="Memo" name="meTo" >
    <property name="Height">65</property>
    <property name="Left">19</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">meTo</property>
    <property name="Top">98</property>
    <property name="Width">150</property>
  </object>
  <object class="Memo" name="meCC" >
    <property name="Height">65</property>
    <property name="Left">183</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">meCC</property>
    <property name="Top">98</property>
    <property name="Width">150</property>
  </object>
  <object class="Memo" name="meBcc" >
    <property name="Height">65</property>
    <property name="Left">346</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">meBcc</property>
    <property name="Top">98</property>
    <property name="Width">150</property>
  </object>
  <object class="Edit" name="edSubject" >
    <property name="Height">21</property>
    <property name="Left">19</property>
    <property name="Name">edSubject</property>
    <property name="Top">186</property>
    <property name="Width">477</property>
  </object>
  <object class="RichEdit" name="reBody" >
    <property name="Height">270</property>
    <property name="Left">19</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">reBody</property>
    <property name="Toolbars">a:0:{}</property>
    <property name="Top">214</property>
    <property name="Width">476</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">From:</property>
    <property name="Height">13</property>
    <property name="Left">19</property>
    <property name="Name">Label1</property>
    <property name="Top">42</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">To:</property>
    <property name="Height">13</property>
    <property name="Left">19</property>
    <property name="Name">Label2</property>
    <property name="Top">83</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Cc:</property>
    <property name="Height">13</property>
    <property name="Left">183</property>
    <property name="Name">Label3</property>
    <property name="Top">83</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Bcc:</property>
    <property name="Height">13</property>
    <property name="Left">346</property>
    <property name="Name">Label4</property>
    <property name="Top">83</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Subject:</property>
    <property name="Height">13</property>
    <property name="Left">19</property>
    <property name="Name">Label5</property>
    <property name="Top">169</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="btnSend" >
    <property name="Caption">Send</property>
    <property name="Height">25</property>
    <property name="Left">417</property>
    <property name="Name">btnSend</property>
    <property name="Top">494</property>
    <property name="Width">75</property>
    <property name="OnClick">btnSendClick</property>
  </object>
  <object class="CheckBox" name="cbPlainTextOnly" >
    <property name="Caption">Send e-mail in plain text format only</property>
    <property name="Height">21</property>
    <property name="Left">524</property>
    <property name="Name">cbPlainTextOnly</property>
    <property name="Top">58</property>
    <property name="Width">269</property>
  </object>
  <object class="Edit" name="edSMTPServer" >
    <property name="Height">21</property>
    <property name="Left">524</property>
    <property name="Name">edSMTPServer</property>
    <property name="Text">mail.qadram.com</property>
    <property name="Top">98</property>
    <property name="Width">267</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">SMTP Server:</property>
    <property name="Height">13</property>
    <property name="Left">524</property>
    <property name="Name">Label6</property>
    <property name="Top">83</property>
    <property name="Width">269</property>
  </object>
  <object class="CheckBox" name="cbIncludeAttachments" >
    <property name="Caption">Include sample attachments</property>
    <property name="Height">21</property>
    <property name="Left">524</property>
    <property name="Name">cbIncludeAttachments</property>
    <property name="Top">132</property>
    <property name="Width">270</property>
  </object>
  <object class="ZMailTransportSMTP" name="zmtSMTP" >
        <property name="Left">519</property>
        <property name="Top">262</property>
    <property name="Host">mail.qadram.com</property>
    <property name="Name">zmtSMTP</property>
  </object>
  <object class="ZMail" name="zmCustom" >
        <property name="Left">519</property>
        <property name="Top">330</property>
    <property name="Attachments">a:0:{}</property>
    <property name="Bcc">a:0:{}</property>
    <property name="Cc">a:0:{}</property>
    <property name="Headers"><![CDATA[a:3:{i:0;s:33:&quot;X-MailGenerator=MyCoolApplication&quot;;i:1;s:17:&quot;X-greetingsTo=Mom&quot;;i:2;s:17:&quot;X-greetingsTo=Dad&quot;;}]]></property>
    <property name="Name">zmCustom</property>
    <property name="To">a:0:{}</property>
    <property name="Transport">zmtSMTP</property>
    <property name="OnCustomizeAttachment">zmCustomCustomizeAttachment</property>
  </object>
</object>
?>
