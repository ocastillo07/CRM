<?php
<object class="uprocedimientos" name="uprocedimientos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Procedimientos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">344</property>
  <property name="IsMaster">0</property>
  <property name="Name">uprocedimientos</property>
  <property name="Width">800</property>
  <property name="OnShow">uprocedimientosShow</property>
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
  <object class="Label" name="Label1" >
    <property name="Caption">IdProcedimiento</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">56</property>
    <property name="Width">108</property>
  </object>
  <object class="Edit" name="edidprocedimiento" >
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="Name">edidprocedimiento</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">1</property>
    <property name="Top">72</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Nombre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">205</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">221</property>
    <property name="Width">305</property>
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
    <property name="Top">263</property>
    <property name="Width">583</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Prefijo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">109</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edprefijo" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="MaxLength">3</property>
    <property name="Name">edprefijo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">125</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Numero</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">157</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="ednumero" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="MaxLength">9</property>
    <property name="Name">ednumero</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">173</property>
    <property name="Width">121</property>
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
  <object class="MySQLTable" name="tblprocedimientos" >
        <property name="Left">604</property>
        <property name="Top">81</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:1:{s:13:"idoportunidad";s:1:"0";}</property>
    <property name="MasterSource"></property>
    <property name="Name">tblprocedimientos</property>
    <property name="TableName">accionesprocedimientos</property>
  </object>
</object>
?>
