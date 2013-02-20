<?php
<object class="urebusquedas" name="urebusquedas" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Busquedas</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">200</property>
  <property name="IsMaster">0</property>
  <property name="Name">urebusquedas</property>
  <property name="Width">800</property>
  <property name="OnShow">urebusquedasShow</property>
  <property name="jsOnLoad">urebusquedasJSLoad</property>
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
      <property name="Left">714</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[&lt;FONT color=#004080&gt;&lt;STRONG&gt;lbtitulo &lt;/STRONG&gt;&lt;/FONT&gt;]]></property>
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
      <property name="Top">15</property>
      <property name="Width">123</property>
    </object>
  </object>
  <object class="Label" name="lbdetalle" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">lbdetalle</property>
    <property name="Top">118</property>
    <property name="Width">784</property>
  </object>
  <object class="HiddenField" name="hftabla" >
    <property name="Height">18</property>
    <property name="Left">496</property>
    <property name="Name">hftabla</property>
    <property name="Top">48</property>
    <property name="Width">88</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Periodo:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">77</property>
    <property name="Width">75</property>
  </object>
  <object class="DateTimePicker" name="dtf1" >
    <property name="Caption">dtf1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">102</property>
    <property name="Name">dtf1</property>
    <property name="ShowsTime">0</property>
    <property name="TimeZone">GMT</property>
    <property name="Top">77</property>
    <property name="Width">104</property>
  </object>
  <object class="DateTimePicker" name="dtf2" >
    <property name="Caption">dtf2</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">220</property>
    <property name="Name">dtf2</property>
    <property name="ShowsTime">0</property>
    <property name="TimeZone">GMT</property>
    <property name="Top">77</property>
    <property name="Width">104</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Filtrar</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">344</property>
    <property name="Name">Button1</property>
    <property name="Top">71</property>
    <property name="Width">75</property>
  </object>
</object>
?>
