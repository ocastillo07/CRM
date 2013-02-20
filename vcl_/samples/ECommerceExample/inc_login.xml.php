<?php
<object class="Login" name="Login" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Noname1</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">Login</property>
  <property name="TemplateEngine">SmartyTemplate</property>
  <property name="TemplateFilename">templates/login.tpl</property>
  <property name="Width">800</property>
  <property name="OnShow">LoginShow</property>
  <property name="OnTemplate">LoginTemplate</property>
  <object class="Edit" name="Username" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">9</property>
    <property name="Name">Username</property>
    <property name="ParentFont">0</property>
    <property name="Top">11</property>
    <property name="Width">284</property>
  </object>
  <object class="Edit" name="Password" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="IsPassword">1</property>
    <property name="Left">6</property>
    <property name="Name">Password</property>
    <property name="ParentFont">0</property>
    <property name="Top">54</property>
    <property name="Width">284</property>
  </object>
  <object class="Button" name="LoginBtn" >
    <property name="Caption">Login</property>
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">7</property>
    <property name="Name">LoginBtn</property>
    <property name="ParentFont">0</property>
    <property name="Top">96</property>
    <property name="Width">84</property>
  </object>
  <object class="RawOutput" name="LoginMsg" >
    <property name="Height">25</property>
    <property name="Left">12</property>
    <property name="Name">LoginMsg</property>
    <property name="Top">138</property>
    <property name="Width">75</property>
  </object>
</object>
?>
