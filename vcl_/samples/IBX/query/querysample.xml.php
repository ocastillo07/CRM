<?php
<object class="QuerySample" name="QuerySample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Query sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">QuerySample</property>
  <property name="Width">800</property>
  <object class="DBGrid" name="DBGrid1" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">256</property>
    <property name="Left">40</property>
    <property name="Name">DBGrid1</property>
    <property name="Top">40</property>
    <property name="Width">712</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="IBDatabase" name="IBDatabase1" >
        <property name="Left">138</property>
        <property name="Top">98</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">localhost:C:\Program Files\Common Files\Borland Shared\Data\EMPLOYEE.GDB</property>
    <property name="Dictionary"></property>
    <property name="Host"></property>
    <property name="Name">IBDatabase1</property>
    <property name="UserName">SYSDBA</property>
    <property name="UserPassword">masterkey</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">272</property>
        <property name="Top">96</property>
    <property name="DataSet">IBQuery1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="IBQuery" name="IBQuery1" >
        <property name="Left">352</property>
        <property name="Top">96</property>
    <property name="Active">1</property>
    <property name="Database">IBDatabase1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">IBQuery1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:22:&quot;select * from employee&quot;;}]]></property>
    <property name="TableName">employee</property>
  </object>
</object>
?>
