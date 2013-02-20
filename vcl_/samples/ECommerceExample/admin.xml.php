<?php
<object class="Admin" name="Admin" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Noname1</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">Admin</property>
  <property name="TemplateEngine">SmartyTemplate</property>
  <property name="TemplateFilename">templates/admin.tpl</property>
  <property name="Width">800</property>
  <property name="OnCreate">AdminCreate</property>
  <property name="OnTemplate">AdminTemplate</property>
  <object class="RawInclude" name="PageContent" >
    <property name="Height">100</property>
    <property name="Left">8</property>
    <property name="Name">PageContent</property>
    <property name="Top">47</property>
    <property name="Width">100</property>
  </object>
  <object class="UserLogin" name="CurrentUserLogin" >
    <property name="CookieName">adminloginid</property>
    <property name="Database"></property>
    <property name="Height">25</property>
    <property name="Left">8</property>
    <property name="Name">CurrentUserLogin</property>
    <property name="Top">161</property>
    <property name="UserTable">admins</property>
    <property name="Width">215</property>
  </object>
</object>
?>
