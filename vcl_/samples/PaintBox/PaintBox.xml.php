<?php
<object class="PaintBoxSample" name="PaintBoxSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">PaintBox Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">PaintBoxSample</property>
  <property name="Width">800</property>
  <object class="PaintBox" name="pbTest" >
    <property name="Height">120</property>
    <property name="Hint">This is a hint</property>
    <property name="Left">36</property>
    <property name="Name">pbTest</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">44</property>
    <property name="Width">184</property>
    <property name="OnPaint">pbTestPaint</property>
  </object>
  <object class="PaintBox" name="PaintBox1" >
    <property name="Height">388</property>
    <property name="Left">248</property>
    <property name="Name">PaintBox1</property>
    <property name="Top">44</property>
    <property name="Width">484</property>
    <property name="OnPaint">PaintBox1Paint</property>
    <property name="jsOnClick">PaintBox1JSClick</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Painting using Javascript (click the paintbox):</property>
    <property name="Height">13</property>
    <property name="Left">248</property>
    <property name="Name">Label1</property>
    <property name="Top">20</property>
    <property name="Width">439</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Painting using PHP:</property>
    <property name="Height">13</property>
    <property name="Left">36</property>
    <property name="Name">Label2</property>
    <property name="Top">20</property>
    <property name="Width">182</property>
  </object>
</object>
?>
