<?php
<object class="QuerySample" name="QuerySample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Query sample (filtering)</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">QuerySample</property>
  <property name="Width">800</property>
  <object class="DBGrid" name="DBGrid1" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">Datasource1</property>
    <property name="Height">288</property>
    <property name="Left">32</property>
    <property name="Name">DBGrid1</property>
    <property name="Top">56</property>
    <property name="Width">536</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Filter Query</property>
    <property name="Height">24</property>
    <property name="Left">472</property>
    <property name="Name">Button1</property>
    <property name="Top">16</property>
    <property name="Width">104</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="DateTimePicker" name="dtInit" >
    <property name="Caption">dtInit</property>
    <property name="Height">17</property>
    <property name="Left">95</property>
    <property name="Name">dtInit</property>
    <property name="Text">2007-03-05 08:06</property>
    <property name="Top">19</property>
    <property name="Width">145</property>
  </object>
  <object class="DateTimePicker" name="dtEnd" >
    <property name="Caption">dtInit</property>
    <property name="Height">17</property>
    <property name="Left">319</property>
    <property name="Name">dtEnd</property>
    <property name="Text">2007-03-05 08:06</property>
    <property name="Top">19</property>
    <property name="Width">145</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">From:</property>
    <property name="Height">13</property>
    <property name="Left">32</property>
    <property name="Name">Label1</property>
    <property name="Top">21</property>
    <property name="Width">48</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">To:</property>
    <property name="Height">13</property>
    <property name="Left">256</property>
    <property name="Name">Label2</property>
    <property name="Top">21</property>
    <property name="Width">48</property>
  </object>
  <object class="Database" name="dbemployee" >
        <property name="Left">221</property>
        <property name="Top">181</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">localhost:C:\Program Files\Common Files\Borland Shared\Data\employee.gdb</property>
    <property name="DriverName">borland_ibase</property>
    <property name="Name">dbemployee</property>
    <property name="UserName">SYSDBA</property>
    <property name="UserPassword">masterkey</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">123</property>
        <property name="Top">190</property>
    <property name="Active">1</property>
    <property name="Database">dbemployee</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:22:&quot;select * from employee&quot;;}]]></property>
    <property name="TableName">employee</property>
  </object>
  <object class="Datasource" name="Datasource1" >
        <property name="Left">136</property>
        <property name="Top">80</property>
    <property name="DataSet">Query1</property>
    <property name="Name">Datasource1</property>
  </object>
</object>
?>
