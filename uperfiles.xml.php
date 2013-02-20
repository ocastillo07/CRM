<?php
<object class="uperfiles" name="uperfiles" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Perfiles</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">264</property>
  <property name="IsMaster">0</property>
  <property name="Name">uperfiles</property>
  <property name="Width">800</property>
  <property name="OnShow">uperfilesShow</property>
  <property name="jsOnLoad">uperfilesJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="ActiveLayer">V</property>
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
      <property name="Layer">V</property>
      <property name="Left">141</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="Top">7</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btngcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Layer">V</property>
      <property name="Left">228</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">7</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="edregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Layer">V</property>
      <property name="Left">615</property>
      <property name="Name">edregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">7</property>
      <property name="Width">75</property>
      <property name="OnClick">edregresarClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[&lt;FONT color=#004080&gt;&lt;STRONG&gt;lbtitulo &lt;/STRONG&gt;&lt;/FONT&gt;]]></property>
      <property name="Font">
            <property name="Color">#004080</property>
            <property name="Size">12</property>
            <property name="Weight">bolder</property>
      </property>
      <property name="Height">19</property>
      <property name="Layer">V</property>
      <property name="Left">5</property>
      <property name="Name">lbtitulo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">13</property>
      <property name="Width">123</property>
    </object>
    <object class="Button" name="btnderechos" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Derechos</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Layer">V</property>
      <property name="Left">344</property>
      <property name="Name">btnderechos</property>
      <property name="ParentColor">0</property>
      <property name="Top">7</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btnderechosJSClick</property>
    </object>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">484</property>
    <property name="Name">hfestatus</property>
    <property name="Top">72</property>
    <property name="Value">0</property>
    <property name="Width">82</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Idperfil</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidusuario" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="Name">edidusuario</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">80</property>
    <property name="Width">121</property>
    <property name="jsOnKeyPress">edidusuarioJSKeyPress</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Nombre</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">120</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">136</property>
    <property name="Width">305</property>
    <property name="jsOnKeyPress">edidusuarioJSKeyPress</property>
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
    <property name="Top">226</property>
    <property name="Width">583</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">615</property>
        <property name="Top">71</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLTable" name="tblusuarios" >
        <property name="Left">735</property>
        <property name="Top">73</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields"><![CDATA[a:1:{s:13:&quot;idoportunidad&quot;;s:1:&quot;0&quot;;}]]></property>
    <property name="MasterSource"></property>
    <property name="Name">tblusuarios</property>
    <property name="TableName">usuarios</property>
  </object>
</object>
?>
