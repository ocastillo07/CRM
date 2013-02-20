<?php
<object class="urhvacantesnc2" name="urhvacantesnc2" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">true</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhvacantesnc2</property>
  <property name="Width">800</property>
  <property name="jsOnLoad">urhvacantesnc2JSLoad</property>
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
    <object class="Button" name="btncerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">714</property>
      <property name="Name">btncerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btncerrarClick</property>
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
      <property name="Width">211</property>
    </object>
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
    <property name="Top">64</property>
    <property name="Width">83</property>
  </object>
  <object class="Edit" name="Edit3" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">95</property>
    <property name="Name">Edit3</property>
    <property name="ParentColor">0</property>
    <property name="Top">56</property>
    <property name="Width">206</property>
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
    <property name="Top">64</property>
    <property name="Width">43</property>
  </object>
  <object class="Edit" name="Edit4" >
    <property name="Height">21</property>
    <property name="Left">357</property>
    <property name="Name">Edit4</property>
    <property name="ParentColor">0</property>
    <property name="Top">56</property>
    <property name="Width">217</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Plaza</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">580</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">43</property>
  </object>
  <object class="Edit" name="Edit1" >
    <property name="Height">21</property>
    <property name="Left">629</property>
    <property name="Name">Edit1</property>
    <property name="ParentColor">0</property>
    <property name="Top">56</property>
    <property name="Width">160</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Perfil</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Edad: Min</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">112</property>
    <property name="Width">59</property>
  </object>
  <object class="Edit" name="Edit2" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">72</property>
    <property name="Name">Edit2</property>
    <property name="ParentColor">0</property>
    <property name="Top">104</property>
    <property name="Width">54</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Max</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">133</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">112</property>
    <property name="Width">35</property>
  </object>
  <object class="Edit" name="Edit5" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">179</property>
    <property name="Name">Edit5</property>
    <property name="ParentColor">0</property>
    <property name="Top">104</property>
    <property name="Width">54</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Sexo:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">269</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">112</property>
    <property name="Width">59</property>
  </object>
  <object class="RadioGroup" name="RadioGroup1" >
    <property name="Color">#C0C0C0</property>
    <property name="Columns">3</property>
    <property name="Height">20</property>
    <property name="Items"><![CDATA[a:3:{i:0;s:8:&quot;Femenino&quot;;i:1;s:9:&quot;Masculino&quot;;i:2;s:10:&quot;Indistinto&quot;;}]]></property>
    <property name="Left">344</property>
    <property name="Name">RadioGroup1</property>
    <property name="Top">109</property>
    <property name="Width">289</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Estudios Requeridos</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">144</property>
    <property name="Width">131</property>
  </object>
  <object class="ComboBox" name="ComboBox1" >
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:4:{s:3:&quot;PRO&quot;;s:13:&quot;PROFESIONALES&quot;;s:3:&quot;TEC&quot;;s:8:&quot;TECNICOS&quot;;s:4:&quot;PREP&quot;;s:12:&quot;PREPARATORIA&quot;;s:3:&quot;SEC&quot;;s:10:&quot;SECUNDARIA&quot;;}]]></property>
    <property name="Left">150</property>
    <property name="Name">ComboBox1</property>
    <property name="ParentColor">0</property>
    <property name="Top">139</property>
    <property name="Width">185</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Descripcion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">347</property>
    <property name="Name">Label9</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">144</property>
    <property name="Width">83</property>
  </object>
  <object class="Edit" name="Edit6" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">438</property>
    <property name="Name">Edit6</property>
    <property name="ParentColor">0</property>
    <property name="Top">136</property>
    <property name="Width">350</property>
  </object>
  <object class="CheckBox" name="CheckBox1" >
    <property name="Caption">Licencia Tipo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">47</property>
    <property name="Name">CheckBox1</property>
    <property name="ParentFont">0</property>
    <property name="Top">192</property>
    <property name="Width">105</property>
  </object>
  <object class="CheckBox" name="CheckBox2" >
    <property name="Caption">Antecedentes no penales</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">269</property>
    <property name="Name">CheckBox2</property>
    <property name="ParentFont">0</property>
    <property name="Top">192</property>
    <property name="Width">176</property>
  </object>
  <object class="CheckBox" name="CheckBox3" >
    <property name="Caption">Otro</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">480</property>
    <property name="Name">CheckBox3</property>
    <property name="ParentFont">0</property>
    <property name="Top">192</property>
    <property name="Width">57</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Documentos Necesarios</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">168</property>
    <property name="Width">140</property>
  </object>
  <object class="Edit" name="Edit7" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">156</property>
    <property name="Name">Edit7</property>
    <property name="ParentColor">0</property>
    <property name="Top">192</property>
    <property name="Width">54</property>
  </object>
  <object class="Edit" name="Edit8" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">540</property>
    <property name="Name">Edit8</property>
    <property name="ParentColor">0</property>
    <property name="Top">192</property>
    <property name="Width">175</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Habilidades</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">80</property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="Height">81</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="Top">240</property>
    <property name="Width">370</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Comentarios</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">405</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">84</property>
  </object>
  <object class="Memo" name="Memo2" >
    <property name="Height">81</property>
    <property name="Left">405</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo2</property>
    <property name="ParentColor">0</property>
    <property name="Top">240</property>
    <property name="Width">371</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Informacion de Candidatos Identificados</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label13</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">328</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">Nombre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label14</property>
    <property name="ParentFont">0</property>
    <property name="Top">360</property>
    <property name="Width">48</property>
  </object>
  <object class="Edit" name="Edit9" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">66</property>
    <property name="Name">Edit9</property>
    <property name="ParentColor">0</property>
    <property name="Top">352</property>
    <property name="Width">422</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Tel:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">495</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">360</property>
    <property name="Width">27</property>
  </object>
  <object class="Edit" name="Edit10" >
    <property name="Height">21</property>
    <property name="Left">529</property>
    <property name="Name">Edit10</property>
    <property name="ParentColor">0</property>
    <property name="Top">352</property>
    <property name="Width">104</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Cel:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">648</property>
    <property name="Name">Label16</property>
    <property name="ParentFont">0</property>
    <property name="Top">360</property>
    <property name="Width">27</property>
  </object>
  <object class="Edit" name="Edit11" >
    <property name="Height">21</property>
    <property name="Left">676</property>
    <property name="Name">Edit11</property>
    <property name="ParentColor">0</property>
    <property name="Top">352</property>
    <property name="Width">112</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">Motivos por los que presenta al candidato</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label17</property>
    <property name="ParentFont">0</property>
    <property name="Top">384</property>
    <property name="Width">240</property>
  </object>
  <object class="Memo" name="Memo3" >
    <property name="Height">49</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo3</property>
    <property name="ParentColor">0</property>
    <property name="Top">400</property>
    <property name="Width">785</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">Equipo y Herramienta de Trabajo</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label18</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">464</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">Equipo y Herramienta</property>
    <property name="Color">C</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label19</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">488</property>
    <property name="Width">147</property>
  </object>
  <object class="Edit" name="Edit12" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">Edit12</property>
    <property name="ParentColor">0</property>
    <property name="Top">504</property>
    <property name="Width">212</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">Accion para obtenerla</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">365</property>
    <property name="Name">Label21</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">488</property>
    <property name="Width">131</property>
  </object>
  <object class="Edit" name="Edit14" >
    <property name="Color">C</property>
    <property name="Height">21</property>
    <property name="Left">365</property>
    <property name="Name">Edit14</property>
    <property name="ParentColor">0</property>
    <property name="Top">504</property>
    <property name="Width">214</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Caption">Fecha:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">591</property>
    <property name="Name">Label22</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">488</property>
    <property name="Width">59</property>
  </object>
  <object class="CheckBox" name="CheckBox4" >
    <property name="Caption">Cuenta con ella</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">237</property>
    <property name="Name">CheckBox4</property>
    <property name="ParentFont">0</property>
    <property name="Top">504</property>
    <property name="Width">120</property>
  </object>
  <object class="DateTimePicker" name="DateTimePicker3" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">591</property>
    <property name="Name">DateTimePicker3</property>
    <property name="Top">508</property>
    <property name="Width">128</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">+</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">728</property>
    <property name="Name">Button1</property>
    <property name="Top">504</property>
    <property name="Width">25</property>
  </object>
  <object class="Label" name="lbdetalle" >
    <property name="Caption">lbdetalle</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">10</property>
    <property name="Name">lbdetalle</property>
    <property name="Top">536</property>
    <property name="Width">772</property>
  </object>
</object>
?>
