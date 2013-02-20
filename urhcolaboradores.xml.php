<?php
<object class="urhcolaboradores" name="urhcolaboradores" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Colaboradores</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">416</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhcolaboradores</property>
  <property name="Width">800</property>
  <property name="OnShow">urhcolaboradoresShow</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfestatus" >
      <property name="Height">18</property>
      <property name="Left">580</property>
      <property name="Name">hfestatus</property>
      <property name="Top">16</property>
      <property name="Value">0</property>
      <property name="Width">82</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">228</property>
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
      <property name="Left">316</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
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
    <object class="Button" name="edregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">690</property>
      <property name="Name">edregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">edregresarClick</property>
    </object>
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">IdSistema</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">91</property>
  </object>
  <object class="Edit" name="edidcolaborador" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="Name">edidcolaborador</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">80</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Iniciales</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">148</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="ediniciales" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">148</property>
    <property name="MaxLength">4</property>
    <property name="Name">ediniciales</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">80</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">ID Colaborador</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">304</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">132</property>
  </object>
  <object class="Edit" name="edidempleado" >
    <property name="Height">21</property>
    <property name="Left">304</property>
    <property name="Name">edidempleado</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">80</property>
    <property name="Width">137</property>
    <property name="jsOnKeyPress">edidempleadoJSKeyPress</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Apellido Materno</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">580</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">112</property>
    <property name="Width">107</property>
  </object>
  <object class="Edit" name="edamaterno" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">580</property>
    <property name="MaxLength">30</property>
    <property name="Name">edamaterno</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">128</property>
    <property name="Width">185</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Nombre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">112</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="MaxLength">30</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">128</property>
    <property name="Width">328</property>
  </object>
  <object class="CheckBox" name="ckactivo" >
    <property name="Caption">Activo</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">693</property>
    <property name="Name">ckactivo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">60</property>
    <property name="Width">72</property>
  </object>
  <object class="Edit" name="edapaterno" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">360</property>
    <property name="MaxLength">30</property>
    <property name="Name">edapaterno</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">128</property>
    <property name="Width">200</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Apellido Paterno</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">360</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">112</property>
    <property name="Width">99</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Fecha de Ingreso</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">147</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Area</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">168</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbarea" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">13</property>
    <property name="Name">cbarea</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">184</property>
    <property name="Width">261</property>
  </object>
  <object class="ComboBox" name="cbpuesto" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">288</property>
    <property name="Name">cbpuesto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">184</property>
    <property name="Width">265</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Puesto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">288</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">168</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Plaza</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">580</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">168</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbplaza" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">580</property>
    <property name="Name">cbplaza</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">184</property>
    <property name="Width">185</property>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario:</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">197</property>
    <property name="Name">lbufh</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">269</property>
    <property name="Width">583</property>
  </object>
  <object class="DateTimePicker" name="dtingreso" >
    <property name="Caption">dtingreso</property>
    <property name="Height">17</property>
    <property name="Left">13</property>
    <property name="Name">dtingreso</property>
    <property name="Top">241</property>
    <property name="Width">152</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Dias Pendientes</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">456</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">155</property>
  </object>
  <object class="Edit" name="eddias" >
    <property name="Height">21</property>
    <property name="Left">456</property>
    <property name="Name">eddias</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">80</property>
    <property name="Width">137</property>
    <property name="jsOnKeyPress">eddiasJSKeyPress</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Comentarios</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">272</property>
    <property name="Width">147</property>
  </object>
  <object class="Memo" name="edcomentarios" >
    <property name="Height">88</property>
    <property name="Left">15</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edcomentarios</property>
    <property name="ParentColor">0</property>
    <property name="Top">296</property>
    <property name="Width">753</property>
  </object>
  <object class="CheckBox" name="chkbloqueado" >
    <property name="Caption">Permisos Bloqueados</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">205</property>
    <property name="Name">chkbloqueado</property>
    <property name="ParentFont">0</property>
    <property name="Top">241</property>
    <property name="Width">121</property>
  </object>
</object>
?>
