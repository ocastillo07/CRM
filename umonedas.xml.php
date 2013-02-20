<?php
<object class="umonedas" name="umonedas" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">umonedas</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">umonedas</property>
  <property name="Width">800</property>
  <property name="OnShow">umonedasShow</property>
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
    <property name="Caption">IdMoneda</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Nombre</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">232</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">152</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidmoneda" >
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="Name">edidmoneda</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">112</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="Height">21</property>
    <property name="Left">232</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">176</property>
    <property name="Width">305</property>
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
    <property name="Top">282</property>
    <property name="Width">583</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Iniciales</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">152</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="ediniciales" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="Name">ediniciales</property>
    <property name="ParentColor">0</property>
    <property name="Top">176</property>
    <property name="Width">123</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Tipo de Cambio de Compra</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">24</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">208</property>
    <property name="Width">171</property>
  </object>
  <object class="Edit" name="edtcc" >
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="Name">edtcc</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">232</property>
    <property name="Width">173</property>
    <property name="jsOnKeyPress">edtccJSKeyPress</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Tipo de Cambio de Venta</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">232</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">208</property>
    <property name="Width">160</property>
  </object>
  <object class="Edit" name="edtc" >
    <property name="Height">21</property>
    <property name="Left">232</property>
    <property name="Name">edtc</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">232</property>
    <property name="Width">162</property>
    <property name="jsOnKeyPress">edtcJSKeyPress</property>
  </object>
  <object class="MySQLQuery" name="sqlgen2" >
        <property name="Left">513</property>
        <property name="Top">87</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLTable" name="tblmonedas" >
        <property name="Left">567</property>
        <property name="Top">89</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields"><![CDATA[a:1:{s:13:&quot;idoportunidad&quot;;s:1:&quot;0&quot;;}]]></property>
    <property name="MasterSource"></property>
    <property name="Name">tblmonedas</property>
    <property name="TableName">monedas</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">615</property>
        <property name="Top">87</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
