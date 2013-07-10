<?php
<object class="userefacciones" name="userefacciones" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Asignar Refacciones</property>
  <property name="Color">#F2F2F2</property>
  <property name="DocType">dtNone</property>
  <property name="Height">376</property>
  <property name="IsMaster">0</property>
  <property name="Name">userefacciones</property>
  <property name="Width">800</property>
  <property name="OnShow">userefaccionesShow</property>
  <property name="jsOnLoad">userefaccionesJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfestatus" >
      <property name="Height">18</property>
      <property name="Left">380</property>
      <property name="Name">hfestatus</property>
      <property name="Top">15</property>
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
      <property name="Left">7</property>
      <property name="Name">lbtitulo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">10</property>
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
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Label" name="Label31" >
      <property name="Caption">Guardar</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">182</property>
      <property name="Name">Label31</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">31</property>
      <property name="Width">50</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Label" name="Label32" >
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">240</property>
      <property name="Name">Label32</property>
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
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Height">25</property>
      <property name="ImageSource">imagenes/img_regresar.png</property>
      <property name="Left">751</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Label" name="Label34" >
      <property name="Caption">Regresar</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">736</property>
      <property name="Name">Label34</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">31</property>
      <property name="Width">55</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Image" name="Image1" >
      <property name="Border">0</property>
      <property name="Cursor">crPointer</property>
      <property name="Height">25</property>
      <property name="ImageSource">imagenes/img_imprimir.png</property>
      <property name="Left">672</property>
      <property name="Link"></property>
      <property name="LinkTarget"></property>
      <property name="Name">Image1</property>
      <property name="Stretch">1</property>
      <property name="Top">4</property>
      <property name="Width">25</property>
      <property name="jsOnClick">btnimprimirJSClick</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Imprimir</property>
      <property name="Cursor">crPointer</property>
      <property name="Font">
            <property name="Color">#FFFFFF</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">14</property>
      <property name="Left">656</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">30</property>
      <property name="Width">56</property>
      <property name="jsOnClick">btnimprimirJSClick</property>
    </object>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario:</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">430</property>
    <property name="Name">lbufh</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">138</property>
    <property name="Width">353</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Estatus</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">599</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">54</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label29" >
    <property name="Caption">Recalcular</property>
    <property name="Color">#F2F2F2</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">476</property>
    <property name="Name">Label29</property>
    <property name="ParentFont">0</property>
    <property name="Top">168</property>
    <property name="Width">81</property>
    <property name="jsOnClick">imgcalcularJSClick</property>
  </object>
  <object class="Image" name="imgcalcular" >
    <property name="Border">0</property>
    <property name="Cursor">crPointer</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/img_calculadora.png</property>
    <property name="Left">440</property>
    <property name="Link"></property>
    <property name="LinkTarget"></property>
    <property name="Name">imgcalcular</property>
    <property name="Stretch">1</property>
    <property name="Top">162</property>
    <property name="Width">25</property>
    <property name="jsOnClick">imgcalcularJSClick</property>
  </object>
  <object class="HiddenField" name="hfidcontador" >
    <property name="Height">18</property>
    <property name="Left">7</property>
    <property name="Name">hfidcontador</property>
    <property name="Top">319</property>
    <property name="Width">85</property>
  </object>
  <object class="Label" name="lbdetalle" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">lbdetalle</property>
    <property name="Top">296</property>
    <property name="Width">781</property>
  </object>
  <object class="HiddenField" name="hfidestatus" >
    <property name="Height">18</property>
    <property name="Left">705</property>
    <property name="Name">hfidestatus</property>
    <property name="Top">49</property>
    <property name="Width">78</property>
  </object>
  <object class="Edit" name="edestatus" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
        <property name="Color">#808080</property>
        <property name="Size">11</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">599</property>
    <property name="Name">edestatus</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">69</property>
    <property name="Width">190</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Serie</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">54</property>
    <property name="Width">35</property>
  </object>
  <object class="Edit" name="edserie" >
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edserie</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">69</property>
    <property name="Width">33</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Edit" name="edcliente" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">61</property>
    <property name="Name">edcliente</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">113</property>
    <property name="Width">359</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Cliente</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">97</property>
    <property name="Width">49</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Id Servicio</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">44</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">54</property>
    <property name="Width">83</property>
  </object>
  <object class="Edit" name="edidservicio" >
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">44</property>
    <property name="Name">edidservicio</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">69</property>
    <property name="Width">113</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Edit" name="edidcliente" >
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edidcliente</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">113</property>
    <property name="Width">50</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">VIN o Chasis</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">430</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">97</property>
    <property name="Width">82</property>
  </object>
  <object class="Edit" name="edvin" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">430</property>
    <property name="Name">edvin</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">113</property>
    <property name="Width">175</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Tipo Unidad</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">612</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">97</property>
    <property name="Width">76</property>
  </object>
  <object class="Edit" name="edunidad" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">612</property>
    <property name="Name">edunidad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">113</property>
    <property name="Width">175</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="HiddenField" name="hfdetalle" >
    <property name="Height">18</property>
    <property name="Left">190</property>
    <property name="Name">hfdetalle</property>
    <property name="Top">319</property>
    <property name="Width">84</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Tipo Servicio</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">430</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">54</property>
    <property name="Width">86</property>
  </object>
  <object class="Edit" name="edtipo" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
        <property name="Color">#808080</property>
        <property name="Size">11</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">430</property>
    <property name="Name">edtipo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">67</property>
    <property name="Width">150</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="HiddenField" name="hfidtipopago" >
    <property name="Height">18</property>
    <property name="Left">94</property>
    <property name="Name">hfidtipopago</property>
    <property name="Top">319</property>
    <property name="Width">91</property>
  </object>
  <object class="Edit" name="edparte" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">88</property>
    <property name="Name">edparte</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">258</property>
    <property name="Width">112</property>
    <property name="jsOnBlur">edparteJSBlur</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
    <property name="jsOnKeyUp">edparteJSKeyUp</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">Parte</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">88</property>
    <property name="Name">Label18</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">51</property>
  </object>
  <object class="Button" name="btnpartes" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Busca</property>
    <property name="Height">25</property>
    <property name="Hint">Click para Buscar una Parte</property>
    <property name="ImageSource">imagenes/edit-find22.png</property>
    <property name="Left">204</property>
    <property name="Name">btnpartes</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">10</property>
    <property name="Top">254</property>
    <property name="Width">25</property>
    <property name="OnClick">btnpartesClick</property>
  </object>
  <object class="Edit" name="eddescripcion" >
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">237</property>
    <property name="Name">eddescripcion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">258</property>
    <property name="Width">215</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">Descripcion</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">237</property>
    <property name="Name">Label19</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">80</property>
  </object>
  <object class="Edit" name="edcantidad" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">499</property>
    <property name="Name">edcantidad</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">11</property>
    <property name="Top">258</property>
    <property name="Width">36</property>
    <property name="jsOnBlur">edcantidadJSBlur</property>
    <property name="jsOnKeyPress">edcantidadJSKeyPress</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption">Cant</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">499</property>
    <property name="Name">Label20</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">32</property>
  </object>
  <object class="Edit" name="edcosto" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">539</property>
    <property name="Name">edcosto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">258</property>
    <property name="Width">60</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">Costo</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">539</property>
    <property name="Name">Label21</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edexistencia" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">454</property>
    <property name="Name">edexistencia</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">258</property>
    <property name="Width">36</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label26" >
    <property name="Caption">Exist.</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">11</property>
    <property name="Left">451</property>
    <property name="Name">Label26</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">43</property>
  </object>
  <object class="Edit" name="edimporte" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">680</property>
    <property name="Name">edimporte</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">258</property>
    <property name="Width">76</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label28" >
    <property name="Caption">Importe</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">680</property>
    <property name="Name">Label28</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">51</property>
  </object>
  <object class="Image" name="btnagregar" >
    <property name="Border">0</property>
    <property name="Cursor">crPointer</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/img_agregar.png</property>
    <property name="Left">761</property>
    <property name="Link"></property>
    <property name="LinkTarget"></property>
    <property name="Name">btnagregar</property>
    <property name="Stretch">1</property>
    <property name="Top">254</property>
    <property name="Width">25</property>
    <property name="jsOnClick">btnagregarJSClick</property>
  </object>
  <object class="Edit" name="edprecio" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">613</property>
    <property name="Name">edprecio</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">12</property>
    <property name="Top">258</property>
    <property name="Width">58</property>
    <property name="jsOnBlur">edcantidadJSBlur</property>
    <property name="jsOnKeyPress">edprecioJSKeyPress</property>
  </object>
  <object class="Label" name="lbprecio" >
    <property name="Caption">Precio</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">609</property>
    <property name="Name">lbprecio</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">67</property>
  </object>
  <object class="ComboBox" name="cbmoneda" >
    <property name="Enabled">0</property>
    <property name="Font">
        <property name="Align">taLeft</property>
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">64</property>
    <property name="Name">cbmoneda</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">212</property>
    <property name="Width">78</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Moneda</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">64</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">194</property>
    <property name="Width">58</property>
  </object>
  <object class="Edit" name="edtc" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">150</property>
    <property name="Name">edtc</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">212</property>
    <property name="Width">42</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">TC</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">150</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">194</property>
    <property name="Width">39</property>
  </object>
  <object class="ComboBox" name="cbpiva" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">196</property>
    <property name="Name">cbpiva</property>
    <property name="ParentColor">0</property>
    <property name="Top">212</property>
    <property name="Width">113</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">% IVA</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">196</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">194</property>
    <property name="Width">44</property>
  </object>
  <object class="Edit" name="edsubtotal" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">320</property>
    <property name="Name">edsubtotal</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">212</property>
    <property name="Width">109</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">Subtotal</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">11</property>
    <property name="Left">320</property>
    <property name="Name">Label14</property>
    <property name="ParentFont">0</property>
    <property name="Top">196</property>
    <property name="Width">59</property>
  </object>
  <object class="Edit" name="ediva" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">440</property>
    <property name="Name">ediva</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">212</property>
    <property name="Width">109</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">IVA</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">440</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">194</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edtotal" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">556</property>
    <property name="Name">edtotal</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">212</property>
    <property name="Width">109</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Total</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">556</property>
    <property name="Name">Label16</property>
    <property name="ParentFont">0</property>
    <property name="Top">194</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edpartidas" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">edpartidas</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">212</property>
    <property name="Width">51</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label27" >
    <property name="Caption">Partidas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label27</property>
    <property name="ParentFont">0</property>
    <property name="Top">194</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edtotalmn" >
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">676</property>
    <property name="Name">edtotalmn</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">212</property>
    <property name="Width">109</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
  </object>
  <object class="Label" name="Label33" >
    <property name="Caption">Total MN</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">676</property>
    <property name="Name">Label33</property>
    <property name="ParentFont">0</property>
    <property name="Top">194</property>
    <property name="Width">75</property>
  </object>
  <object class="HiddenField" name="hfprecio1" >
    <property name="Height">18</property>
    <property name="Left">7</property>
    <property name="Name">hfprecio1</property>
    <property name="Top">343</property>
    <property name="Value">0</property>
    <property name="Width">94</property>
  </object>
  <object class="HiddenField" name="hfprecio2" >
    <property name="Height">18</property>
    <property name="Left">103</property>
    <property name="Name">hfprecio2</property>
    <property name="Top">343</property>
    <property name="Value">0</property>
    <property name="Width">94</property>
  </object>
  <object class="HiddenField" name="hfprecio3" >
    <property name="Height">18</property>
    <property name="Left">201</property>
    <property name="Name">hfprecio3</property>
    <property name="Top">343</property>
    <property name="Value">0</property>
    <property name="Width">94</property>
  </object>
  <object class="HiddenField" name="hfprecio4" >
    <property name="Height">18</property>
    <property name="Left">297</property>
    <property name="Name">hfprecio4</property>
    <property name="Top">343</property>
    <property name="Value">0</property>
    <property name="Width">94</property>
  </object>
  <object class="HiddenField" name="hfprecio5" >
    <property name="Height">18</property>
    <property name="Left">395</property>
    <property name="Name">hfprecio5</property>
    <property name="Top">343</property>
    <property name="Value">0</property>
    <property name="Width">94</property>
  </object>
  <object class="HiddenField" name="hfpreciodefault" >
    <property name="Height">18</property>
    <property name="Left">493</property>
    <property name="Name">hfpreciodefault</property>
    <property name="Top">343</property>
    <property name="Value">0</property>
    <property name="Width">106</property>
  </object>
  <object class="HiddenField" name="hfsupercision" >
    <property name="Height">18</property>
    <property name="Left">279</property>
    <property name="Name">hfsupercision</property>
    <property name="Top">319</property>
    <property name="Width">91</property>
  </object>
  <object class="HiddenField" name="hfidalmacen" >
    <property name="Height">18</property>
    <property name="Left">375</property>
    <property name="Name">hfidalmacen</property>
    <property name="Top">319</property>
    <property name="Width">114</property>
  </object>
  <object class="HiddenField" name="hfidasesor" >
    <property name="Height">18</property>
    <property name="Left">493</property>
    <property name="Name">hfidasesor</property>
    <property name="Top">319</property>
    <property name="Width">106</property>
  </object>
  <object class="HiddenField" name="hfprecio" >
    <property name="Height">18</property>
    <property name="Left">609</property>
    <property name="Name">hfprecio</property>
    <property name="Top">343</property>
    <property name="Width">88</property>
  </object>
  <object class="Edit" name="edoperador" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edoperador</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">258</property>
    <property name="Width">46</property>
    <property name="jsOnBlur">edoperadorJSBlur</property>
    <property name="jsOnKeyPress">edserieJSKeyPress</property>
    <property name="jsOnKeyUp">edparteJSKeyUp</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Operador</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">240</property>
    <property name="Width">53</property>
  </object>
  <object class="Button" name="btnoperador" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Busca</property>
    <property name="Height">25</property>
    <property name="Hint">Click para Buscar un Operador</property>
    <property name="ImageSource">imagenes/edit-find22.png</property>
    <property name="Left">54</property>
    <property name="Name">btnoperador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">2</property>
    <property name="Top">254</property>
    <property name="Width">25</property>
    <property name="OnClick">btnoperadorClick</property>
  </object>
  <object class="HiddenField" name="hfidoperador" >
    <property name="Height">18</property>
    <property name="Left">609</property>
    <property name="Name">hfidoperador</property>
    <property name="Top">319</property>
    <property name="Width">90</property>
  </object>
  <object class="HiddenField" name="hfimprimir" >
    <property name="Height">18</property>
    <property name="Left">615</property>
    <property name="Name">hfimprimir</property>
    <property name="Top">164</property>
    <property name="Value">0</property>
    <property name="Width">89</property>
  </object>
</object>
?>
