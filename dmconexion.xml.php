<?php
<object class="dmconexion" name="dmconexion" baseclass="datamodule">
  <property name="Height">136</property>
  <property name="Name">dmconexion</property>
  <property name="Width">224</property>
  <object class="MySQLDatabase" name="conexion" >
        <property name="Left">16</property>
        <property name="Top">14</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">crm</property>
    <property name="Dictionary"></property>
    <property name="Host">192.168.0.105</property>
    <property name="Name">conexion</property>
    <property name="UserName">root</property>
    <property name="UserPassword">freedom</property>
  </object>
  <object class="MySQLQuery" name="sqlgeneral" >
        <property name="Left">81</property>
        <property name="Top">14</property>
    <property name="Database">conexion</property>
    <property name="Name">sqlgeneral</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
