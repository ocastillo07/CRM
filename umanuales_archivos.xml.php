<?php
<object class="umanuales_archivos" name="umanuales_archivos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Archivos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">umanuales_archivos</property>
  <property name="Width">800</property>
  <property name="OnShow">umanuales_archivosShow</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">50</property>
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
      <property name="Caption"><![CDATA[&lt;P&gt;&lt;FONT color=#004080&gt;&lt;STRONG&gt;Archivos de Manuales&lt;/STRONG&gt;&lt;/FONT&gt;&lt;/P&gt;]]></property>
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
  <object class="Label" name="Label1" >
    <property name="Caption">Buscar Archivo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">80</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">104</property>
    <property name="Width">219</property>
  </object>
  <object class="Label" name="lblarchivo" >
    <property name="Caption">lblarchivo</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">80</property>
    <property name="Name">lblarchivo</property>
    <property name="ParentFont">0</property>
    <property name="Top">191</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="lblnombre" >
    <property name="Caption">Listado de Archivos</property>
    <property name="Font">
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">80</property>
    <property name="Name">lblnombre</property>
    <property name="ParentFont">0</property>
    <property name="Top">160</property>
    <property name="Width">592</property>
  </object>
  <object class="Upload" name="ulimgpath" >
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">ulimgpath</property>
    <property name="ParentColor">0</property>
    <property name="Top">125</property>
    <property name="Width">492</property>
  </object>
  <object class="Button" name="btnagregar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Subir</property>
    <property name="Height">23</property>
    <property name="Left">589</property>
    <property name="Name">btnagregar</property>
    <property name="ParentColor">0</property>
    <property name="Top">123</property>
    <property name="Width">75</property>
    <property name="OnClick">btnagregarClick</property>
  </object>
</object>
?>
