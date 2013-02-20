<?php
<object class="Unit1" name="Unit1" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">List View Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">Unit1</property>
  <property name="Width">800</property>
  <property name="OnCreate">Unit1Create</property>
  <object class="ListView" name="ListView1" >
    <property name="Columns"><![CDATA[a:4:{i:0;s:7:&quot;Caption&quot;;i:1;s:8:&quot;Column 2&quot;;i:2;s:11:&quot;Bool column&quot;;i:3;s:2:&quot;c4&quot;;}]]></property>
    <property name="Height">327</property>
    <property name="Hint">this is a test hint</property>
    <property name="Left">21</property>
    <property name="Name">ListView1</property>
    <property name="ParentColor">0</property>
    <property name="SelectionType">selMultiInterval</property>
    <property name="SortAscending">0</property>
    <property name="Tag">2</property>
    <property name="Top">24</property>
    <property name="Width">435</property>
    <property name="OnSubmit">ListView1Submit</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Submit</property>
    <property name="Height">25</property>
    <property name="Left">544</property>
    <property name="Name">Button1</property>
    <property name="Top">24</property>
    <property name="Width">75</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="ListBox" name="ListBox1" >
    <property name="Height">240</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">544</property>
    <property name="Name">ListBox1</property>
    <property name="Top">96</property>
    <property name="Width">192</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Selected items:</property>
    <property name="Height">13</property>
    <property name="Left">544</property>
    <property name="Name">Label1</property>
    <property name="Top">80</property>
    <property name="Width">168</property>
  </object>
  <object class="Button" name="Button2" >
    <property name="Caption">Add</property>
    <property name="Height">25</property>
    <property name="Left">464</property>
    <property name="Name">Button2</property>
    <property name="Top">96</property>
    <property name="Width">75</property>
    <property name="OnClick">Button2Click</property>
  </object>
</object>
?>
