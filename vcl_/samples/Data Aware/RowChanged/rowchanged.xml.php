<?php
<object class="Unit112" name="Unit112" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Row Changed Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">Unit112</property>
  <property name="Width">800</property>
  <object class="DBGrid" name="ddPROJECT1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dsPROJECT1</property>
    <property name="Height">200</property>
    <property name="Left">139</property>
    <property name="Name">ddPROJECT1</property>
    <property name="Top">62</property>
    <property name="Width">437</property>
    <property name="jsOnRowChanged">ddPROJECT1JSRowChanged</property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="DataField">PROJ_DESC</property>
    <property name="DataSource">dsPROJECT1</property>
    <property name="Height">208</property>
    <property name="Left">136</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="Top">304</property>
    <property name="Width">440</property>
  </object>
  <object class="Table" name="tbPROJECT1" >
        <property name="Left">51</property>
        <property name="Top">38</property>
    <property name="Active">1</property>
    <property name="Database">dbEMPLOYEE1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbPROJECT1</property>
    <property name="TableName">PROJECT</property>
  </object>
  <object class="Database" name="dbEMPLOYEE1" >
        <property name="Left">43</property>
        <property name="Top">102</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">localhost:C:/Program Files/CodeGear/Delphi for PHP/2.0/vcl/samples/EMPLOYEE.gdb</property>
    <property name="DriverName">borland_ibase</property>
    <property name="Name">dbEMPLOYEE1</property>
    <property name="UserName">SYSDBA</property>
    <property name="UserPassword">masterkey</property>
  </object>
  <object class="Datasource" name="dsPROJECT1" >
        <property name="Left">51</property>
        <property name="Top">174</property>
    <property name="Dataset">tbPROJECT1</property>
    <property name="Name">dsPROJECT1</property>
  </object>
</object>
?>
