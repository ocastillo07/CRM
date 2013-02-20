<?php
<object class="AjaxDatabase" name="AjaxDatabase" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Ajax Database Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">AjaxDatabase</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnBeforeShow">AjaxDatabaseBeforeShow</property>
  <object class="DBGrid" name="ddaddress_book1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dsaddress_book1</property>
    <property name="Height">336</property>
    <property name="Left">200</property>
    <property name="Name">ddaddress_book1</property>
    <property name="Top">40</property>
    <property name="Width">568</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="ListBox" name="ListBox1" >
    <property name="Height">360</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">8</property>
    <property name="Name">ListBox1</property>
    <property name="Top">16</property>
    <property name="Width">184</property>
    <property name="jsOnChange">ListBox1JSChange</property>
  </object>
  <object class="Label" name="lbCurrently" >
    <property name="Caption">Currently browsing...</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">208</property>
    <property name="Name">lbCurrently</property>
    <property name="ParentFont">0</property>
    <property name="Top">16</property>
    <property name="Width">560</property>
  </object>
  <object class="Table" name="tbaddress_book1" >
        <property name="Left">629</property>
        <property name="Top">391</property>
    <property name="Active">1</property>
    <property name="Database">dboscommerce1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbaddress_book1</property>
    <property name="TableName">address_book</property>
  </object>
  <object class="Database" name="dboscommerce1" >
        <property name="Left">677</property>
        <property name="Top">391</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">oscommerce</property>
    <property name="Host">localhost:3306</property>
    <property name="Name">dboscommerce1</property>
    <property name="UserName">root</property>
    <property name="UserPassword">test</property>
  </object>
  <object class="Datasource" name="dsaddress_book1" >
        <property name="Left">725</property>
        <property name="Top">391</property>
    <property name="Dataset">tbaddress_book1</property>
    <property name="Name">dsaddress_book1</property>
  </object>
</object>
?>
