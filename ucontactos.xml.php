<?php
<object class="ucontactos" name="ucontactos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Contactos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">536</property>
  <property name="IsMaster">0</property>
  <property name="Name">ucontactos</property>
  <property name="Width">800</property>
  <property name="OnCreate">ucontactosCreate</property>
  <property name="OnShow">ucontactosShow</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
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
    <object class="Button" name="btngcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">220</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">424</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
    <object class="Button" name="btneliminar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Eliminar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">502</property>
      <property name="Name">btneliminar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btneliminarJSClick</property>
    </object>
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
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Contacto No.</property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label1</property>
    <property name="Top">56</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Relacion</property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label2</property>
    <property name="Top">344</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="lblufh" >
    <property name="Caption">Usuario:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">431</property>
    <property name="Name">lblufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">413</property>
    <property name="Width">296</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Plaza</property>
    <property name="Height">13</property>
    <property name="Left">134</property>
    <property name="Name">Label12</property>
    <property name="Top">296</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidcontacto" >
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">edidcontacto</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">76</property>
    <property name="Width">121</property>
  </object>
  <object class="ComboBox" name="cbplaza" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">134</property>
    <property name="Name">cbplaza</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">310</property>
    <property name="Width">217</property>
  </object>
  <object class="ComboBox" name="cbrelacion" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">7</property>
    <property name="Name">cbrelacion</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="Top">360</property>
    <property name="Width">144</property>
  </object>
  <object class="Label" name="lblprocedencia" >
    <property name="Caption"><![CDATA[<P><FONT color=#0080c0>Click Para Traer Cliente</FONT></P>]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crPointer</property>
    <property name="Height">13</property>
    <property name="Hint">Click Para Asignar Cliente</property>
    <property name="Left">134</property>
    <property name="Name">lblprocedencia</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">76</property>
    <property name="Width">283</property>
    <property name="jsOnClick">lblprocedenciaJSClick</property>
  </object>
  <object class="DBGrid" name="dgcontactos" >
    <property name="Columns">a:5:{i:0;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:3:"No.";s:5:"Color";s:0:"";s:9:"Fieldname";s:10:"idcontador";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:1:"0";}i:1;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:2:"Id";s:5:"Color";s:0:"";s:9:"Fieldname";s:10:"idcontacto";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:2:"35";}i:2;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:6:"Nombre";s:5:"Color";s:0:"";s:9:"Fieldname";s:6:"nombre";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:3:"250";}i:3;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:8:"Relacion";s:5:"Color";s:0:"";s:9:"Fieldname";s:8:"relacion";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:3:"100";}i:4;a:14:{s:9:"Alignment";s:13:"taLeftJustify";s:11:"ButtonStyle";s:6:"bsAuto";s:7:"Caption";s:8:"Telefono";s:5:"Color";s:0:"";s:9:"Fieldname";s:8:"telefono";s:9:"FontColor";s:0:"";s:12:"DropDownRows";s:1:"7";s:8:"PickList";s:0:"";s:8:"ReadOnly";s:5:"false";s:8:"SortType";s:8:"stString";s:14:"TitleAlignment";s:13:"taLeftJustify";s:10:"TitleColor";s:0:"";s:7:"Visible";s:4:"true";s:5:"Width";s:2:"80";}}</property>
    <property name="DataSource">dscontactos</property>
    <property name="Height">344</property>
    <property name="Left">424</property>
    <property name="Name">dgcontactos</property>
    <property name="ReadOnly">1</property>
    <property name="Top">56</property>
    <property name="Width">360</property>
    <property name="jsOnDblClick">dgcontactosJSDblClick</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">471</property>
    <property name="Name">hfestatus</property>
    <property name="Top">250</property>
    <property name="Value">0</property>
    <property name="Width">88</property>
  </object>
  <object class="LabeledEdit" name="edapaterno" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Apellido Paterno</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">8</property>
    <property name="Name">edapaterno</property>
    <property name="ParentColor">0</property>
    <property name="Top">154</property>
    <property name="Width">202</property>
  </object>
  <object class="LabeledEdit" name="edamaterno" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Apellido Materno</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">220</property>
    <property name="Name">edamaterno</property>
    <property name="ParentColor">0</property>
    <property name="Top">154</property>
    <property name="Width">197</property>
  </object>
  <object class="HiddenField" name="hfidcontador" >
    <property name="Height">18</property>
    <property name="Left">471</property>
    <property name="Name">hfidcontador</property>
    <property name="Top">219</property>
    <property name="Value">0</property>
    <property name="Width">88</property>
  </object>
  <object class="HiddenField" name="hfidcliente" >
    <property name="Height">18</property>
    <property name="Left">470</property>
    <property name="Name">hfidcliente</property>
    <property name="Top">328</property>
    <property name="Value">0</property>
    <property name="Width">89</property>
  </object>
  <object class="HiddenField" name="hfnombre" >
    <property name="Height">18</property>
    <property name="Left">471</property>
    <property name="Name">hfnombre</property>
    <property name="Top">283</property>
    <property name="Value">0</property>
    <property name="Width">88</property>
  </object>
  <object class="LabeledEdit" name="ednombre" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Nombre</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">8</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="Top">106</property>
    <property name="Width">409</property>
  </object>
  <object class="LabeledEdit" name="eddir" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Direccion</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">8</property>
    <property name="Name">eddir</property>
    <property name="ParentColor">0</property>
    <property name="Top">202</property>
    <property name="Width">300</property>
  </object>
  <object class="LabeledEdit" name="ednumero" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Numero</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">316</property>
    <property name="Name">ednumero</property>
    <property name="ParentColor">0</property>
    <property name="Top">202</property>
    <property name="Width">101</property>
  </object>
  <object class="LabeledEdit" name="edcp" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Codigo Postal</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">8</property>
    <property name="Name">edcp</property>
    <property name="ParentColor">0</property>
    <property name="Top">296</property>
    <property name="Width">120</property>
  </object>
  <object class="LabeledEdit" name="edcolonia" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Colonia</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">263</property>
    <property name="Name">edcolonia</property>
    <property name="ParentColor">0</property>
    <property name="Top">251</property>
    <property name="Width">154</property>
  </object>
  <object class="LabeledEdit" name="edmunicipio" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Municipio</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">134</property>
    <property name="Name">edmunicipio</property>
    <property name="ParentColor">0</property>
    <property name="Top">250</property>
    <property name="Width">119</property>
  </object>
  <object class="LabeledEdit" name="edestado" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Estado</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">8</property>
    <property name="Name">edestado</property>
    <property name="ParentColor">0</property>
    <property name="Top">250</property>
    <property name="Width">120</property>
  </object>
  <object class="LabeledEdit" name="edpuesto" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Puesto</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">182</property>
    <property name="Name">edpuesto</property>
    <property name="ParentColor">0</property>
    <property name="Top">346</property>
    <property name="Width">235</property>
  </object>
  <object class="LabeledEdit" name="edemail" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Correo Electronico</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">7</property>
    <property name="Name">edemail</property>
    <property name="ParentColor">0</property>
    <property name="Top">393</property>
    <property name="Width">410</property>
  </object>
  <object class="LabeledEdit" name="ednextel" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Nextel</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">264</property>
    <property name="Name">ednextel</property>
    <property name="ParentColor">0</property>
    <property name="Top">490</property>
    <property name="Width">235</property>
  </object>
  <object class="LabeledEdit" name="edfax" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Fax</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">8</property>
    <property name="Name">edfax</property>
    <property name="ParentColor">0</property>
    <property name="Top">490</property>
    <property name="Width">235</property>
  </object>
  <object class="LabeledEdit" name="edtelefono2" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Telefono 2</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">264</property>
    <property name="Name">edtelefono2</property>
    <property name="ParentColor">0</property>
    <property name="Top">442</property>
    <property name="Width">235</property>
  </object>
  <object class="LabeledEdit" name="edtelefono1" >
    <property name="BorderStyle">bsNone</property>
    <property name="CharCase">ecUpperCase</property>
    <property name="EditLabel">
        <property name="Caption">Telefono 1</property>
    </property>
    <property name="Height">35</property>
    <property name="Left">8</property>
    <property name="Name">edtelefono1</property>
    <property name="ParentColor">0</property>
    <property name="Top">442</property>
    <property name="Width">235</property>
  </object>
  <object class="HiddenField" name="hfnivel" >
    <property name="Height">18</property>
    <property name="Left">575</property>
    <property name="Name">hfnivel</property>
    <property name="Top">250</property>
    <property name="Value">0</property>
    <property name="Width">88</property>
  </object>
  <object class="MySQLTable" name="tblcontactos" >
        <property name="Left">652</property>
        <property name="Top">169</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tblcontactos</property>
    <property name="TableName">contactos</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">648</property>
        <property name="Top">110</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Datasource" name="dscontactos" >
        <property name="Left">569</property>
        <property name="Top">175</property>
    <property name="DataSet">sqlcontactos</property>
    <property name="Name">dscontactos</property>
  </object>
  <object class="MySQLQuery" name="sqlcontactos" >
        <property name="Left">570</property>
        <property name="Top">110</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlcontactos</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
