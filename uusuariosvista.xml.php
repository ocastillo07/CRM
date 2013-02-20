<?php
<object class="uusuariosvista" name="uusuariosvista" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Vista Usuarios</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">uusuariosvista</property>
  <property name="Width">800</property>
  <property name="OnShow">uusuariosvistaShow</property>
  <property name="jsOnLoad">uusuariosvistaJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfidus" >
      <property name="Height">18</property>
      <property name="Left">408</property>
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
    <object class="Button" name="btnderechos" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Derechos</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">304</property>
      <property name="Name">btnderechos</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btnderechosJSClick</property>
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
  <object class="DBGrid" name="grid" >
    <property name="Columns"><![CDATA[a:7:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;IdUsuario&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;idusuario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;Iniciales&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;iniciales&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Nombre&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;nombre&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;250&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Estatus&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;estatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Area&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;area&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Puesto&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;puesto&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:6;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Plaza&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;plaza&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">dspuestos</property>
    <property name="Height">448</property>
    <property name="Left">5</property>
    <property name="Name">grid</property>
    <property name="ReadOnly">1</property>
    <property name="Top">118</property>
    <property name="Width">788</property>
    <property name="jsOnDblClick">gridJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Filtrar</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">57</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edbuscar" >
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">73</property>
    <property name="Width">257</property>
  </object>
  <object class="ComboBox" name="cbofiltro" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:5:{i:0;s:5:&quot;Todos&quot;;i:1;s:9:&quot;IdUsuario&quot;;i:2;s:9:&quot;Iniciales&quot;;i:3;s:6:&quot;Nombre&quot;;i:4;s:7:&quot;Estatus&quot;;}]]></property>
    <property name="Left">274</property>
    <property name="Name">cbofiltro</property>
    <property name="ParentColor">0</property>
    <property name="Top">73</property>
    <property name="Width">89</property>
  </object>
  <object class="Button" name="btnbuscar" >
    <property name="Caption">Filtrar</property>
    <property name="Height">27</property>
    <property name="Left">729</property>
    <property name="Name">btnbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">73</property>
    <property name="Width">51</property>
  </object>
  <object class="HiddenField" name="hfpagina" >
    <property name="Height">18</property>
    <property name="Left">689</property>
    <property name="Name">hfpagina</property>
    <property name="Top">48</property>
    <property name="Width">104</property>
  </object>
  <object class="ComboBox" name="cbarea" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">378</property>
    <property name="Name">cbarea</property>
    <property name="ParentColor">0</property>
    <property name="Top">73</property>
    <property name="Width">113</property>
  </object>
  <object class="ComboBox" name="cbpuesto" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">506</property>
    <property name="Name">cbpuesto</property>
    <property name="ParentColor">0</property>
    <property name="Top">73</property>
    <property name="Width">105</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Filtro</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">274</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">57</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Area</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">378</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">57</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Puesto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">506</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">57</property>
    <property name="Width">51</property>
  </object>
  <object class="ComboBox" name="cbplaza" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">618</property>
    <property name="Name">cbplaza</property>
    <property name="ParentColor">0</property>
    <property name="Top">73</property>
    <property name="Width">105</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Plaza</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">618</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">57</property>
    <property name="Width">51</property>
  </object>
  <object class="MySQLQuery" name="sqlpuestos" >
        <property name="Left">200</property>
        <property name="Top">159</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlpuestos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:27:&quot;select * from users limit 1&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dspuestos" >
        <property name="Left">294</property>
        <property name="Top">157</property>
    <property name="Dataset">sqlpuestos</property>
    <property name="Name">dspuestos</property>
  </object>
</object>
?>
