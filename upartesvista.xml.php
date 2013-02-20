<?php
<object class="upartesvista" name="upartesvista" baseclass="page">
  <property name="Background"></property>
  <property name="Cached"></property>
  <property name="Caption">Vista Partes</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">576</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Type">REL_XY_LAYOUT</property>
  </property>
  <property name="Name">upartesvista</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">upartesvistaShow</property>
  <property name="jsOnLoad">upartesvistaJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Color">#FF8000</property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfatencion" >
      <property name="Height">18</property>
      <property name="Left">517</property>
      <property name="Name">hfatencion</property>
      <property name="Top">16</property>
      <property name="Width">134</property>
    </object>
    <object class="Button" name="btnregra" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">650</property>
      <property name="Name">btnregra</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnregraClick</property>
    </object>
  </object>
  <object class="Edit" name="edfiltrar" >
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">edfiltrar</property>
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
    <property name="Items"><![CDATA[a:4:{i:0;s:5:&quot;Todos&quot;;i:1;s:8:&quot;Cveparte&quot;;i:2;s:11:&quot;Descripcion&quot;;i:3;s:5:&quot;Linea&quot;;}]]></property>
    <property name="Left">253</property>
    <property name="Name">cbfiltro</property>
    <property name="ParentColor">0</property>
    <property name="Top">80</property>
    <property name="Width">120</property>
  </object>
  <object class="Button" name="btnFiltrar" >
    <property name="Caption">Filtrar</property>
    <property name="Height">25</property>
    <property name="Left">396</property>
    <property name="Name">btnFiltrar</property>
    <property name="ParentColor">0</property>
    <property name="Top">76</property>
    <property name="Width">55</property>
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
  <object class="Label" name="Label2" >
    <property name="Caption">Filtrar por:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">253</property>
    <property name="Name">Label2</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="Panel" name="pvista" >
    <property name="Caption">pvista</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">401</property>
    <property name="Left">6</property>
    <property name="Name">pvista</property>
    <property name="Top">112</property>
    <property name="Width">787</property>
    <object class="DBGrid" name="dgpartes" >
      <property name="Columns"><![CDATA[a:6:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;CveParte&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;CveParte&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Descripcion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;Descripcion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;250&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Almacen&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;Almacen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Costo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Costo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Precio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;Precio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:14:&quot;taRightJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Linea&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;Linea&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="DataSource">dspartes</property>
      <property name="Height">370</property>
      <property name="Name">dgpartes</property>
      <property name="ReadOnly">1</property>
      <property name="Width">787</property>
      <property name="jsOnDblClick">dgpartesJSDblClick</property>
      <property name="jsOnRowChanged"></property>
      <property name="jsOnRowSaved"></property>
    </object>
    <object class="Label" name="lblpagina" >
      <property name="Caption">lblpagina</property>
      <property name="Height">13</property>
      <property name="Name">lblpagina</property>
      <property name="Top">376</property>
      <property name="Width">683</property>
    </object>
  </object>
  <object class="Edit" name="edgo" >
    <property name="Height">21</property>
    <property name="Left">487</property>
    <property name="Name">edgo</property>
    <property name="ParentColor">0</property>
    <property name="Top">80</property>
    <property name="Width">41</property>
  </object>
  <object class="Button" name="btngo" >
    <property name="Caption"><![CDATA[&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">543</property>
    <property name="Name">btngo</property>
    <property name="Top">76</property>
    <property name="Width">35</property>
    <property name="OnClick">btngoClick</property>
  </object>
  <object class="Button" name="btnregresar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption"><![CDATA[&lt;&lt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">25</property>
    <property name="Left">579</property>
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
    <property name="Left">614</property>
    <property name="Name">btnsiguiente</property>
    <property name="Top">76</property>
    <property name="Width">32</property>
    <property name="OnClick">btnsiguienteClick</property>
  </object>
  <object class="HiddenField" name="hfidcliente" >
    <property name="Height">18</property>
    <property name="Left">517</property>
    <property name="Name">hfidcliente</property>
    <property name="Top">53</property>
    <property name="Width">112</property>
  </object>
  <object class="HiddenField" name="hfidpromotor" >
    <property name="Height">18</property>
    <property name="Left">644</property>
    <property name="Name">hfidpromotor</property>
    <property name="Top">53</property>
    <property name="Width">104</property>
  </object>
  <object class="Datasource" name="dspartes" >
        <property name="Left">174</property>
        <property name="Top">181</property>
    <property name="Dataset">sqlgen</property>
    <property name="Name">dspartes</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">261</property>
        <property name="Top">182</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">100</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
