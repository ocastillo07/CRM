<?php
<object class="upresupuestos" name="upresupuestos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Presupuestos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">642</property>
  <property name="IsMaster">0</property>
  <property name="Name">upresupuestos</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnAfterShow">upresupuestosAfterShow</property>
  <property name="OnShow">upresupuestosShow</property>
  <property name="jsOnLoad">upresupuestosJSLoad</property>
  <object class="Label" name="lbnotas" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Notas&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Color">#000000</property>
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Hint">Click para agregar nota</property>
    <property name="Left">7</property>
    <property name="Name">lbnotas</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">602</property>
    <property name="Width">77</property>
    <property name="OnClick">lbhistorialClick</property>
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
      <property name="TabOrder">21</property>
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
      <property name="TabOrder">16</property>
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
      <property name="TabOrder">17</property>
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
      <property name="TabOrder">18</property>
      <property name="Top">8</property>
      <property name="Width">79</property>
      <property name="OnClick">btnactivarClick</property>
    </object>
    <object class="Button" name="btnmail" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Enviar Mail</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">555</property>
      <property name="Name">btnmail</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">20</property>
      <property name="Top">8</property>
      <property name="Width">79</property>
      <property name="OnClick">btnmailClick</property>
    </object>
    <object class="Button" name="btnimprimir" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Imprimir</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">463</property>
      <property name="Name">btnimprimir</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">19</property>
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
  </object>
  <object class="Upload" name="upload" >
    <property name="Height">20</property>
    <property name="Left">7</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">14</property>
    <property name="Top">557</property>
    <property name="Width">654</property>
  </object>
  <object class="Label" name="lbadjunto" >
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto</property>
    <property name="ParentColor">0</property>
    <property name="Top">581</property>
    <property name="Width">328</property>
  </object>
  <object class="Button" name="btnsubir" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Subir</property>
    <property name="Height">20</property>
    <property name="Left">679</property>
    <property name="Name">btnsubir</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">15</property>
    <property name="Top">557</property>
    <property name="Width">56</property>
    <property name="OnClick">btnsubirClick</property>
  </object>
  <object class="Label" name="lbeliminar" >
    <property name="Height">13</property>
    <property name="Left">371</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbeliminar</property>
    <property name="ParentColor">0</property>
    <property name="Top">581</property>
    <property name="Width">59</property>
    <property name="OnClick">lbeliminarClick</property>
  </object>
  <object class="Edit" name="edidpresupuesto" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">66</property>
    <property name="Name">edidpresupuesto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder"></property>
    <property name="TabStop">0</property>
    <property name="Top">52</property>
    <property name="Width">76</property>
  </object>
  <object class="Label" name="IdOferta" >
    <property name="Caption">ID</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">IdOferta</property>
    <property name="ParentFont">0</property>
    <property name="Top">60</property>
    <property name="Width">52</property>
  </object>
  <object class="Label" name="Label27" >
    <property name="Caption">Nombre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label27</property>
    <property name="ParentFont">0</property>
    <property name="Top">176</property>
    <property name="Width">55</property>
  </object>
  <object class="Label" name="Cliente" >
    <property name="Caption">Cliente</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Cliente</property>
    <property name="ParentFont">0</property>
    <property name="Top">152</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edamaterno" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">562</property>
    <property name="Name">edamaterno</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">8</property>
    <property name="TabStop">0</property>
    <property name="Top">144</property>
    <property name="Width">173</property>
    <property name="jsOnBlur">edamaternoJSBlur</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">IdAlmacen</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">299</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">60</property>
    <property name="Width">65</property>
  </object>
  <object class="Edit" name="edalmacen" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">371</property>
    <property name="Name">edalmacen</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">52</property>
    <property name="Width">26</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Fecha</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">398</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">60</property>
    <property name="Width">32</property>
  </object>
  <object class="Edit" name="edfechaalta" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">434</property>
    <property name="Name">edfechaalta</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">52</property>
    <property name="Width">82</property>
  </object>
  <object class="Label" name="Label29" >
    <property name="Caption">Promotor</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label29</property>
    <property name="ParentFont">0</property>
    <property name="Top">86</property>
    <property name="Width">57</property>
  </object>
  <object class="ComboBox" name="cbpromotor" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">66</property>
    <property name="Name">cbpromotor</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">78</property>
    <property name="Width">166</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">177</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">6</property>
    <property name="TabStop">0</property>
    <property name="Top">144</property>
    <property name="Width">199</property>
  </object>
  <object class="Edit" name="edapaterno" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">384</property>
    <property name="Name">edapaterno</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">7</property>
    <property name="TabStop">0</property>
    <property name="Top">144</property>
    <property name="Width">174</property>
  </object>
  <object class="Edit" name="edidcliente" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Hint">Precione Tecla C para Busqueda</property>
    <property name="Left">66</property>
    <property name="Name">edidcliente</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">3</property>
    <property name="Top">144</property>
    <property name="Width">78</property>
    <property name="jsOnBlur">edidclienteJSBlur</property>
  </object>
  <object class="Edit" name="ednombrecom" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">66</property>
    <property name="Name">ednombrecom</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">9</property>
    <property name="TabStop">0</property>
    <property name="Top">168</property>
    <property name="Width">504</property>
  </object>
  <object class="Edit" name="edrfc" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">623</property>
    <property name="Name">edrfc</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">10</property>
    <property name="TabStop">0</property>
    <property name="Top">168</property>
    <property name="Width">112</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">R.F.C.</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">584</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">176</property>
    <property name="Width">31</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Nombre</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">177</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">129</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Paterno</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">384</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">129</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Materno</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">562</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">129</property>
    <property name="Width">64</property>
  </object>
  <object class="Edit" name="edcalle" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">66</property>
    <property name="Name">edcalle</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">11</property>
    <property name="TabStop">0</property>
    <property name="Top">192</property>
    <property name="Width">504</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Calle</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">200</property>
    <property name="Width">55</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">C.P.</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">584</property>
    <property name="Name">Label14</property>
    <property name="ParentFont">0</property>
    <property name="Top">200</property>
    <property name="Width">31</property>
  </object>
  <object class="Edit" name="edcp" >
    <property name="CharCase">ecUpperCase</property>
    <property name="FilterInput">0</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">624</property>
    <property name="MaxLength">5</property>
    <property name="Name">edcp</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">12</property>
    <property name="TabStop">0</property>
    <property name="Top">192</property>
    <property name="Width">112</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Ciudad</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">339</property>
    <property name="Name">Label16</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">37</property>
  </object>
  <object class="Edit" name="edciudad" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">384</property>
    <property name="Name">edciudad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">14</property>
    <property name="TabStop">0</property>
    <property name="Top">216</property>
    <property name="Width">120</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption">Estado</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">512</property>
    <property name="Name">Label20</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">41</property>
  </object>
  <object class="Edit" name="edestado" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">560</property>
    <property name="Name">edestado</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">15</property>
    <property name="TabStop">0</property>
    <property name="Top">216</property>
    <property name="Width">176</property>
  </object>
  <object class="Label" name="Tel1" >
    <property name="Caption">Telefono1</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Tel1</property>
    <property name="ParentFont">0</property>
    <property name="Top">248</property>
    <property name="Width">58</property>
  </object>
  <object class="Edit" name="edtel1" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">66</property>
    <property name="Name">edtel1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">16</property>
    <property name="TabStop">0</property>
    <property name="Top">240</property>
    <property name="Width">140</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">Telefono2</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">219</property>
    <property name="Name">Label21</property>
    <property name="ParentFont">0</property>
    <property name="Top">248</property>
    <property name="Width">58</property>
  </object>
  <object class="Edit" name="edtel2" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">278</property>
    <property name="Name">edtel2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">17</property>
    <property name="TabStop">0</property>
    <property name="Top">240</property>
    <property name="Width">140</property>
  </object>
  <object class="Edit" name="edemail" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">494</property>
    <property name="Name">edemail</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">18</property>
    <property name="TabStop">0</property>
    <property name="Top">240</property>
    <property name="Width">242</property>
    <property name="jsOnBlur">edemailJSBlur</property>
  </object>
  <object class="Label" name="Label25" >
    <property name="Caption">Email</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">434</property>
    <property name="Name">Label25</property>
    <property name="ParentFont">0</property>
    <property name="Top">248</property>
    <property name="Width">40</property>
  </object>
  <object class="Edit" name="edparte" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Hint">Precione Tecla * para Busqueda</property>
    <property name="Left">7</property>
    <property name="Name">edparte</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">4</property>
    <property name="Top">291</property>
    <property name="Width">88</property>
    <property name="jsOnBlur">edparteJSBlur</property>
  </object>
  <object class="Edit" name="eddescripcion" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">123</property>
    <property name="Name">eddescripcion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">291</property>
    <property name="Width">230</property>
  </object>
  <object class="Edit" name="edexistencia" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">356</property>
    <property name="Name">edexistencia</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">291</property>
    <property name="Width">70</property>
  </object>
  <object class="Edit" name="edcantidad" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">434</property>
    <property name="Name">edcantidad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">291</property>
    <property name="Width">70</property>
    <property name="jsOnBlur">edcantidadJSBlur</property>
    <property name="jsOnKeyPress">edcantidadJSKeyPress</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Parte</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">275</property>
    <property name="Width">47</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Descripcion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">123</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">275</property>
    <property name="Width">67</property>
  </object>
  <object class="Edit" name="edprecio" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Hint">Presione Tecla + para Agregar</property>
    <property name="Left">591</property>
    <property name="Name">edprecio</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">6</property>
    <property name="Top">291</property>
    <property name="Width">70</property>
    <property name="jsOnBlur">edcantidadJSBlur</property>
    <property name="jsOnKeyPress">edprecioJSKeyPress</property>
  </object>
  <object class="Edit" name="edimporte" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">666</property>
    <property name="Name">edimporte</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">291</property>
    <property name="Width">70</property>
    <property name="jsOnClick">edprecioJSKeyPress</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Existencia</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">356</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">275</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Cantidad</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">434</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">275</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Precio</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">590</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">275</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Importe</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">666</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">275</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Total</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">664</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">465</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">Persona</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">245</property>
    <property name="Name">Label17</property>
    <property name="ParentFont">0</property>
    <property name="Top">86</property>
    <property name="Width">53</property>
  </object>
  <object class="ComboBox" name="cbpersona" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">299</property>
    <property name="Name">cbpersona</property>
    <property name="ParentColor">0</property>
    <property name="TabStop">0</property>
    <property name="Top">78</property>
    <property name="Width">99</property>
  </object>
  <object class="Edit" name="edsubtotal" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">513</property>
    <property name="Name">edsubtotal</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">481</property>
    <property name="Width">70</property>
  </object>
  <object class="Edit" name="edcosto" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">513</property>
    <property name="Name">edcosto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">8</property>
    <property name="TabStop">0</property>
    <property name="Top">291</property>
    <property name="Width">70</property>
  </object>
  <object class="Label" name="Costo" >
    <property name="Caption">Costo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">513</property>
    <property name="Name">Costo</property>
    <property name="ParentFont">0</property>
    <property name="Top">275</property>
    <property name="Width">67</property>
  </object>
  <object class="Edit" name="edrevision" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">218</property>
    <property name="Name">edrevision</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder"></property>
    <property name="TabStop">0</property>
    <property name="Top">52</property>
    <property name="Width">76</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">IdRevision</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">148</property>
    <property name="Name">Label18</property>
    <property name="ParentFont">0</property>
    <property name="Top">60</property>
    <property name="Width">68</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">Estatus</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">531</property>
    <property name="Name">Label19</property>
    <property name="ParentFont">0</property>
    <property name="Top">60</property>
    <property name="Width">53</property>
  </object>
  <object class="ComboBox" name="cbestatus" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">584</property>
    <property name="Name">cbestatus</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">52</property>
    <property name="Width">152</property>
    <property name="OnChange">cbestatusChange</property>
  </object>
  <object class="ComboBox" name="cbiva" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">442</property>
    <property name="Name">cbiva</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">13</property>
    <property name="Top">481</property>
    <property name="Width">65</property>
    <property name="jsOnChange">cbivaJSChange</property>
  </object>
  <object class="Label" name="Label23" >
    <property name="Caption">Iva</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">442</property>
    <property name="Name">Label23</property>
    <property name="ParentFont">0</property>
    <property name="Top">465</property>
    <property name="Width">25</property>
  </object>
  <object class="Edit" name="ediva" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">590</property>
    <property name="Name">ediva</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">481</property>
    <property name="Width">70</property>
  </object>
  <object class="Label" name="Label24" >
    <property name="Caption">IVA</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">590</property>
    <property name="Name">Label24</property>
    <property name="ParentFont">0</property>
    <property name="Top">465</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label26" >
    <property name="Caption">Subtotal</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">512</property>
    <property name="Name">Label26</property>
    <property name="ParentFont">0</property>
    <property name="Top">465</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="lbdetalle" >
    <property name="Color">#C0C0C0</property>
    <property name="Height">10</property>
    <property name="Left">7</property>
    <property name="Name">lbdetalle</property>
    <property name="Top">356</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label28" >
    <property name="Caption">Colonia</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label28</property>
    <property name="ParentFont">0</property>
    <property name="Top">224</property>
    <property name="Width">53</property>
  </object>
  <object class="Edit" name="edcolonia" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">66</property>
    <property name="Name">edcolonia</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">13</property>
    <property name="TabStop">0</property>
    <property name="Top">216</property>
    <property name="Width">264</property>
  </object>
  <object class="Label" name="lbhistorial" >
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crPointer</property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">lbhistorial</property>
    <property name="Top">619</property>
    <property name="Width">769</property>
    <property name="OnClick">lbhistorialClick</property>
  </object>
  <object class="Edit" name="edtotal" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">666</property>
    <property name="Name">edtotal</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">481</property>
    <property name="Width">70</property>
  </object>
  <object class="HiddenField" name="hfcosto" >
    <property name="Height">18</property>
    <property name="Left">663</property>
    <property name="Name">hfcosto</property>
    <property name="Top">384</property>
    <property name="Width">87</property>
  </object>
  <object class="Label" name="Label33" >
    <property name="Caption">Atencion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label33</property>
    <property name="ParentFont">0</property>
    <property name="Top">111</property>
    <property name="Width">58</property>
  </object>
  <object class="Edit" name="edatencion" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">66</property>
    <property name="Name">edatencion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">103</property>
    <property name="Width">560</property>
  </object>
  <object class="HiddenField" name="hfpath" >
    <property name="Height">18</property>
    <property name="Left">591</property>
    <property name="Name">hfpath</property>
    <property name="Top">357</property>
    <property name="Width">62</property>
  </object>
  <object class="HiddenField" name="hflogin" >
    <property name="Height">13</property>
    <property name="Left">591</property>
    <property name="Name">hflogin</property>
    <property name="Top">384</property>
    <property name="Width">62</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">15</property>
    <property name="Left">663</property>
    <property name="Name">hfestatus</property>
    <property name="Top">368</property>
    <property name="Width">87</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">14</property>
    <property name="Left">657</property>
    <property name="Name">hfidnota</property>
    <property name="Top">354</property>
    <property name="Width">88</property>
  </object>
  <object class="HiddenField" name="hfemail" >
    <property name="Height">18</property>
    <property name="Left">591</property>
    <property name="Name">hfemail</property>
    <property name="Top">403</property>
    <property name="Width">62</property>
  </object>
  <object class="HiddenField" name="hfcbestatus" >
    <property name="Height">18</property>
    <property name="Left">663</property>
    <property name="Name">hfcbestatus</property>
    <property name="Top">403</property>
    <property name="Width">87</property>
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
    <property name="Left">184</property>
    <property name="Name">lbufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">261</property>
    <property name="Width">552</property>
  </object>
  <object class="Button" name="btnagregar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">+</property>
    <property name="Height">25</property>
    <property name="Hint">Click para Agregar</property>
    <property name="Left">745</property>
    <property name="Name">btnagregar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">7</property>
    <property name="Top">289</property>
    <property name="Width">31</property>
    <property name="jsOnClick">btnagregarJSClick</property>
  </object>
  <object class="Edit" name="edpartecap" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Hint">Capturar Parte</property>
    <property name="Left">7</property>
    <property name="Name">edpartecap</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">8</property>
    <property name="Top">332</property>
    <property name="Width">112</property>
  </object>
  <object class="Edit" name="eddescripcioncap" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Hint">Capturar Descripcion de la Parte</property>
    <property name="Left">123</property>
    <property name="Name">eddescripcioncap</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">9</property>
    <property name="Top">332</property>
    <property name="Width">303</property>
  </object>
  <object class="Edit" name="edcantidadcap" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">434</property>
    <property name="Name">edcantidadcap</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">332</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edcantidadcapJSKeyPress</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Caption">Parte a Capturar</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label22</property>
    <property name="ParentFont">0</property>
    <property name="Top">316</property>
    <property name="Width">113</property>
  </object>
  <object class="Label" name="Label31" >
    <property name="Caption"><![CDATA[&lt;P&gt;Descripcion a Capturar&lt;/P&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">123</property>
    <property name="Name">Label31</property>
    <property name="ParentFont">0</property>
    <property name="Top">316</property>
    <property name="Width">229</property>
  </object>
  <object class="Edit" name="edpreciocap" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">590</property>
    <property name="Name">edpreciocap</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="TabOrder">11</property>
    <property name="Top">332</property>
    <property name="Width">70</property>
    <property name="jsOnBlur">edpreciocapJSBlur</property>
    <property name="jsOnKeyPress">edpreciocapJSKeyPress</property>
  </object>
  <object class="Edit" name="edimportecap" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">665</property>
    <property name="Name">edimportecap</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">332</property>
    <property name="Width">70</property>
  </object>
  <object class="Label" name="Label35" >
    <property name="Caption">Cantidad</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">434</property>
    <property name="Name">Label35</property>
    <property name="ParentFont">0</property>
    <property name="Top">316</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label36" >
    <property name="Caption">Precio</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">590</property>
    <property name="Name">Label36</property>
    <property name="ParentFont">0</property>
    <property name="Top">316</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label37" >
    <property name="Caption">Importe</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">666</property>
    <property name="Name">Label37</property>
    <property name="ParentFont">0</property>
    <property name="Top">316</property>
    <property name="Width">67</property>
  </object>
  <object class="Button" name="btnagregarcap" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">+</property>
    <property name="Height">25</property>
    <property name="Hint">Click para Agregar</property>
    <property name="Left">745</property>
    <property name="Name">btnagregarcap</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">12</property>
    <property name="Top">330</property>
    <property name="Width">31</property>
    <property name="jsOnClick">btnagregarcapJSClick</property>
  </object>
  <object class="Button" name="btncliente" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">btncliente</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/edit-find32.png</property>
    <property name="Left">148</property>
    <property name="Name">btncliente</property>
    <property name="ParentColor">0</property>
    <property name="Top">142</property>
    <property name="Width">25</property>
    <property name="OnClick">btnclienteClick</property>
  </object>
  <object class="Button" name="btnparte" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">btncliente</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/edit-find32.png</property>
    <property name="Left">95</property>
    <property name="Name">btnparte</property>
    <property name="ParentColor">0</property>
    <property name="Top">289</property>
    <property name="Width">25</property>
    <property name="OnClick">btnparteClick</property>
  </object>
  <object class="Label" name="Label30" >
    <property name="Caption">Observaciones</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">Label30</property>
    <property name="ParentFont">0</property>
    <property name="Top">487</property>
    <property name="Width">113</property>
  </object>
  <object class="Memo" name="mobservaciones" >
    <property name="Height">49</property>
    <property name="Left">7</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mobservaciones</property>
    <property name="ParentColor">0</property>
    <property name="Top">504</property>
    <property name="Width">729</property>
  </object>
  <object class="MySQLTable" name="tbpresupuestos" >
        <property name="Left">759</property>
        <property name="Top">116</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbpresupuestos</property>
    <property name="TableName">represupuestos</property>
  </object>
  <object class="Datasource" name="dspresupuestos" >
        <property name="Left">759</property>
        <property name="Top">52</property>
    <property name="DataSet">tbpresupuestos</property>
    <property name="Name">dspresupuestos</property>
  </object>
  <object class="MySQLQuery" name="sqlnotas" >
        <property name="Left">544</property>
        <property name="Top">330</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="Name">sqlnotas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLQuery" name="sqlpresupuesto" >
        <property name="Left">760</property>
        <property name="Top">179</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="Name">sqlpresupuesto</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
