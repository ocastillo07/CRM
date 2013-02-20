<?php
<object class="uareas" name="uareas" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Areas</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">uareas</property>
  <property name="Width">800</property>
  <property name="OnShow">uareasShow</property>
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
    <property name="Caption">IdArea</property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label1</property>
    <property name="Top">88</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Nombre</property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label2</property>
    <property name="Top">160</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidarea" >
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="Name">edidarea</property>
    <property name="ReadOnly">1</property>
    <property name="Top">112</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="Name">ednombre</property>
    <property name="Top">184</property>
    <property name="Width">305</property>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario:</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">29</property>
    <property name="Name">lbufh</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">258</property>
    <property name="Width">583</property>
  </object>
  <object class="MySQLQuery" name="sqlgen2" >
        <property name="Left">521</property>
        <property name="Top">87</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLTable" name="tblareas" >
        <property name="Left">575</property>
        <property name="Top">81</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields"><![CDATA[a:1:{s:13:&quot;idoportunidad&quot;;s:1:&quot;0&quot;;}]]></property>
    <property name="MasterSource"></property>
    <property name="Name">tblareas</property>
    <property name="TableName">areas</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">647</property>
        <property name="Top">79</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
