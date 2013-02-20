<?php
<object class="Unit2" name="Unit2" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">StyleSheet Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
    <property name="Align">taNone</property>
    <property name="Case"></property>
    <property name="Color"></property>
    <property name="Family">Verdana</property>
    <property name="LineHeight"></property>
    <property name="Size">10px</property>
    <property name="Style"></property>
    <property name="Variant"></property>
    <property name="Weight"></property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">Unit2</property>
  <property name="Width">800</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Label1</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">16</property>
    <property name="Left">248</property>
    <property name="Name">Label1</property>
    <property name="Top">104</property>
    <property name="Width">216</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Change Style</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">25</property>
    <property name="Left">317</property>
    <property name="Name">Button1</property>
    <property name="Top">140</property>
    <property name="Width">83</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="StyleSheet" name="StyleSheet1" >
        <property name="Left">160</property>
        <property name="Top">116</property>
    <property name="FileName">bluestyle.css</property>
    <property name="Name">StyleSheet1</property>
  </object>
</object>
?>
