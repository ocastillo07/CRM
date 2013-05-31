<?php
<object class="uclientes" name="uclientes" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Clientes</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Font">
    <property name="Style">fsNormal</property>
  </property>
  <property name="Height">552</property>
  <property name="IsMaster">0</property>
  <property name="Name">uclientes</property>
  <property name="Width">800</property>
  <property name="OnShow">uclientesShow</property>
  <property name="jsOnLoad">uclientesJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfestatus" >
      <property name="Height">18</property>
      <property name="Left">460</property>
      <property name="Name">hfestatus</property>
      <property name="Top">15</property>
      <property name="Value">0</property>
      <property name="Width">124</property>
    </object>
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
      <property name="Left">225</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="btncerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">649</property>
      <property name="Name">btncerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btncerrarClick</property>
    </object>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">Contactos</property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label17</property>
    <property name="Top">448</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Caption">Notas</property>
    <property name="Height">13</property>
    <property name="Left">153</property>
    <property name="Name">Label22</property>
    <property name="Top">448</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="lblcontactos" >
    <property name="Caption">contactos</property>
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Color">#004080</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">11</property>
    <property name="Name">lblcontactos</property>
    <property name="ParentFont">0</property>
    <property name="Top">472</property>
    <property name="Width">101</property>
    <property name="OnClick">lblcontactosClick</property>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario Fecha Hora</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Color">#808080</property>
        <property name="Style">fsNormal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">431</property>
    <property name="Name">lbufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">442</property>
    <property name="Width">336</property>
  </object>
  <object class="HiddenField" name="hfidcontacto" >
    <property name="Height">18</property>
    <property name="Left">12</property>
    <property name="Name">hfidcontacto</property>
    <property name="Top">490</property>
    <property name="Value">0</property>
    <property name="Width">80</property>
  </object>
  <object class="Label" name="lblnotas" >
    <property name="Caption">Notas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Color">#004080</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">153</property>
    <property name="Name">lblnotas</property>
    <property name="ParentFont">0</property>
    <property name="Top">472</property>
    <property name="Width">262</property>
    <property name="OnClick">lblnotasClick</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">153</property>
    <property name="Name">hfidnota</property>
    <property name="Top">493</property>
    <property name="Value">0</property>
    <property name="Width">56</property>
  </object>
  <object class="Label" name="lblcamiones" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Style">fsNormal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">419</property>
    <property name="Name">lblcamiones</property>
    <property name="Top">498</property>
    <property name="Width">165</property>
  </object>
  <object class="Label" name="lblmodcamiones" >
    <property name="Caption">Parque Vehicular</property>
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crText</property>
    <property name="Font">
        <property name="Color">#004080</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">419</property>
    <property name="Name">lblmodcamiones</property>
    <property name="ParentFont">0</property>
    <property name="Top">462</property>
    <property name="Width">158</property>
  </object>
  <object class="Label" name="Label32" >
    <property name="Caption">Cliente No.</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">12</property>
    <property name="Name">Label32</property>
    <property name="ParentColor">0</property>
    <property name="Top">77</property>
    <property name="Width">99</property>
  </object>
  <object class="HiddenField" name="hfnombre" >
    <property name="Height">18</property>
    <property name="Layer">Venta</property>
    <property name="Left">146</property>
    <property name="Name">hfnombre</property>
    <property name="Top">72</property>
    <property name="Width">80</property>
  </object>
  <object class="Edit" name="edidcliente" >
    <property name="Height">22</property>
    <property name="Layer">Venta</property>
    <property name="Left">12</property>
    <property name="Name">edidcliente</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">98</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Nombre Comercial</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">12</property>
    <property name="Name">Label9</property>
    <property name="ParentColor">0</property>
    <property name="Top">128</property>
    <property name="Width">111</property>
  </object>
  <object class="Edit" name="Ednomcomercial" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">12</property>
    <property name="Name">Ednomcomercial</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">144</property>
    <property name="Width">755</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption"><![CDATA[Raz&oacute;n Social]]></property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">12</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">169</property>
    <property name="Width">119</property>
  </object>
  <object class="Edit" name="Edrsocial" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">13</property>
    <property name="Name">Edrsocial</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">184</property>
    <property name="Width">754</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Nombre</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">12</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="Top">209</property>
    <property name="Width">56</property>
  </object>
  <object class="Edit" name="Ednombre" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">12</property>
    <property name="Name">Ednombre</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">225</property>
    <property name="Width">355</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Calle</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">12</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="Top">251</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="Eddir" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">12</property>
    <property name="Name">Eddir</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">267</property>
    <property name="Width">292</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Colonia</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">11</property>
    <property name="Name">Label7</property>
    <property name="ParentColor">0</property>
    <property name="Top">295</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption"><![CDATA[&lt;P&gt;CP&lt;/P&gt;]]></property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">307</property>
    <property name="Name">Label10</property>
    <property name="ParentColor">0</property>
    <property name="Top">295</property>
    <property name="Width">62</property>
  </object>
  <object class="Edit" name="edcp" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">307</property>
    <property name="MaxLength">5</property>
    <property name="Name">edcp</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">13</property>
    <property name="Top">310</property>
    <property name="Width">60</property>
    <property name="jsOnKeyPress">edcpJSKeyPress</property>
  </object>
  <object class="ComboBox" name="cbsector" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Layer">Venta</property>
    <property name="Left">377</property>
    <property name="Name">cbsector</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">14</property>
    <property name="Top">310</property>
    <property name="Width">190</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Sector</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">377</property>
    <property name="Name">Label8</property>
    <property name="ParentColor">0</property>
    <property name="Top">295</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Vendedor de Camiones</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">431</property>
    <property name="Name">Label15</property>
    <property name="ParentColor">0</property>
    <property name="Top">340</property>
    <property name="Width">144</property>
  </object>
  <object class="ComboBox" name="cbvendcam" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Layer">Venta</property>
    <property name="Left">431</property>
    <property name="Name">cbvendcam</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">19</property>
    <property name="Top">356</property>
    <property name="Width">144</property>
  </object>
  <object class="ComboBox" name="cbvendref" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Layer">Venta</property>
    <property name="Left">605</property>
    <property name="Name">cbvendref</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">20</property>
    <property name="Top">356</property>
    <property name="Width">162</property>
  </object>
  <object class="Label" name="Label23" >
    <property name="Caption">Vendedor de Refacciones</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">605</property>
    <property name="Name">Label23</property>
    <property name="ParentColor">0</property>
    <property name="Top">340</property>
    <property name="Width">151</property>
  </object>
  <object class="Edit" name="edrfc" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">577</property>
    <property name="MaxLength">13</property>
    <property name="Name">edrfc</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">15</property>
    <property name="Top">310</property>
    <property name="Width">100</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">RFC</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">577</property>
    <property name="Name">Label14</property>
    <property name="ParentColor">0</property>
    <property name="Top">295</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Municipio</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">577</property>
    <property name="Name">Label11</property>
    <property name="ParentColor">0</property>
    <property name="Top">251</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Estado</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">377</property>
    <property name="Name">Label12</property>
    <property name="ParentColor">0</property>
    <property name="Top">251</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edestado" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">377</property>
    <property name="Name">edestado</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">267</property>
    <property name="Width">190</property>
  </object>
  <object class="Edit" name="Ednumero" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">307</property>
    <property name="Name">Ednumero</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">267</property>
    <property name="Width">60</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption"><![CDATA[N&uacute;mero]]></property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">307</property>
    <property name="Name">Label6</property>
    <property name="ParentColor">0</property>
    <property name="Top">251</property>
    <property name="Width">59</property>
  </object>
  <object class="Edit" name="Edapaterno" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">377</property>
    <property name="Name">Edapaterno</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">225</property>
    <property name="Width">190</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Ap. Paterno</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">377</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="Top">209</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Ap. Materno</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">577</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">209</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="Edamaterno" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">577</property>
    <property name="Name">Edamaterno</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">225</property>
    <property name="Width">190</property>
  </object>
  <object class="Edit" name="edidgds" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">390</property>
    <property name="Name">edidgds</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">97</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption">IDgds</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">390</property>
    <property name="Name">Label20</property>
    <property name="ParentColor">0</property>
    <property name="Top">77</property>
    <property name="Width">42</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Estatus</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">519</property>
    <property name="Name">Label13</property>
    <property name="ParentColor">0</property>
    <property name="Top">77</property>
    <property name="Width">56</property>
  </object>
  <object class="ComboBox" name="cbestatus" >
    <property name="Height">23</property>
    <property name="Items">a:0:{}</property>
    <property name="Layer">Venta</property>
    <property name="Left">519</property>
    <property name="Name">cbestatus</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">97</property>
    <property name="Width">160</property>
  </object>
  <object class="Label" name="Label33" >
    <property name="Caption">Persona</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">708</property>
    <property name="Name">Label33</property>
    <property name="ParentColor">0</property>
    <property name="Top">59</property>
    <property name="Width">51</property>
  </object>
  <object class="RadioGroup" name="rgpersona" >
    <property name="Height">50</property>
    <property name="Items"><![CDATA[a:2:{i:0;s:6:&quot;Fisica&quot;;i:1;s:5:&quot;Moral&quot;;}]]></property>
    <property name="Layer">Venta</property>
    <property name="Left">708</property>
    <property name="Name">rgpersona</property>
    <property name="ParentColor">0</property>
    <property name="Top">83</property>
    <property name="Width">59</property>
    <property name="OnClick">rgpersonaClick</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Telefono Oficina</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">13</property>
    <property name="Name">Label16</property>
    <property name="ParentColor">0</property>
    <property name="Top">340</property>
    <property name="Width">120</property>
  </object>
  <object class="Edit" name="edtelefono" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">13</property>
    <property name="Name">edtelefono</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">16</property>
    <property name="Top">356</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="edfax" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">149</property>
    <property name="Name">edfax</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">17</property>
    <property name="Top">356</property>
    <property name="Width">120</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">Fax</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">149</property>
    <property name="Name">Label18</property>
    <property name="ParentColor">0</property>
    <property name="Top">340</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">Fecha Alta</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">280</property>
    <property name="Name">Label19</property>
    <property name="Top">77</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edfechaalta" >
    <property name="Height">21</property>
    <property name="Left">279</property>
    <property name="Name">edfechaalta</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">97</property>
    <property name="Width">101</property>
  </object>
  <object class="Label" name="lblparque" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">419</property>
    <property name="Name">lblparque</property>
    <property name="Top">482</property>
    <property name="Width">183</property>
  </object>
  <object class="Edit" name="edcorreo" >
    <property name="Height">21</property>
    <property name="Layer">Venta</property>
    <property name="Left">280</property>
    <property name="Name">edcorreo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">18</property>
    <property name="Top">356</property>
    <property name="Width">142</property>
  </object>
  <object class="Label" name="Label24" >
    <property name="Caption">Correo</property>
    <property name="Height">13</property>
    <property name="Layer">Venta</property>
    <property name="Left">280</property>
    <property name="Name">Label24</property>
    <property name="ParentColor">0</property>
    <property name="Top">340</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="lblgrupos" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Style">fsNormal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">616</property>
    <property name="Name">lblgrupos</property>
    <property name="Top">496</property>
    <property name="Width">165</property>
  </object>
  <object class="Label" name="Label26" >
    <property name="Caption">Grupos</property>
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crText</property>
    <property name="Font">
        <property name="Color">#004080</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">616</property>
    <property name="Name">Label26</property>
    <property name="ParentFont">0</property>
    <property name="Top">462</property>
    <property name="Width">151</property>
  </object>
  <object class="Label" name="lblufhgrupos" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">15</property>
    <property name="Left">616</property>
    <property name="Name">lblufhgrupos</property>
    <property name="Top">480</property>
    <property name="Width">103</property>
  </object>
  <object class="HiddenField" name="hfcount" >
    <property name="Height">18</property>
    <property name="Left">616</property>
    <property name="Name">hfcount</property>
    <property name="Top">520</property>
    <property name="Width">72</property>
  </object>
  <object class="Edit" name="edmunicipio" >
    <property name="Height">21</property>
    <property name="Left">577</property>
    <property name="Name">edmunicipio</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="Top">267</property>
    <property name="Width">182</property>
  </object>
  <object class="Edit" name="edcolonia" >
    <property name="Height">21</property>
    <property name="Left">11</property>
    <property name="Name">edcolonia</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">12</property>
    <property name="Top">310</property>
    <property name="Width">293</property>
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
  <object class="Upload" name="upload" >
    <property name="Height">21</property>
    <property name="Layer">Adjunto</property>
    <property name="Left">13</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="Top">385</property>
    <property name="Width">468</property>
  </object>
  <object class="Button" name="btnupload" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Subir Archivo</property>
    <property name="Height">25</property>
    <property name="Layer">Adjunto</property>
    <property name="Left">487</property>
    <property name="Name">btnupload</property>
    <property name="ParentColor">0</property>
    <property name="Top">381</property>
    <property name="Width">88</property>
    <property name="OnClick">btnuploadClick</property>
  </object>
  <object class="Label" name="lbadjunto" >
    <property name="Height">13</property>
    <property name="Layer">Adjunto</property>
    <property name="Left">13</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto</property>
    <property name="ParentColor">0</property>
    <property name="Top">409</property>
    <property name="Width">484</property>
  </object>
  <object class="Label" name="lbadjunto2" >
    <property name="Height">13</property>
    <property name="Layer">Adjunto</property>
    <property name="Left">13</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto2</property>
    <property name="ParentColor">0</property>
    <property name="Top">423</property>
    <property name="Width">485</property>
  </object>
  <object class="Label" name="lbeliminar1" >
    <property name="Height">13</property>
    <property name="Layer">Adjunto</property>
    <property name="Left">527</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbeliminar1</property>
    <property name="ParentColor">0</property>
    <property name="Top">409</property>
    <property name="Width">50</property>
    <property name="OnClick">lbeliminar1Click</property>
  </object>
  <object class="Label" name="lbeliminar2" >
    <property name="Height">13</property>
    <property name="Layer">Adjunto</property>
    <property name="Left">527</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbeliminar2</property>
    <property name="ParentColor">0</property>
    <property name="Top">423</property>
    <property name="Width">50</property>
    <property name="OnClick">lbeliminar2Click</property>
  </object>
  <object class="HiddenField" name="hfpath" >
    <property name="Height">18</property>
    <property name="Left">592</property>
    <property name="Name">hfpath</property>
    <property name="Top">404</property>
    <property name="Width">72</property>
  </object>
  <object class="HiddenField" name="hfpath2" >
    <property name="Height">18</property>
    <property name="Left">592</property>
    <property name="Name">hfpath2</property>
    <property name="Top">423</property>
    <property name="Width">72</property>
  </object>
  <object class="HiddenField" name="hfderechonotas" >
    <property name="Height">18</property>
    <property name="Left">225</property>
    <property name="Name">hfderechonotas</property>
    <property name="Top">493</property>
    <property name="Value">0</property>
    <property name="Width">56</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">244</property>
        <property name="Top">98</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLQuery" name="sqlgen2" >
        <property name="Left">209</property>
        <property name="Top">96</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLTable" name="tblclientes" >
        <property name="Left">172</property>
        <property name="Top">97</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields"><![CDATA[a:1:{s:13:&quot;idoportunidad&quot;;s:1:&quot;0&quot;;}]]></property>
    <property name="MasterSource"></property>
    <property name="Name">tblclientes</property>
    <property name="TableName">clientes</property>
  </object>
</object>
?>
