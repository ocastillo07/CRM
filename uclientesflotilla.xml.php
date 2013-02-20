<?php
<object class="uclientesflotilla" name="uclientesflotilla" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Flotilla Clientes</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">uclientesflotilla</property>
  <property name="Width">1000</property>
  <property name="OnCreate">uclientesflotillaCreate</property>
  <property name="OnShow">uclientesflotillaShow</property>
  <object class="Panel" name="pmenu" >
    <property name="Alignment">agCenter</property>
    <property name="Background">imagenes/bar.png</property>
    <property name="Caption">Menu Principal</property>
    <property name="Color">#FF8000</property>
    <property name="Dynamic"></property>
    <property name="Font">
        <property name="Align">taCenter</property>
        <property name="Size">14</property>
    </property>
    <property name="Height">48</property>
    <property name="Name">pmenu</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Width">200</property>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Left">200</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF9B37</property>
      <property name="Height">25</property>
      <property name="Left">23</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="Top">11</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btngcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF9B37</property>
      <property name="Height">25</property>
      <property name="Left">105</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">11</property>
      <property name="Width">131</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Color">#FF9B37</property>
      <property name="Height">25</property>
      <property name="Left">424</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">11</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
    <object class="Button" name="btneliminar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Eliminar</property>
      <property name="Color">#FF9B37</property>
      <property name="Height">25</property>
      <property name="Left">511</property>
      <property name="Name">btneliminar</property>
      <property name="ParentColor">0</property>
      <property name="Top">11</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btneliminarJSClick</property>
    </object>
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF9B37</property>
      <property name="Height">25</property>
      <property name="Left">597</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">11</property>
      <property name="Width">75</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Id. Flotilla</property>
    <property name="Height">13</property>
    <property name="Left">207</property>
    <property name="Name">Label1</property>
    <property name="Top">56</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="lblufh" >
    <property name="Caption">Usuario:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">207</property>
    <property name="Name">lblufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">165</property>
    <property name="Width">296</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Tipo Camion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">207</property>
    <property name="Name">Label12</property>
    <property name="Top">120</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidcontador" >
    <property name="Height">21</property>
    <property name="Left">207</property>
    <property name="Name">edidcontador</property>
    <property name="ParentColor">0</property>
    <property name="Top">76</property>
    <property name="Width">121</property>
  </object>
  <object class="ComboBox" name="cbtipo" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">207</property>
    <property name="Name">cbtipo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">136</property>
    <property name="Width">129</property>
  </object>
  <object class="Label" name="lblprocedencia" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">334</property>
    <property name="Name">lblprocedencia</property>
    <property name="Top">76</property>
    <property name="Width">200</property>
  </object>
  <object class="HiddenField" name="hfidcliente" >
    <property name="Height">18</property>
    <property name="Left">23</property>
    <property name="Name">hfidcliente</property>
    <property name="Top">232</property>
    <property name="Value">0</property>
    <property name="Width">89</property>
  </object>
  <object class="HiddenField" name="hfnombre" >
    <property name="Height">18</property>
    <property name="Left">23</property>
    <property name="Name">hfnombre</property>
    <property name="Top">259</property>
    <property name="Value">0</property>
    <property name="Width">89</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Cantidad</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">358</property>
    <property name="Name">Label13</property>
    <property name="Top">117</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edcantidad" >
    <property name="Height">21</property>
    <property name="Left">358</property>
    <property name="Name">edcantidad</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">136</property>
    <property name="Width">78</property>
  </object>
  <object class="DBGrid" name="dgflotilla" >
    <property name="Columns"><![CDATA[a:3:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;IdCamion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;idcontador&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Nombre&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;nombre&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Cantidad&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;cantidad&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
    <property name="DataSource">dsflotilla</property>
    <property name="Height">344</property>
    <property name="Left">624</property>
    <property name="Name">dgflotilla</property>
    <property name="Top">56</property>
    <property name="Width">360</property>
    <property name="jsOnDblClick">dgflotillaJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">23</property>
    <property name="Name">hfestatus</property>
    <property name="Top">203</property>
    <property name="Value">0</property>
    <property name="Width">89</property>
  </object>
  <object class="HiddenField" name="hfidcontador" >
    <property name="Height">18</property>
    <property name="Left">23</property>
    <property name="Name">hfidcontador</property>
    <property name="Top">291</property>
    <property name="Width">89</property>
  </object>
  <object class="MySQLTable" name="tblflotilla" >
        <property name="Left">132</property>
        <property name="Top">121</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tblflotilla</property>
    <property name="TableName">clientesflotilla</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">128</property>
        <property name="Top">62</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="dsflotilla" >
        <property name="Left">41</property>
        <property name="Top">127</property>
    <property name="DataSet">sqlflotilla</property>
    <property name="Name">dsflotilla</property>
  </object>
  <object class="MySQLQuery" name="sqlflotilla" >
        <property name="Left">42</property>
        <property name="Top">62</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlflotilla</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
