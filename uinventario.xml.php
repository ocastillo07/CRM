<?php
<object class="uinventario" name="uinventario" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Vista Inventario</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">592</property>
  <property name="IsMaster">0</property>
  <property name="Name">uinventario</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnCreate">uinventarioCreate</property>
  <property name="OnShow">uinventarioShow</property>
  <property name="jsOnLoad">uinventarioJSLoad</property>
  <object class="DBGrid" name="grid" >
    <property name="Columns"><![CDATA[a:4:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;IdProducto&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;idproducto&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;ClaveCamion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;ClaveCamion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;300&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Existencias&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;Existencias&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;BackOrder&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;Backorder&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="Cursor">crPointer</property>
    <property name="Datasource">dsinventario</property>
    <property name="Height">468</property>
    <property name="Left">12</property>
    <property name="Name">grid</property>
    <property name="ReadOnly">1</property>
    <property name="Top">100</property>
    <property name="Width">777</property>
    <property name="jsOnClick">gridJSClick</property>
    <property name="jsOnDblClick">gridJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="HiddenField" name="hfidproducto" >
    <property name="Height">18</property>
    <property name="Left">702</property>
    <property name="Name">hfidproducto</property>
    <property name="Top">56</property>
    <property name="Width">87</property>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
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
    <object class="Button" name="btnexportar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Exportar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">207</property>
      <property name="Name">btnexportar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnexportarClick</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Filtrar</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">12</property>
    <property name="Name">Label1</property>
    <property name="Top">73</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edbuscar" >
    <property name="Height">21</property>
    <property name="Left">64</property>
    <property name="Name">edbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">289</property>
  </object>
  <object class="ComboBox" name="cbofiltro" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:5:{i:0;s:5:&quot;Todos&quot;;i:1;s:2:&quot;ID&quot;;i:2;s:5:&quot;Clave&quot;;i:3;s:11:&quot;Existencias&quot;;i:4;s:9:&quot;BackOrder&quot;;}]]></property>
    <property name="Left">360</property>
    <property name="Name">cbofiltro</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">89</property>
    <property name="OnChange">cbofiltroChange</property>
  </object>
  <object class="Button" name="btnbuscar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Filtrar</property>
    <property name="Height">25</property>
    <property name="Left">464</property>
    <property name="Name">btnbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">61</property>
    <property name="Width">51</property>
    <property name="OnClick">btnbuscarClick</property>
  </object>
  <object class="Edit" name="edgo" >
    <property name="Height">21</property>
    <property name="Left">527</property>
    <property name="Name">edgo</property>
    <property name="ParentColor">0</property>
    <property name="Top">63</property>
    <property name="Width">41</property>
  </object>
  <object class="Button" name="btngo" >
    <property name="Caption"><![CDATA[&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">583</property>
    <property name="Name">btngo</property>
    <property name="ParentFont">0</property>
    <property name="Top">61</property>
    <property name="Width">35</property>
    <property name="OnClick">btngoClick</property>
  </object>
  <object class="Button" name="btnregresar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption"><![CDATA[&lt;&lt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">618</property>
    <property name="Name">btnregresar</property>
    <property name="ParentFont">0</property>
    <property name="Top">61</property>
    <property name="Width">35</property>
    <property name="OnClick">btnregresarClick</property>
  </object>
  <object class="Button" name="btnsiguiente" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption"><![CDATA[&gt;&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">654</property>
    <property name="Name">btnsiguiente</property>
    <property name="ParentFont">0</property>
    <property name="Top">61</property>
    <property name="Width">32</property>
    <property name="OnClick">btnsiguienteClick</property>
  </object>
  <object class="Label" name="lblpagina" >
    <property name="Caption">lblpagina</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">12</property>
    <property name="Name">lblpagina</property>
    <property name="Top">575</property>
    <property name="Width">683</property>
  </object>
  <object class="Datasource" name="dsinventario" >
        <property name="Left">372</property>
        <property name="Top">164</property>
    <property name="Dataset">sqlinventario</property>
    <property name="Name">dsinventario</property>
  </object>
  <object class="MySQLQuery" name="sqlinventario" >
        <property name="Left">277</property>
        <property name="Top">164</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">100</property>
    <property name="Name">sqlinventario</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLQuery" name="sqlexportar" >
        <property name="Left">432</property>
        <property name="Top">336</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="Name">sqlexportar</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
