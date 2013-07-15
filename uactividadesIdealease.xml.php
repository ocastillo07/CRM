<?php
<object class="uactividadesIdealease" name="uactividadesIdealease" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Act. por Asignar Idealease</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">488</property>
  <property name="IsMaster">0</property>
  <property name="Name">uactividadesIdealease</property>
  <property name="UseAjax">1</property>
  <property name="UseAjaxDebug">1</property>
  <property name="Width">800</property>
  <property name="OnShow">uactividadesIdealeaseShow</property>
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
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btnguardarcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">224</property>
      <property name="Name">btnguardarcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btnguardarcerrarClick</property>
    </object>
    <object class="Button" name="btncerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">650</property>
      <property name="Name">btncerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btncerrarClick</property>
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
    <object class="HiddenField" name="hfidnota" >
      <property name="Height">18</property>
      <property name="Left">340</property>
      <property name="Name">hfidnota</property>
      <property name="Width">119</property>
    </object>
    <object class="HiddenField" name="hfidactividad" >
      <property name="Height">18</property>
      <property name="Left">456</property>
      <property name="Name">hfidactividad</property>
      <property name="Width">96</property>
    </object>
    <object class="HiddenField" name="hfidcliente" >
      <property name="Height">18</property>
      <property name="Left">563</property>
      <property name="Name">hfidcliente</property>
      <property name="Width">96</property>
    </object>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Cliente</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">63</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Vendedor</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">14</property>
    <property name="Left">7</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">86</property>
    <property name="Width">68</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Asunto</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">109</property>
    <property name="Width">67</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Descripcion</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">159</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbasunto" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">100</property>
    <property name="Name">cbasunto</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">104</property>
    <property name="Width">581</property>
    <property name="jsOnChange">cbasuntoJSChange</property>
  </object>
  <object class="Edit" name="edcliente" >
    <property name="Height">21</property>
    <property name="Left">100</property>
    <property name="Name">edcliente</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">1</property>
    <property name="Tag"></property>
    <property name="Top">55</property>
    <property name="Width">581</property>
  </object>
  <object class="Button" name="btnbuscar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Buscar</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">21</property>
    <property name="ImageSource">imagenes/edit-find22.png</property>
    <property name="Left">698</property>
    <property name="Name">btnbuscar</property>
    <property name="TabOrder">2</property>
    <property name="Top">55</property>
    <property name="Width">27</property>
    <property name="OnClick">btnbuscarClick</property>
  </object>
  <object class="Memo" name="mdescripcion" >
    <property name="Height">121</property>
    <property name="Left">8</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mdescripcion</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">173</property>
    <property name="Width">673</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Fecha Actividad</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">8</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">305</property>
    <property name="Width">91</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Estatus</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">333</property>
    <property name="Width">54</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Nota Validacion:</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">357</property>
    <property name="Width">103</property>
  </object>
  <object class="Memo" name="mvalidacion" >
    <property name="Height">51</property>
    <property name="Left">8</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mvalidacion</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">373</property>
    <property name="Width">673</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Seguimiento</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">436</property>
    <property name="Width">89</property>
  </object>
  <object class="Label" name="lblnotas" >
    <property name="Caption">Notas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Color">#004080</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">lblnotas</property>
    <property name="ParentFont">0</property>
    <property name="Top">451</property>
    <property name="Width">717</property>
    <property name="OnClick">lblnotasClick</property>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario Fecha Hora</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Color">#808080</property>
        <property name="Style">fsNormal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">315</property>
    <property name="Name">lbufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">433</property>
    <property name="Width">366</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Hora Fin</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">400</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">333</property>
    <property name="Width">77</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Hora Inicio</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">401</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">308</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbinicio" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">483</property>
    <property name="Name">cbinicio</property>
    <property name="ParentColor">0</property>
    <property name="Top">303</property>
    <property name="Width">198</property>
  </object>
  <object class="ComboBox" name="cbfin" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">483</property>
    <property name="Name">cbfin</property>
    <property name="ParentColor">0</property>
    <property name="Top">330</property>
    <property name="Width">198</property>
  </object>
  <object class="ComboBox" name="cboestatus" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">108</property>
    <property name="Name">cboestatus</property>
    <property name="ParentColor">0</property>
    <property name="Top">325</property>
    <property name="Width">186</property>
  </object>
  <object class="DateTimePicker" name="dtactividad" >
    <property name="Caption">dtactividad</property>
    <property name="Height">19</property>
    <property name="Left">108</property>
    <property name="Name">dtactividad</property>
    <property name="ShowsTime">0</property>
    <property name="Top">303</property>
    <property name="Width">185</property>
  </object>
  <object class="Label" name="lbvin" >
    <property name="Caption">Sector</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">lbvin</property>
    <property name="ParentFont">0</property>
    <property name="Top">138</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edSector" >
    <property name="Height">21</property>
    <property name="Left">100</property>
    <property name="Name">edSector</property>
    <property name="ParentColor">0</property>
    <property name="Top">130</property>
    <property name="Width">581</property>
  </object>
  <object class="ComboBox" name="cbasesor" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">100</property>
    <property name="Name">cbasesor</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">82</property>
    <property name="Width">581</property>
    <property name="jsOnChange">cbasuntoJSChange</property>
  </object>
  <object class="Datasource" name="dsactividades" >
        <property name="Left">615</property>
        <property name="Top">96</property>
    <property name="DataSet">tbactividades</property>
    <property name="Name">dsactividades</property>
  </object>
  <object class="MySQLTable" name="tbactividades" >
        <property name="Left">615</property>
        <property name="Top">160</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbactividades</property>
    <property name="TableName">actividadesasignar</property>
  </object>
  <object class="MySQLQuery" name="sqlnotas" >
        <property name="Left">615</property>
        <property name="Top">224</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlnotas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
