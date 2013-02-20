<?php
<object class="udiasfvosvista" name="udiasfvosvista" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Dias Festivos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">udiasfvosvista</property>
  <property name="Width">800</property>
  <property name="OnCreate">udiasfvosvistaCreate</property>
  <property name="OnShow">udiasfvosvistaShow</property>
  <property name="jsOnLoad">udiasfvosvistaJSLoad</property>
  <object class="DBGrid" name="grid" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource">dstabla</property>
    <property name="Height">424</property>
    <property name="Left">6</property>
    <property name="Name">grid</property>
    <property name="ReadOnly">1</property>
    <property name="Top">102</property>
    <property name="Width">788</property>
    <property name="jsOnDblClick">gridJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Probar si un dia es Habil:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">18</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">179</property>
  </object>
  <object class="DateTimePicker" name="dtfecha" >
    <property name="Caption">dtfecha</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y/%m/%d</property>
    <property name="Left">200</property>
    <property name="Name">dtfecha</property>
    <property name="ShowsTime">0</property>
    <property name="Top">60</property>
    <property name="Width">136</property>
  </object>
  <object class="Button" name="btnprobar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Aceptar</property>
    <property name="Height">25</property>
    <property name="ImageSource">imagenes/edit-find22.png</property>
    <property name="Left">344</property>
    <property name="Name">btnprobar</property>
    <property name="ParentColor">0</property>
    <property name="Top">52</property>
    <property name="Width">25</property>
    <property name="OnClick">btnprobarClick</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption"><![CDATA[Nota: Se toma como dia Festivo el Viernes Santo, Valido hasta el a&ntilde;o 2300 segun el Algoritmo de Butcher]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">18</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">638</property>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="Width">800</property>
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
    <object class="Panel" name="Panel1" >
      <property name="Background">imagenes/bar2.png</property>
      <property name="Dynamic"></property>
      <property name="Height">48</property>
      <property name="Name">Panel1</property>
      <property name="ParentColor">0</property>
      <property name="Width">800</property>
      <object class="HiddenField" name="hfestatus" >
        <property name="Height">18</property>
        <property name="Left">580</property>
        <property name="Name">hfestatus</property>
        <property name="Top">16</property>
        <property name="Value">0</property>
        <property name="Width">82</property>
      </object>
      <object class="Button" name="btnguardar" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Guardar</property>
        <property name="Color">#FF8000</property>
        <property name="Height">32</property>
        <property name="Left">228</property>
        <property name="Name">btnguardar</property>
        <property name="ParentColor">0</property>
        <property name="Top">8</property>
        <property name="Width">75</property>
        <property name="OnClick">btnguardarClick</property>
      </object>
      <object class="Button" name="btngcerrar" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Guardar y Cerrar</property>
        <property name="Color">#FF8000</property>
        <property name="Height">32</property>
        <property name="Left">316</property>
        <property name="Name">btngcerrar</property>
        <property name="ParentColor">0</property>
        <property name="Top">8</property>
        <property name="Width">107</property>
        <property name="OnClick">btngcerrarClick</property>
      </object>
      <object class="Button" name="edregresar" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Regresar</property>
        <property name="Color">#FF8000</property>
        <property name="Height">32</property>
        <property name="Left">690</property>
        <property name="Name">edregresar</property>
        <property name="ParentColor">0</property>
        <property name="Top">8</property>
        <property name="Width">75</property>
        <property name="OnClick">edregresarClick</property>
      </object>
      <object class="Button" name="Button1" >
        <property name="ButtonType">btNormal</property>
        <property name="Caption">Nuevo</property>
        <property name="Color">#FF8000</property>
        <property name="Height">32</property>
        <property name="Left">140</property>
        <property name="Name">Button1</property>
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
  </object>
  <object class="MySQLQuery" name="sqltabla" >
        <property name="Left">369</property>
        <property name="Top">175</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqltabla</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:0:&quot;&quot;;}]]></property>
  </object>
  <object class="Datasource" name="dstabla" >
        <property name="Left">455</property>
        <property name="Top">173</property>
    <property name="Dataset">sqltabla</property>
    <property name="Name">dstabla</property>
  </object>
</object>
?>
