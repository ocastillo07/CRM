<?php
<object class="unotas" name="unotas" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Notas del Cliente</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">668</property>
  <property name="IsMaster">0</property>
  <property name="Name">unotas</property>
  <property name="Width">800</property>
  <property name="OnShow">unotasShow</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btngcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">223</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">650</property>
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
  <object class="Memo" name="mmnuevo" >
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">145</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mmnuevo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">80</property>
    <property name="Width">755</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Historial de Notas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">259</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Nueva Nota:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">61</property>
    <property name="Width">75</property>
  </object>
  <object class="HiddenField" name="hfidprocedencia" >
    <property name="Height">18</property>
    <property name="Left">448</property>
    <property name="Name">hfidprocedencia</property>
    <property name="Top">48</property>
    <property name="Value">0</property>
    <property name="Width">115</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">448</property>
    <property name="Name">hfidnota</property>
    <property name="Top">72</property>
    <property name="Value">0</property>
    <property name="Width">115</property>
  </object>
  <object class="HiddenField" name="hfprocedencia" >
    <property name="Height">18</property>
    <property name="Left">448</property>
    <property name="Name">hfprocedencia</property>
    <property name="Top">96</property>
    <property name="Width">115</property>
  </object>
  <object class="HiddenField" name="hfidnom" >
    <property name="Height">18</property>
    <property name="Left">448</property>
    <property name="Name">hfidnom</property>
    <property name="Top">123</property>
    <property name="Width">115</property>
  </object>
  <object class="HiddenField" name="hfidrevision" >
    <property name="Height">18</property>
    <property name="Left">448</property>
    <property name="Name">hfidrevision</property>
    <property name="Top">149</property>
    <property name="Width">115</property>
  </object>
  <object class="Label" name="lblhistorial" >
    <property name="Caption">lbhistorial</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">lblhistorial</property>
    <property name="Top">261</property>
    <property name="Width">755</property>
  </object>
  <object class="HiddenField" name="hfnotasvisibles" >
    <property name="Height">18</property>
    <property name="Left">448</property>
    <property name="Name">hfnotasvisibles</property>
    <property name="Top">181</property>
    <property name="Width">115</property>
  </object>
  <object class="MySQLQuery" name="sqlnotas" >
        <property name="Left">160</property>
        <property name="Top">144</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="Name">sqlnotas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
