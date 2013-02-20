<?php
<object class="WindowSample" name="WindowSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Window No Database Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">WindowSample</property>
  <property name="Width">800</property>
  <object class="Window" name="wm1" >
    <property name="Caption">My First Window</property>
    <property name="Height">336</property>
    <property name="Left">34</property>
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
      <property name="Top">48</property>
      <property name="Width">208</property>
    </object>
    <object class="Button" name="Button1" >
      <property name="Caption">Modal</property>
      <property name="Height">25</property>
      <property name="Left">310</property>
      <property name="Name">Button1</property>
      <property name="Top">48</property>
      <property name="Width">75</property>
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
</object>
?>
