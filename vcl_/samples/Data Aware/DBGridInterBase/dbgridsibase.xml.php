<?php
<object class="DBGridTest" name="DBGridTest" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">DBGrid InterBase sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">DBGridTest</property>
  <property name="Width">800</property>
  <object class="DBGrid" name="ddproducts1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dsemployee</property>
    <property name="Height">234</property>
    <property name="Left">28</property>
    <property name="Name">ddproducts1</property>
    <property name="Top">22</property>
    <property name="Width">732</property>
    <property name="jsOnDataChanged">ddproducts1JSDataChanged</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved">ddproducts1JSRowSaved</property>
  </object>
  <object class="Memo" name="meLog" >
    <property name="Height">224</property>
    <property name="Left">24</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">meLog</property>
    <property name="Top">264</property>
    <property name="Width">728</property>
  </object>
  <object class="Table" name="tbemployee" >
        <property name="Left">52</property>
        <property name="Top">390</property>
    <property name="Active">1</property>
    <property name="Database">dbinterbase</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbemployee</property>
    <property name="TableName">employee</property>
  </object>
  <object class="Database" name="dbinterbase" >
        <property name="Left">124</property>
        <property name="Top">390</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">localhost:C:\Program Files\Common Files\Borland Shared\Data\employee.gdb</property>
    <property name="DriverName">borland_ibase</property>
    <property name="Host">localhost:3306</property>
    <property name="Name">dbinterbase</property>
    <property name="UserName">SYSDBA</property>
    <property name="UserPassword">masterkey</property>
  </object>
  <object class="Datasource" name="dsemployee" >
        <property name="Left">196</property>
        <property name="Top">390</property>
    <property name="Dataset">tbemployee</property>
    <property name="Name">dsemployee</property>
  </object>
</object>
?>
