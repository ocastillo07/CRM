<?php
<object class="urhvacantesnc" name="urhvacantesnc" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Vacantes Nueva Creacion</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">1776</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhvacantesnc</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">urhvacantesncShow</property>
  <property name="jsOnLoad">urhvacantesncJSLoad</property>
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
      <property name="Top">8</property>
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
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">633</property>
    <property name="Name">cbestatus</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
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
  <object class="Edit" name="edfechacreacion" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Left">439</property>
    <property name="Name">edfechacreacion</property>
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
    <property name="Left">85</property>
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
    <property name="Left">633</property>
    <property name="Name">cbplaza</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">3</property>
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
    <property name="Left">308</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">104</property>
    <property name="Width">43</property>
  </object>
  <object class="Edit" name="edpuesto" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">357</property>
    <property name="Name">edpuesto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">96</property>
    <property name="Width">217</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Autoridad: Jefe Inmediato</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">136</property>
    <property name="Width">163</property>
  </object>
  <object class="Edit" name="edjefe" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">173</property>
    <property name="Name">edjefe</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">128</property>
    <property name="Width">612</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Personal a su cargo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">160</property>
    <property name="Width">116</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Descripcion del Puesto</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">320</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Objetivo</property>
    <property name="Color">C</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label13</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">344</property>
    <property name="Width">88</property>
  </object>
  <object class="Memo" name="edobjetivo" >
    <property name="Color">C</property>
    <property name="Height">65</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edobjetivo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">360</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Actividades Diarias</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">432</property>
    <property name="Width">192</property>
  </object>
  <object class="Memo" name="edadiarias" >
    <property name="Height">81</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edadiarias</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">448</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Actividades Periodicas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">536</property>
    <property name="Width">208</property>
  </object>
  <object class="Memo" name="edaperiodicas" >
    <property name="Height">89</property>
    <property name="Left">3</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edaperiodicas</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">552</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Actividades Ocasionales</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">648</property>
    <property name="Width">208</property>
  </object>
  <object class="Memo" name="edaocasionales" >
    <property name="Color">C</property>
    <property name="Height">73</property>
    <property name="Left">3</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edaocasionales</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">664</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption"><![CDATA[Indicadores de Desempe&ntilde;o]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">744</property>
    <property name="Width">248</property>
  </object>
  <object class="Memo" name="edindicadores" >
    <property name="Height">89</property>
    <property name="Left">4</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edindicadores</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">767</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Perfil</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label16</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">864</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">Edad:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label17</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">888</property>
    <property name="Width">59</property>
  </object>
  <object class="Edit" name="ededad" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">69</property>
    <property name="Name">ededad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">11</property>
    <property name="Top">880</property>
    <property name="Width">180</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">Sexo:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">267</property>
    <property name="Name">Label19</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">888</property>
    <property name="Width">59</property>
  </object>
  <object class="RadioGroup" name="rgsexo" >
    <property name="Color">#C0C0C0</property>
    <property name="Columns">3</property>
    <property name="Height">20</property>
    <property name="Items"><![CDATA[a:3:{i:0;s:8:&quot;Femenino&quot;;i:1;s:9:&quot;Masculino&quot;;i:2;s:10:&quot;Indistinto&quot;;}]]></property>
    <property name="Left">342</property>
    <property name="Name">rgsexo</property>
    <property name="Top">885</property>
    <property name="Width">289</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption">Estudios Requeridos</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label20</property>
    <property name="ParentFont">0</property>
    <property name="Top">920</property>
    <property name="Width">131</property>
  </object>
  <object class="ComboBox" name="cbestudios" >
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:4:{s:3:&quot;PRO&quot;;s:13:&quot;PROFESIONALES&quot;;s:3:&quot;TEC&quot;;s:8:&quot;TECNICOS&quot;;s:4:&quot;PREP&quot;;s:12:&quot;PREPARATORIA&quot;;s:3:&quot;SEC&quot;;s:10:&quot;SECUNDARIA&quot;;}]]></property>
    <property name="Left">147</property>
    <property name="Name">cbestudios</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">12</property>
    <property name="Top">915</property>
    <property name="Width">185</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">Descripcion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">345</property>
    <property name="Name">Label21</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">920</property>
    <property name="Width">83</property>
  </object>
  <object class="Edit" name="edestudiosdesc" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">436</property>
    <property name="Name">edestudiosdesc</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">13</property>
    <property name="Top">912</property>
    <property name="Width">350</property>
  </object>
  <object class="CheckBox" name="cklicencia" >
    <property name="Caption">Licencia Tipo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">20</property>
    <property name="Name">cklicencia</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">14</property>
    <property name="Top">968</property>
    <property name="Width">105</property>
    <property name="OnClick">cklicenciaClick</property>
  </object>
  <object class="CheckBox" name="ckantecedentes" >
    <property name="Caption">Antecedentes no penales</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">323</property>
    <property name="Name">ckantecedentes</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">16</property>
    <property name="Top">968</property>
    <property name="Width">176</property>
  </object>
  <object class="CheckBox" name="ckotro" >
    <property name="Caption">Otro</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">534</property>
    <property name="Name">ckotro</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">17</property>
    <property name="Top">968</property>
    <property name="Width">57</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Caption">Documentos Necesarios</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label22</property>
    <property name="ParentFont">0</property>
    <property name="Top">944</property>
    <property name="Width">140</property>
  </object>
  <object class="Edit" name="edlicencia" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">132</property>
    <property name="Name">edlicencia</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">15</property>
    <property name="Top">968</property>
    <property name="Width">159</property>
  </object>
  <object class="Edit" name="edotrodesc" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">594</property>
    <property name="Name">edotrodesc</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">18</property>
    <property name="Top">968</property>
    <property name="Width">175</property>
  </object>
  <object class="Label" name="Label23" >
    <property name="Caption">Habilidades</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label23</property>
    <property name="ParentFont">0</property>
    <property name="Top">1000</property>
    <property name="Width">80</property>
  </object>
  <object class="Memo" name="edhabilidades" >
    <property name="Height">81</property>
    <property name="Left">3</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edhabilidades</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">19</property>
    <property name="Top">1016</property>
    <property name="Width">370</property>
  </object>
  <object class="Label" name="Label24" >
    <property name="Caption">Comentarios</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">403</property>
    <property name="Name">Label24</property>
    <property name="ParentFont">0</property>
    <property name="Top">1000</property>
    <property name="Width">84</property>
  </object>
  <object class="Memo" name="edcomentarios" >
    <property name="Height">81</property>
    <property name="Left">403</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edcomentarios</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">20</property>
    <property name="Top">1016</property>
    <property name="Width">371</property>
  </object>
  <object class="Label" name="Label25" >
    <property name="Caption">Informacion de Candidatos Identificados</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">1</property>
    <property name="Name">Label25</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1102</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label26" >
    <property name="Caption">Nombre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label26</property>
    <property name="ParentFont">0</property>
    <property name="Top">1134</property>
    <property name="Width">48</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">64</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">21</property>
    <property name="Top">1126</property>
    <property name="Width">422</property>
  </object>
  <object class="Label" name="Label27" >
    <property name="Caption">Tel:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">491</property>
    <property name="Name">Label27</property>
    <property name="ParentFont">0</property>
    <property name="Top">1134</property>
    <property name="Width">27</property>
  </object>
  <object class="Edit" name="edtel" >
    <property name="Height">21</property>
    <property name="Left">526</property>
    <property name="Name">edtel</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">22</property>
    <property name="Top">1126</property>
    <property name="Width">104</property>
  </object>
  <object class="Label" name="Label28" >
    <property name="Caption">Cel:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">638</property>
    <property name="Name">Label28</property>
    <property name="ParentFont">0</property>
    <property name="Top">1134</property>
    <property name="Width">27</property>
  </object>
  <object class="Edit" name="edcel" >
    <property name="Height">21</property>
    <property name="Left">666</property>
    <property name="Name">edcel</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">23</property>
    <property name="Top">1130</property>
    <property name="Width">112</property>
  </object>
  <object class="Label" name="Label29" >
    <property name="Caption">Motivos por los que presenta al candidato</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">1</property>
    <property name="Name">Label29</property>
    <property name="ParentFont">0</property>
    <property name="Top">1158</property>
    <property name="Width">240</property>
  </object>
  <object class="Memo" name="edmotivos" >
    <property name="Height">49</property>
    <property name="Left">1</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edmotivos</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">24</property>
    <property name="Top">1174</property>
    <property name="Width">785</property>
  </object>
  <object class="Label" name="Label30" >
    <property name="Caption">Equipo y Herramienta de Trabajo</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Name">Label30</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1294</property>
    <property name="Width">788</property>
  </object>
  <object class="Label" name="Label31" >
    <property name="Caption">Equipo y Herramienta</property>
    <property name="Color">C</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label31</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1318</property>
    <property name="Width">147</property>
  </object>
  <object class="Edit" name="edequipo" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">1</property>
    <property name="Name">edequipo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">27</property>
    <property name="Top">1342</property>
    <property name="Width">212</property>
  </object>
  <object class="Label" name="Label32" >
    <property name="Caption">Accion para obtenerla</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">334</property>
    <property name="Name">Label32</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1326</property>
    <property name="Width">131</property>
  </object>
  <object class="Edit" name="edaccion" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">334</property>
    <property name="Name">edaccion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">29</property>
    <property name="Top">1342</property>
    <property name="Width">214</property>
  </object>
  <object class="Label" name="Label33" >
    <property name="Caption">Fecha Estimada:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">558</property>
    <property name="Name">Label33</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1314</property>
    <property name="Width">59</property>
  </object>
  <object class="CheckBox" name="ckcuentacon" >
    <property name="Caption">Cuenta con ella</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">217</property>
    <property name="Name">ckcuentacon</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">28</property>
    <property name="Top">1342</property>
    <property name="Width">109</property>
  </object>
  <object class="DateTimePicker" name="dtfechaherr" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">558</property>
    <property name="Name">dtfechaherr</property>
    <property name="Top">1342</property>
    <property name="Width">96</property>
  </object>
  <object class="Button" name="btnagregar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">+</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">766</property>
    <property name="Name">btnagregar</property>
    <property name="TabOrder">30</property>
    <property name="Top">1326</property>
    <property name="Width">25</property>
    <property name="jsOnClick">btnagregarJSClick</property>
  </object>
  <object class="Label" name="lbdetalle" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">21</property>
    <property name="Left">1</property>
    <property name="Name">lbdetalle</property>
    <property name="Top">1374</property>
    <property name="Width">784</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">137</property>
    <property name="Name">hfestatus</property>
    <property name="Top">339</property>
    <property name="Width">120</property>
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
    <property name="Top">342</property>
    <property name="Width">336</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">274</property>
    <property name="Name">hfidnota</property>
    <property name="Top">339</property>
    <property name="Width">123</property>
  </object>
  <object class="HiddenField" name="hfdetalle" >
    <property name="Height">18</property>
    <property name="Left">292</property>
    <property name="Name">hfdetalle</property>
    <property name="Top">1150</property>
    <property name="Width">120</property>
  </object>
  <object class="HiddenField" name="hfidcontador" >
    <property name="Height">18</property>
    <property name="Left">429</property>
    <property name="Name">hfidcontador</property>
    <property name="Top">1150</property>
    <property name="Width">110</property>
  </object>
  <object class="HiddenField" name="hfidestatus" >
    <property name="Height">18</property>
    <property name="Left">171</property>
    <property name="Name">hfidestatus</property>
    <property name="Top">1318</property>
    <property name="Width">104</property>
  </object>
  <object class="Upload" name="upload" >
    <property name="Height">20</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">25</property>
    <property name="Top">1249</property>
    <property name="Width">414</property>
  </object>
  <object class="Label" name="lbadjunto" >
    <property name="Caption">lbadjunto</property>
    <property name="Height">13</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto</property>
    <property name="ParentColor">0</property>
    <property name="Top">1273</property>
    <property name="Width">328</property>
  </object>
  <object class="Label" name="lbeliminar" >
    <property name="Height">13</property>
    <property name="Left">355</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbeliminar</property>
    <property name="ParentColor">0</property>
    <property name="Top">1273</property>
    <property name="Width">59</property>
    <property name="OnClick">lbeliminarClick</property>
  </object>
  <object class="Button" name="btnsubir" >
    <property name="Caption">Subir</property>
    <property name="Height">20</property>
    <property name="Left">415</property>
    <property name="Name">btnsubir</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">26</property>
    <property name="Top">1249</property>
    <property name="Width">56</property>
    <property name="OnClick">btnsubirClick</property>
  </object>
  <object class="HiddenField" name="hfpath" >
    <property name="Height">18</property>
    <property name="Left">561</property>
    <property name="Name">hfpath</property>
    <property name="Top">1265</property>
    <property name="Width">104</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">Curriculum Adjunto:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">1</property>
    <property name="Name">Label18</property>
    <property name="ParentFont">0</property>
    <property name="Top">1230</property>
    <property name="Width">240</property>
  </object>
  <object class="Label" name="Label34" >
    <property name="Caption">Llenado Exlusivo de Direccion General</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">12</property>
    <property name="Name">Label34</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1610</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label35" >
    <property name="Caption">Percepcion Semanal Libre Autorizada</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">29</property>
    <property name="Left">16</property>
    <property name="Name">Label35</property>
    <property name="ParentFont">0</property>
    <property name="Top">1634</property>
    <property name="Width">130</property>
  </object>
  <object class="Edit" name="edpercepcion" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">10</property>
    <property name="Name">edpercepcion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">31</property>
    <property name="Top">1674</property>
    <property name="Width">140</property>
    <property name="jsOnKeyPress">edpercepcionJSKeyPress</property>
  </object>
  <object class="Label" name="Label36" >
    <property name="Caption">Comentarios</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">167</property>
    <property name="Name">Label36</property>
    <property name="ParentFont">0</property>
    <property name="Top">1634</property>
    <property name="Width">84</property>
  </object>
  <object class="Memo" name="edcomentariosdir" >
    <property name="Height">81</property>
    <property name="Left">167</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edcomentariosdir</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">32</property>
    <property name="Top">1650</property>
    <property name="Width">624</property>
  </object>
  <object class="ComboBox" name="cbarea" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">111</property>
    <property name="Name">cbarea</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">96</property>
    <property name="Width">156</property>
  </object>
  <object class="Memo" name="edpersonal" >
    <property name="Height">49</property>
    <property name="Left">131</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edpersonal</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">152</property>
    <property name="Width">654</property>
  </object>
  <object class="Label" name="Label37" >
    <property name="Caption">Fecha Real:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">23</property>
    <property name="Left">665</property>
    <property name="Name">Label37</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1316</property>
    <property name="Width">59</property>
  </object>
  <object class="DateTimePicker" name="dtreal" >
    <property name="Caption">dtreal</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">665</property>
    <property name="Name">dtreal</property>
    <property name="Top">1342</property>
    <property name="Width">96</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Fecha propuesta de Contratacion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">12</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">1584</property>
    <property name="Width">198</property>
  </object>
  <object class="DateTimePicker" name="dtfechapropuesta" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">214</property>
    <property name="Name">dtfechapropuesta</property>
    <property name="Top">1582</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="lblhistorial" >
    <property name="Height">13</property>
    <property name="Left">10</property>
    <property name="Name">lblhistorial</property>
    <property name="Top">1750</property>
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
    <property name="Left">11</property>
    <property name="Name">lbnotas</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">1732</property>
    <property name="Width">133</property>
    <property name="OnClick">lbnotasClick</property>
  </object>
  <object class="Label" name="lbnotaseg" >
    <property name="Caption"><![CDATA[&lt;SPAN style=&quot;FONT-SIZE: 12pt&quot;&gt;&lt;FONT size=2 face=Arial&gt;&lt;SPAN style=&quot;FONT-SIZE: 7.5pt&quot;&gt;La fecha debe de ser posterior a las fechas determinadas en la obtenci&oacute;n del equipo y herramienta requerida para el puesto&lt;/SPAN&gt;&lt;/FONT&gt;&lt;/SPAN&gt;]]></property>
    <property name="Color">#FFD8B0</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">10</property>
    <property name="Name">lbnotaseg</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">1562</property>
    <property name="Width">785</property>
  </object>
  <object class="Label" name="Label38" >
    <property name="Caption">Gerente Solicitante</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">Label38</property>
    <property name="ParentFont">0</property>
    <property name="Top">216</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="edoriginador" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">4</property>
    <property name="Name">edoriginador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">4</property>
    <property name="Top">232</property>
    <property name="Width">448</property>
  </object>
  <object class="Label" name="Label39" >
    <property name="Caption">Gerente de Soporte a Solicitud</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label39</property>
    <property name="ParentFont">0</property>
    <property name="Top">264</property>
    <property name="Width">179</property>
  </object>
  <object class="Edit" name="edapoyo" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">106</property>
    <property name="Name">edapoyo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">4</property>
    <property name="Top">288</property>
    <property name="Width">370</property>
  </object>
  <object class="Edit" name="edidapoyo" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edidapoyo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">288</property>
    <property name="Width">62</property>
    <property name="jsOnBlur">edidapoyoJSBlur</property>
  </object>
  <object class="Button" name="btnapoyo" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">btnapoyo</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/edit-find32.png</property>
    <property name="Left">69</property>
    <property name="Name">btnapoyo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">284</property>
    <property name="Width">25</property>
    <property name="OnClick">btnapoyoClick</property>
  </object>
  <object class="Edit" name="edpuestooriginador" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">460</property>
    <property name="Name">edpuestooriginador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">4</property>
    <property name="Top">232</property>
    <property name="Width">325</property>
  </object>
  <object class="Label" name="Label40" >
    <property name="Caption">Puesto:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">460</property>
    <property name="Name">Label40</property>
    <property name="ParentFont">0</property>
    <property name="Top">216</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="edpuestoapoyo" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">483</property>
    <property name="Name">edpuestoapoyo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">4</property>
    <property name="Top">288</property>
    <property name="Width">301</property>
  </object>
  <object class="Label" name="Label41" >
    <property name="Caption">Puesto:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">483</property>
    <property name="Name">Label41</property>
    <property name="ParentFont">0</property>
    <property name="Top">272</property>
    <property name="Width">121</property>
  </object>
  <object class="HiddenField" name="hfidapoyo" >
    <property name="Height">18</property>
    <property name="Left">197</property>
    <property name="Name">hfidapoyo</property>
    <property name="Top">261</property>
    <property name="Width">200</property>
  </object>
</object>
?>
