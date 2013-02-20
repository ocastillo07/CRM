<?php
<object class="urhexcepciones" name="urhexcepciones" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Excepciones</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">701</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhexcepciones</property>
  <property name="Width">800</property>
  <property name="OnShow">urhexcepcionesShow</property>
  <property name="jsOnLoad">urhexcepcionesJSLoad</property>
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
    <property name="Left">633</property>
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
    <property name="ReadOnly">1</property>
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
  <object class="Label" name="Label3" >
    <property name="Caption">Colaborador</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">128</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidcolaborador" >
    <property name="Height">21</property>
    <property name="Left">87</property>
    <property name="Name">edidcolaborador</property>
    <property name="ParentColor">0</property>
    <property name="Top">120</property>
    <property name="Width">73</property>
    <property name="jsOnBlur">edidcolaboradorJSBlur</property>
    <property name="jsOnChange">edidcolaboradorJSChange</property>
    <property name="jsOnKeyPress">edidcolaboradorJSKeyPress</property>
  </object>
  <object class="Button" name="btncolaborador" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Buscar</property>
    <property name="Height">21</property>
    <property name="ImageSource">imagenes/edit-find22.png</property>
    <property name="Left">165</property>
    <property name="Name">btncolaborador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">1</property>
    <property name="Top">120</property>
    <property name="Width">21</property>
    <property name="OnClick">btncolaboradorClick</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="Height">21</property>
    <property name="Left">191</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">120</property>
    <property name="Width">368</property>
  </object>
  <object class="ComboBox" name="cbplaza" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">633</property>
    <property name="Name">cbplaza</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">120</property>
    <property name="Width">156</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Plaza</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">578</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">128</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Departamento</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">160</property>
    <property name="Width">83</property>
  </object>
  <object class="Edit" name="edarea" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">95</property>
    <property name="Name">edarea</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">152</property>
    <property name="Width">305</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Puesto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">421</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">160</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edpuesto" >
    <property name="Height">21</property>
    <property name="Left">478</property>
    <property name="Name">edpuesto</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">152</property>
    <property name="Width">311</property>
  </object>
  <object class="RadioGroup" name="rgtipo" >
    <property name="Color">#C0C0C0</property>
    <property name="Columns">2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">25</property>
    <property name="Items"><![CDATA[a:2:{i:0;s:25:&quot;Pago Adicional al Esquema&quot;;i:1;s:36:&quot;Exencion de Puntualidad y Asistencia&quot;;}]]></property>
    <property name="Left">5</property>
    <property name="Name">rgtipo</property>
    <property name="ParentFont">0</property>
    <property name="Top">184</property>
    <property name="Width">659</property>
    <property name="OnClick">rgtipoClick</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Monto Bruto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">83</property>
  </object>
  <object class="Edit" name="edmonto" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">95</property>
    <property name="Name">edmonto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">236</property>
    <property name="Width">153</property>
    <property name="jsOnKeyPress">edmontoJSKeyPress</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Justificacion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">264</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edjustificacion" >
    <property name="Height">89</property>
    <property name="Left">8</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edjustificacion</property>
    <property name="ParentColor">0</property>
    <property name="Top">280</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Pago Adicional al Esquema</property>
    <property name="Color">#FF8000</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">216</property>
    <property name="Width">787</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Exencion de Puntualidad y Asistencia</property>
    <property name="Color">#FF8000</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label9</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">376</property>
    <property name="Width">787</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Motivo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">424</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edmotivo" >
    <property name="Height">89</property>
    <property name="Left">8</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edmotivo</property>
    <property name="ParentColor">0</property>
    <property name="Top">440</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Fecha de Afectacion:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">400</property>
    <property name="Width">126</property>
  </object>
  <object class="DateTimePicker" name="dtafectacion" >
    <property name="Caption">dtafectacion</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">141</property>
    <property name="Name">dtafectacion</property>
    <property name="Top">396</property>
    <property name="Width">128</property>
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
    <property name="Left">456</property>
    <property name="Name">lbufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">648</property>
    <property name="Width">336</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">488</property>
    <property name="Name">hfestatus</property>
    <property name="Top">248</property>
    <property name="Width">88</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">589</property>
    <property name="Name">hfidnota</property>
    <property name="Top">248</property>
    <property name="Width">67</property>
  </object>
  <object class="HiddenField" name="hfidcolaborador" >
    <property name="Height">18</property>
    <property name="Left">272</property>
    <property name="Name">hfidcolaborador</property>
    <property name="Top">248</property>
    <property name="Width">200</property>
  </object>
  <object class="Label" name="lblhistorial" >
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">lblhistorial</property>
    <property name="Top">678</property>
    <property name="Width">769</property>
  </object>
  <object class="Label" name="lbnotas" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Observaciones RH&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Color">#0000A0</property>
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Hint">Click para agregar nota</property>
    <property name="Left">15</property>
    <property name="Name">lbnotas</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">660</property>
    <property name="Width">133</property>
    <property name="OnClick">lbnotasClick</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Comentarios Director</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">552</property>
    <property name="Width">324</property>
  </object>
  <object class="Memo" name="eddirector" >
    <property name="Height">73</property>
    <property name="Left">8</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">eddirector</property>
    <property name="ParentColor">0</property>
    <property name="Top">568</property>
    <property name="Width">784</property>
  </object>
  <object class="HiddenField" name="hfidestatus" >
    <property name="Height">18</property>
    <property name="Left">688</property>
    <property name="Name">hfidestatus</property>
    <property name="Top">184</property>
    <property name="Width">88</property>
  </object>
  <object class="Edit" name="edoriginador" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Left">100</property>
    <property name="Name">edoriginador</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">88</property>
    <property name="Width">689</property>
  </object>
  <object class="Label" name="Label42" >
    <property name="Caption">Originador:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">Label42</property>
    <property name="ParentFont">0</property>
    <property name="Top">96</property>
    <property name="Width">91</property>
  </object>
</object>
?>
