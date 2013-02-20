<?php
<object class="urepactividades" name="urepactividades" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Actividades</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">296</property>
  <property name="IsMaster">0</property>
  <property name="Name">urepactividades</property>
  <property name="Width">800</property>
  <property name="OnCreate">urepactividadesCreate</property>
  <property name="OnShow">urepactividadesShow</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Color">#FF8000</property>
    <property name="Height">49</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Button" name="btngenerar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Generar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btngenerar</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btngenerarClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[&lt;P&gt;&lt;FONT color=#004080&gt;&lt;STRONG&gt;Reporte Actividades&lt;/STRONG&gt;&lt;/FONT&gt;&lt;/P&gt;]]></property>
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
      <property name="Width">139</property>
    </object>
  </object>
  <object class="Label" name="lbreporte" >
    <property name="Caption">Vendedor:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">42</property>
    <property name="Name">lbreporte</property>
    <property name="Top">101</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Periodo:</property>
    <property name="Height">13</property>
    <property name="Left">42</property>
    <property name="Name">Label2</property>
    <property name="Top">141</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbusuario" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">136</property>
    <property name="Name">cbusuario</property>
    <property name="ParentColor">0</property>
    <property name="Top">101</property>
    <property name="Width">321</property>
  </object>
  <object class="RadioGroup" name="rgimpresion" >
    <property name="Height">89</property>
    <property name="ItemIndex">0</property>
    <property name="Items"><![CDATA[a:3:{i:0;s:3:&quot;PDF&quot;;i:1;s:5:&quot;EXCEL&quot;;i:2;s:4:&quot;WORD&quot;;}]]></property>
    <property name="Left">376</property>
    <property name="Name">rgimpresion</property>
    <property name="ParentColor">0</property>
    <property name="Top">141</property>
    <property name="Width">81</property>
  </object>
  <object class="DateTimePicker" name="dtf1" >
    <property name="Caption">dtf1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">136</property>
    <property name="Name">dtf1</property>
    <property name="ShowsTime">0</property>
    <property name="TimeZone">GMT</property>
    <property name="Top">141</property>
    <property name="Width">104</property>
  </object>
  <object class="DateTimePicker" name="dtf2" >
    <property name="Caption">dtf2</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">254</property>
    <property name="Name">dtf2</property>
    <property name="ShowsTime">0</property>
    <property name="TimeZone">GMT</property>
    <property name="Top">141</property>
    <property name="Width">104</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">120</property>
        <property name="Top">189</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
