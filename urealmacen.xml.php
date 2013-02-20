<?php
<object class="urealmacen" name="urealmacen" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">urealmacen</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">urealmacen</property>
  <property name="Width">800</property>
  <property name="OnShow">urealmacenShow</property>
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
    <object class="HiddenField" name="hfpass" >
      <property name="Height">18</property>
      <property name="Left">468</property>
      <property name="Name">hfpass</property>
      <property name="Top">15</property>
      <property name="Width">92</property>
    </object>
    <object class="HiddenField" name="hfpassactual" >
      <property name="Height">18</property>
      <property name="Left">571</property>
      <property name="Name">hfpassactual</property>
      <property name="Top">15</property>
      <property name="Width">81</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">139</property>
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
      <property name="Left">228</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
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
    <object class="Button" name="edregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">674</property>
      <property name="Name">edregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">edregresarClick</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Id Almacen</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">91</property>
  </object>
  <object class="Edit" name="edidalmacen" >
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="Name">edidalmacen</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">112</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="MaxLength">100</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">160</property>
    <property name="Width">336</property>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario:</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">24</property>
    <property name="Name">lbufh</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">322</property>
    <property name="Width">583</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Nombre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">144</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="eddir" >
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="Name">eddir</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">216</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Direccion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">23</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">200</property>
    <property name="Width">59</property>
  </object>
  <object class="Edit" name="ednumero" >
    <property name="Height">21</property>
    <property name="Left">152</property>
    <property name="Name">ednumero</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">216</property>
    <property name="Width">81</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Numero</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">152</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">200</property>
    <property name="Width">59</property>
  </object>
  <object class="Edit" name="edcolonia" >
    <property name="Height">21</property>
    <property name="Left">237</property>
    <property name="Name">edcolonia</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">216</property>
    <property name="Width">305</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Colonia</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">237</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">200</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edciudad" >
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="Name">edciudad</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">272</property>
    <property name="Width">125</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Ciudad</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">256</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edestado" >
    <property name="Height">21</property>
    <property name="Left">155</property>
    <property name="Name">edestado</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">272</property>
    <property name="Width">137</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Estado</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">155</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">256</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edcp" >
    <property name="Height">21</property>
    <property name="Left">548</property>
    <property name="Name">edcp</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">216</property>
    <property name="Width">113</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">CP</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">548</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">200</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edcontacto" >
    <property name="Height">21</property>
    <property name="Left">368</property>
    <property name="MaxLength">150</property>
    <property name="Name">edcontacto</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">160</property>
    <property name="Width">336</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Contacto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">368</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">144</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edtelefono" >
    <property name="Height">21</property>
    <property name="Left">304</property>
    <property name="Name">edtelefono</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">272</property>
    <property name="Width">125</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Telefono</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">304</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">256</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edfax" >
    <property name="Height">21</property>
    <property name="Left">435</property>
    <property name="Name">edfax</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">272</property>
    <property name="Width">137</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Fax</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">435</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">256</property>
    <property name="Width">75</property>
  </object>
  <object class="MySQLQuery" name="sqlgen2" >
        <property name="Left">513</property>
        <property name="Top">63</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLTable" name="tblalmacen" >
        <property name="Left">567</property>
        <property name="Top">65</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields"><![CDATA[a:1:{s:13:&quot;idoportunidad&quot;;s:1:&quot;0&quot;;}]]></property>
    <property name="MasterSource"></property>
    <property name="Name">tblalmacen</property>
    <property name="TableName">plazas</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">615</property>
        <property name="Top">63</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
