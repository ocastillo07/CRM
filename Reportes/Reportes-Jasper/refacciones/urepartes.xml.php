<?php
<object class="urepartes" name="urepartes" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Partes</property>
  <property name="Color">#F2F2F2</property>
  <property name="DocType">dtNone</property>
  <property name="Height">688</property>
  <property name="IsMaster">0</property>
  <property name="Name">urepartes</property>
  <property name="Width">800</property>
  <property name="OnShow">urepartesShow</property>
  <property name="jsOnLoad">urepartesJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfestatus" >
      <property name="Height">18</property>
      <property name="Left">300</property>
      <property name="Name">hfestatus</property>
      <property name="Top">3</property>
      <property name="Value">0</property>
      <property name="Width">82</property>
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
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Height">25</property>
      <property name="ImageSource">imagenes/img_guardar.png</property>
      <property name="Left">195</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">7</property>
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="OnClick">btnguardarClick</property>
      <property name="jsOnKeyPress">edidparteJSKeyPress</property>
    </object>
    <object class="Label" name="lbguardar" >
      <property name="Caption">Guardar</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">182</property>
      <property name="Name">lbguardar</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">31</property>
      <property name="Width">50</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Label" name="lbgcerrar" >
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">240</property>
      <property name="Name">lbgcerrar</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">31</property>
      <property name="Width">98</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="btngcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Height">25</property>
      <property name="ImageSource">imagenes/img_gcerrar.png</property>
      <property name="Left">270</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">8</property>
      <property name="Top">3</property>
      <property name="Width">25</property>
      <property name="OnClick">btngcerrarClick</property>
      <property name="jsOnKeyPress">edidparteJSKeyPress</property>
    </object>
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Height">25</property>
      <property name="ImageSource">imagenes/img_regresar.png</property>
      <property name="Left">753</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="OnClick">btnregresarClick</property>
      <property name="jsOnKeyPress">edidparteJSKeyPress</property>
    </object>
    <object class="Label" name="lbregresar" >
      <property name="Caption">Regresar</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">736</property>
      <property name="Name">lbregresar</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">31</property>
      <property name="Width">55</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Height">25</property>
      <property name="ImageSource">imagenes/img_nuevo.png</property>
      <property name="Left">144</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="OnClick">btnnuevoClick</property>
      <property name="jsOnKeyPress">edidparteJSKeyPress</property>
    </object>
    <object class="Label" name="lbnuevo" >
      <property name="Caption">Nuevo</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">139</property>
      <property name="Name">lbnuevo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">31</property>
      <property name="Width">35</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
    <object class="Label" name="lbimprimir" >
      <property name="Caption">Imprimir</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">14</property>
      <property name="Left">629</property>
      <property name="Name">lbimprimir</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">30</property>
      <property name="Width">53</property>
    </object>
    <object class="Label" name="lbsuperceder" >
      <property name="Caption">Superceder</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">14</property>
      <property name="Left">532</property>
      <property name="Name">lbsuperceder</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">30</property>
      <property name="Width">67</property>
      <property name="jsOnClick">btnsupercederJSClick</property>
    </object>
    <object class="Image" name="btnsuperceder" >
      <property name="Border">0</property>
      <property name="Cursor">crPointer</property>
      <property name="Height">25</property>
      <property name="ImageSource">imagenes/img_return.png</property>
      <property name="Left">553</property>
      <property name="Link"></property>
      <property name="LinkTarget"></property>
      <property name="Name">btnsuperceder</property>
      <property name="Stretch">1</property>
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="jsOnClick">btnsupercederJSClick</property>
      <property name="jsOnKeyPress">edidparteJSKeyPress</property>
    </object>
    <object class="Label" name="Label41" >
      <property name="Caption">Sustitutos</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">14</property>
      <property name="Left">445</property>
      <property name="Name">Label41</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">30</property>
      <property name="Width">67</property>
      <property name="jsOnClick">btnsupercederJSClick</property>
    </object>
    <object class="Button" name="btnsustitutas" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Button1</property>
      <property name="Height">25</property>
      <property name="ImageSource">imagenes/img_ref.png</property>
      <property name="Left">464</property>
      <property name="Name">btnsustitutas</property>
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="OnClick">btnsustitutasClick</property>
      <property name="jsOnKeyPress">edidparteJSKeyPress</property>
    </object>
    <object class="Image" name="btnimprimir" >
      <property name="Border">0</property>
      <property name="Cursor">crPointer</property>
      <property name="Height">25</property>
      <property name="ImageSource">imagenes/img_imprimir.png</property>
      <property name="Left">643</property>
      <property name="Link"></property>
      <property name="LinkTarget"></property>
      <property name="Name">btnimprimir</property>
      <property name="Stretch">1</property>
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="jsOnClick">btnimprimirJSClick</property>
    </object>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Id Parte</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">56</property>
    <property name="Width">91</property>
  </object>
  <object class="Edit" name="edidparte" >
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edidparte</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">1</property>
    <property name="Top">72</property>
    <property name="Width">121</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Almacen</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">139</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">56</property>
    <property name="Width">91</property>
  </object>
  <object class="ComboBox" name="cbalmacen" >
    <property name="Font">
        <property name="Align">taLeft</property>
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">139</property>
    <property name="Name">cbalmacen</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">72</property>
    <property name="Width">137</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Estatus</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">591</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">58</property>
    <property name="Width">91</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Clave Parte</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">104</property>
    <property name="Width">91</property>
  </object>
  <object class="Edit" name="edclave" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Size">11</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edclave</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">4</property>
    <property name="Top">120</property>
    <property name="Width">181</property>
    <property name="jsOnBlur">edclaveJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="ComboBox" name="cbunidad" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">648</property>
    <property name="Name">cbunidad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">13</property>
    <property name="Top">216</property>
    <property name="Width">137</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Unidad de Medida</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">648</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">197</property>
    <property name="Width">131</property>
  </object>
  <object class="ComboBox" name="cblinea" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">195</property>
    <property name="Name">cblinea</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">170</property>
    <property name="Width">205</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Linea Contable</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">195</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">152</property>
    <property name="Width">131</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Descripcion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">196</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">104</property>
    <property name="Width">91</property>
  </object>
  <object class="Edit" name="eddescripcion" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">196</property>
    <property name="Name">eddescripcion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">120</property>
    <property name="Width">582</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Ultima Entrada</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">109</property>
    <property name="Name">Label16</property>
    <property name="ParentFont">0</property>
    <property name="Top">244</property>
    <property name="Width">86</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">Ultima Salida</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">215</property>
    <property name="Name">Label17</property>
    <property name="ParentFont">0</property>
    <property name="Top">244</property>
    <property name="Width">87</property>
  </object>
  <object class="ComboBox" name="cborigen" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">509</property>
    <property name="Name">cborigen</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">12</property>
    <property name="Top">216</property>
    <property name="Width">130</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label29" >
    <property name="Caption">Origen</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">509</property>
    <property name="Name">Label29</property>
    <property name="ParentFont">0</property>
    <property name="Top">197</property>
    <property name="Width">131</property>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario:</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">7</property>
    <property name="Name">lbufh</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">653</property>
    <property name="Width">356</property>
  </object>
  <object class="Edit" name="edultentrada" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
        <property name="Weight">normal</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">109</property>
    <property name="Name">edultentrada</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">15</property>
    <property name="TabStop">0</property>
    <property name="Top">261</property>
    <property name="Width">87</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edultsalida" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
        <property name="Weight">normal</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">216</property>
    <property name="Name">edultsalida</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">16</property>
    <property name="TabStop">0</property>
    <property name="Top">261</property>
    <property name="Width">87</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edproveedor" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">65</property>
    <property name="Name">edproveedor</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">213</property>
    <property name="Width">389</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label34" >
    <property name="Caption">Proveedor</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label34</property>
    <property name="ParentFont">0</property>
    <property name="Top">197</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Busca</property>
    <property name="Height">25</property>
    <property name="Hint">Click para Buscar un Proveedor</property>
    <property name="ImageSource">imagenes/edit-find22.png</property>
    <property name="Left">464</property>
    <property name="Name">Button1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">7</property>
    <property name="Top">209</property>
    <property name="Width">25</property>
    <property name="OnClick">btnbuscarproveedClick</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edidproveedor" >
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">edidproveedor</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="Top">213</property>
    <property name="Width">49</property>
    <property name="jsOnBlur">edidproveedorJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Image" name="imgparte" >
    <property name="Border">0</property>
    <property name="Height">225</property>
    <property name="ImageSource"></property>
    <property name="Left">485</property>
    <property name="Link"></property>
    <property name="LinkTarget"></property>
    <property name="Name">imgparte</property>
    <property name="Stretch">1</property>
    <property name="Top">245</property>
    <property name="Width">300</property>
  </object>
  <object class="Upload" name="upload" >
    <property name="Height">20</property>
    <property name="Left">327</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">31</property>
    <property name="Top">477</property>
    <property name="Width">374</property>
  </object>
  <object class="Button" name="btnsubir" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Subir</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/img_subir.png</property>
    <property name="Left">709</property>
    <property name="Name">btnsubir</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">32</property>
    <property name="Top">481</property>
    <property name="Width">25</property>
    <property name="OnClick">lbsubirClick</property>
  </object>
  <object class="Label" name="lbsubir" >
    <property name="Caption">Subir Archivo</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">29</property>
    <property name="Left">742</property>
    <property name="Name">lbsubir</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">477</property>
    <property name="Width">43</property>
    <property name="OnClick">lbsubirClick</property>
  </object>
  <object class="Label" name="Label39" >
    <property name="Caption">Codigo de Barras</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label39</property>
    <property name="ParentFont">0</property>
    <property name="Top">152</property>
    <property name="Width">105</property>
  </object>
  <object class="Edit" name="edcodbar" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">7</property>
    <property name="Name">edcodbar</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">169</property>
    <property name="Width">178</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="ComboBox" name="cbfamilia" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">411</property>
    <property name="Name">cbfamilia</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">170</property>
    <property name="Width">180</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label42" >
    <property name="Caption">Familia</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">411</property>
    <property name="Name">Label42</property>
    <property name="ParentFont">0</property>
    <property name="Top">152</property>
    <property name="Width">131</property>
  </object>
  <object class="Label" name="Label43" >
    <property name="Caption">Fecha Creacion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">Label43</property>
    <property name="ParentFont">0</property>
    <property name="Top">244</property>
    <property name="Width">91</property>
  </object>
  <object class="Edit" name="edcreacion" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
        <property name="Weight">normal</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">6</property>
    <property name="Name">edcreacion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">14</property>
    <property name="TabStop">0</property>
    <property name="Top">261</property>
    <property name="Width">87</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label44" >
    <property name="Caption">Fecha de Estatus</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">313</property>
    <property name="Name">Label44</property>
    <property name="ParentFont">0</property>
    <property name="Top">244</property>
    <property name="Width">104</property>
  </object>
  <object class="Edit" name="edfechaestatus" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
        <property name="Weight">normal</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">313</property>
    <property name="Name">edfechaestatus</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">17</property>
    <property name="TabStop">0</property>
    <property name="Top">261</property>
    <property name="Width">87</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="lbadjunto" >
    <property name="Alignment">agRight</property>
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">327</property>
    <property name="Name">lbadjunto</property>
    <property name="Top">499</property>
    <property name="Width">303</property>
  </object>
  <object class="Label" name="lbeliminar" >
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Color">#0080FF</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">642</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbeliminar</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">499</property>
    <property name="Width">59</property>
    <property name="OnClick">lbeliminarClick</property>
  </object>
  <object class="Edit" name="edalmacen" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Enabled">0</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">139</property>
    <property name="Name">edalmacen</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">72</property>
    <property name="Visible">0</property>
    <property name="Width">121</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="HiddenField" name="hfidalmacen" >
    <property name="Height">18</property>
    <property name="Left">296</property>
    <property name="Name">hfidalmacen</property>
    <property name="Top">58</property>
    <property name="Width">96</property>
  </object>
  <object class="ComboBox" name="cbmarca" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">606</property>
    <property name="Name">cbmarca</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">170</property>
    <property name="Width">174</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Marca</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">606</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">150</property>
    <property name="Width">99</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">Aduana</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">350</property>
    <property name="Name">Label19</property>
    <property name="ParentFont">0</property>
    <property name="Top">308</property>
    <property name="Width">82</property>
  </object>
  <object class="Edit" name="edaduana" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">350</property>
    <property name="Name">edaduana</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">324</property>
    <property name="Width">107</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label27" >
    <property name="Caption">Pedimento</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">351</property>
    <property name="Name">Label27</property>
    <property name="ParentFont">0</property>
    <property name="Top">351</property>
    <property name="Width">82</property>
  </object>
  <object class="Edit" name="edpedimento" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">350</property>
    <property name="Name">edpedimento</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">367</property>
    <property name="Width">106</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label28" >
    <property name="Caption">Fecha Pedimento</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">352</property>
    <property name="Name">Label28</property>
    <property name="ParentFont">0</property>
    <property name="Top">395</property>
    <property name="Width">113</property>
  </object>
  <object class="Edit" name="edfechapedimento" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
        <property name="Weight">normal</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">350</property>
    <property name="Name">edfechapedimento</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">412</property>
    <property name="Width">106</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label26" >
    <property name="Caption">Existencias</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label26</property>
    <property name="ParentFont">0</property>
    <property name="Top">292</property>
    <property name="Width">68</property>
  </object>
  <object class="Edit" name="edexistencia" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">edexistencia</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">18</property>
    <property name="TabStop">0</property>
    <property name="Top">308</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label23" >
    <property name="Caption">Ordenadas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label23</property>
    <property name="ParentFont">0</property>
    <property name="Top">337</property>
    <property name="Width">68</property>
  </object>
  <object class="Edit" name="edordenadas" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">edordenadas</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">21</property>
    <property name="TabStop">0</property>
    <property name="Top">352</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">En Traspaso</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">378</property>
    <property name="Width">68</property>
  </object>
  <object class="Edit" name="edtraspaso" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">edtraspaso</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">23</property>
    <property name="TabStop">0</property>
    <property name="Top">395</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edenproceso" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">100</property>
    <property name="Name">edenproceso</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">24</property>
    <property name="TabStop">0</property>
    <property name="Top">395</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label40" >
    <property name="Caption">En proceso</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">102</property>
    <property name="Name">Label40</property>
    <property name="ParentFont">0</property>
    <property name="Top">378</property>
    <property name="Width">68</property>
  </object>
  <object class="Edit" name="eddisponibles" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">102</property>
    <property name="Name">eddisponibles</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">20</property>
    <property name="TabStop">0</property>
    <property name="Top">352</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Disponibles</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">102</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">337</property>
    <property name="Width">69</property>
  </object>
  <object class="Edit" name="edapartados" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">102</property>
    <property name="Name">edapartados</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">19</property>
    <property name="TabStop">0</property>
    <property name="Top">308</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Caption">Apartados</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">102</property>
    <property name="Name">Label22</property>
    <property name="ParentFont">0</property>
    <property name="Top">292</property>
    <property name="Width">69</property>
  </object>
  <object class="CheckBox" name="chcore" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Tiene Core</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Align">taLeft</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">240</property>
    <property name="Name">chcore</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">14</property>
    <property name="Top">333</property>
    <property name="Width">84</property>
    <property name="jsOnClick">chcoreJSClick</property>
  </object>
  <object class="CheckBox" name="chkit" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">Kit</property>
    <property name="Color">#F2F2F2</property>
    <property name="Enabled">0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">19</property>
    <property name="Left">280</property>
    <property name="Name">chkit</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">15</property>
    <property name="Top">389</property>
    <property name="Width">44</property>
  </object>
  <object class="CheckBox" name="chinventariable" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">No Inventariable</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Align">taLeft</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">198</property>
    <property name="Name">chinventariable</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">16</property>
    <property name="Top">420</property>
    <property name="Width">125</property>
  </object>
  <object class="Label" name="Label30" >
    <property name="Caption">Minimo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">17</property>
    <property name="Name">Label30</property>
    <property name="ParentFont">0</property>
    <property name="Top">483</property>
    <property name="Width">70</property>
  </object>
  <object class="Edit" name="edminimo" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">17</property>
    <property name="Name">edminimo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">33</property>
    <property name="TabStop">0</property>
    <property name="Top">499</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label31" >
    <property name="Caption">Maximo</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">96</property>
    <property name="Name">Label31</property>
    <property name="ParentFont">0</property>
    <property name="Top">483</property>
    <property name="Width">70</property>
  </object>
  <object class="Edit" name="edmaximo" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">96</property>
    <property name="Name">edmaximo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">34</property>
    <property name="TabStop">0</property>
    <property name="Top">499</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label38" >
    <property name="Caption">Multiplos</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">96</property>
    <property name="Name">Label38</property>
    <property name="ParentFont">0</property>
    <property name="Top">530</property>
    <property name="Width">57</property>
  </object>
  <object class="Label" name="Label32" >
    <property name="Caption">Seguridad</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">17</property>
    <property name="Name">Label32</property>
    <property name="ParentFont">0</property>
    <property name="Top">530</property>
    <property name="Width">70</property>
  </object>
  <object class="Edit" name="edseguridad" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">18</property>
    <property name="Name">edseguridad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">35</property>
    <property name="TabStop">0</property>
    <property name="Top">547</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edmultiplos" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">96</property>
    <property name="Name">edmultiplos</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">36</property>
    <property name="TabStop">0</property>
    <property name="Top">547</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label45" >
    <property name="Caption">Reabastecimiento</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">18</property>
    <property name="Name">Label45</property>
    <property name="ParentFont">0</property>
    <property name="Top">580</property>
    <property name="Width">110</property>
  </object>
  <object class="Edit" name="edreabastecimiento" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">17</property>
    <property name="Name">edreabastecimiento</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">35</property>
    <property name="TabStop">0</property>
    <property name="Top">599</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">Pasillo</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">208</property>
    <property name="Name">Label18</property>
    <property name="ParentFont">0</property>
    <property name="Top">481</property>
    <property name="Width">52</property>
  </object>
  <object class="Edit" name="edpasillo" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">208</property>
    <property name="Name">edpasillo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">17</property>
    <property name="Top">499</property>
    <property name="Width">92</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption">Ubicacion</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">208</property>
    <property name="Name">Label20</property>
    <property name="ParentFont">0</property>
    <property name="Top">529</property>
    <property name="Width">70</property>
  </object>
  <object class="Edit" name="edubicacion" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">208</property>
    <property name="Name">edubicacion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">18</property>
    <property name="Top">545</property>
    <property name="Width">93</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">Costo*</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">418</property>
    <property name="Name">Label21</property>
    <property name="ParentFont">0</property>
    <property name="Top">530</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edcosto" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">418</property>
    <property name="Name">edcosto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">19</property>
    <property name="Top">547</property>
    <property name="Width">70</property>
    <property name="jsOnBlur">edcostoJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="ComboBox" name="cbmoneda" >
    <property name="Font">
        <property name="Align">taLeft</property>
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">504</property>
    <property name="Name">cbmoneda</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">20</property>
    <property name="Top">547</property>
    <property name="Width">90</property>
    <property name="jsOnChange">cbmonedaJSChange</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Moneda</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">503</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">530</property>
    <property name="Width">91</property>
  </object>
  <object class="Label" name="Label25" >
    <property name="Caption">Cto. Ultima Compra</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">26</property>
    <property name="Left">418</property>
    <property name="Name">Label25</property>
    <property name="ParentFont">0</property>
    <property name="Top">575</property>
    <property name="Width">82</property>
  </object>
  <object class="Edit" name="edcostoultcomp" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">418</property>
    <property name="Name">edcostoultcomp</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">41</property>
    <property name="TabStop">0</property>
    <property name="Top">605</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edcostoanterior" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">508</property>
    <property name="Name">edcostoanterior</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">42</property>
    <property name="TabStop">0</property>
    <property name="Top">605</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label24" >
    <property name="Caption">Cto. Anterior</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">508</property>
    <property name="Name">Label24</property>
    <property name="ParentFont">0</property>
    <property name="Top">588</property>
    <property name="Width">82</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">A</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">605</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">551</property>
    <property name="Width">15</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">B</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">605</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">575</property>
    <property name="Width">15</property>
  </object>
  <object class="Label" name="Label35" >
    <property name="Caption">C</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">605</property>
    <property name="Name">Label35</property>
    <property name="ParentFont">0</property>
    <property name="Top">599</property>
    <property name="Width">15</property>
  </object>
  <object class="Label" name="Label36" >
    <property name="Caption">D</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">605</property>
    <property name="Name">Label36</property>
    <property name="ParentFont">0</property>
    <property name="Top">623</property>
    <property name="Width">15</property>
  </object>
  <object class="Label" name="Label37" >
    <property name="Caption">E</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">605</property>
    <property name="Name">Label37</property>
    <property name="ParentFont">0</property>
    <property name="Top">647</property>
    <property name="Width">15</property>
  </object>
  <object class="Edit" name="edprecioe" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">626</property>
    <property name="Name">edprecioe</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">25</property>
    <property name="Top">643</property>
    <property name="Width">76</property>
    <property name="jsOnBlur">edprecioeJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edpreciod" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">625</property>
    <property name="Name">edpreciod</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">24</property>
    <property name="Top">619</property>
    <property name="Width">76</property>
    <property name="jsOnBlur">edpreciodJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edprecioc" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">626</property>
    <property name="Name">edprecioc</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">23</property>
    <property name="Top">595</property>
    <property name="Width">76</property>
    <property name="jsOnBlur">edpreciocJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edpreciob" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">626</property>
    <property name="Name">edpreciob</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">22</property>
    <property name="Top">571</property>
    <property name="Width">76</property>
    <property name="jsOnBlur">edpreciobJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edprecioa" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">626</property>
    <property name="Name">edprecioa</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">21</property>
    <property name="Top">547</property>
    <property name="Width">76</property>
    <property name="jsOnBlur">edprecioaJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Precio</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">626</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">530</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">% Utilidad</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">703</property>
    <property name="Name">Label14</property>
    <property name="ParentFont">0</property>
    <property name="Top">530</property>
    <property name="Width">65</property>
  </object>
  <object class="Edit" name="edutilidada" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">709</property>
    <property name="Name">edutilidada</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">26</property>
    <property name="Top">547</property>
    <property name="Width">60</property>
    <property name="jsOnBlur">edutilidadaJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edutilidadb" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">709</property>
    <property name="Name">edutilidadb</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">27</property>
    <property name="Top">571</property>
    <property name="Width">60</property>
    <property name="jsOnBlur">edutilidadbJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edutilidadc" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">708</property>
    <property name="Name">edutilidadc</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">28</property>
    <property name="Top">595</property>
    <property name="Width">60</property>
    <property name="jsOnBlur">edutilidadcJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edutilidadd" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">708</property>
    <property name="Name">edutilidadd</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">29</property>
    <property name="Top">619</property>
    <property name="Width">60</property>
    <property name="jsOnBlur">edutilidaddJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Edit" name="edutilidade" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">708</property>
    <property name="Name">edutilidade</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">30</property>
    <property name="Top">643</property>
    <property name="Width">60</property>
    <property name="jsOnBlur">edutilidadeJSBlur</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="Label" name="lbcore" >
    <property name="Alignment">agRight</property>
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">195</property>
    <property name="Name">lbcore</property>
    <property name="Top">360</property>
    <property name="Width">129</property>
  </object>
  <object class="Label" name="Label33" >
    <property name="Caption">*Costos en pesos.</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">421</property>
    <property name="Name">Label33</property>
    <property name="Top">640</property>
    <property name="Width">112</property>
  </object>
  <object class="Label" name="Label46" >
    <property name="Caption">Cores Sucios</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label46</property>
    <property name="ParentFont">0</property>
    <property name="Top">424</property>
    <property name="Width">76</property>
  </object>
  <object class="Edit" name="edcoresucios" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">edcoresucios</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">23</property>
    <property name="TabStop">0</property>
    <property name="Top">442</property>
    <property name="Width">70</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="HiddenField" name="hfidant" >
    <property name="Height">18</property>
    <property name="Left">435</property>
    <property name="Name">hfidant</property>
    <property name="Top">51</property>
    <property name="Width">98</property>
  </object>
  <object class="HiddenField" name="hfcveant" >
    <property name="Height">18</property>
    <property name="Left">435</property>
    <property name="Name">hfcveant</property>
    <property name="Top">72</property>
    <property name="Width">99</property>
  </object>
  <object class="ComboBox" name="cbestatus" >
    <property name="Enabled">0</property>
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">591</property>
    <property name="Name">cbestatus</property>
    <property name="ParentColor">0</property>
    <property name="Top">72</property>
    <property name="Width">186</property>
    <property name="jsOnKeyPress">edidparteJSKeyPress</property>
  </object>
  <object class="HiddenField" name="hfadjunto" >
    <property name="Height">18</property>
    <property name="Left">296</property>
    <property name="Name">hfadjunto</property>
    <property name="Top">88</property>
    <property name="Width">88</property>
  </object>
</object>
?>
