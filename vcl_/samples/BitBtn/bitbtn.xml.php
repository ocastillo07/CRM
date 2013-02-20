<?php
<object class="Unit2" name="Unit2" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Bit Button Sample</property>
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
  <object class="BitBtn" name="BitBtn1" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Play With me</property>
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
    <property name="Height">44</property>
    <property name="ImageClicked">clicked.JPG</property>
    <property name="ImageDisabled">disabled.JPG</property>
    <property name="ImageSource">buttonimage.JPG</property>
    <property name="Left">234</property>
    <property name="Name">BitBtn1</property>
    <property name="Spacing"></property>
    <property name="Top">60</property>
    <property name="Width">142</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Change SourceImage</property>
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
    <property name="Left">168</property>
    <property name="Name">Button1</property>
    <property name="Top">131</property>
    <property name="Width">128</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Button" name="Button2" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Disable/Enable</property>
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
    <property name="Left">304</property>
    <property name="Name">Button2</property>
    <property name="Top">131</property>
    <property name="Width">128</property>
    <property name="OnClick">Button2Click</property>
  </object>
</object>
?>
