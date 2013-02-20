<?php
<object class="uofertasdet" name="uofertasdet" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Detalle Oferta</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">344</property>
  <property name="IsMaster">0</property>
  <property name="Name">uofertasdet</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">uofertasdetShow</property>
  <object class="Panel" name="detalle" >
    <property name="BorderWidth">1</property>
    <property name="Height">209</property>
    <property name="Name">detalle</property>
    <property name="Top">97</property>
    <property name="Width">800</property>
    <object class="ComboBox" name="cbotipo" >
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">16</property>
      <property name="Name">cbotipo</property>
      <property name="ParentColor">0</property>
      <property name="Top">6</property>
      <property name="Width">153</property>
      <property name="OnChange">cbotipoChange</property>
    </object>
    <object class="ComboBox" name="cboaccesorio" >
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Left">184</property>
      <property name="Name">cboaccesorio</property>
      <property name="ParentColor">0</property>
      <property name="Top">6</property>
      <property name="Width">457</property>
    </object>
    <object class="Button" name="btnagregar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">+</property>
      <property name="Font">
            <property name="Size">12</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">658</property>
      <property name="Name">btnagregar</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">6</property>
      <property name="Width">51</property>
      <property name="OnClick">btnagregarClick</property>
    </object>
    <object class="DBGrid" name="grid" >
      <property name="Columns">a:7:{i:0;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:10:"idproducto";s:5:"Color";s:0:"";s:9:"Fieldname";s:10:"idproducto";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:1:"0";}i:1;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:4:"Tipo";s:5:"Color";s:0:"";s:9:"Fieldname";s:6:"nombre";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:3:"100";}i:2;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:5:"Clave";s:5:"Color";s:0:"";s:9:"Fieldname";s:5:"clave";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:3:"100";}i:3;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:11:"Descripcion";s:5:"Color";s:0:"";s:9:"Fieldname";s:11:"descripcion";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:3:"250";}i:4;a:14:{s:9:"Alignment";s:14:"taRightJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:5:"Costo";s:5:"Color";s:0:"";s:9:"Fieldname";s:5:"costo";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:3:"100";}i:5;a:14:{s:9:"Alignment";s:14:"taRightJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:6:"Precio";s:5:"Color";s:0:"";s:9:"Fieldname";s:6:"precio";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:3:"100";}i:6;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:6:"Moneda";s:5:"Color";s:0:"";s:9:"Fieldname";s:6:"moneda";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:3:"100";}}</property>
      <property name="DataSource">dsofertasdet</property>
      <property name="Height">171</property>
      <property name="Left">16</property>
      <property name="Name">grid</property>
      <property name="ReadOnly">1</property>
      <property name="Top">28</property>
      <property name="Width">770</property>
      <property name="jsOnClick">gridJSClick</property>
      <property name="jsOnRowChanged"></property>
      <property name="jsOnRowSaved"></property>
    </object>
    <object class="Button" name="btneliminar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">-</property>
      <property name="Font">
            <property name="Size">12</property>
            <property name="Style">fsNormal</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">714</property>
      <property name="Name">btneliminar</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">6</property>
      <property name="Width">51</property>
      <property name="OnClick">btneliminarClick</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[<P><STRONG>Equipo Aliado</STRONG></P>]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">82</property>
    <property name="Width">123</property>
  </object>
  <object class="HiddenField" name="hfidproducto" >
    <property name="Height">18</property>
    <property name="Left">548</property>
    <property name="Name">hfidproducto</property>
    <property name="Top">69</property>
    <property name="Value">0</property>
    <property name="Width">104</property>
  </object>
  <object class="HiddenField" name="hfidoferta" >
    <property name="Height">18</property>
    <property name="Left">548</property>
    <property name="Name">hfidoferta</property>
    <property name="Top">50</property>
    <property name="Width">104</property>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">50</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">27</property>
      <property name="Top">9</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="edregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">650</property>
      <property name="Name">edregresar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">27</property>
      <property name="Top">9</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
  </object>
  <object class="Label" name="lbtitulo" >
    <property name="Caption"><![CDATA[<FONT color=#004080><STRONG>lbtitulo </STRONG></FONT>]]></property>
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
  <object class="Datasource" name="dsofertasdet" >
        <property name="Left">354</property>
        <property name="Top">50</property>
    <property name="Dataset">sqlofertadet</property>
    <property name="Name">dsofertasdet</property>
  </object>
  <object class="MySQLQuery" name="sqlofertadet" >
        <property name="Left">440</property>
        <property name="Top">50</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="Name">sqlofertadet</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:5:{i:0;s:150:"select p.idproducto as idproducto,tp.nombre as nombre, p.clave as clave,p.descripcion as descripcion, det.costo as costo,det.precio as precio,m.moneda";i:1;s:20:"from ofertasdet det ";i:2;s:52:"left join productos p on p.idproducto=det.idproducto";i:3;s:49:"left join productostipos tp on p.idtipo=tp.idtipo";i:4;s:42:"left join monedas m on m.idmoneda=p.moneda";}</property>
  </object>
  <object class="MySQLTable" name="tbofertasdet" >
        <property name="Left">285</property>
        <property name="Top">50</property>
    <property name="Active">1</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbofertasdet</property>
    <property name="TableName">ofertasdet</property>
  </object>
  <object class="MySQLQuery" name="sqlgeneral" >
        <property name="Left">680</property>
        <property name="Top">50</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgeneral</property>
    <property name="Order"></property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="dstbofertasdet" >
        <property name="Left">744</property>
        <property name="Top">50</property>
    <property name="DataSet">tbofertasdet</property>
    <property name="Name">dstbofertasdet</property>
  </object>
</object>
?>
