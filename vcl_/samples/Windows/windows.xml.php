<?php
<object class="WindowSample" name="WindowSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Window Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">WindowSample</property>
  <property name="Width">800</property>
  <object class="Window" name="wm1" >
    <property name="Caption">My First Window</property>
    <property name="Height">336</property>
    <property name="Left">26</property>
    <property name="MoveMethod">mmTranslucent</property>
    <property name="Name">wm1</property>
    <property name="ResizeMethod">rmTranslucent</property>
    <property name="Top">24</property>
    <property name="Width">406</property>
    <property name="jsOnClose"></property>
    <property name="jsOnMaximize"></property>
    <property name="jsOnMinimize"></property>
    <property name="jsOnMove"></property>
    <property name="jsOnRestore"></property>
    <object class="DBGrid" name="ddEMPLOYEE1" >
      <property name="Columns">a:0:{}</property>
      <property name="Datasource">dsEMPLOYEE1</property>
      <property name="Height">192</property>
      <property name="Left">14</property>
      <property name="Name">ddEMPLOYEE1</property>
      <property name="Top">96</property>
      <property name="Width">376</property>
      <property name="jsOnRowChanged"></property>
      <property name="jsOnRowSaved"></property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Label1</property>
      <property name="Height">13</property>
      <property name="Left">14</property>
      <property name="Name">Label1</property>
      <property name="Top">56</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="Edit1" >
      <property name="Height">24</property>
      <property name="Left">94</property>
      <property name="Name">Edit1</property>
      <property name="Top">50</property>
      <property name="Width">170</property>
    </object>
    <object class="Button" name="Button1" >
      <property name="Caption">Sample</property>
      <property name="Height">25</property>
      <property name="Left">281</property>
      <property name="Name">Button1</property>
      <property name="Top">50</property>
      <property name="Width">109</property>
      <property name="jsOnClick">Button1JSClick</property>
    </object>
  </object>
  <object class="Window" name="wm2" >
    <property name="Caption">Modal Dialog</property>
    <property name="Height">168</property>
    <property name="Left">456</property>
    <property name="Modal">1</property>
    <property name="MoveMethod">mmTranslucent</property>
    <property name="Name">wm2</property>
    <property name="ResizeMethod">rmTranslucent</property>
    <property name="Resizeable">0</property>
    <property name="ShowMaximize">0</property>
    <property name="ShowMinimize">0</property>
    <property name="Top">352</property>
    <property name="Width">248</property>
    <property name="jsOnClose"></property>
    <property name="jsOnMaximize"></property>
    <property name="jsOnMinimize"></property>
    <property name="jsOnMove"></property>
    <property name="jsOnRestore"></property>
    <object class="Button" name="Button2" >
      <property name="Caption">Close</property>
      <property name="Height">25</property>
      <property name="Left">79</property>
      <property name="Name">Button2</property>
      <property name="Top">62</property>
      <property name="Width">75</property>
      <property name="jsOnClick">Button2JSClick</property>
    </object>
  </object>
  <object class="Table" name="tbEMPLOYEE1" >
        <property name="Left">493</property>
        <property name="Top">208</property>
    <property name="Active">1</property>
    <property name="Database">dbEMPLOYEE1</property>
    <property name="LimitCount"></property>
    <property name="LimitStart"></property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbEMPLOYEE1</property>
    <property name="TableName">EMPLOYEE</property>
  </object>
  <object class="Database" name="dbEMPLOYEE1" >
        <property name="Left">477</property>
        <property name="Top">120</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">localhost:C:/Program Files/Common Files/Borland Shared/Data/EMPLOYEE.GDB</property>
    <property name="DriverName">borland_ibase</property>
    <property name="Name">dbEMPLOYEE1</property>
    <property name="UserName">SYSDBA</property>
    <property name="UserPassword">masterkey</property>
  </object>
  <object class="Datasource" name="dsEMPLOYEE1" >
        <property name="Left">477</property>
        <property name="Top">56</property>
    <property name="Dataset">tbEMPLOYEE1</property>
    <property name="Name">dsEMPLOYEE1</property>
  </object>
</object>
?>
