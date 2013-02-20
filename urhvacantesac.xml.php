<?php
<object class="urhvacantesac" name="urhvacantesac" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Vacantes Aumento Colaboradores</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">312</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhvacantesac</property>
  <property name="Width">800</property>
  <property name="OnShow">urhvacantesacShow</property>
  <property name="jsOnLoad">urhvacantesacJSLoad</property>
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
      <property name="Left">226</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btnguardarcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">308</property>
      <property name="Name">btnguardarcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btnguardarcerrarClick</property>
    </object>
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
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">138</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
    <object class="Button" name="btnimprimir" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Imprimir</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">566</property>
      <property name="Name">btnimprimir</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btnimprimirJSClick</property>
    </object>
  </object>
  <object class="ComboBox" name="cbestatus" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">631</property>
    <property name="Name">cbestatus</property>
    <property name="ParentColor">0</property>
    <property name="Top">56</property>
    <property name="Width">156</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">Estatus</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">578</property>
    <property name="Name">Label14</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="dtfechacreacion" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Left">438</property>
    <property name="Name">dtfechacreacion</property>
    <property name="ParentColor">0</property>
    <property name="Top">56</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">FechaCreacion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">344</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">91</property>
  </object>
  <object class="Edit" name="edidsolicitud" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Left">87</property>
    <property name="Name">edidsolicitud</property>
    <property name="ParentColor">0</property>
    <property name="Top">56</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">IdSolicitud</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbplaza" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">57</property>
    <property name="Name">cbplaza</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">136</property>
    <property name="Width">188</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Plaza</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">144</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Departamento</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">104</property>
    <property name="Width">83</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Puesto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">384</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">104</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Cantidad:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">285</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">144</property>
    <property name="Width">68</property>
  </object>
  <object class="Edit" name="edcantidad" >
    <property name="Height">21</property>
    <property name="Left">367</property>
    <property name="Name">edcantidad</property>
    <property name="ParentColor">0</property>
    <property name="Top">136</property>
    <property name="Width">73</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Observaciones</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">168</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edobservaciones" >
    <property name="Height">89</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edobservaciones</property>
    <property name="ParentColor">0</property>
    <property name="Top">184</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario Fecha Hora</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
        <property name="Style">fsNormal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">451</property>
    <property name="Name">lbufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">286</property>
    <property name="Width">336</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">495</property>
    <property name="Name">hfestatus</property>
    <property name="Top">131</property>
    <property name="Width">120</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">645</property>
    <property name="Name">hfidnota</property>
    <property name="Top">131</property>
    <property name="Width">144</property>
  </object>
  <object class="ComboBox" name="cbarea" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">98</property>
    <property name="Name">cbarea</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">96</property>
    <property name="Width">260</property>
  </object>
  <object class="ComboBox" name="cbpuesto" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">446</property>
    <property name="Name">cbpuesto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">96</property>
    <property name="Width">341</property>
  </object>
</object>
?>
