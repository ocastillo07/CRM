<?php
<object class="uofertasmotivos" name="uofertasmotivos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Motivos Cancelacion</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">392</property>
  <property name="IsMaster">0</property>
  <property name="Name">uofertasmotivos</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">uofertasmotivosShow</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">50</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">650</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">27</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Label" name="lbtitulo2" >
      <property name="Caption"><![CDATA[<FONT color=#004080><STRONG>lbtitulo </STRONG></FONT>]]></property>
      <property name="Font">
            <property name="Color">#004080</property>
            <property name="Size">12</property>
            <property name="Weight">bolder</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">5</property>
      <property name="Name">lbtitulo2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">15</property>
      <property name="Width">123</property>
    </object>
  </object>
  <object class="Label" name="lbtitulo" >
    <property name="Caption"><![CDATA[<P><STRONG>Motivo de cancelacion</STRONG></P>]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">15</property>
    <property name="Name">lbtitulo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">55</property>
    <property name="Width">155</property>
  </object>
  <object class="HiddenField" name="hfidrevision" >
    <property name="Height">18</property>
    <property name="Left">285</property>
    <property name="Name">hfidrevision</property>
    <property name="Top">90</property>
    <property name="Width">96</property>
  </object>
  <object class="Label" name="lbnotas" >
    <property name="Caption">Comentario</property>
    <property name="Cursor">crPointer</property>
    <property name="Height">13</property>
    <property name="Name">lbnotas</property>
    <property name="ParentColor">0</property>
    <property name="Top">173</property>
    <property name="Width">83</property>
  </object>
  <object class="Memo" name="mnotas" >
    <property name="Height">60</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mnotas</property>
    <property name="ParentColor">0</property>
    <property name="Top">190</property>
    <property name="Width">799</property>
  </object>
  <object class="Edit" name="edoferta" >
    <property name="Height">21</property>
    <property name="Name">edoferta</property>
    <property name="ParentColor">0</property>
    <property name="Top">98</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">IdOferta</property>
    <property name="Height">13</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="Top">78</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbomotivo" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Name">cbomotivo</property>
    <property name="ParentColor">0</property>
    <property name="Top">145</property>
    <property name="Width">241</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Motivo</property>
    <property name="Height">13</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">130</property>
    <property name="Width">75</property>
  </object>
  <object class="HiddenField" name="hfidestatus" >
    <property name="Height">18</property>
    <property name="Left">288</property>
    <property name="Name">hfidestatus</property>
    <property name="Top">120</property>
    <property name="Width">93</property>
  </object>
  <object class="MySQLTable" name="tbofertasrechazo" >
        <property name="Left">551</property>
        <property name="Top">79</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbofertasrechazo</property>
    <property name="TableName">ofertasrechazo</property>
  </object>
  <object class="Datasource" name="dsofertasrechazo" >
        <property name="Left">424</property>
        <property name="Top">71</property>
    <property name="DataSet">tbofertasrechazo</property>
    <property name="Name">dsofertasrechazo</property>
  </object>
</object>
?>
