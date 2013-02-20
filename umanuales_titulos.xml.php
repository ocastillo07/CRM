<?php
<object class="umanuales_titulos" name="umanuales_titulos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Titulos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">umanuales_titulos</property>
  <property name="Width">800</property>
  <property name="OnShow">umanuales_titulosShow</property>
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
      <property name="Caption"><![CDATA[&lt;P&gt;&lt;FONT color=#004080&gt;&lt;STRONG&gt;Areas en Documentos&lt;/STRONG&gt;&lt;/FONT&gt;&lt;/P&gt;]]></property>
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
      <property name="Width">147</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[&lt;P&gt;Escribir el Nombre del Area&lt;/P&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">120</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">96</property>
    <property name="Width">251</property>
  </object>
  <object class="Label" name="lblmanuales" >
    <property name="Caption">lblmanuales</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">120</property>
    <property name="Name">lblmanuales</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">184</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edmanual" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">120</property>
    <property name="Name">edmanual</property>
    <property name="ParentColor">0</property>
    <property name="Top">120</property>
    <property name="Width">377</property>
  </object>
  <object class="Button" name="btnagregar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Agregar</property>
    <property name="Height">25</property>
    <property name="Left">504</property>
    <property name="Name">btnagregar</property>
    <property name="ParentColor">0</property>
    <property name="Top">118</property>
    <property name="Width">75</property>
    <property name="OnClick">btnagregarClick</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Listado de Areas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">120</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">152</property>
    <property name="Width">217</property>
  </object>
</object>
?>
