<?php
<object class="urhtpc" name="urhtpc" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Tiempo Contratacion</property>
  <property name="Color">#c0c0c0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">256</property>
  <property name="IsMaster">0</property>
  <property name="Name">urhtpc</property>
  <property name="Width">800</property>
  <property name="OnCreate">urhtpcCreate</property>
  <property name="OnShow">urhtpcShow</property>
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
      <property name="Left">141</property>
      <property name="Name">btngenerar</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btngenerarClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[&lt;P&gt;&lt;FONT color=#004080&gt;&lt;STRONG&gt;Reportes&lt;/STRONG&gt;&lt;/FONT&gt;&lt;/P&gt;]]></property>
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
  <object class="Label" name="Label2" >
    <property name="Caption">Periodo:</property>
    <property name="Height">13</property>
    <property name="Left">18</property>
    <property name="Name">Label2</property>
    <property name="Top">141</property>
    <property name="Width">75</property>
  </object>
  <object class="DateTimePicker" name="dtf1" >
    <property name="Caption">dtf1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">112</property>
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
    <property name="Left">230</property>
    <property name="Name">dtf2</property>
    <property name="ShowsTime">0</property>
    <property name="TimeZone">GMT</property>
    <property name="Top">141</property>
    <property name="Width">104</property>
  </object>
  <object class="ComboBox" name="cbtipos" >
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:4:{i:0;s:5:&quot;TODOS&quot;;s:2:&quot;AC&quot;;s:21:&quot;AUMENTA COLABORADORES&quot;;s:2:&quot;NC&quot;;s:14:&quot;NUEVA CREACION&quot;;s:3:&quot;ORG&quot;;s:11:&quot;ORGANIGRAMA&quot;;}]]></property>
    <property name="Left">104</property>
    <property name="Name">cbtipos</property>
    <property name="ParentColor">0</property>
    <property name="Top">69</property>
    <property name="Width">321</property>
    <property name="OnChange">cbtiposChange</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Tipos</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">10</property>
    <property name="Name">Label3</property>
    <property name="Top">74</property>
    <property name="Width">75</property>
  </object>
  <object class="RadioGroup" name="rgciudad" >
    <property name="Color">#c0c0c0</property>
    <property name="Height">116</property>
    <property name="ItemIndex">0</property>
    <property name="Items"><![CDATA[a:4:{i:0;s:5:&quot;Todas&quot;;i:1;s:8:&quot;Mexicali&quot;;i:2;s:7:&quot;Tijuana&quot;;i:3;s:8:&quot;Ensenada&quot;;}]]></property>
    <property name="Left">464</property>
    <property name="Name">rgciudad</property>
    <property name="Top">69</property>
    <property name="Width">161</property>
  </object>
</object>
?>
