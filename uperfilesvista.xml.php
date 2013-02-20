<?php
<object class="uperfilesvista" name="uperfilesvista" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Perfiles</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">552</property>
  <property name="IsMaster">0</property>
  <property name="Name">uperfilesvista</property>
  <property name="Width">800</property>
  <property name="OnShow">uperfilesvistaShow</property>
  <property name="jsOnLoad">uperfilesvistaJSLoad</property>
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
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">7</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
    <object class="Button" name="btneliminar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Eliminar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">224</property>
      <property name="Name">btneliminar</property>
      <property name="ParentColor">0</property>
      <property name="Top">7</property>
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
      <property name="Top">7</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btnderechosJSClick</property>
    </object>
  </object>
  <object class="DBGrid" name="grid" >
    <property name="Columns"><![CDATA[a:2:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:9:&quot;IdUsuario&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;idusuario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Nombre&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;nombre&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;200&quot;;}}]]></property>
    <property name="DataSource">dstabla</property>
    <property name="Height">464</property>
    <property name="Left">5</property>
    <property name="Name">grid</property>
    <property name="ReadOnly">1</property>
    <property name="Top">54</property>
    <property name="Width">780</property>
    <property name="jsOnDblClick">gridJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="MySQLQuery" name="sqltabla" >
        <property name="Left">200</property>
        <property name="Top">87</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqltabla</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:27:&quot;select * from users limit 1&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dstabla" >
        <property name="Left">462</property>
        <property name="Top">93</property>
    <property name="Dataset">sqltabla</property>
    <property name="Name">dstabla</property>
  </object>
</object>
?>
