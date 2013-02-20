<?php
<object class="TransactionsSample" name="TransactionsSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Transaction Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">TransactionsSample</property>
  <property name="Width">800</property>
  <object class="DBGrid" name="ddEMPLOYEE1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dsEMPLOYEE1</property>
    <property name="Height">200</property>
    <property name="Left">42</property>
    <property name="Name">ddEMPLOYEE1</property>
    <property name="Top">36</property>
    <property name="Width">400</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Button" name="btnSuccess" >
    <property name="Caption">Successful Transaction</property>
    <property name="Height">25</property>
    <property name="Left">568</property>
    <property name="Name">btnSuccess</property>
    <property name="Top">40</property>
    <property name="Width">144</property>
    <property name="OnClick">btnSuccessClick</property>
  </object>
  <object class="Button" name="btnCancel" >
    <property name="Caption">Cancel Transaction</property>
    <property name="Height">25</property>
    <property name="Left">568</property>
    <property name="Name">btnCancel</property>
    <property name="Top">80</property>
    <property name="Width">144</property>
    <property name="OnClick">btnCancelClick</property>
  </object>
  <object class="Table" name="tbEMPLOYEE1" >
        <property name="Left">498</property>
        <property name="Top">164</property>
    <property name="Active">1</property>
    <property name="Database">dbEMPLOYEE1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbEMPLOYEE1</property>
    <property name="TableName">EMPLOYEE</property>
  </object>
  <object class="Database" name="dbEMPLOYEE1" >
        <property name="Left">490</property>
        <property name="Top">100</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">localhost:C:/Program Files/Common Files/Borland Shared/Data/EMPLOYEE.GDB</property>
    <property name="DriverName">borland_ibase</property>
    <property name="Name">dbEMPLOYEE1</property>
    <property name="UserName">SYSDBA</property>
    <property name="UserPassword">masterkey</property>
  </object>
  <object class="Datasource" name="dsEMPLOYEE1" >
        <property name="Left">482</property>
        <property name="Top">44</property>
    <property name="Dataset">tbEMPLOYEE1</property>
    <property name="Name">dsEMPLOYEE1</property>
  </object>
</object>
?>
