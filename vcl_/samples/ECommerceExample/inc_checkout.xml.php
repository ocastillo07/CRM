<?php
<object class="Checkout" name="Checkout" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Noname1</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">Checkout</property>
  <property name="ShowFooter">0</property>
  <property name="ShowHeader">0</property>
  <property name="TemplateEngine">SmartyTemplate</property>
  <property name="Width">800</property>
  <property name="OnCreate">CheckoutCreate</property>
  <property name="OnTemplate">CheckoutTemplate</property>
  <object class="RawOutput" name="Msg" >
    <property name="Height">25</property>
    <property name="Left">7</property>
    <property name="Name">Msg</property>
    <property name="Top">10</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="SubmitButton" >
    <property name="Caption">Submit</property>
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">7</property>
    <property name="Name">SubmitButton</property>
    <property name="ParentFont">0</property>
    <property name="Top">417</property>
    <property name="Width">98</property>
  </object>
</object>
?>
