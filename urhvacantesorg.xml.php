<?php
<object class="urhvacantesorg" name="urhvacantesorg" baseclass="page">
  <property name="Background"></property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">1552</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhvacantesorg</property>
  <property name="Width">800</property>
  <property name="OnShow">urhvacantesorgShow</property>
  <property name="jsOnLoad">urhvacantesorgJSLoad</property>
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
  </object>
  <object class="ComboBox" name="cbestatus" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">633</property>
    <property name="Name">cbestatus</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
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
    <property name="TabOrder">4</property>
    <property name="Top">152</property>
    <property name="Width">188</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Plaza</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">160</property>
    <property name="Width">43</property>
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
    <property name="Top">120</property>
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
    <property name="Top">120</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Fecha Deseada de Contratacion :</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">422</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">184</property>
    <property name="Width">188</property>
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
    <property name="Top">216</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edobservaciones" >
    <property name="Height">73</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edobservaciones</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">232</property>
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
    <property name="Left">450</property>
    <property name="Name">lbufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">214</property>
    <property name="Width">336</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">273</property>
    <property name="Name">hfestatus</property>
    <property name="Top">211</property>
    <property name="Width">120</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">263</property>
    <property name="Name">hfidnota</property>
    <property name="Top">340</property>
    <property name="Width">84</property>
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
    <property name="TabOrder">2</property>
    <property name="Top">112</property>
    <property name="Width">260</property>
    <property name="OnChange">cbareaChange</property>
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
    <property name="TabOrder">3</property>
    <property name="Top">112</property>
    <property name="Width">341</property>
  </object>
  <object class="DateTimePicker" name="dtcontrataciondeseada" >
    <property name="Caption">dtcontrataciondeseada</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">659</property>
    <property name="Name">dtcontrataciondeseada</property>
    <property name="Top">180</property>
    <property name="Width">128</property>
  </object>
  <object class="ComboBox" name="cbmotbaja" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">121</property>
    <property name="Name">cbmotbaja</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">184</property>
    <property name="Width">188</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Motivo de la Baja</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">192</property>
    <property name="Width">107</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Alignment">agRight</property>
    <property name="Caption">Fecha de Ausencia del Colaborador Actual:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">334</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">156</property>
    <property name="Width">245</property>
  </object>
  <object class="DateTimePicker" name="dtausencia" >
    <property name="Caption">dtcontratacion</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">659</property>
    <property name="Name">dtausencia</property>
    <property name="Top">152</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Seguimiento de RH</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label9</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">320</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label30" >
    <property name="Caption">SOLICITUD DE CANDIDATOS</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label30</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">481</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label31" >
    <property name="Caption">Nombre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label31</property>
    <property name="ParentFont">0</property>
    <property name="Top">513</property>
    <property name="Width">62</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">4</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">532</property>
    <property name="Width">339</property>
  </object>
  <object class="Label" name="Label33" >
    <property name="Caption">Fecha Entrevista</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">571</property>
    <property name="Name">Label33</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">597</property>
    <property name="Width">108</property>
  </object>
  <object class="DateTimePicker" name="dtentrevista" >
    <property name="Caption">dtentrevista</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">571</property>
    <property name="Name">dtentrevista</property>
    <property name="Top">614</property>
    <property name="Width">109</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Resultado</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">4</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">647</property>
    <property name="Width">60</property>
  </object>
  <object class="Edit" name="edentrevistador" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">118</property>
    <property name="Name">edentrevistador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">11</property>
    <property name="Top">750</property>
    <property name="Width">424</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">Fecha Entrevista</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">551</property>
    <property name="Name">Label19</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">731</property>
    <property name="Width">116</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption">Hora Entrevista</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">688</property>
    <property name="Name">Label20</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">731</property>
    <property name="Width">98</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">Nombre Entrevistador</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">2</property>
    <property name="Name">Label21</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">731</property>
    <property name="Width">134</property>
  </object>
  <object class="Edit" name="edhentrevista2" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">688</property>
    <property name="MaxLength">5</property>
    <property name="Name">edhentrevista2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">20</property>
    <property name="Top">750</property>
    <property name="Width">100</property>
  </object>
  <object class="DateTimePicker" name="dtentrevista2" >
    <property name="Caption">dtentrevista2</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">551</property>
    <property name="Name">dtentrevista2</property>
    <property name="Top">754</property>
    <property name="Width">128</property>
  </object>
  <object class="Upload" name="upload" >
    <property name="Height">20</property>
    <property name="Left">355</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">532</property>
    <property name="Width">367</property>
  </object>
  <object class="Label" name="lbadjunto" >
    <property name="Caption">lbadjunto</property>
    <property name="Height">13</property>
    <property name="Left">355</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto</property>
    <property name="ParentColor">0</property>
    <property name="Top">558</property>
    <property name="Width">328</property>
  </object>
  <object class="Label" name="lbeliminar" >
    <property name="Height">13</property>
    <property name="Left">714</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbeliminar</property>
    <property name="ParentColor">0</property>
    <property name="Top">558</property>
    <property name="Width">59</property>
    <property name="OnClick">lbeliminarClick</property>
  </object>
  <object class="Button" name="btnsubir" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Subir</property>
    <property name="Height">20</property>
    <property name="Left">730</property>
    <property name="Name">btnsubir</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="Top">532</property>
    <property name="Width">56</property>
    <property name="OnClick">btnsubirClick</property>
  </object>
  <object class="HiddenField" name="hfpath" >
    <property name="Height">18</property>
    <property name="Left">684</property>
    <property name="Name">hfpath</property>
    <property name="Top">511</property>
    <property name="Width">104</property>
  </object>
  <object class="Label" name="Label23" >
    <property name="Caption">Documento</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">355</property>
    <property name="Name">Label23</property>
    <property name="ParentFont">0</property>
    <property name="Top">513</property>
    <property name="Width">70</property>
  </object>
  <object class="RadioGroup" name="rgcumpleperfil" >
    <property name="Color">#C0C0C0</property>
    <property name="Height">41</property>
    <property name="Items"><![CDATA[a:2:{i:0;s:20:&quot;Cumple con el perfil&quot;;i:1;s:23:&quot;No cumple con el perfil&quot;;}]]></property>
    <property name="Left">4</property>
    <property name="Name">rgcumpleperfil</property>
    <property name="TabOrder">16</property>
    <property name="Top">664</property>
    <property name="Width">152</property>
  </object>
  <object class="Label" name="Label25" >
    <property name="Caption">Observaciones</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">171</property>
    <property name="Name">Label25</property>
    <property name="ParentFont">0</property>
    <property name="Top">647</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edobsentrevista" >
    <property name="Height">40</property>
    <property name="Left">171</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edobsentrevista</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">17</property>
    <property name="Top">665</property>
    <property name="Width">618</property>
  </object>
  <object class="Label" name="Label26" >
    <property name="Caption">Candidato</property>
    <property name="Color">#FFA477</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label26</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">497</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label27" >
    <property name="Caption">Entrevista con RH</property>
    <property name="Color">#FFA477</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label27</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">577</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label28" >
    <property name="Caption">Entrevistador</property>
    <property name="Color">#FFA477</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">2</property>
    <property name="Name">Label28</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">711</property>
    <property name="Width">784</property>
  </object>
  <object class="Edit" name="edidentrevistador" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">1</property>
    <property name="Name">edidentrevistador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">18</property>
    <property name="Top">750</property>
    <property name="Width">77</property>
    <property name="jsOnBlur">edidentrevistadorJSBlur</property>
  </object>
  <object class="Button" name="btnentrevistador" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">btnentrevistador</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/edit-find32.png</property>
    <property name="Left">84</property>
    <property name="Name">btnentrevistador</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">19</property>
    <property name="Top">746</property>
    <property name="Width">25</property>
    <property name="OnClick">btnentrevistadorClick</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Entrevista con Departamento</property>
    <property name="Color">#FFA477</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">2</property>
    <property name="Name">Label12</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">784</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Caption">Hora Programada Entrevista</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">23</property>
    <property name="Left">132</property>
    <property name="Name">Label22</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">800</property>
    <property name="Width">109</property>
  </object>
  <object class="Edit" name="edhentrevista3" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">136</property>
    <property name="MaxLength">5</property>
    <property name="Name">edhentrevista3</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">21</property>
    <property name="Top">823</property>
    <property name="Width">100</property>
  </object>
  <object class="Label" name="Label24" >
    <property name="Caption">Fecha Programada Entrevista</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">24</property>
    <property name="Left">5</property>
    <property name="Name">Label24</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">800</property>
    <property name="Width">116</property>
  </object>
  <object class="DateTimePicker" name="dtentrevista3" >
    <property name="Caption">dtrecepcion</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">3</property>
    <property name="Name">dtentrevista3</property>
    <property name="Top">827</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label29" >
    <property name="Caption">Resultado</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">247</property>
    <property name="Name">Label29</property>
    <property name="ParentFont">0</property>
    <property name="Top">804</property>
    <property name="Width">60</property>
  </object>
  <object class="RadioGroup" name="rgresultado" >
    <property name="Color">#C0C0C0</property>
    <property name="Columns">2</property>
    <property name="Height">24</property>
    <property name="Items"><![CDATA[a:2:{i:0;s:2:&quot;Si&quot;;i:1;s:2:&quot;No&quot;;}]]></property>
    <property name="Left">247</property>
    <property name="Name">rgresultado</property>
    <property name="TabOrder">22</property>
    <property name="Top">823</property>
    <property name="Width">97</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Conocimientos</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">869</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edconocimientos" >
    <property name="Height">40</property>
    <property name="Left">2</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edconocimientos</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">24</property>
    <property name="Top">887</property>
    <property name="Width">340</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Habilidades</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">350</property>
    <property name="Name">Label16</property>
    <property name="ParentFont">0</property>
    <property name="Top">804</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edhabilidades" >
    <property name="Height">40</property>
    <property name="Left">350</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edhabilidades</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">23</property>
    <property name="Top">823</property>
    <property name="Width">448</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">Observaciones</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">350</property>
    <property name="Name">Label17</property>
    <property name="ParentFont">0</property>
    <property name="Top">869</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edobsdepartamento" >
    <property name="Height">40</property>
    <property name="Left">350</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edobsdepartamento</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">25</property>
    <property name="Top">887</property>
    <property name="Width">448</property>
  </object>
  <object class="Label" name="Label32" >
    <property name="Caption">Evaluacion General</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">2</property>
    <property name="Name">Label32</property>
    <property name="ParentFont">0</property>
    <property name="Top">940</property>
    <property name="Width">169</property>
  </object>
  <object class="RadioGroup" name="rgevgeneral" >
    <property name="Color">#C0C0C0</property>
    <property name="Columns">2</property>
    <property name="Height">24</property>
    <property name="Items"><![CDATA[a:2:{i:0;s:8:&quot;Aceptado&quot;;i:1;s:9:&quot;Rechazado&quot;;}]]></property>
    <property name="Left">2</property>
    <property name="Name">rgevgeneral</property>
    <property name="TabOrder">26</property>
    <property name="Top">959</property>
    <property name="Width">172</property>
  </object>
  <object class="Label" name="lbdetalle" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">lbdetalle</property>
    <property name="Top">1197</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label34" >
    <property name="Caption">RESUMEN DE CANDIDATOS</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label34</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1172</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label35" >
    <property name="Caption">CONTRATACION</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label35</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1463</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label36" >
    <property name="Caption">Fecha de Contratacion</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label36</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1479</property>
    <property name="Width">132</property>
  </object>
  <object class="DateTimePicker" name="dtcontratacion" >
    <property name="Caption">dtrecepcion</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">8</property>
    <property name="Name">dtcontratacion</property>
    <property name="Top">1502</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label37" >
    <property name="Caption">Comentarios Generales</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">153</property>
    <property name="Name">Label37</property>
    <property name="ParentFont">0</property>
    <property name="Top">1479</property>
    <property name="Width">151</property>
  </object>
  <object class="Memo" name="edcomgen" >
    <property name="Height">40</property>
    <property name="Left">153</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edcomgen</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">34</property>
    <property name="Top">1498</property>
    <property name="Width">638</property>
  </object>
  <object class="Label" name="Label38" >
    <property name="Caption">Referencias</property>
    <property name="Color">#FFA477</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">2</property>
    <property name="Name">Label38</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">992</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label39" >
    <property name="Caption">Empresa:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">1</property>
    <property name="Name">Label39</property>
    <property name="ParentFont">0</property>
    <property name="Top">1008</property>
    <property name="Width">62</property>
  </object>
  <object class="Edit" name="edempresa" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">1</property>
    <property name="Name">edempresa</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">27</property>
    <property name="Top">1027</property>
    <property name="Width">437</property>
  </object>
  <object class="Label" name="Label40" >
    <property name="Caption">Puesto:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">449</property>
    <property name="Name">Label40</property>
    <property name="ParentFont">0</property>
    <property name="Top">1008</property>
    <property name="Width">62</property>
  </object>
  <object class="Edit" name="edpuesto" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">449</property>
    <property name="Name">edpuesto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">28</property>
    <property name="Top">1027</property>
    <property name="Width">339</property>
  </object>
  <object class="Label" name="Label41" >
    <property name="Caption">Referencia</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">1</property>
    <property name="Name">Label41</property>
    <property name="ParentFont">0</property>
    <property name="Top">1056</property>
    <property name="Width">62</property>
  </object>
  <object class="RadioGroup" name="rgrefrating" >
    <property name="Color">#C0C0C0</property>
    <property name="Columns">5</property>
    <property name="Height">24</property>
    <property name="Items"><![CDATA[a:5:{i:0;s:10:&quot;EXCELENTES&quot;;i:1;s:6:&quot;BUENAS&quot;;i:2;s:7:&quot;REGULAR&quot;;i:3;s:5:&quot;MALAS&quot;;i:4;s:12:&quot;DESCONOCIDAS&quot;;}]]></property>
    <property name="Left">77</property>
    <property name="Name">rgrefrating</property>
    <property name="TabOrder">29</property>
    <property name="Top">1063</property>
    <property name="Width">560</property>
  </object>
  <object class="CheckBox" name="chkna" >
    <property name="Caption">N/A</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Hint">No Ausencia</property>
    <property name="Left">593</property>
    <property name="Name">chkna</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">5</property>
    <property name="Top">152</property>
    <property name="Width">52</property>
  </object>
  <object class="Button" name="btnagregar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">+</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">25</property>
    <property name="Hint">Click para agregar Candidato</property>
    <property name="Left">667</property>
    <property name="Name">btnagregar</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">30</property>
    <property name="Top">1056</property>
    <property name="Width">119</property>
    <property name="jsOnClick">btnagregarJSClick</property>
  </object>
  <object class="HiddenField" name="hfidestatus" >
    <property name="Height">18</property>
    <property name="Left">670</property>
    <property name="Name">hfidestatus</property>
    <property name="Top">949</property>
    <property name="Width">112</property>
  </object>
  <object class="HiddenField" name="hfidcontador" >
    <property name="Height">18</property>
    <property name="Left">289</property>
    <property name="Name">hfidcontador</property>
    <property name="Top">647</property>
    <property name="Width">112</property>
  </object>
  <object class="HiddenField" name="hfdetalle" >
    <property name="Height">18</property>
    <property name="Left">409</property>
    <property name="Name">hfdetalle</property>
    <property name="Top">647</property>
    <property name="Width">120</property>
  </object>
  <object class="HiddenField" name="hfidcolaborador" >
    <property name="Height">18</property>
    <property name="Left">195</property>
    <property name="Name">hfidcolaborador</property>
    <property name="Top">558</property>
    <property name="Width">152</property>
  </object>
  <object class="Edit" name="edoriginador" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Left">98</property>
    <property name="Name">edoriginador</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">80</property>
    <property name="Width">689</property>
  </object>
  <object class="Label" name="Label42" >
    <property name="Caption">Originador:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label42</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">91</property>
  </object>
  <object class="Label" name="lblhistorial" >
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">lblhistorial</property>
    <property name="Top">358</property>
    <property name="Width">783</property>
  </object>
  <object class="Label" name="lbnotas" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Estatus de Reclutamiento&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Color">#0000A0</property>
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Hint">Click para agregar nota</property>
    <property name="Left">5</property>
    <property name="Name">lbnotas</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">340</property>
    <property name="Width">169</property>
    <property name="OnClick">lbnotasClick</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Hora Entrevista</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">692</property>
    <property name="Name">Label10</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">596</property>
    <property name="Width">98</property>
  </object>
  <object class="Edit" name="edhentrevista" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">692</property>
    <property name="MaxLength">5</property>
    <property name="Name">edhentrevista</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">15</property>
    <property name="Top">614</property>
    <property name="Width">100</property>
  </object>
  <object class="Edit" name="edentrevistadorrh" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">121</property>
    <property name="Name">edentrevistadorrh</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">14</property>
    <property name="Top">614</property>
    <property name="Width">424</property>
  </object>
  <object class="Label" name="Label43" >
    <property name="Caption">Nombre Entrevistador</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label43</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">596</property>
    <property name="Width">135</property>
  </object>
  <object class="Edit" name="edidentrevistadorrh" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">4</property>
    <property name="Name">edidentrevistadorrh</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">12</property>
    <property name="Top">614</property>
    <property name="Width">77</property>
    <property name="jsOnBlur">edidentrevistadorrhJSBlur</property>
  </object>
  <object class="Button" name="btnentrevistadorrh" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">btnentrevistador</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/edit-find32.png</property>
    <property name="Left">87</property>
    <property name="Name">btnentrevistadorrh</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">13</property>
    <property name="Top">610</property>
    <property name="Width">25</property>
    <property name="OnClick">btnentrevistadorrhClick</property>
  </object>
  <object class="Label" name="Label44" >
    <property name="Caption">Observaciones</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label44</property>
    <property name="ParentFont">0</property>
    <property name="Top">1101</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edobsreferencias" >
    <property name="Height">40</property>
    <property name="Left">3</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edobsreferencias</property>
    <property name="ParentColor">0</property>
    <property name="Top">1119</property>
    <property name="Width">785</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">SOLICITAR CONTRATACION</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label18</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1359</property>
    <property name="Width">784</property>
  </object>
  <object class="Edit" name="edcandidato1" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">93</property>
    <property name="Name">edcandidato1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">31</property>
    <property name="Top">1379</property>
    <property name="Width">693</property>
  </object>
  <object class="Label" name="Label45" >
    <property name="Caption">Candidato 1:</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label45</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1387</property>
    <property name="Width">78</property>
  </object>
  <object class="Edit" name="edcandidato2" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">94</property>
    <property name="Name">edcandidato2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">32</property>
    <property name="Top">1403</property>
    <property name="Width">693</property>
  </object>
  <object class="Label" name="Label46" >
    <property name="Caption">Candidato 2:</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label46</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1411</property>
    <property name="Width">78</property>
  </object>
  <object class="Edit" name="edcandidato3" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">93</property>
    <property name="Name">edcandidato3</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">33</property>
    <property name="Top">1427</property>
    <property name="Width">693</property>
  </object>
  <object class="Label" name="Label47" >
    <property name="Caption">Candidato 3:</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label47</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1435</property>
    <property name="Width">78</property>
  </object>
  <object class="HiddenField" name="hfidentrevistador" >
    <property name="Height">18</property>
    <property name="Left">153</property>
    <property name="Name">hfidentrevistador</property>
    <property name="Top">728</property>
    <property name="Width">120</property>
  </object>
  <object class="HiddenField" name="hfidentrevistadorrh" >
    <property name="Height">18</property>
    <property name="Left">159</property>
    <property name="Name">hfidentrevistadorrh</property>
    <property name="Top">593</property>
    <property name="Width">120</property>
  </object>
  <object class="HiddenField" name="hfchkna" >
    <property name="Height">18</property>
    <property name="Left">578</property>
    <property name="Name">hfchkna</property>
    <property name="Top">132</property>
    <property name="Width">84</property>
  </object>
</object>
?>
