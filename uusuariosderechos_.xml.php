<?php
<object class="uusuariosderechos" name="uusuariosderechos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Derechos a Usuarios</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">376</property>
  <property name="IsMaster">0</property>
  <property name="Name">uusuariosderechos</property>
  <property name="Width">800</property>
  <property name="OnCreate">uusuariosderechosCreate</property>
  <property name="OnShow">uusuariosderechosShow</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Derechos</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">72</property>
    <property name="Width">75</property>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Cached"></property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfestatus" >
      <property name="Height">18</property>
      <property name="Left">460</property>
      <property name="Name">hfestatus</property>
      <property name="Top">16</property>
      <property name="Value">0</property>
      <property name="Width">82</property>
    </object>
    <object class="HiddenField" name="hfcount" >
      <property name="Height">18</property>
      <property name="Left">549</property>
      <property name="Name">hfcount</property>
      <property name="Top">16</property>
      <property name="Width">60</property>
    </object>
    <object class="HiddenField" name="hfidusuario" >
      <property name="Height">18</property>
      <property name="Left">616</property>
      <property name="Name">hfidusuario</property>
      <property name="Top">16</property>
      <property name="Width">94</property>
    </object>
    <object class="HiddenField" name="hfvalor" >
      <property name="Height">18</property>
      <property name="Left">720</property>
      <property name="Name">hfvalor</property>
      <property name="Top">16</property>
      <property name="Width">61</property>
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
      <property name="Left">224</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="btnliberar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Liberar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">344</property>
      <property name="Name">btnliberar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnliberarClick</property>
    </object>
    <object class="Button" name="btnbloquear" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Bloquear</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">432</property>
      <property name="Name">btnbloquear</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnbloquearClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[<FONT color=#004080><STRONG>lbtitulo </STRONG></FONT>]]></property>
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
  <object class="Label" name="lblderechos" >
    <property name="Caption">lblderechos</property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">lblderechos</property>
    <property name="Top">104</property>
    <property name="Width">611</property>
  </object>
  <object class="MySQLQuery" name="sqlderechos" >
        <property name="Left">113</property>
        <property name="Top">81</property>
    <property name="Active"></property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlderechos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
