<?php
<object class="urhvacaciones" name="urhvacaciones" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Vacaciones</property>
  <property name="Color">#c0c0c0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">456</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhvacaciones</property>
  <property name="Width">800</property>
  <property name="OnShow">urhvacacionesShow</property>
  <property name="jsOnLoad">urhvacacionesJSLoad</property>
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
      <property name="OnClick">btnimprimirClick</property>
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
    <property name="Left">88</property>
    <property name="Name">edidcolaborador</property>
    <property name="ParentColor">0</property>
    <property name="Top">96</property>
    <property name="Width">73</property>
    <property name="jsOnBlur">edidcolaboradorJSBlur</property>
    <property name="jsOnKeyPress">edidcolaboradorJSKeyPress</property>
  </object>
  <object class="Button" name="btnbuscarcli" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Buscar</property>
    <property name="Height">21</property>
    <property name="Hint">Click para Buscar un Cliente</property>
    <property name="ImageSource">imagenes/edit-find22.png</property>
    <property name="Left">165</property>
    <property name="Name">btnbuscarcli</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">1</property>
    <property name="Top">96</property>
    <property name="Width">21</property>
    <property name="OnClick">btnbuscarcliClick</property>
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
    <property name="Color">#c0c0c0</property>
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
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">95</property>
    <property name="Name">edarea</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">128</property>
    <property name="Width">233</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Puesto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">341</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">132</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edpuesto" >
    <property name="Height">21</property>
    <property name="Left">406</property>
    <property name="Name">edpuesto</property>
    <property name="ParentColor">0</property>
    <property name="Top">124</property>
    <property name="Width">241</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Periodo de Vacaciones  De:</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">166</property>
  </object>
  <object class="DateTimePicker" name="dtinicio" >
    <property name="Caption">dtinicio</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">178</property>
    <property name="Name">dtinicio</property>
    <property name="Top">220</property>
    <property name="Width">128</property>
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
    <property name="Top">312</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edobservaciones" >
    <property name="Height">89</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edobservaciones</property>
    <property name="ParentColor">0</property>
    <property name="Top">328</property>
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
    <property name="Left">453</property>
    <property name="Name">lbufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">430</property>
    <property name="Width">336</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Ingreso</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">658</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">132</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edfechaingreso" >
    <property name="Height">21</property>
    <property name="Left">716</property>
    <property name="Name">edfechaingreso</property>
    <property name="ParentColor">0</property>
    <property name="Top">124</property>
    <property name="Width">73</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Dias Disponibles</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">176</property>
    <property name="Width">107</property>
  </object>
  <object class="Edit" name="eddisponibles" >
    <property name="Height">21</property>
    <property name="Left">124</property>
    <property name="Name">eddisponibles</property>
    <property name="ParentColor">0</property>
    <property name="Top">168</property>
    <property name="Width">57</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Dias solicitados a disfrutar</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">194</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">176</property>
    <property name="Width">187</property>
  </object>
  <object class="Edit" name="eddisfrutar" >
    <property name="Height">21</property>
    <property name="Left">393</property>
    <property name="Name">eddisfrutar</property>
    <property name="ParentColor">0</property>
    <property name="Top">168</property>
    <property name="Width">57</property>
    <property name="jsOnBlur">eddisfrutarJSBlur</property>
    <property name="jsOnKeyPress">eddisfrutarJSKeyPress</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">A:</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">351</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">22</property>
  </object>
  <object class="DateTimePicker" name="dtfin" >
    <property name="Caption">C</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">378</property>
    <property name="Name">dtfin</property>
    <property name="Top">220</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Fecha de Regreso:</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">541</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">118</property>
  </object>
  <object class="DateTimePicker" name="dtregreso" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">661</property>
    <property name="Name">dtregreso</property>
    <property name="Top">220</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Colaborador</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">280</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidcubre" >
    <property name="Height">21</property>
    <property name="Left">88</property>
    <property name="Name">edidcubre</property>
    <property name="ParentColor">0</property>
    <property name="Top">272</property>
    <property name="Width">73</property>
    <property name="jsOnBlur">edidcubreJSBlur</property>
    <property name="jsOnKeyPress">edidcubreJSKeyPress</property>
  </object>
  <object class="Button" name="btncubre" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Buscar</property>
    <property name="Height">21</property>
    <property name="ImageSource">imagenes/edit-find22.png</property>
    <property name="Left">165</property>
    <property name="Name">btncubre</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">1</property>
    <property name="Top">272</property>
    <property name="Width">21</property>
    <property name="OnClick">btncubreClick</property>
  </object>
  <object class="Edit" name="edcubre" >
    <property name="Height">21</property>
    <property name="Left">191</property>
    <property name="Name">edcubre</property>
    <property name="ParentColor">0</property>
    <property name="Top">272</property>
    <property name="Width">336</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Colaborador que cubrira sus actividades:</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label16</property>
    <property name="ParentFont">0</property>
    <property name="Top">256</property>
    <property name="Width">238</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">Puesto:</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">536</property>
    <property name="Name">Label17</property>
    <property name="ParentFont">0</property>
    <property name="Top">280</property>
    <property name="Width">49</property>
  </object>
  <object class="Edit" name="edpuestocubre" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">593</property>
    <property name="Name">edpuestocubre</property>
    <property name="ParentColor">0</property>
    <property name="Top">272</property>
    <property name="Width">196</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">480</property>
    <property name="Name">hfestatus</property>
    <property name="Top">160</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">480</property>
    <property name="Name">hfidnota</property>
    <property name="Top">184</property>
    <property name="Width">200</property>
  </object>
  <object class="Button" name="btncal" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">#</property>
    <property name="Color">#c0c0c0</property>
    <property name="Height">25</property>
    <property name="Hint">Calcular fechas de vacaciones</property>
    <property name="Left">308</property>
    <property name="Name">btncal</property>
    <property name="Top">216</property>
    <property name="Width">27</property>
    <property name="jsOnClick">btncalJSClick</property>
  </object>
  <object class="HiddenField" name="hfidcolaborador" >
    <property name="Height">18</property>
    <property name="Left">208</property>
    <property name="Name">hfidcolaborador</property>
    <property name="Top">72</property>
    <property name="Width">120</property>
  </object>
  <object class="HiddenField" name="hfidcubre" >
    <property name="Height">18</property>
    <property name="Left">226</property>
    <property name="Name">hfidcubre</property>
    <property name="Top">296</property>
    <property name="Width">76</property>
  </object>
</object>
?>
