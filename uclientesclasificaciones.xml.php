<?php
<object class="uasuntos" name="uasuntos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Asuntos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">344</property>
  <property name="IsMaster">0</property>
  <property name="Name">uasuntos</property>
  <property name="Width">800</property>
  <property name="OnShow">uasuntosShow</property>
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
      <property name="Left">228</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
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
    <object class="Button" name="edregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">650</property>
      <property name="Name">edregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">edregresarClick</property>
    </object>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="Color">#C0C0C0</property>
    <property name="Height">250</property>
    <property name="Left">9</property>
    <property name="Name">Panel2</property>
    <property name="Top">62</property>
    <property name="Width">781</property>
    <object class="Label" name="Label1" >
      <property name="Caption">IdAsunto</property>
      <property name="Height">13</property>
      <property name="Left">13</property>
      <property name="Name">Label1</property>
      <property name="Top">32</property>
      <property name="Width">108</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Nombre</property>
      <property name="Height">13</property>
      <property name="Left">13</property>
      <property name="Name">Label5</property>
      <property name="Top">88</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="lbufh" >
      <property name="Caption">Usuario:</property>
      <property name="Font">
            <property name="Color">#808080</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">13</property>
      <property name="Name">lbufh</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">146</property>
      <property name="Width">583</property>
    </object>
    <object class="Edit" name="edidasunto" >
      <property name="Height">21</property>
      <property name="Left">13</property>
      <property name="Name">edidasunto</property>
      <property name="ParentColor">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">48</property>
      <property name="Width">121</property>
    </object>
    <object class="Edit" name="ednombre" >
      <property name="CharCase">ecUpperCase</property>
      <property name="Height">21</property>
      <property name="Left">13</property>
      <property name="Name">ednombre</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">4</property>
      <property name="Top">104</property>
      <property name="Width">305</property>
    </object>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">684</property>
        <property name="Top">71</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLTable" name="tblasuntos" >
        <property name="Left">596</property>
        <property name="Top">73</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:1:{s:13:"idoportunidad";s:1:"0";}</property>
    <property name="MasterSource"></property>
    <property name="Name">tblasuntos</property>
    <property name="TableName">actividadesasuntos</property>
  </object>
</object>
?>
