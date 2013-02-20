<?php
<object class="MapShapeSample" name="MapShapeSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Map Shape Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">MapShapeSample</property>
  <property name="Width">800</property>
  <object class="Image" name="Image1" >
    <property name="Border">0</property>
    <property name="Height">240</property>
    <property name="ImageSource">shapeimage.JPG</property>
    <property name="Left">160</property>
    <property name="Link"></property>
    <property name="LinkTarget"></property>
    <property name="Name">Image1</property>
    <property name="Top">56</property>
    <property name="Width">240</property>
    <object class="MapShape" name="MapShape1" >
      <property name="Height">48</property>
      <property name="Hint">this is blue zone</property>
      <property name="Kind">skCircle</property>
      <property name="Left">88</property>
      <property name="Name">MapShape1</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">80</property>
      <property name="Width">56</property>
      <property name="jsOnClick">MapShape1JSClick</property>
    </object>
    <object class="MapShape" name="MapShape2" >
      <property name="Height">52</property>
      <property name="Left">55</property>
      <property name="Link">http://www.google.es</property>
      <property name="Name">MapShape2</property>
      <property name="Top">156</property>
      <property name="Width">129</property>
      <property name="jsOnClick">MapShape2JSClick</property>
    </object>
    <object class="MapShape" name="MapShape3" >
      <property name="Height">20</property>
      <property name="Kind">skDefault</property>
      <property name="Left">202</property>
      <property name="Link"></property>
      <property name="Name">MapShape3</property>
      <property name="Top">19</property>
      <property name="Width">20</property>
      <property name="OnClick">MapShape3Click</property>
    </object>
  </object>
</object>
?>
