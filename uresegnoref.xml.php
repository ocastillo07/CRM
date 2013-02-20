<?php
<object class="uresegnoref" name="uresegnoref" baseclass="page">
  <property name="Background"></property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">792</property>
  <property name="IsMaster">0</property>
  <property name="Name">uresegnoref</property>
  <property name="Width">800</property>
  <property name="OnCreate">uresegnorefCreate</property>
  <property name="OnShow">uresegnorefShow</property>
  <property name="jsOnLoad">uresegnorefJSLoad</property>
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
      <property name="Left">140</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
    <object class="Button" name="btnconfiguracion" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Configuracion</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">550</property>
      <property name="Name">btnconfiguracion</property>
      <property name="ParentColor">0</property>
      <property name="Top">9</property>
      <property name="Width">107</property>
      <property name="OnClick">btnconfiguracionClick</property>
    </object>
  </object>
  <object class="ComboBox" name="cbestatus" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">628</property>
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
    <property name="Left">570</property>
    <property name="Name">Label14</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edfechacreacion" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Left">438</property>
    <property name="Name">edfechacreacion</property>
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
    <property name="Left">88</property>
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
    <property name="Left">628</property>
    <property name="Name">cbplaza</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">86</property>
    <property name="Width">156</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Plaza</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">570</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">94</property>
    <property name="Width">51</property>
  </object>
  <object class="RadioGroup" name="rgprocedencia" >
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">57</property>
    <property name="Items"><![CDATA[a:2:{i:0;s:17:&quot;Orden de Servicio&quot;;i:1;s:9:&quot;Mostrador&quot;;}]]></property>
    <property name="Left">24</property>
    <property name="Name">rgprocedencia</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">126</property>
    <property name="Width">140</property>
    <property name="OnClick">rgprocedenciaClick</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">No. Servicio:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">179</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">126</property>
    <property name="Width">83</property>
  </object>
  <object class="Edit" name="edidservicio" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">288</property>
    <property name="Name">edidservicio</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">122</property>
    <property name="Width">153</property>
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
    <property name="Top">748</property>
    <property name="Width">336</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">190</property>
    <property name="Name">hfestatus</property>
    <property name="Top">94</property>
    <property name="Width">88</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">257</property>
    <property name="Name">hfidnota</property>
    <property name="Top">751</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="lblhistorial" >
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">lblhistorial</property>
    <property name="Top">771</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="lbnotas" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;FONT face=Arial&gt;&lt;STRONG&gt;Comentarios&lt;/STRONG&gt;&lt;/FONT&gt;&lt;/P&gt;]]></property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Color">#0000A0</property>
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">14</property>
    <property name="Hint">Click para agregar nota</property>
    <property name="Left">5</property>
    <property name="Name">lbnotas</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">751</property>
    <property name="Width">237</property>
    <property name="OnClick">lbnotasClick</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Recibo de Caja:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">179</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">154</property>
    <property name="Width">99</property>
  </object>
  <object class="Edit" name="edrecibo" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">288</property>
    <property name="Name">edrecibo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">150</property>
    <property name="Width">153</property>
  </object>
  <object class="Label" name="Label30" >
    <property name="Caption">Etapa 1: Solicitud de No Refacciones</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label30</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">207</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label31" >
    <property name="Caption">Cantidad</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label31</property>
    <property name="ParentFont">0</property>
    <property name="Top">282</property>
    <property name="Width">54</property>
  </object>
  <object class="Edit" name="edcantidad" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edcantidad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">301</property>
    <property name="Width">52</property>
    <property name="jsOnBlur">edcantidadJSBlur</property>
    <property name="jsOnKeyPress">edcantidadJSKeyPress</property>
  </object>
  <object class="Label" name="Label32" >
    <property name="Caption">Precio aceptado por el cliente</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">28</property>
    <property name="Left">484</property>
    <property name="Name">Label32</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">267</property>
    <property name="Width">102</property>
  </object>
  <object class="Edit" name="edprecio" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">492</property>
    <property name="Name">edprecio</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">12</property>
    <property name="Top">301</property>
    <property name="Width">94</property>
    <property name="jsOnBlur">edcantidadJSBlur</property>
    <property name="jsOnKeyPress">edprecioJSKeyPress</property>
  </object>
  <object class="Label" name="Label33" >
    <property name="Caption">Fecha Estimada Recepcion:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">26</property>
    <property name="Left">5</property>
    <property name="Name">Label33</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">330</property>
    <property name="Width">99</property>
  </object>
  <object class="DateTimePicker" name="dtestimada" >
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">5</property>
    <property name="Name">dtestimada</property>
    <property name="Top">363</property>
    <property name="Width">100</property>
  </object>
  <object class="Button" name="btnagregar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">+</property>
    <property name="Height">25</property>
    <property name="Left">764</property>
    <property name="Name">btnagregar</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">15</property>
    <property name="Top">297</property>
    <property name="Width">25</property>
    <property name="jsOnClick">btnagregarJSClick</property>
  </object>
  <object class="Label" name="lbdetalle" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">lbdetalle</property>
    <property name="Top">472</property>
    <property name="Width">784</property>
  </object>
  <object class="HiddenField" name="hfidestatus" >
    <property name="Height">18</property>
    <property name="Left">302</property>
    <property name="Name">hfidestatus</property>
    <property name="Top">94</property>
    <property name="Width">104</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Parte</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">68</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">282</property>
    <property name="Width">60</property>
  </object>
  <object class="Edit" name="edparte" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">68</property>
    <property name="Name">edparte</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">301</property>
    <property name="Width">123</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Descripcion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">200</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">282</property>
    <property name="Width">116</property>
  </object>
  <object class="Edit" name="eddescripcion" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">200</property>
    <property name="Name">eddescripcion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">11</property>
    <property name="Top">301</property>
    <property name="Width">288</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Procedencia:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">94</property>
    <property name="Width">99</property>
  </object>
  <object class="Button" name="btnservicio" >
    <property name="ButtonType">btNormal</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/edit-find32.png</property>
    <property name="Left">447</property>
    <property name="Name">btnservicio</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">118</property>
    <property name="Width">25</property>
    <property name="OnClick">btnservicioClick</property>
  </object>
  <object class="Button" name="btnrecibo" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">btncliente</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/edit-find32.png</property>
    <property name="Left">447</property>
    <property name="Name">btnrecibo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">146</property>
    <property name="Width">25</property>
    <property name="OnClick">btnreciboClick</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">No. Presupuesto:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">485</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">130</property>
    <property name="Width">99</property>
  </object>
  <object class="Edit" name="edpresupuesto" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">593</property>
    <property name="Name">edpresupuesto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">122</property>
    <property name="Width">191</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">No. OC/PRT</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">447</property>
    <property name="Name">Label11</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">343</property>
    <property name="Width">76</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Proveedor</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">115</property>
    <property name="Name">Label12</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">343</property>
    <property name="Width">68</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption"><![CDATA[V&iacute;a de embarque]]></property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">542</property>
    <property name="Name">Label13</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">343</property>
    <property name="Width">116</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption"><![CDATA[No. Gu&iacute;a]]></property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">676</property>
    <property name="Name">Label15</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">343</property>
    <property name="Width">116</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">F.Recepcion</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">114</property>
    <property name="Name">Label17</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">396</property>
    <property name="Width">116</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">Hora Recepcion</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">258</property>
    <property name="Name">Label18</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">396</property>
    <property name="Width">98</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">No. Papeleta/Prefactura</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">484</property>
    <property name="Name">Label19</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">396</property>
    <property name="Width">188</property>
  </object>
  <object class="Edit" name="edocprt" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">446</property>
    <property name="Name">edocprt</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">17</property>
    <property name="Top">359</property>
    <property name="Width">77</property>
  </object>
  <object class="Edit" name="edproveedor" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">118</property>
    <property name="Name">edproveedor</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">16</property>
    <property name="Top">359</property>
    <property name="Width">309</property>
  </object>
  <object class="Edit" name="edvia" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">541</property>
    <property name="Name">edvia</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">18</property>
    <property name="Top">359</property>
    <property name="Width">116</property>
  </object>
  <object class="Edit" name="edguia" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">675</property>
    <property name="Name">edguia</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">19</property>
    <property name="Top">359</property>
    <property name="Width">117</property>
  </object>
  <object class="Edit" name="edpapeleta" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">484</property>
    <property name="Name">edpapeleta</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">22</property>
    <property name="Top">415</property>
    <property name="Width">118</property>
  </object>
  <object class="Edit" name="edhorarep" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">258</property>
    <property name="MaxLength">5</property>
    <property name="Name">edhorarep</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">21</property>
    <property name="Top">415</property>
    <property name="Width">100</property>
  </object>
  <object class="DateTimePicker" name="dtrecepcion" >
    <property name="Caption">dtrecepcion</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">114</property>
    <property name="Name">dtrecepcion</property>
    <property name="Top">419</property>
    <property name="Width">128</property>
  </object>
  <object class="CheckBox" name="cksurtido" >
    <property name="Caption">Recibido</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">8</property>
    <property name="Name">cksurtido</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">20</property>
    <property name="Top">399</property>
    <property name="Width">81</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Importe</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">596</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">282</property>
    <property name="Width">68</property>
  </object>
  <object class="Edit" name="edimporte" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">596</property>
    <property name="Name">edimporte</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">13</property>
    <property name="Top">301</property>
    <property name="Width">89</property>
  </object>
  <object class="HiddenField" name="hfdetalle" >
    <property name="Height">18</property>
    <property name="Left">686</property>
    <property name="Name">hfdetalle</property>
    <property name="Top">410</property>
    <property name="Width">88</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Responsable de Compra:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label16</property>
    <property name="ParentFont">0</property>
    <property name="Top">722</property>
    <property name="Width">150</property>
  </object>
  <object class="Edit" name="edresponsable" >
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">302</property>
    <property name="Name">edresponsable</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">25</property>
    <property name="Top">714</property>
    <property name="Width">493</property>
  </object>
  <object class="Button" name="btnresponsable" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">btncliente</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/edit-find32.png</property>
    <property name="Left">272</property>
    <property name="Name">btnresponsable</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">24</property>
    <property name="Top">710</property>
    <property name="Width">25</property>
    <property name="OnClick">btnresponsableClick</property>
  </object>
  <object class="Edit" name="edidresponsable" >
    <property name="Color">C</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">168</property>
    <property name="Name">edidresponsable</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">23</property>
    <property name="Top">714</property>
    <property name="Width">94</property>
    <property name="jsOnBlur">edidresponsableJSBlur</property>
    <property name="jsOnKeyPress">edidresponsableJSKeyPress</property>
  </object>
  <object class="HiddenField" name="hfidcontador" >
    <property name="Height">18</property>
    <property name="Left">686</property>
    <property name="Name">hfidcontador</property>
    <property name="Top">392</property>
    <property name="Width">100</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption"><![CDATA[Etapa 2: Autorizaci&oacute;n]]></property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label20</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">695</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="lbnotaseg" >
    <property name="Caption"><![CDATA[&lt;SPAN style=&quot;FONT-SIZE: 12pt&quot;&gt;&lt;FONT color=gray size=1 face=Verdana&gt;&lt;SPAN style=&quot;FONT-SIZE: 7.5pt&quot;&gt;&lt;B&gt;....&lt;/B&gt;&lt;/SPAN&gt;&lt;/FONT&gt;&lt;/SPAN&gt;]]></property>
    <property name="Color">#FFD8B0</property>
    <property name="Height">37</property>
    <property name="Left">4</property>
    <property name="Name">lbnotaseg</property>
    <property name="ParentColor">0</property>
    <property name="Top">224</property>
    <property name="Width">785</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">RESUMEN DE PARTES SOLICITADAS</property>
    <property name="Color">#FF8040</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label21</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">447</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Caption">Cargo por Flete</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">26</property>
    <property name="Left">691</property>
    <property name="Name">Label22</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">269</property>
    <property name="Width">58</property>
  </object>
  <object class="Edit" name="edfletes" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case">caNone</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">691</property>
    <property name="MaxLength"></property>
    <property name="Name">edfletes</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">14</property>
    <property name="Top">301</property>
    <property name="Width">65</property>
    <property name="jsOnKeyPress">edfletesJSKeyPress</property>
  </object>
  <object class="Label" name="Label23" >
    <property name="Caption">Orden Compra:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">486</property>
    <property name="Name">Label23</property>
    <property name="ParentFont">0</property>
    <property name="Top">154</property>
    <property name="Width">99</property>
  </object>
  <object class="Upload" name="upload" >
    <property name="Height">20</property>
    <property name="Left">593</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">25</property>
    <property name="Top">149</property>
    <property name="Width">199</property>
  </object>
  <object class="Label" name="lbadjunto" >
    <property name="Caption">...</property>
    <property name="Height">13</property>
    <property name="Left">484</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto</property>
    <property name="ParentColor">0</property>
    <property name="Top">175</property>
    <property name="Width">174</property>
  </object>
  <object class="Label" name="lbeliminar" >
    <property name="Height">13</property>
    <property name="Left">665</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbeliminar</property>
    <property name="ParentColor">0</property>
    <property name="Top">175</property>
    <property name="Width">62</property>
    <property name="OnClick">lbeliminarClick</property>
  </object>
  <object class="Button" name="btnsubir" >
    <property name="Caption">Subir</property>
    <property name="Height">20</property>
    <property name="Left">736</property>
    <property name="Name">btnsubir</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">26</property>
    <property name="Top">174</property>
    <property name="Width">56</property>
    <property name="OnClick">btnsubirClick</property>
  </object>
  <object class="HiddenField" name="hfpath" >
    <property name="Height">18</property>
    <property name="Left">388</property>
    <property name="Name">hfpath</property>
    <property name="Top">175</property>
    <property name="Width">64</property>
  </object>
</object>
?>
