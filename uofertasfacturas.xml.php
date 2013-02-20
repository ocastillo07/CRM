<?php
<object class="uofertasfacturas" name="uofertasfacturas" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">OfertasFacturas</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">808</property>
  <property name="IsMaster">0</property>
  <property name="Name">uofertasfacturas</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">uofertasfacturasShow</property>
  <object class="Panel" name="pfacturacion" >
    <property name="BorderWidth">1</property>
    <property name="Height">183</property>
    <property name="Name">pfacturacion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">65</property>
    <property name="Width">800</property>
    <object class="Label" name="IdOferta" >
      <property name="Caption">Nombre Fiscal</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">IdOferta</property>
      <property name="ParentColor">0</property>
      <property name="Top">12</property>
      <property name="Width">86</property>
    </object>
    <object class="Label" name="Cliente" >
      <property name="Cached"></property>
      <property name="Caption">Calle</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Cliente</property>
      <property name="ParentColor">0</property>
      <property name="Top">84</property>
      <property name="Width">51</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">CP</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label3</property>
      <property name="Top">161</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Colonia</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="Top">109</property>
      <property name="Width">54</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Telefono (incluir Area)</property>
      <property name="Height">13</property>
      <property name="Left">354</property>
      <property name="Name">Label7</property>
      <property name="Top">161</property>
      <property name="Width">130</property>
    </object>
    <object class="Edit" name="ednombre" >
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">ednombre</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">1</property>
      <property name="Top">4</property>
      <property name="Width">660</property>
    </object>
    <object class="Edit" name="edcolonia" >
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edcolonia</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">5</property>
      <property name="Top">101</property>
      <property name="Width">660</property>
    </object>
    <object class="Edit" name="edciudad" >
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edciudad</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">6</property>
      <property name="Top">127</property>
      <property name="Width">275</property>
    </object>
    <object class="Edit" name="edcp" >
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edcp</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">8</property>
      <property name="Top">153</property>
      <property name="Width">222</property>
    </object>
    <object class="Label" name="Label24" >
      <property name="Caption">Ciudad</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label24</property>
      <property name="ParentColor">0</property>
      <property name="Top">135</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label25" >
      <property name="Caption">Estado</property>
      <property name="Height">13</property>
      <property name="Left">397</property>
      <property name="Name">Label25</property>
      <property name="ParentColor">0</property>
      <property name="Top">135</property>
      <property name="Width">58</property>
    </object>
    <object class="Label" name="Label26" >
      <property name="Caption">RFC</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label26</property>
      <property name="ParentColor">0</property>
      <property name="Top">37</property>
      <property name="Width">79</property>
    </object>
    <object class="Edit" name="edtelefono" >
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">493</property>
      <property name="Name">edtelefono</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">9</property>
      <property name="Top">153</property>
      <property name="Width">278</property>
    </object>
    <object class="Edit" name="edestado" >
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">493</property>
      <property name="Name">edestado</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">7</property>
      <property name="Top">127</property>
      <property name="Width">278</property>
    </object>
    <object class="Edit" name="edcalle" >
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edcalle</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">3</property>
      <property name="Top">76</property>
      <property name="Width">491</property>
    </object>
    <object class="Label" name="Label27" >
      <property name="Caption"><![CDATA[Direcci&oacute;n Fiscal]]></property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label27</property>
      <property name="ParentColor">0</property>
      <property name="Top">60</property>
      <property name="Width">87</property>
    </object>
    <object class="Edit" name="edrfc" >
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edrfc</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">2</property>
      <property name="Top">29</property>
      <property name="Width">660</property>
    </object>
    <object class="Edit" name="ednumero" >
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">677</property>
      <property name="Name">ednumero</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">4</property>
      <property name="Top">76</property>
      <property name="Width">94</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Cached"></property>
      <property name="Caption">Numero</property>
      <property name="Height">13</property>
      <property name="Left">616</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="Top">84</property>
      <property name="Width">51</property>
    </object>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">50</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">650</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">27</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
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
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Datos Facturacion&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">50</property>
    <property name="Width">147</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">333</property>
    <property name="Name">hfidnota</property>
    <property name="Top">16</property>
    <property name="Width">96</property>
  </object>
  <object class="HiddenField" name="hfidoferta" >
    <property name="Height">18</property>
    <property name="Left">437</property>
    <property name="Name">hfidoferta</property>
    <property name="Top">16</property>
    <property name="Width">96</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Datos Unidad&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">250</property>
    <property name="Width">99</property>
  </object>
  <object class="Panel" name="punidad" >
    <property name="BorderWidth">1</property>
    <property name="Height">153</property>
    <property name="Name">punidad</property>
    <property name="ParentColor">0</property>
    <property name="Top">267</property>
    <property name="Width">799</property>
    <object class="Label" name="Label6" >
      <property name="Caption">VIN (cuando aplique)</property>
      <property name="Height">26</property>
      <property name="Left">15</property>
      <property name="Name">Label6</property>
      <property name="Top">6</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">No. Cotizacion Especialista</property>
      <property name="Height">23</property>
      <property name="Left">15</property>
      <property name="Name">Label8</property>
      <property name="Top">40</property>
      <property name="Width">91</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption"><![CDATA[Condici&oacute;n especial (sujeto a Autorizaci&oacute;n)]]></property>
      <property name="Height">44</property>
      <property name="Left">16</property>
      <property name="Name">Label9</property>
      <property name="Top">72</property>
      <property name="Width">91</property>
    </object>
    <object class="Edit" name="edvin" >
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edvin</property>
      <property name="TabOrder">10</property>
      <property name="Top">11</property>
      <property name="Width">389</property>
    </object>
    <object class="Edit" name="edcotizacion" >
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edcotizacion</property>
      <property name="TabOrder">11</property>
      <property name="Top">42</property>
      <property name="Width">389</property>
    </object>
    <object class="Memo" name="mcondicion" >
      <property name="Height">72</property>
      <property name="Left">111</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mcondicion</property>
      <property name="TabOrder">12</property>
      <property name="Top">68</property>
      <property name="Width">660</property>
    </object>
  </object>
  <object class="Panel" name="paliado" >
    <property name="BorderWidth">1</property>
    <property name="Cached"></property>
    <property name="Height">89</property>
    <property name="Name">paliado</property>
    <property name="ParentColor">0</property>
    <property name="Top">438</property>
    <property name="Width">800</property>
    <object class="Label" name="Label11" >
      <property name="Caption">Tipo</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label11</property>
      <property name="Top">10</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Caption">Factura</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label12</property>
      <property name="Top">34</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Caption">Proveedor (Nombre Fiscal)</property>
      <property name="Height">25</property>
      <property name="Left">15</property>
      <property name="Name">Label13</property>
      <property name="Top">57</property>
      <property name="Width">91</property>
    </object>
    <object class="Edit" name="edtipo" >
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edtipo</property>
      <property name="TabOrder">13</property>
      <property name="Top">2</property>
      <property name="Width">401</property>
    </object>
    <object class="Edit" name="edfactura" >
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edfactura</property>
      <property name="TabOrder">14</property>
      <property name="Top">26</property>
      <property name="Width">401</property>
    </object>
    <object class="Edit" name="edproveedor" >
      <property name="Height">21</property>
      <property name="Left">111</property>
      <property name="Name">edproveedor</property>
      <property name="TabOrder">15</property>
      <property name="Top">54</property>
      <property name="Width">401</property>
    </object>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Datos De Equipo Aliado (Cuando Aplique&lt;/STRONG&gt;&lt;STRONG&gt;)&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label10</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">423</property>
    <property name="Width">283</property>
  </object>
  <object class="Panel" name="poperacion" >
    <property name="BorderWidth">1</property>
    <property name="Height">177</property>
    <property name="Name">poperacion</property>
    <property name="ParentColor">0</property>
    <property name="Top">544</property>
    <property name="Width">799</property>
    <object class="Label" name="Label15" >
      <property name="Caption">Fecha Deposito</property>
      <property name="Height">13</property>
      <property name="Left">15</property>
      <property name="Name">Label15</property>
      <property name="Top">13</property>
      <property name="Width">91</property>
    </object>
    <object class="Label" name="Label16" >
      <property name="Caption">Fecha Transferencia</property>
      <property name="Height">24</property>
      <property name="Left">16</property>
      <property name="Name">Label16</property>
      <property name="Top">30</property>
      <property name="Width">83</property>
    </object>
    <object class="Label" name="Label17" >
      <property name="Caption">No. Recibo Caja</property>
      <property name="Height">13</property>
      <property name="Left">347</property>
      <property name="Name">Label17</property>
      <property name="Top">11</property>
      <property name="Width">96</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Caption">Banco</property>
      <property name="Height">13</property>
      <property name="Left">347</property>
      <property name="Name">Label18</property>
      <property name="Top">39</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="edrecibo" >
      <property name="Height">21</property>
      <property name="Left">451</property>
      <property name="Name">edrecibo</property>
      <property name="TabOrder">16</property>
      <property name="Top">3</property>
      <property name="Width">118</property>
    </object>
    <object class="Edit" name="edbanco" >
      <property name="Height">21</property>
      <property name="Left">451</property>
      <property name="Name">edbanco</property>
      <property name="TabOrder">17</property>
      <property name="Top">31</property>
      <property name="Width">118</property>
    </object>
    <object class="CheckBox" name="chkcarta" >
      <property name="Caption">CARTA COMPROMISO</property>
      <property name="Height">21</property>
      <property name="Left">16</property>
      <property name="Name">chkcarta</property>
      <property name="TabOrder">18</property>
      <property name="Top">78</property>
      <property name="Width">165</property>
    </object>
    <object class="CheckBox" name="chkcotizacion" >
      <property name="Caption">COTIZACION</property>
      <property name="Height">21</property>
      <property name="Left">16</property>
      <property name="Name">chkcotizacion</property>
      <property name="TabOrder">19</property>
      <property name="Top">104</property>
      <property name="Width">121</property>
    </object>
    <object class="CheckBox" name="chkconfiguracion" >
      <property name="Caption">CONFIGURACION</property>
      <property name="Height">21</property>
      <property name="Left">16</property>
      <property name="Name">chkconfiguracion</property>
      <property name="TabOrder">20</property>
      <property name="Top">136</property>
      <property name="Width">137</property>
    </object>
    <object class="CheckBox" name="chkcorrida" >
      <property name="Caption">CORRIDA FINANCIERA</property>
      <property name="Height">17</property>
      <property name="Left">272</property>
      <property name="Name">chkcorrida</property>
      <property name="TabOrder">21</property>
      <property name="Top">78</property>
      <property name="Width">193</property>
    </object>
    <object class="CheckBox" name="chkfondeo" >
      <property name="Caption">CARTA DE AUTORIZACION DE LA FUENTE DE FONDEO</property>
      <property name="Height">21</property>
      <property name="Left">272</property>
      <property name="Name">chkfondeo</property>
      <property name="TabOrder">22</property>
      <property name="Top">104</property>
      <property name="Width">322</property>
    </object>
    <object class="CheckBox" name="chkotros" >
      <property name="Caption">OTROS (ESPECIFIQUE)</property>
      <property name="Height">21</property>
      <property name="Left">272</property>
      <property name="Name">chkotros</property>
      <property name="TabOrder">23</property>
      <property name="Top">136</property>
      <property name="Width">157</property>
    </object>
    <object class="Edit" name="edotros" >
      <property name="Height">21</property>
      <property name="Left">442</property>
      <property name="Name">edotros</property>
      <property name="TabOrder">24</property>
      <property name="Top">136</property>
      <property name="Width">329</property>
    </object>
    <object class="DateTimePicker" name="dtdeposito" >
      <property name="Caption">dtdeposito</property>
      <property name="Height">19</property>
      <property name="IfFormat">%Y-%m-%d</property>
      <property name="Left">111</property>
      <property name="Name">dtdeposito</property>
      <property name="ShowsTime">0</property>
      <property name="Top">5</property>
      <property name="Width">200</property>
    </object>
    <object class="DateTimePicker" name="dttrans" >
      <property name="Caption">dttrans</property>
      <property name="Height">19</property>
      <property name="IfFormat">%Y-%m-%d</property>
      <property name="Left">111</property>
      <property name="Name">dttrans</property>
      <property name="ShowsTime">0</property>
      <property name="Top">33</property>
      <property name="Width">200</property>
    </object>
    <object class="Label" name="Label19" >
      <property name="Caption"><![CDATA[Favor de indicar documentos generados, los cuales deberan ser enviados como soporte para el Pedido/Facturaci&oacute;n de la Unidad]]></property>
      <property name="Font">
            <property name="Weight">bold</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">18</property>
      <property name="Name">Label19</property>
      <property name="ParentFont">0</property>
      <property name="Top">61</property>
      <property name="Width">763</property>
    </object>
    <object class="Label" name="Label20" >
      <property name="Caption"><![CDATA[&lt;P&gt;Toda documentaci&oacute;n debera ser autorizada por el cliente antes de envio a Administraci&oacute;n de Ventas&lt;/P&gt;]]></property>
      <property name="Font">
            <property name="Weight">bold</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">18</property>
      <property name="Name">Label20</property>
      <property name="ParentFont">0</property>
      <property name="Top">160</property>
      <property name="Width">755</property>
    </object>
    <object class="ComboBox" name="cboiva" >
      <property name="Height">21</property>
      <property name="Items"><![CDATA[a:2:{i:1;s:2:&quot;10&quot;;i:2;s:2:&quot;15&quot;;}]]></property>
      <property name="Left">696</property>
      <property name="Name">cboiva</property>
      <property name="Top">5</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label21" >
      <property name="Caption">% IVA</property>
      <property name="Height">13</property>
      <property name="Left">650</property>
      <property name="Name">Label21</property>
      <property name="Top">9</property>
      <property name="Width">42</property>
    </object>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Anticipos&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label14</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">529</property>
    <property name="Width">179</property>
  </object>
  <object class="Label" name="lbnotas" >
    <property name="Caption"><![CDATA[&lt;STRONG&gt;NOTAS&lt;/STRONG&gt;]]></property>
    <property name="Cursor">crPointer</property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">lbnotas</property>
    <property name="ParentColor">0</property>
    <property name="Top">725</property>
    <property name="Width">75</property>
  </object>
  <object class="Memo" name="mnotas" >
    <property name="Height">60</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mnotas</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">25</property>
    <property name="Top">740</property>
    <property name="Width">799</property>
  </object>
  <object class="HiddenField" name="hfidrevision" >
    <property name="Height">18</property>
    <property name="Left">240</property>
    <property name="Name">hfidrevision</property>
    <property name="Top">15</property>
    <property name="Width">93</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">375</property>
    <property name="Name">hfestatus</property>
    <property name="Top">48</property>
    <property name="Width">80</property>
  </object>
  <object class="MySQLTable" name="tbofertasfacturas" >
        <property name="Left">631</property>
        <property name="Top">5</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbofertasfacturas</property>
    <property name="TableName">ofertasfacturas</property>
  </object>
  <object class="Datasource" name="dsofertasfacturas" >
        <property name="Left">544</property>
        <property name="Top">5</property>
    <property name="DataSet">tbofertasfacturas</property>
    <property name="Name">dsofertasfacturas</property>
  </object>
</object>
?>
