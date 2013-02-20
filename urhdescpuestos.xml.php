<?php
<object class="urhdescpuestos" name="urhdescpuestos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Archivos de Descripcion de Puestos</property>
  <property name="Color">#c0c0c0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">280</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhdescpuestos</property>
  <property name="Width">800</property>
  <property name="OnCreate">urhdescpuestosCreate</property>
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
      <property name="Left">698</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">7</property>
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
      <property name="Top">14</property>
      <property name="Width">251</property>
    </object>
  </object>
  <object class="Upload" name="upload" >
    <property name="Height">27</property>
    <property name="Left">21</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="Top">127</property>
    <property name="Width">631</property>
  </object>
  <object class="Label" name="lbadjunto" >
    <property name="Caption">lbadjunto</property>
    <property name="Height">13</property>
    <property name="Left">29</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto</property>
    <property name="ParentColor">0</property>
    <property name="Top">167</property>
    <property name="Width">480</property>
  </object>
  <object class="Label" name="lbeliminar" >
    <property name="Height">13</property>
    <property name="Left">520</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbeliminar</property>
    <property name="ParentColor">0</property>
    <property name="Top">167</property>
    <property name="Width">59</property>
    <property name="OnClick">lbeliminarClick</property>
  </object>
  <object class="Button" name="btnsubir" >
    <property name="Caption">Subir</property>
    <property name="Height">25</property>
    <property name="Left">676</property>
    <property name="Name">btnsubir</property>
    <property name="ParentColor">0</property>
    <property name="Top">127</property>
    <property name="Width">56</property>
    <property name="OnClick">btnsubirClick</property>
  </object>
  <object class="HiddenField" name="hfpath" >
    <property name="Height">18</property>
    <property name="Left">662</property>
    <property name="Name">hfpath</property>
    <property name="Top">167</property>
    <property name="Width">104</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Departamento</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">21</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">83</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Puesto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">312</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">51</property>
  </object>
  <object class="ComboBox" name="cbarea" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">21</property>
    <property name="Name">cbarea</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">260</property>
    <property name="OnChange">cbareaChange</property>
  </object>
  <object class="ComboBox" name="cbpuesto" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">312</property>
    <property name="Name">cbpuesto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">469</property>
    <property name="OnChange">cbpuestoChange</property>
  </object>
</object>
?>
