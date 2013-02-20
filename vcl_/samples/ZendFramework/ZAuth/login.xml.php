<?php
<object class="frmLogin" name="frmLogin" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Login</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmLogin</property>
  <property name="Width">800</property>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[&lt;P&gt;For this sample, use:&lt;/P&gt;
&lt;P&gt;user: someUser&lt;/P&gt;
&lt;P&gt;password: somePassword&lt;/P&gt;]]></property>
    <property name="Color">#F0F0F0</property>
    <property name="Height">104</property>
    <property name="Left">184</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="Top">184</property>
    <property name="Width">360</property>
  </object>
  <object class="Panel" name="pnLogin" >
    <property name="Height">129</property>
    <property name="Left">224</property>
    <property name="Name">pnLogin</property>
    <property name="ParentColor">0</property>
    <property name="Top">43</property>
    <property name="Width">249</property>
    <object class="Label" name="lbUser" >
      <property name="Caption">User:</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">lbUser</property>
      <property name="Top">20</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="lbPassword" >
      <property name="Caption">Password:</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">lbPassword</property>
      <property name="Top">46</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="edUser" >
      <property name="Height">21</property>
      <property name="Left">96</property>
      <property name="Name">edUser</property>
      <property name="ParentColor">0</property>
      <property name="Top">16</property>
      <property name="Width">121</property>
    </object>
    <object class="Edit" name="edPassword" >
      <property name="Height">21</property>
      <property name="IsPassword">1</property>
      <property name="Left">96</property>
      <property name="Name">edPassword</property>
      <property name="ParentColor">0</property>
      <property name="Top">42</property>
      <property name="Width">121</property>
    </object>
    <object class="Button" name="btnLogin" >
      <property name="Caption">Login</property>
      <property name="Height">25</property>
      <property name="Left">96</property>
      <property name="Name">btnLogin</property>
      <property name="ParentColor">0</property>
      <property name="Top">84</property>
      <property name="Width">75</property>
      <property name="OnClick">btnLoginClick</property>
    </object>
  </object>
</object>
?>
