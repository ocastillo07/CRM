<?php
<object class="upropuestasvista" name="upropuestasvista" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Vista Propuestas</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">upropuestasvista</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnAfterAjaxProcess">F</property>
  <property name="OnCreate">upropuestasvistaCreate</property>
  <property name="OnShow">upropuestasvistaShow</property>
  <property name="jsOnLoad">upropuestasvistaJSLoad</property>
  <object class="DBGrid" name="grid" >
    <property name="Columns">a:0:{}</property>
    <property name="Cursor">crPointer</property>
    <property name="Datasource">dspropuestas</property>
    <property name="Height">468</property>
    <property name="Left">12</property>
    <property name="Name">grid</property>
    <property name="ReadOnly">1</property>
    <property name="Top">100</property>
    <property name="Width">777</property>
    <property name="jsOnClick">gridJSClick</property>
    <property name="jsOnDblClick">gridJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="HiddenField" name="hfidpropuesta" >
    <property name="Height">18</property>
    <property name="Left">690</property>
    <property name="Name">hfidpropuesta</property>
    <property name="Top">56</property>
    <property name="Width">110</property>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
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
    <property name="Left">64</property>
    <property name="Name">edbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">241</property>
  </object>
  <object class="ComboBox" name="cbofiltro" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:9:{i:0;s:5:&quot;Todos&quot;;i:1;s:8:&quot;IdOferta&quot;;i:2;s:5:&quot;Plaza&quot;;i:3;s:7:&quot;Cliente&quot;;i:4;s:8:&quot;Vendedor&quot;;i:5;s:8:&quot;Vehiculo&quot;;i:6;s:7:&quot;Estatus&quot;;i:7;s:5:&quot;Plazo&quot;;i:8;s:14:&quot;Tipo Propuesta&quot;;}]]></property>
    <property name="Left">320</property>
    <property name="Name">cbofiltro</property>
    <property name="ParentColor">0</property>
    <property name="Top">65</property>
    <property name="Width">129</property>
  </object>
  <object class="Button" name="btnbuscar" >
    <property name="Caption">Filtrar</property>
    <property name="Height">25</property>
    <property name="Left">464</property>
    <property name="Name">btnbuscar</property>
    <property name="ParentColor">0</property>
    <property name="Top">61</property>
    <property name="Width">51</property>
    <property name="OnClick">btnbuscarClick</property>
  </object>
  <object class="Edit" name="edgo" >
    <property name="Height">21</property>
    <property name="Left">527</property>
    <property name="Name">edgo</property>
    <property name="ParentColor">0</property>
    <property name="Top">63</property>
    <property name="Width">41</property>
  </object>
  <object class="Button" name="btngo" >
    <property name="Caption"><![CDATA[&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">583</property>
    <property name="Name">btngo</property>
    <property name="ParentFont">0</property>
    <property name="Top">61</property>
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
    <property name="Left">618</property>
    <property name="Name">btnregresar</property>
    <property name="ParentFont">0</property>
    <property name="Top">61</property>
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
    <property name="Left">654</property>
    <property name="Name">btnsiguiente</property>
    <property name="ParentFont">0</property>
    <property name="Top">61</property>
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
    <property name="Left">690</property>
    <property name="Name">hfidrevision</property>
    <property name="Top">81</property>
    <property name="Width">110</property>
  </object>
  <object class="HiddenField" name="hfcliente" >
    <property name="Height">18</property>
    <property name="Left">690</property>
    <property name="Name">hfcliente</property>
    <property name="Top">120</property>
    <property name="Width">110</property>
  </object>
  <object class="Datasource" name="dspropuestas" >
        <property name="Left">356</property>
        <property name="Top">164</property>
    <property name="Dataset">sqlpropuestas</property>
    <property name="Name">dspropuestas</property>
  </object>
  <object class="MySQLQuery" name="sqlpropuestas" >
        <property name="Left">277</property>
        <property name="Top">164</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">100</property>
    <property name="Name">sqlpropuestas</property>
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
