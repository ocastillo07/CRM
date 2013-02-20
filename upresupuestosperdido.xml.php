<?php
<object class="upresupuestosperdido" name="upresupuestosperdido" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Presupuestos</property>
  <property name="Color">#c0c0c0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">upresupuestosperdido</property>
  <property name="Width">800</property>
  <property name="OnShow">upresupuestosperdidoShow</property>
  <object class="Edit" name="edidpresupuesto" >
    <property name="Height">21</property>
    <property name="Left">6</property>
    <property name="Name">edidpresupuesto</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">92</property>
    <property name="Width">81</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">IdPresupuesto</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">75</property>
    <property name="Width">99</property>
  </object>
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
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">137</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">27</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btnguardarcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">218</property>
      <property name="Name">btnguardarcerrar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">28</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btnguardarcerrarClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[<FONT color=#004080><STRONG>lbtitulo </STRONG></FONT>]]></property>
      <property name="Font">
            <property name="Color">#004080</property>
            <property name="Size">12</property>
            <property name="Weight">bolder</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">7</property>
      <property name="Name">lbtitulo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">15</property>
      <property name="Width">123</property>
    </object>
  </object>
  <object class="Edit" name="edrevision" >
    <property name="Height">21</property>
    <property name="Left">118</property>
    <property name="Name">edrevision</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">92</property>
    <property name="Width">73</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">IdRevision</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">118</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">75</property>
    <property name="Width">155</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Descripcion</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">168</property>
    <property name="Width">82</property>
  </object>
  <object class="Memo" name="mmotivo" >
    <property name="Height">89</property>
    <property name="Left">6</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mmotivo</property>
    <property name="ParentColor">0</property>
    <property name="Top">188</property>
    <property name="Width">719</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Motivo</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">123</property>
    <property name="Width">82</property>
  </object>
  <object class="ComboBox" name="cbmotivo" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">7</property>
    <property name="Name">cbmotivo</property>
    <property name="ParentColor">0</property>
    <property name="Top">138</property>
    <property name="Width">184</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">362</property>
    <property name="Name">hfestatus</property>
    <property name="Top">307</property>
    <property name="Width">160</property>
  </object>
</object>
?>
