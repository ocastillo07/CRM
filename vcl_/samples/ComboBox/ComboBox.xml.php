<?php
<object class="ComboBoxSample" name="ComboBoxSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">ComboBox Sample</property>
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
  <property name="Name">ComboBoxSample</property>
  <property name="Width">800</property>
  <object class="ComboBox" name="ComboBox1" >
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
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:3:{s:4:&quot;key1&quot;;s:8:&quot;Option 1&quot;;s:4:&quot;key2&quot;;s:8:&quot;Option 2&quot;;s:4:&quot;key3&quot;;s:8:&quot;Option 3&quot;;}]]></property>
    <property name="Left">96</property>
    <property name="Name">ComboBox1</property>
    <property name="Top">32</property>
    <property name="Width">185</property>
    <property name="jsOnChange">ComboBox1JSChange</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Combo1:</property>
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
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label1</property>
    <property name="Top">34</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="ComboBox2" >
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
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">488</property>
    <property name="Name">ComboBox2</property>
    <property name="Top">32</property>
    <property name="Width">185</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Combo2:</property>
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
    <property name="Height">13</property>
    <property name="Left">408</property>
    <property name="Name">Label2</property>
    <property name="Top">34</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">This sample shows how to, using javascript, dynamically fill a combobox depending on the selection of another combobox</property>
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
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label3</property>
    <property name="Top">8</property>
    <property name="Width">771</property>
  </object>
</object>
?>
