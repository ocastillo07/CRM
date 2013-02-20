<?php
<object class="TimerSample" name="TimerSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Timer Sample</property>
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
  <property name="Name">TimerSample</property>
  <property name="Width">800</property>
  <object class="Timer" name="Timer1" >
        <property name="Left">47</property>
        <property name="Top">22</property>
    <property name="Interval">2000</property>
    <property name="Name">Timer1</property>
    <property name="jsOnTimer">Timer1JSTimer</property>
  </object>
</object>
?>
