<?php
<object class="upuestos" name="upuestos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Puestos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">344</property>
  <property name="IsMaster">0</property>
  <property name="Name">upuestos</property>
  <property name="Width">800</property>
  <property name="OnShow">upuestosShow</property>
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
      <property name="Width">73</property>
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
      <property name="Left">650</property>
      <property name="Name">edregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">edregresarClick</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">IdPuesto</property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label1</property>
    <property name="Top">56</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidpuesto" >
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="Name">edidpuesto</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">72</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Nombre</property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label5</property>
    <property name="Top">112</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">13</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">128</property>
    <property name="Width">305</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Area</property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label10</property>
    <property name="Top">168</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbarea" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">13</property>
    <property name="Name">cbarea</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">184</property>
    <property name="Width">261</property>
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
    <property name="Top">234</property>
    <property name="Width">583</property>
  </object>
  <object class="CheckBox" name="chkaccion" >
    <property name="Caption">Responsable en Acciones</property>
    <property name="Height">21</property>
    <property name="Left">371</property>
    <property name="Name">chkaccion</property>
    <property name="Top">128</property>
    <property name="Width">192</property>
  </object>
  <object class="CheckBox" name="chksolicitudes" >
    <property name="Caption">Responsable en Solicitudes de Informatica</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">34</property>
    <property name="Left">368</property>
    <property name="Name">chksolicitudes</property>
    <property name="Top">155</property>
    <property name="Width">195</property>
  </object>
  <object class="CheckBox" name="chkmantos" >
    <property name="Caption">Responsable en Solicitudes a Mantenimientos de Vehiculos</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">34</property>
    <property name="Left">368</property>
    <property name="Name">chkmantos</property>
    <property name="Top">200</property>
    <property name="Width">195</property>
  </object>
  <object class="MySQLQuery" name="sqlgen2" >
        <property name="Left">625</property>
        <property name="Top">95</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLTable" name="tblpuestos" >
        <property name="Left">679</property>
        <property name="Top">89</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields"><![CDATA[a:1:{s:13:&quot;idoportunidad&quot;;s:1:&quot;0&quot;;}]]></property>
    <property name="MasterSource"></property>
    <property name="Name">tblpuestos</property>
    <property name="TableName">puestos</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">735</property>
        <property name="Top">95</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
