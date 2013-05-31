<?php
<object class="uofertasvista" name="uofertasvista" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Vista Ofertas</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">uofertasvista</property>
  <property name="UseAjax">1</property>
  <property name="Width">856</property>
  <property name="OnCreate">uofertasvistaCreate</property>
  <property name="OnShow">uofertasvistaShow</property>
  <property name="jsOnLoad">uofertasvistaJSLoad</property>
  <object class="DBGrid" name="grid" >
    <property name="Columns"><![CDATA[a:22:{i:0;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;IdOferta&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;idoferta&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:1;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Revision&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;idrevision&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:2;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Estatus&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;estatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;60&quot;;}i:3;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Plaza&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;plaza&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;65&quot;;}i:4;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Vendedor&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;vendedor&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Cliente&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;cliente&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Modelo&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;modelo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:7;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Comentario&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;comentario&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;150&quot;;}i:8;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:14:&quot;Financiamiento&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:14:&quot;Financiamiento&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:9;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Chasis&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;costochasis&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:10;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Carroceria&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;costocarroceria&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:11;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Accesorios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;costoaccesorios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:12;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;CostoTotal&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;costo&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:13;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Precio&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:6:&quot;precio&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:14;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:12:&quot;Condicionesp&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;descuento&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:15;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:5:&quot;Total&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:5:&quot;total&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:16;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;%Margen&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;pmargen&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:9:&quot;stNumeric&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;50&quot;;}i:17;a:14:{s:9:&quot;Alignment&quot;;s:8:&quot;taCenter&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:13:&quot;FechaCreacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:13:&quot;fechacreacion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:18;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:4:&quot;Fase&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:4:&quot;fase&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:19;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;TipoCamion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:10:&quot;tipocamion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;70&quot;;}i:20;a:14:{s:9:&quot;Alignment&quot;;s:14:&quot;taRightJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:3:&quot;A&ntilde;o&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:3:&quot;ano&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:2:&quot;80&quot;;}i:21;a:14:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Producto&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;producto&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:8:&quot;SortType&quot;;s:8:&quot;stString&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;200&quot;;}}]]></property>
    <property name="Cursor">crPointer</property>
    <property name="Datasource">dsofertas</property>
    <property name="Height">436</property>
    <property name="Left">12</property>
    <property name="Name">grid</property>
    <property name="ReadOnly">1</property>
    <property name="Top">119</property>
    <property name="Width">844</property>
    <property name="jsOnClick">gridJSClick</property>
    <property name="jsOnDblClick">gridJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="HiddenField" name="hfidoferta" >
    <property name="Height">18</property>
    <property name="Left">634</property>
    <property name="Name">hfidoferta</property>
    <property name="Top">216</property>
    <property name="Width">111</property>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">856</property>
    <object class="Button" name="btneliminar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Eliminar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">221</property>
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
    <object class="Button" name="btnexportar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Exportar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">301</property>
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
      <property name="Top">15</property>
      <property name="Width">123</property>
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
    <property name="Left">70</property>
    <property name="Name">edbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">289</property>
  </object>
  <object class="ComboBox" name="cbofiltro" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:19:{i:0;s:5:&quot;Todos&quot;;i:1;s:8:&quot;IdOferta&quot;;i:2;s:5:&quot;Plaza&quot;;i:3;s:7:&quot;Cliente&quot;;i:5;s:6:&quot;Modelo&quot;;i:6;s:14:&quot;Financiamiento&quot;;i:7;s:10:&quot;TipoCamion&quot;;i:8;s:4:&quot;Fase&quot;;i:9;s:7:&quot;Estatus&quot;;i:10;s:6:&quot;Chasis&quot;;i:11;s:10:&quot;Carroceria&quot;;i:12;s:10:&quot;Accesorios&quot;;i:13;s:10:&quot;CostoTotal&quot;;i:14;s:6:&quot;Precio&quot;;i:15;s:9:&quot;Descuento&quot;;i:16;s:5:&quot;Total&quot;;i:17;s:6:&quot;Margen&quot;;i:19;s:3:&quot;A&ntilde;o&quot;;i:20;s:8:&quot;Producto&quot;;}]]></property>
    <property name="Left">369</property>
    <property name="Name">cbofiltro</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">89</property>
  </object>
  <object class="Button" name="btnbuscar" >
    <property name="Caption">Filtrar</property>
    <property name="Height">25</property>
    <property name="Left">462</property>
    <property name="Name">btnbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">51</property>
    <property name="OnClick">btnbuscarClick</property>
  </object>
  <object class="Edit" name="edgo" >
    <property name="Height">21</property>
    <property name="Left">553</property>
    <property name="Name">edgo</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">41</property>
  </object>
  <object class="Button" name="btngo" >
    <property name="Caption"><![CDATA[&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">609</property>
    <property name="Name">btngo</property>
    <property name="ParentFont">0</property>
    <property name="Top">63</property>
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
    <property name="Left">644</property>
    <property name="Name">btnregresar</property>
    <property name="ParentFont">0</property>
    <property name="Top">63</property>
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
    <property name="Left">680</property>
    <property name="Name">btnsiguiente</property>
    <property name="ParentFont">0</property>
    <property name="Top">63</property>
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
  <object class="HiddenField" name="hfidrevision" >
    <property name="Height">18</property>
    <property name="Left">634</property>
    <property name="Name">hfidrevision</property>
    <property name="Top">241</property>
    <property name="Width">110</property>
  </object>
  <object class="HiddenField" name="hfcliente" >
    <property name="Height">18</property>
    <property name="Left">634</property>
    <property name="Name">hfcliente</property>
    <property name="Top">280</property>
    <property name="Width">110</property>
  </object>
  <object class="Edit" name="edtvendedor" >
    <property name="Height">21</property>
    <property name="Left">70</property>
    <property name="Name">edtvendedor</property>
    <property name="ParentColor">0</property>
    <property name="Top">90</property>
    <property name="Width">289</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Vendedor</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">15</property>
    <property name="Left">12</property>
    <property name="Name">Label2</property>
    <property name="Top">96</property>
    <property name="Width">59</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Rango Fechas:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">15</property>
    <property name="Left">369</property>
    <property name="Name">Label3</property>
    <property name="Top">96</property>
    <property name="Width">83</property>
  </object>
  <object class="DateTimePicker" name="edtdesde" >
    <property name="Height">19</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">462</property>
    <property name="Name">edtdesde</property>
    <property name="Top">93</property>
    <property name="Width">111</property>
  </object>
  <object class="DateTimePicker" name="edthasta" >
    <property name="Height">19</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">598</property>
    <property name="Name">edthasta</property>
    <property name="Top">93</property>
    <property name="Width">112</property>
  </object>
  <object class="Datasource" name="dsofertas" >
        <property name="Left">356</property>
        <property name="Top">164</property>
    <property name="Dataset">sqlofertas</property>
    <property name="Name">dsofertas</property>
  </object>
  <object class="MySQLQuery" name="sqlofertas" >
        <property name="Left">293</property>
        <property name="Top">164</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">100</property>
    <property name="Name">sqlofertas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLQuery" name="sqlexportar" >
        <property name="Left">432</property>
        <property name="Top">160</property>
    <property name="Name">sqlexportar</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
