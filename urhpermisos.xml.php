<?php
<object class="urhpermisos" name="urhpermisos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Permisos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhpermisos</property>
  <property name="Width">800</property>
  <property name="OnShow">urhpermisosShow</property>
  <property name="jsOnLoad">urhpermisosJSLoad</property>
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
    <property name="Top">104</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidcolaborador" >
    <property name="Height">21</property>
    <property name="Left">87</property>
    <property name="Name">edidcolaborador</property>
    <property name="ParentColor">0</property>
    <property name="Top">96</property>
    <property name="Width">73</property>
    <property name="jsOnBlur">edidcolaboradorJSBlur</property>
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
    <property name="Top">96</property>
    <property name="Width">21</property>
    <property name="OnClick">btncolaboradorClick</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="Height">21</property>
    <property name="Left">191</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="Top">96</property>
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
    <property name="Top">96</property>
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
    <property name="Top">104</property>
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
    <property name="Top">136</property>
    <property name="Width">83</property>
  </object>
  <object class="Edit" name="edarea" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">95</property>
    <property name="Name">edarea</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">128</property>
    <property name="Width">211</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Puesto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">333</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">136</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edpuesto" >
    <property name="Height">21</property>
    <property name="Left">396</property>
    <property name="Name">edpuesto</property>
    <property name="ParentColor">0</property>
    <property name="Top">128</property>
    <property name="Width">393</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Permisos Acumulados</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">184</property>
    <property name="Width">134</property>
  </object>
  <object class="Edit" name="edacumulados" >
    <property name="Height">21</property>
    <property name="Left">147</property>
    <property name="Name">edacumulados</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">176</property>
    <property name="Width">39</property>
  </object>
  <object class="RadioGroup" name="rgtipo" >
    <property name="Color">#C0C0C0</property>
    <property name="Columns">2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">24</property>
    <property name="Items"><![CDATA[a:2:{i:0;s:9:&quot;Descuento&quot;;i:1;s:10:&quot;Reposicion&quot;;}]]></property>
    <property name="Left">6</property>
    <property name="Name">rgtipo</property>
    <property name="ParentFont">0</property>
    <property name="Top">256</property>
    <property name="Width">180</property>
    <property name="OnClick">rgtipoClick</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Fecha de Ausencia</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">109</property>
  </object>
  <object class="DateTimePicker" name="dtausencia" >
    <property name="Caption">dtausencia</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">120</property>
    <property name="Name">dtausencia</property>
    <property name="Top">220</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Horario de Ausencia  De:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">257</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">220</property>
    <property name="Width">139</property>
  </object>
  <object class="Edit" name="edinicio" >
    <property name="Height">21</property>
    <property name="Left">406</property>
    <property name="MaxLength">5</property>
    <property name="Name">edinicio</property>
    <property name="ParentColor">0</property>
    <property name="Top">212</property>
    <property name="Width">73</property>
    <property name="jsOnKeyPress">edinicioJSKeyPress</property>
    <property name="jsOnKeyUp">edinicioJSKeyUp</property>
  </object>
  <object class="Edit" name="edfin" >
    <property name="Height">21</property>
    <property name="Left">520</property>
    <property name="MaxLength">5</property>
    <property name="Name">edfin</property>
    <property name="ParentColor">0</property>
    <property name="Top">212</property>
    <property name="Width">73</property>
    <property name="jsOnKeyPress">edfinJSKeyPress</property>
    <property name="jsOnKeyUp">edfinJSKeyUp</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">A:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">489</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">220</property>
    <property name="Width">22</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Motivo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">304</property>
    <property name="Width">43</property>
  </object>
  <object class="Memo" name="edmotivo" >
    <property name="Height">105</property>
    <property name="Left">6</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edmotivo</property>
    <property name="ParentColor">0</property>
    <property name="Top">320</property>
    <property name="Width">390</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Observaciones de RH</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">440</property>
    <property name="Width">160</property>
  </object>
  <object class="Memo" name="edobservaciones" >
    <property name="Height">113</property>
    <property name="Left">6</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edobservaciones</property>
    <property name="ParentColor">0</property>
    <property name="Top">456</property>
    <property name="Width">390</property>
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
    <property name="Left">453</property>
    <property name="Name">lbufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">246</property>
    <property name="Width">336</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">676</property>
    <property name="Name">hfestatus</property>
    <property name="Top">159</property>
    <property name="Width">96</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">676</property>
    <property name="Name">hfidnota</property>
    <property name="Top">184</property>
    <property name="Width">93</property>
  </object>
  <object class="HiddenField" name="hfidcolaborador" >
    <property name="Height">18</property>
    <property name="Left">481</property>
    <property name="Name">hfidcolaborador</property>
    <property name="Top">159</property>
    <property name="Width">138</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Fecha de Reposicion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">429</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">296</property>
    <property name="Width">119</property>
  </object>
  <object class="DateTimePicker" name="dtreposicion" >
    <property name="Caption">dtreposicion</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">552</property>
    <property name="Name">dtreposicion</property>
    <property name="Top">292</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Horario  De:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">429</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">322</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edrepinicio" >
    <property name="Height">21</property>
    <property name="Left">513</property>
    <property name="MaxLength">5</property>
    <property name="Name">edrepinicio</property>
    <property name="ParentColor">0</property>
    <property name="Top">314</property>
    <property name="Width">73</property>
    <property name="jsOnKeyPress">edrepinicioJSKeyPress</property>
    <property name="jsOnKeyUp">edrepinicioJSKeyUp</property>
  </object>
  <object class="Edit" name="edrepfin" >
    <property name="Height">21</property>
    <property name="Left">628</property>
    <property name="MaxLength">5</property>
    <property name="Name">edrepfin</property>
    <property name="ParentColor">0</property>
    <property name="Top">314</property>
    <property name="Width">73</property>
    <property name="jsOnKeyPress">edrepfinJSKeyPress</property>
    <property name="jsOnKeyUp">edrepfinJSKeyUp</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">A:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">597</property>
    <property name="Name">Label16</property>
    <property name="ParentFont">0</property>
    <property name="Top">320</property>
    <property name="Width">22</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption"><![CDATA[de 8 permitidos al a&ntilde;o]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">197</property>
    <property name="Name">Label17</property>
    <property name="ParentFont">0</property>
    <property name="Top">184</property>
    <property name="Width">150</property>
  </object>
  <object class="HiddenField" name="hfidestatus" >
    <property name="Height">18</property>
    <property name="Left">482</property>
    <property name="Name">hfidestatus</property>
    <property name="Top">184</property>
    <property name="Width">96</property>
  </object>
  <object class="Label" name="lbdetalle" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">406</property>
    <property name="Name">lbdetalle</property>
    <property name="Top">346</property>
    <property name="Width">384</property>
  </object>
  <object class="Button" name="btnagregar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">+</property>
    <property name="Height">25</property>
    <property name="Left">764</property>
    <property name="Name">btnagregar</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">15</property>
    <property name="Top">310</property>
    <property name="Width">25</property>
    <property name="jsOnClick">btnagregarJSClick</property>
  </object>
  <object class="HiddenField" name="hfdetalle" >
    <property name="Height">18</property>
    <property name="Left">615</property>
    <property name="Name">hfdetalle</property>
    <property name="Top">410</property>
    <property name="Width">88</property>
  </object>
  <object class="HiddenField" name="hfidcontador" >
    <property name="Height">18</property>
    <property name="Left">615</property>
    <property name="Name">hfidcontador</property>
    <property name="Top">392</property>
    <property name="Width">100</property>
  </object>
  <object class="HiddenField" name="hfnow" >
    <property name="Height">18</property>
    <property name="Left">87</property>
    <property name="Name">hfnow</property>
    <property name="Top">291</property>
    <property name="Width">136</property>
  </object>
  <object class="CheckBox" name="chkbloqueado" >
    <property name="Caption">Bloqueado</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">226</property>
    <property name="Name">chkbloqueado</property>
    <property name="ParentFont">0</property>
    <property name="Top">257</property>
    <property name="Visible">0</property>
    <property name="Width">121</property>
  </object>
</object>
?>
