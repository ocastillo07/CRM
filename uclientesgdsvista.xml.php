<?php
<object class="uclientesgdsvista" name="uclientesgdsvista" baseclass="page">
  <property name="Background"></property>
  <property name="Cached"></property>
  <property name="Caption">Vista clientes</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">544</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Type">REL_XY_LAYOUT</property>
  </property>
  <property name="Name">uclientesgdsvista</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">uclientesgdsvistaShow</property>
  <property name="jsOnLoad">uclientesgdsvistaJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Color">#FF8000</property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfatencion" >
      <property name="Height">17</property>
      <property name="Left">318</property>
      <property name="Name">hfatencion</property>
      <property name="Top">16</property>
      <property name="Width">134</property>
    </object>
    <object class="HiddenField" name="hfidpromotor" >
      <property name="Height">18</property>
      <property name="Left">458</property>
      <property name="Name">hfidpromotor</property>
      <property name="Top">15</property>
      <property name="Width">119</property>
    </object>
  </object>
  <object class="Edit" name="edbuscar" >
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">80</property>
    <property name="Width">243</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Filtrar</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="Top">60</property>
    <property name="Width">43</property>
  </object>
  <object class="ComboBox" name="cbfiltro" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:15:{i:0;s:5:&quot;Todos&quot;;i:1;s:12:&quot;Razon Social&quot;;i:2;s:6:&quot;Nombre&quot;;i:3;s:16:&quot;Apellido Paterno&quot;;i:4;s:16:&quot;Apellido Materno&quot;;i:5;s:3:&quot;RFC&quot;;i:6;s:9:&quot;Direccion&quot;;i:7;s:2:&quot;CP&quot;;i:8;s:7:&quot;Colonia&quot;;i:9;s:6:&quot;Ciudad&quot;;i:10;s:6:&quot;Estado&quot;;i:11;s:7:&quot;Persona&quot;;i:12;s:4:&quot;Tel1&quot;;i:13;s:4:&quot;Tel2&quot;;i:14;s:5:&quot;Email&quot;;}]]></property>
    <property name="Left">253</property>
    <property name="Name">cbfiltro</property>
    <property name="ParentColor">0</property>
    <property name="Top">80</property>
    <property name="Width">120</property>
  </object>
  <object class="Button" name="btnFiltrar" >
    <property name="Caption">Filtrar</property>
    <property name="Height">25</property>
    <property name="Left">596</property>
    <property name="Name">btnFiltrar</property>
    <property name="ParentColor">0</property>
    <property name="Top">76</property>
    <property name="Width">55</property>
  </object>
  <object class="Button" name="btnregresar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption"><![CDATA[&lt;&lt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">720</property>
    <property name="Name">btnregresar</property>
    <property name="Top">76</property>
    <property name="Width">35</property>
    <property name="OnClick">btnregresarClick</property>
  </object>
  <object class="Button" name="btnsiguiente" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption"><![CDATA[&gt;&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">755</property>
    <property name="Name">btnsiguiente</property>
    <property name="Top">76</property>
    <property name="Width">32</property>
    <property name="OnClick">btnsiguienteClick</property>
  </object>
  <object class="Edit" name="edgo" >
    <property name="Height">25</property>
    <property name="Left">658</property>
    <property name="Name">edgo</property>
    <property name="ParentColor">0</property>
    <property name="Top">76</property>
    <property name="Width">25</property>
  </object>
  <object class="Button" name="btngo" >
    <property name="Caption"><![CDATA[&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">684</property>
    <property name="Name">btngo</property>
    <property name="Top">76</property>
    <property name="Width">35</property>
    <property name="OnClick">btngoClick</property>
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
  <object class="ComboBox" name="cbordenar" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:15:{i:0;s:5:&quot;Todos&quot;;s:7:&quot;rsocial&quot;;s:12:&quot;Razon Social&quot;;s:6:&quot;nombre&quot;;s:6:&quot;Nombre&quot;;s:8:&quot;apaterno&quot;;s:16:&quot;Apellido Paterno&quot;;s:8:&quot;amaterno&quot;;s:16:&quot;Apellido Materno&quot;;s:3:&quot;rfc&quot;;s:3:&quot;RFC&quot;;s:9:&quot;direccion&quot;;s:9:&quot;Direccion&quot;;s:2:&quot;cp&quot;;s:2:&quot;CP&quot;;s:7:&quot;colonia&quot;;s:7:&quot;Colonia&quot;;s:9:&quot;municipio&quot;;s:6:&quot;Ciudad&quot;;s:6:&quot;estado&quot;;s:6:&quot;Estado&quot;;s:7:&quot;persona&quot;;s:7:&quot;Persona&quot;;s:4:&quot;tel1&quot;;s:4:&quot;Tel1&quot;;s:4:&quot;tel2&quot;;s:4:&quot;Tel2&quot;;s:5:&quot;email&quot;;s:5:&quot;Email&quot;;}]]></property>
    <property name="Left">377</property>
    <property name="Name">cbordenar</property>
    <property name="ParentColor">0</property>
    <property name="Top">80</property>
    <property name="Width">120</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Filtrar por:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">253</property>
    <property name="Name">Label2</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Ordenar por</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">377</property>
    <property name="Name">Label3</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbord" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:2:{s:3:&quot;Asc&quot;;s:10:&quot;Ascendente&quot;;s:4:&quot;Desc&quot;;s:11:&quot;Descendente&quot;;}]]></property>
    <property name="Left">502</property>
    <property name="Name">cbord</property>
    <property name="ParentColor">0</property>
    <property name="Top">80</property>
    <property name="Width">89</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Orden</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">502</property>
    <property name="Name">Label4</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="lblpagina" >
    <property name="Caption">lblpagina</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">lblpagina</property>
    <property name="Top">518</property>
    <property name="Width">683</property>
  </object>
  <object class="DBGrid" name="dgclientes" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">dsclientes</property>
    <property name="Height">410</property>
    <property name="Left">5</property>
    <property name="Name">dgclientes</property>
    <property name="ReadOnly">1</property>
    <property name="Top">104</property>
    <property name="Width">787</property>
    <property name="jsOnClick">dgclientesJSClick</property>
    <property name="jsOnDblClick">dgclientesJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Datasource" name="dsclientes" >
        <property name="Left">179</property>
        <property name="Top">285</property>
    <property name="Dataset">sqlgen</property>
    <property name="Name">dsclientes</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">266</property>
        <property name="Top">286</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">100</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
