<?php
<object class="urhpoliticasvista" name="urhpoliticasvista" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Politicas</property>
  <property name="Color">#c0c0c0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhpoliticasvista</property>
  <property name="Width">800</property>
  <property name="OnCreate">urhpoliticasvistaCreate</property>
  <property name="OnShow">urhpoliticasvistaShow</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">650</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">9</property>
      <property name="Width">75</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[&lt;P&gt;&lt;FONT color=#004080&gt;&lt;STRONG&gt;Manuales&lt;/STRONG&gt;&lt;/FONT&gt;&lt;/P&gt;]]></property>
      <property name="Font">
            <property name="Color">#004080</property>
            <property name="Size">12</property>
            <property name="Weight">bolder</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">5</property>
      <property name="Name">lbtitulo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">16</property>
      <property name="Width">251</property>
    </object>
  </object>
  <object class="HiddenField" name="hfpath" >
    <property name="Height">18</property>
    <property name="Left">615</property>
    <property name="Name">hfpath</property>
    <property name="Top">50</property>
    <property name="Width">80</property>
  </object>
  <object class="ListBox" name="lbpuestos" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Size">12</property>
    </property>
    <property name="Height">450</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">280</property>
    <property name="Name">lbpuestos</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">482</property>
    <property name="OnClick">lbpuestosClick</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;&lt;FONT color=#004080&gt;Politicas&lt;/FONT&gt;&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">286</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">69</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[&lt;STRONG&gt;&lt;FONT color=#004080&gt;Area &lt;/FONT&gt;&lt;/STRONG&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">22</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">69</property>
    <property name="Width">75</property>
  </object>
  <object class="ListBox" name="lbarea" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Size">12</property>
    </property>
    <property name="Height">450</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">16</property>
    <property name="Name">lbarea</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">250</property>
    <property name="OnClick">lbareaClick</property>
  </object>
</object>
?>
