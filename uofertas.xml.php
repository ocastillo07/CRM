<?php
<object class="uofertas" name="uofertas" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Ofertas</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">714</property>
  <property name="IsMaster">0</property>
  <property name="Name">uofertas</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnCreate">uofertasCreate</property>
  <property name="OnShow">uofertasShow</property>
  <object class="Panel" name="datosprincipales" >
    <property name="Color">#C0C0C0</property>
    <property name="Height">159</property>
    <property name="Name">datosprincipales</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">65</property>
    <property name="Width">800</property>
    <object class="Label" name="IdOferta" >
      <property name="Caption">IdOferta</property>
      <property name="Height">13</property>
      <property name="Left">4</property>
      <property name="Name">IdOferta</property>
      <property name="Top">12</property>
      <property name="Width">54</property>
    </object>
    <object class="Label" name="Cliente" >
      <property name="Caption">Cliente</property>
      <property name="Height">13</property>
      <property name="Left">4</property>
      <property name="Name">Cliente</property>
      <property name="Top">60</property>
      <property name="Width">51</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Tipo Camion</property>
      <property name="Height">13</property>
      <property name="Left">441</property>
      <property name="Name">Label3</property>
      <property name="Top">85</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Modelo</property>
      <property name="Height">13</property>
      <property name="Left">4</property>
      <property name="Name">Label4</property>
      <property name="Top">85</property>
      <property name="Width">54</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">IdRevision</property>
      <property name="Height">13</property>
      <property name="Left">192</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="Top">12</property>
      <property name="Width">64</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption"># Camiones</property>
      <property name="Height">13</property>
      <property name="Left">664</property>
      <property name="Name">Label7</property>
      <property name="Top">85</property>
      <property name="Width">74</property>
    </object>
    <object class="Edit" name="edoferta" >
      <property name="Font">
            <property name="Align">taRight</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">72</property>
      <property name="Name">edoferta</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder"></property>
      <property name="Top">4</property>
      <property name="Width">113</property>
    </object>
    <object class="Edit" name="edcliente" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Height">21</property>
      <property name="Left">72</property>
      <property name="Name">edcliente</property>
      <property name="ParentColor">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">1</property>
      <property name="Top">52</property>
      <property name="Width">690</property>
    </object>
    <object class="Edit" name="edmodelo" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Height">21</property>
      <property name="Left">72</property>
      <property name="Name">edmodelo</property>
      <property name="ParentColor">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">2</property>
      <property name="Top">77</property>
      <property name="Width">326</property>
    </object>
    <object class="Edit" name="edrevision" >
      <property name="Font">
            <property name="Align">taRight</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">259</property>
      <property name="Name">edrevision</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabStop">0</property>
      <property name="Top">4</property>
      <property name="Width">26</property>
    </object>
    <object class="Edit" name="edcantcamiones" >
      <property name="Font">
            <property name="Align">taRight</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">740</property>
      <property name="Name">edcantcamiones</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">4</property>
      <property name="Top">77</property>
      <property name="Width">54</property>
      <property name="jsOnKeyPress">edcantcamionesJSKeyPress</property>
    </object>
    <object class="Button" name="btnbuscarcli" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Buscar</property>
      <property name="Height">21</property>
      <property name="Hint">Click para Buscar un Cliente</property>
      <property name="ImageSource">imagenes/edit-find22.png</property>
      <property name="Left">766</property>
      <property name="Name">btnbuscarcli</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="TabOrder">1</property>
      <property name="Top">52</property>
      <property name="Width">21</property>
      <property name="OnClick">btnbuscarcliClick</property>
    </object>
    <object class="Button" name="btnbuscarmodelo" >
      <property name="Caption">Busca</property>
      <property name="Height">21</property>
      <property name="Hint">Click para Buscar un Modelo de Camion</property>
      <property name="ImageSource">imagenes/edit-find22.png</property>
      <property name="Left">406</property>
      <property name="Name">btnbuscarmodelo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="TabOrder">2</property>
      <property name="Top">77</property>
      <property name="Width">21</property>
      <property name="OnClick">btnbuscarmodeloJSClick</property>
    </object>
    <object class="Label" name="Label24" >
      <property name="Caption"><![CDATA[A&ntilde;o]]></property>
      <property name="Height">13</property>
      <property name="Left">4</property>
      <property name="Name">Label24</property>
      <property name="Top">134</property>
      <property name="Width">40</property>
    </object>
    <object class="Label" name="Label25" >
      <property name="Caption">Color</property>
      <property name="Color">#C0C0C0</property>
      <property name="Height">13</property>
      <property name="Left">290</property>
      <property name="Name">Label25</property>
      <property name="Top">134</property>
      <property name="Width">42</property>
    </object>
    <object class="Label" name="Label26" >
      <property name="Caption">Tiempo de Entrega (Semanas)</property>
      <property name="Height">13</property>
      <property name="Left">488</property>
      <property name="Name">Label26</property>
      <property name="Top">134</property>
      <property name="Width">183</property>
    </object>
    <object class="Edit" name="edano" >
      <property name="Font">
            <property name="Align">taRight</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">72</property>
      <property name="Name">edano</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">5</property>
      <property name="Top">126</property>
      <property name="Width">126</property>
      <property name="jsOnKeyPress">edanoJSKeyPress</property>
    </object>
    <object class="Edit" name="edcolor" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Height">21</property>
      <property name="Left">336</property>
      <property name="Name">edcolor</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">6</property>
      <property name="Top">126</property>
      <property name="Width">127</property>
    </object>
    <object class="Edit" name="edtiempoent" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">676</property>
      <property name="Name">edtiempoent</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">7</property>
      <property name="Top">126</property>
      <property name="Width">118</property>
      <property name="jsOnKeyPress">edtiempoentJSKeyPress</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Plaza</property>
      <property name="Height">13</property>
      <property name="Left">290</property>
      <property name="Name">Label6</property>
      <property name="Top">12</property>
      <property name="Width">32</property>
    </object>
    <object class="Edit" name="edplaza" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">325</property>
      <property name="Name">edplaza</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabStop">0</property>
      <property name="Top">4</property>
      <property name="Width">105</property>
    </object>
    <object class="Edit" name="edvendedor" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">72</property>
      <property name="Name">edvendedor</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabStop">0</property>
      <property name="Top">28</property>
      <property name="Width">358</property>
    </object>
    <object class="Label" name="Label27" >
      <property name="Caption">Vendedor</property>
      <property name="Height">13</property>
      <property name="Left">3</property>
      <property name="Name">Label27</property>
      <property name="Top">36</property>
      <property name="Width">55</property>
    </object>
    <object class="Label" name="Label29" >
      <property name="Caption">Estatus</property>
      <property name="Height">13</property>
      <property name="Left">444</property>
      <property name="Name">Label29</property>
      <property name="Top">12</property>
      <property name="Width">43</property>
    </object>
    <object class="Edit" name="edfase" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">656</property>
      <property name="Name">edfase</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabStop">0</property>
      <property name="Top">4</property>
      <property name="Width">137</property>
    </object>
    <object class="Label" name="Label31" >
      <property name="Caption">Fase</property>
      <property name="Color">#C0C0C0</property>
      <property name="Height">13</property>
      <property name="Left">619</property>
      <property name="Name">Label31</property>
      <property name="Top">12</property>
      <property name="Width">35</property>
    </object>
    <object class="Edit" name="edtipocamion" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Height">21</property>
      <property name="Left">521</property>
      <property name="Name">edtipocamion</property>
      <property name="ParentColor">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">3</property>
      <property name="Top">77</property>
      <property name="Width">136</property>
    </object>
    <object class="Edit" name="edfechacreacion" >
      <property name="Font">
            <property name="Align">taLeft</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">656</property>
      <property name="Name">edfechacreacion</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabStop">0</property>
      <property name="Top">28</property>
      <property name="Width">138</property>
    </object>
    <object class="Label" name="Label32" >
      <property name="Caption">FechaCreacion</property>
      <property name="Color">#C0C0C0</property>
      <property name="Height">13</property>
      <property name="Left">567</property>
      <property name="Name">Label32</property>
      <property name="Top">36</property>
      <property name="Width">83</property>
    </object>
    <object class="ComboBox" name="cboestatus" >
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">488</property>
      <property name="Name">cboestatus</property>
      <property name="ParentColor">0</property>
      <property name="Top">4</property>
      <property name="Width">121</property>
      <property name="OnChange">cboestatusChange</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Caption">Comentario</property>
      <property name="Color">#C0C0C0</property>
      <property name="Height">13</property>
      <property name="Left">3</property>
      <property name="Name">Label14</property>
      <property name="Top">109</property>
      <property name="Width">70</property>
    </object>
    <object class="Edit" name="eddescripcion" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Height">21</property>
      <property name="Left">72</property>
      <property name="Name">eddescripcion</property>
      <property name="ParentColor">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">2</property>
      <property name="Top">101</property>
      <property name="Width">720</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Equipo Aliado&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">226</property>
    <property name="Width">123</property>
  </object>
  <object class="CheckBox" name="chkequipo" >
    <property name="Caption">SI/NO</property>
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crPointer</property>
    <property name="Height">18</property>
    <property name="Left">149</property>
    <property name="Name">chkequipo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">223</property>
    <property name="Width">68</property>
    <property name="OnClick">chkequipoClick</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Detalle de Precios&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">401</property>
    <property name="Width">136</property>
  </object>
  <object class="Panel" name="precios" >
    <property name="BorderColor">0</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">176</property>
    <property name="Name">precios</property>
    <property name="ParentColor">0</property>
    <property name="Top">416</property>
    <property name="Width">800</property>
    <object class="Label" name="Label10" >
      <property name="Caption">Costo del Chasis</property>
      <property name="Height">13</property>
      <property name="Left">104</property>
      <property name="Name">Label10</property>
      <property name="Top">14</property>
      <property name="Width">107</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Caption">Carroceria</property>
      <property name="Height">13</property>
      <property name="Left">104</property>
      <property name="Name">Label11</property>
      <property name="Top">37</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Caption">Accesorios</property>
      <property name="Height">13</property>
      <property name="Left">104</property>
      <property name="Name">Label12</property>
      <property name="Top">61</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Caption">Condicion Especial</property>
      <property name="Height">13</property>
      <property name="Left">104</property>
      <property name="Name">Label13</property>
      <property name="Top">133</property>
      <property name="Width">108</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Caption">Precio</property>
      <property name="Height">13</property>
      <property name="Left">104</property>
      <property name="Name">Label15</property>
      <property name="Top">109</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label17" >
      <property name="Caption">Utilidad</property>
      <property name="Color">#C0C0C0</property>
      <property name="Height">13</property>
      <property name="Left">441</property>
      <property name="Name">Label17</property>
      <property name="Top">125</property>
      <property name="Width">52</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Caption">Precio Total</property>
      <property name="Height">13</property>
      <property name="Left">104</property>
      <property name="Name">Label18</property>
      <property name="Top">157</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label19" >
      <property name="Caption">Costo Total</property>
      <property name="Height">13</property>
      <property name="Left">104</property>
      <property name="Name">Label19</property>
      <property name="Top">85</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="edchasis" >
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case">caNone</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">216</property>
      <property name="Name">edchasis</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">11</property>
      <property name="Top">6</property>
      <property name="Width">200</property>
    </object>
    <object class="Edit" name="edcarroceria" >
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case">caNone</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">216</property>
      <property name="Name">edcarroceria</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">12</property>
      <property name="Top">29</property>
      <property name="Width">200</property>
    </object>
    <object class="Edit" name="edaccesorios" >
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case">caNone</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">216</property>
      <property name="Name">edaccesorios</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">13</property>
      <property name="Top">53</property>
      <property name="Width">200</property>
    </object>
    <object class="Edit" name="eddescuento" >
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case">caNone</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">216</property>
      <property name="Name">eddescuento</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="TabOrder">16</property>
      <property name="Top">125</property>
      <property name="Width">200</property>
      <property name="jsOnBlur">eddescuentoJSBlur</property>
      <property name="jsOnKeyPress">eddescuentoJSKeyPress</property>
    </object>
    <object class="Edit" name="edprecio" >
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case">caNone</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">216</property>
      <property name="Name">edprecio</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">15</property>
      <property name="Top">101</property>
      <property name="Width">200</property>
      <property name="jsOnBlur">edprecioJSBlur</property>
      <property name="jsOnKeyPress">edprecioJSKeyPress</property>
    </object>
    <object class="Edit" name="edtotal" >
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case">caNone</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">216</property>
      <property name="Name">edtotal</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">17</property>
      <property name="Top">149</property>
      <property name="Width">200</property>
    </object>
    <object class="Edit" name="edutilidad" >
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case">caNone</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">504</property>
      <property name="Name">edutilidad</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">19</property>
      <property name="Top">117</property>
      <property name="Width">90</property>
    </object>
    <object class="Edit" name="edcostototal" >
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case">caNone</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">216</property>
      <property name="Name">edcostototal</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">14</property>
      <property name="Top">77</property>
      <property name="Width">200</property>
    </object>
    <object class="Label" name="Label23" >
      <property name="Caption">% Margen</property>
      <property name="Color">#C0C0C0</property>
      <property name="Height">13</property>
      <property name="Left">441</property>
      <property name="Name">Label23</property>
      <property name="Top">153</property>
      <property name="Width">61</property>
    </object>
    <object class="Edit" name="edmargen" >
      <property name="Font">
            <property name="Align">taRight</property>
            <property name="Case">caNone</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">504</property>
      <property name="Name">edmargen</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">20</property>
      <property name="Top">145</property>
      <property name="Width">90</property>
    </object>
    <object class="Label" name="Label22" >
      <property name="Caption">Moneda</property>
      <property name="Color">#C0C0C0</property>
      <property name="Height">13</property>
      <property name="Left">441</property>
      <property name="Name">Label22</property>
      <property name="Top">69</property>
      <property name="Width">51</property>
    </object>
    <object class="ComboBox" name="cbomoneda" >
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">504</property>
      <property name="Name">cbomoneda</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">18</property>
      <property name="Tag"></property>
      <property name="Top">61</property>
      <property name="Width">90</property>
      <property name="OnChange">cbomonedaChange</property>
    </object>
    <object class="Edit" name="edtc" >
      <property name="Font">
            <property name="Align">taRight</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">504</property>
      <property name="Name">edtc</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">21</property>
      <property name="Top">89</property>
      <property name="Width">90</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">TC</property>
      <property name="Height">13</property>
      <property name="Left">441</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="Top">97</property>
      <property name="Width">25</property>
    </object>
    <object class="HiddenField" name="hfpath" >
      <property name="Height">18</property>
      <property name="Left">531</property>
      <property name="Name">hfpath</property>
      <property name="Top">9</property>
      <property name="Width">104</property>
    </object>
  </object>
  <object class="Panel" name="pnotas" >
    <property name="BorderColor">0</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">90</property>
    <property name="Name">pnotas</property>
    <property name="Top">611</property>
    <property name="Width">800</property>
    <object class="Label" name="lblhistorial" >
      <property name="Height">13</property>
      <property name="Left">15</property>
      <property name="Name">lblhistorial</property>
      <property name="Top">9</property>
      <property name="Width">769</property>
    </object>
  </object>
  <object class="Label" name="lbnotas" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Notas&lt;/STRONG&gt;&lt;/P&gt;]]></property>
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
    <property name="Top">596</property>
    <property name="Width">77</property>
    <property name="OnClick">lbnotasClick</property>
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
      <property name="Left">698</property>
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
      <property name="Left">137</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">27</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btnguardarcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">218</property>
      <property name="Name">btnguardarcerrar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">28</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btnguardarcerrarClick</property>
    </object>
    <object class="Button" name="btnactivar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Activar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">366</property>
      <property name="Name">btnactivar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">79</property>
      <property name="OnClick">btnactivarClick</property>
    </object>
    <object class="Button" name="btnmail" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Enviar Mail</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">615</property>
      <property name="Name">btnmail</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">79</property>
      <property name="OnClick">btnmailClick</property>
    </object>
    <object class="Button" name="btnimprimir" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Imprimir</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">454</property>
      <property name="Name">btnimprimir</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnimprimirClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[&lt;FONT color=#004080&gt;&lt;STRONG&gt;lbtitulo &lt;/STRONG&gt;&lt;/FONT&gt;]]></property>
      <property name="Font">
            <property name="Color">#004080</property>
            <property name="Size">12</property>
            <property name="Weight">bolder</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">7</property>
      <property name="Name">lbtitulo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">15</property>
      <property name="Width">123</property>
    </object>
    <object class="Button" name="btnpedido" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">PreFactura</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">534</property>
      <property name="Name">btnpedido</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnpedidoClick</property>
    </object>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption"><![CDATA[&lt;STRONG&gt;Datos Principales&lt;/STRONG&gt;]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">50</property>
    <property name="Width">147</property>
  </object>
  <object class="Panel" name="pespecificaciones" >
    <property name="Color">#C0C0C0</property>
    <property name="Height">97</property>
    <property name="Left">1</property>
    <property name="Name">pespecificaciones</property>
    <property name="Top">241</property>
    <property name="Width">799</property>
    <object class="Memo" name="mespecifica" >
      <property name="Height">65</property>
      <property name="Left">6</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">mespecifica</property>
      <property name="TabOrder">9</property>
      <property name="Top">24</property>
      <property name="Width">785</property>
    </object>
    <object class="Label" name="Label28" >
      <property name="Caption">Especificaciones Especiales</property>
      <property name="Height">13</property>
      <property name="Left">16</property>
      <property name="Name">Label28</property>
      <property name="Top">8</property>
      <property name="Width">171</property>
    </object>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">696</property>
    <property name="Name">hfidnota</property>
    <property name="Top">345</property>
    <property name="Width">96</property>
  </object>
  <object class="Label" name="Label30" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Estatus del Financiamiento&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label30</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">343</property>
    <property name="Width">182</property>
  </object>
  <object class="ComboBox" name="cbofinanciamiento" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">199</property>
    <property name="Name">cbofinanciamiento</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">339</property>
    <property name="Width">257</property>
  </object>
  <object class="HiddenField" name="hfemail" >
    <property name="Height">18</property>
    <property name="Left">610</property>
    <property name="Name">hfemail</property>
    <property name="Top">322</property>
    <property name="Width">96</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">619</property>
    <property name="Name">hfestatus</property>
    <property name="Top">367</property>
    <property name="Width">87</property>
  </object>
  <object class="Upload" name="upload" >
    <property name="Height">20</property>
    <property name="Left">199</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="Top">363</property>
    <property name="Width">414</property>
  </object>
  <object class="Label" name="lbadjunto" >
    <property name="Caption">lbadjunto</property>
    <property name="Height">13</property>
    <property name="Left">199</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto</property>
    <property name="ParentColor">0</property>
    <property name="Top">387</property>
    <property name="Width">328</property>
  </object>
  <object class="Button" name="btnsubir" >
    <property name="Caption">Subir</property>
    <property name="Height">20</property>
    <property name="Left">628</property>
    <property name="Name">btnsubir</property>
    <property name="ParentColor">0</property>
    <property name="Top">363</property>
    <property name="Width">56</property>
    <property name="OnClick">btnsubirClick</property>
  </object>
  <object class="Label" name="lbeliminar" >
    <property name="Height">13</property>
    <property name="Left">554</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbeliminar</property>
    <property name="ParentColor">0</property>
    <property name="Top">387</property>
    <property name="Width">59</property>
    <property name="OnClick">lbeliminarClick</property>
  </object>
  <object class="MySQLTable" name="tbofertas" >
        <property name="Left">718</property>
        <property name="Top">421</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbofertas</property>
    <property name="TableName">ofertas</property>
  </object>
  <object class="Datasource" name="dsofertas" >
        <property name="Left">647</property>
        <property name="Top">421</property>
    <property name="DataSet">tbofertas</property>
    <property name="Name">dsofertas</property>
  </object>
  <object class="MySQLQuery" name="sqlnotas" >
        <property name="Left">208</property>
        <property name="Top">636</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="Name">sqlnotas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
