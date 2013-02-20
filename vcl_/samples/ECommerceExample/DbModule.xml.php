<?php
<object class="DBModule" name="DBModule" baseclass="datamodule">
  <property name="Height">600</property>
  <property name="Name">DBModule</property>
  <property name="Width">800</property>
  <object class="Database" name="Database1" >
        <property name="Left">20</property>
        <property name="Top">16</property>
    <property name="Connected"></property>
    <property name="Name">Database1</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">689</property>
        <property name="Top">202</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="AdDatasource1" >
        <property name="Left">694</property>
        <property name="Top">390</property>
    <property name="DataSet">AdQuery</property>
    <property name="Name">AdDatasource1</property>
  </object>
  <object class="Table" name="Table1" >
        <property name="Left">540</property>
        <property name="Top">247</property>
    <property name="Database">Database1</property>
    <property name="LimitCount"></property>
    <property name="LimitStart"></property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">Table1</property>
    <property name="OrderField">ID</property>
    <property name="TableName">products</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">607</property>
        <property name="Top">280</property>
    <property name="DataSet">Table1</property>
    <property name="Name">Datasource1</property>
  </object>
  <object class="Query" name="OrdersQuery" >
        <property name="Left">528</property>
        <property name="Top">456</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">OrdersQuery</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:166:&quot;SELECT orders.ID AS OrderID, orders.SubTotal, orders.Total, orders.Date, users.ID AS UserID, users.PersonalName FROM orders INNER JOIN users ON orders.User = users.ID&quot;;}]]></property>
  </object>
  <object class="Query" name="AdQuery" >
        <property name="Left">592</property>
        <property name="Top">384</property>
    <property name="Database">Database1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">AdQuery</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:66:&quot;SELECT * FROM Ads INNER JOIN Products ON Ads.Product = Products.ID&quot;;}]]></property>
  </object>
</object>
?>
