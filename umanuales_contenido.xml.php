<?php
<object class="umanuales_contenido" name="umanuales_contenido" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Contenido</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">umanuales_contenido</property>
  <property name="Width">800</property>
  <property name="OnShow">umanuales_contenidoShow</property>
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
      <property name="Caption"><![CDATA[&lt;P&gt;&lt;FONT color=#004080&gt;&lt;STRONG&gt;Titulos de&amp;nbsp;Documentos&lt;/STRONG&gt;&lt;/FONT&gt;&lt;/P&gt;]]></property>
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
    <property name="Caption"><![CDATA[&lt;P&gt;Escribir el Titulo del Documento&lt;/P&gt;]]></property>
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
    <property name="Width">235</property>
  </object>
  <object class="Label" name="lblcontenido" >
    <property name="Caption">lblcontenido</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">80</property>
    <property name="Name">lblcontenido</property>
    <property name="ParentFont">0</property>
    <property name="Top">191</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edmanual" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">edmanual</property>
    <property name="ParentColor">0</property>
    <property name="Top">128</property>
    <property name="Width">377</property>
  </object>
  <object class="Button" name="btnagregar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Agregar</property>
    <property name="Height">25</property>
    <property name="Left">464</property>
    <property name="Name">btnagregar</property>
    <property name="ParentColor">0</property>
    <property name="Top">126</property>
    <property name="Width">75</property>
    <property name="OnClick">btnagregarClick</property>
  </object>
  <object class="Label" name="lblnombre" >
    <property name="Caption">Listado de Documentos</property>
    <property name="Color">#C0C0C0</property>
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
</object>
?>
