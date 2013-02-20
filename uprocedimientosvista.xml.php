<?php
<object class="uprocedimientosvista" name="uprocedimientosvista" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Vista Procedimientos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">544</property>
  <property name="IsMaster">0</property>
  <property name="Name">uprocedimientosvista</property>
  <property name="Width">800</property>
  <property name="OnCreate">uprocedimientosvistaCreate</property>
  <property name="OnShow">uprocedimientosvistaShow</property>
  <property name="jsOnLoad">uprocedimientosvistaJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfidus" >
      <property name="Height">18</property>
      <property name="Left">496</property>
      <property name="Name">hfidus</property>
      <property name="Top">15</property>
      <property name="Width">64</property>
    </object>
    <object class="Button" name="btneliminar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Eliminar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">224</property>
      <property name="Name">btneliminar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btneliminarJSClick</property>
    </object>
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
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
  </object>
  <object class="DBGrid" name="dgprocedimientos" >
    <property name="Columns"><![CDATA[a:4:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;IdProcedimiento&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;IdProcedimiento&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;Procedimiento&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;Procedimiento&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;250&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:0:&quot;&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Prefijo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;prefijo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Numero&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;numero&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}}]]></property>
    <property name="DataSource">dsprocedimientos</property>
    <property name="Height">432</property>
    <property name="Left">5</property>
    <property name="Name">dgprocedimientos</property>
    <property name="ReadOnly">1</property>
    <property name="Top">94</property>
    <property name="Width">788</property>
    <property name="jsOnDblClick">dgprocedimientosJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Filtrar</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="Top">73</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edbuscar" >
    <property name="Height">21</property>
    <property name="Left">69</property>
    <property name="Name">edbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">289</property>
  </object>
  <object class="ComboBox" name="cbofiltro" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:5:{i:0;s:5:&quot;Todos&quot;;i:1;s:15:&quot;IdProcedimiento&quot;;i:2;s:13:&quot;Procedimiento&quot;;i:3;s:7:&quot;Prefijo&quot;;i:4;s:6:&quot;Numero&quot;;}]]></property>
    <property name="Left">365</property>
    <property name="Name">cbofiltro</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">89</property>
  </object>
  <object class="Button" name="btnbuscar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Filtrar</property>
    <property name="Height">25</property>
    <property name="Left">461</property>
    <property name="Name">btnbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">61</property>
    <property name="Width">55</property>
    <property name="OnClick">btnbuscarClick</property>
  </object>
  <object class="MySQLQuery" name="sqlprocedimientos" >
        <property name="Left">312</property>
        <property name="Top">175</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlprocedimientos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:0:&quot;&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dsprocedimientos" >
        <property name="Left">454</property>
        <property name="Top">173</property>
    <property name="Dataset">sqlprocedimientos</property>
    <property name="Name">dsprocedimientos</property>
  </object>
</object>
?>
