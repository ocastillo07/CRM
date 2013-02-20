<?php
<object class="MasterDetail" name="MasterDetail" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">MasterDetail Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">MasterDetail</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <object class="DBGrid" name="ddproducts1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dsproducts1</property>
    <property name="Height">200</property>
    <property name="Left">38</property>
    <property name="Name">ddproducts1</property>
    <property name="Top">42</property>
    <property name="Width">706</property>
    <property name="jsOnRowChanged">ddproducts1JSRowChanged</property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="DBGrid" name="ddproducts_description1" >
    <property name="Columns">a:0:{}</property>
    <property name="Datasource">dsproducts_description1</property>
    <property name="Height">200</property>
    <property name="Left">33</property>
    <property name="Name">ddproducts_description1</property>
    <property name="Top">254</property>
    <property name="Width">703</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Table" name="tbproducts1" >
        <property name="Left">214</property>
        <property name="Top">138</property>
    <property name="Active">1</property>
    <property name="Database">oscommerce</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbproducts1</property>
    <property name="TableName">products</property>
  </object>
  <object class="Database" name="oscommerce" >
        <property name="Left">326</property>
        <property name="Top">226</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">oscommerce</property>
    <property name="Host">localhost:3306</property>
    <property name="Name">oscommerce</property>
    <property name="UserName">root</property>
  </object>
  <object class="Datasource" name="dsproducts1" >
        <property name="Left">510</property>
        <property name="Top">122</property>
    <property name="Dataset">tbproducts1</property>
    <property name="Name">dsproducts1</property>
  </object>
  <object class="Table" name="tbproducts_description1" >
        <property name="Left">217</property>
        <property name="Top">310</property>
    <property name="Active">1</property>
    <property name="Database">oscommerce</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields"><![CDATA[a:1:{s:11:&quot;products_id&quot;;s:11:&quot;products_id&quot;;}]]></property>
    <property name="MasterSource">dsproducts1</property>
    <property name="Name">tbproducts_description1</property>
    <property name="TableName">products_description</property>
  </object>
  <object class="Datasource" name="dsproducts_description1" >
        <property name="Left">505</property>
        <property name="Top">318</property>
    <property name="Dataset">tbproducts_description1</property>
    <property name="Name">dsproducts_description1</property>
  </object>
</object>
?>
