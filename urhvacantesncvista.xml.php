<?php
<object class="urhvacantesncvista" name="urhvacantesncvista" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Vacantes Nueva Creacion</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">624</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhvacantesncvista</property>
  <property name="Width">800</property>
  <property name="OnCreate">urhvacantesncvistaCreate</property>
  <property name="OnShow">urhvacantesncvistaShow</property>
  <property name="jsOnLoad">urhvacantesncvistaJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">188</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
    <object class="Button" name="btneliminar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Eliminar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">272</property>
      <property name="Name">btneliminar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btneliminarJSClick</property>
    </object>
    <object class="HiddenField" name="hfidsolicitud" >
      <property name="Height">14</property>
      <property name="Left">647</property>
      <property name="Name">hfidsolicitud</property>
      <property name="Top">17</property>
      <property name="Width">136</property>
    </object>
    <object class="Button" name="btnexportar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Exportar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">352</property>
      <property name="Name">btnexportar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnexportarClick</property>
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
      <property name="Top">8</property>
      <property name="Width">171</property>
    </object>
  </object>
  <object class="DBGrid" name="grid" >
    <property name="Columns"><![CDATA[a:7:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;IdSolicitud&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;idsolicitud&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;FechaCreacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;fechacreacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Plaza&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;plaza&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Departamento&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;area&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Puesto&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;puesto&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:5;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;FechaPropuesta&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;fechapropuesta&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:6;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Estatus&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;estatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}}]]></property>
    <property name="Cursor">crPointer</property>
    <property name="Datasource">dsgrid</property>
    <property name="Height">447</property>
    <property name="Left">9</property>
    <property name="Name">grid</property>
    <property name="ReadOnly">1</property>
    <property name="Top">124</property>
    <property name="Width">783</property>
    <property name="jsOnClick">gridJSClick</property>
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
    <property name="Left">8</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">73</property>
    <property name="Width">51</property>
  </object>
  <object class="Edit" name="edbuscar" >
    <property name="Height">21</property>
    <property name="Left">72</property>
    <property name="Name">edbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">273</property>
  </object>
  <object class="ComboBox" name="cbofiltro" >
    <property name="Height">21</property>
    <property name="ItemIndex">0</property>
    <property name="Items"><![CDATA[a:7:{i:0;s:5:&quot;Todos&quot;;i:1;s:11:&quot;IDSolicitud&quot;;i:2;s:13:&quot;FechaCreacion&quot;;i:3;s:7:&quot;IdPlaza&quot;;i:4;s:12:&quot;Departamento&quot;;i:5;s:6:&quot;Puesto&quot;;i:6;s:14:&quot;FechaPropuesta&quot;;}]]></property>
    <property name="Left">352</property>
    <property name="Name">cbofiltro</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">121</property>
  </object>
  <object class="Button" name="btnbuscar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Filtrar</property>
    <property name="Height">25</property>
    <property name="Left">481</property>
    <property name="Name">btnbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">61</property>
    <property name="Width">55</property>
    <property name="OnClick">btnbuscarClick</property>
  </object>
  <object class="Edit" name="edgo" >
    <property name="Height">21</property>
    <property name="Left">545</property>
    <property name="Name">edgo</property>
    <property name="ParentColor">0</property>
    <property name="Top">63</property>
    <property name="Width">41</property>
  </object>
  <object class="Button" name="btngo" >
    <property name="Caption"><![CDATA[&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">591</property>
    <property name="Name">btngo</property>
    <property name="Top">61</property>
    <property name="Width">35</property>
    <property name="OnClick">btngoClick</property>
  </object>
  <object class="Button" name="btnregresar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption"><![CDATA[&lt;&lt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">631</property>
    <property name="Name">btnregresar</property>
    <property name="Top">61</property>
    <property name="Width">35</property>
    <property name="OnClick">btnregresarClick</property>
  </object>
  <object class="Button" name="btnsiguiente" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption"><![CDATA[&gt;&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">671</property>
    <property name="Name">btnsiguiente</property>
    <property name="Top">61</property>
    <property name="Width">32</property>
    <property name="OnClick">btnsiguienteClick</property>
  </object>
  <object class="ComboBox" name="cbestatus" >
    <property name="Height">21</property>
    <property name="ItemIndex">109</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">72</property>
    <property name="Name">cbestatus</property>
    <property name="ParentColor">0</property>
    <property name="Top">97</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Estatus</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">105</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="lblpagina" >
    <property name="Caption">lblpagina</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">lblpagina</property>
    <property name="ParentFont">0</property>
    <property name="Top">583</property>
    <property name="Width">683</property>
  </object>
  <object class="Datasource" name="dsgrid" >
        <property name="Left">189</property>
        <property name="Top">278</property>
    <property name="Dataset">sqlgrid</property>
    <property name="Name">dsgrid</property>
  </object>
  <object class="MySQLQuery" name="sqlgrid" >
        <property name="Left">112</property>
        <property name="Top">278</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">0</property>
    <property name="Name">sqlgrid</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
