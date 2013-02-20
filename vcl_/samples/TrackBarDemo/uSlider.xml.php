<?php
<object class="Unit2" name="Unit2" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Slider Demo</property>
  <property name="DocType">dtXHTML_1_0_Transitional</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">Unit2</property>
  <property name="Width">800</property>
  <object class="TrackBar" name="TrackBar1" >
    <property name="Height">41</property>
    <property name="Left">20</property>
    <property name="Name">TrackBar1</property>
    <property name="Position">5</property>
    <property name="Top">43</property>
    <property name="Width">251</property>
    <property name="jsOnChange">TrackBar1JSChange</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Position</property>
    <property name="Height">13</property>
    <property name="Left">20</property>
    <property name="Name">Label1</property>
    <property name="Top">17</property>
    <property name="Width">148</property>
  </object>
  <object class="Button" name="btnSubmit" >
    <property name="Caption">Submit Value</property>
    <property name="Height">25</property>
    <property name="Left">296</property>
    <property name="Name">btnSubmit</property>
    <property name="Top">48</property>
    <property name="Width">139</property>
    <property name="OnClick">btnSubmitClick</property>
  </object>
  <object class="Label" name="lbSubmitted" >
    <property name="Caption">lbSubmitted</property>
    <property name="Height">13</property>
    <property name="Left">448</property>
    <property name="Name">lbSubmitted</property>
    <property name="Top">56</property>
    <property name="Width">283</property>
  </object>
</object>
?>
