<?php
<object class="uacciones" name="uacciones" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Acciones</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">720</property>
  <property name="IsMaster">0</property>
  <property name="Name">uacciones</property>
  <property name="Width">800</property>
  <property name="OnShow">uaccionesShow</property>
  <property name="jsOnLoad">uaccionesJSLoad</property>
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
      <property name="Left">226</property>
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
      <property name="Left">308</property>
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
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">138</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
  </object>
  <object class="Edit" name="edidaccion" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Left">87</property>
    <property name="Name">edidaccion</property>
    <property name="ParentColor">0</property>
    <property name="Top">56</property>
    <property name="Width">121</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Edit" name="edoriginador" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">87</property>
    <property name="Name">edoriginador</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">84</property>
    <property name="Width">638</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">IdAccion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">FechaCreacion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">240</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">91</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Originador</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">92</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Clasificacion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">120</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Proceso Generador</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">389</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">120</property>
    <property name="Width">115</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Descripcion del Problema</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">150</property>
    <property name="Width">155</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Analisis de la Causa</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">314</property>
    <property name="Width">123</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Procedimiento</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">262</property>
    <property name="Width">91</property>
  </object>
  <object class="RadioGroup" name="rgclasificacion" >
    <property name="Color">#C0C0C0</property>
    <property name="Height">40</property>
    <property name="ItemIndex">0</property>
    <property name="Items"><![CDATA[a:2:{i:0;s:10:&quot;Correctiva&quot;;i:1;s:10:&quot;Preventiva&quot;;}]]></property>
    <property name="Left">87</property>
    <property name="Name">rgclasificacion</property>
    <property name="TabOrder">2</property>
    <property name="Top">107</property>
    <property name="Width">185</property>
    <property name="jsOnClick">rgclasificacionJSClick</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="ComboBox" name="cbproceso" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">513</property>
    <property name="Name">cbproceso</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">116</property>
    <property name="Width">212</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Responsable</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">286</property>
    <property name="Width">91</property>
  </object>
  <object class="ComboBox" name="cbprocedimiento" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">97</property>
    <property name="Name">cbprocedimiento</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">257</property>
    <property name="Width">285</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="ComboBox" name="cbresponsable" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">97</property>
    <property name="Name">cbresponsable</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">281</property>
    <property name="Width">285</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Memo" name="manalisis" >
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">65</property>
    <property name="Hint">Escriba en el Recuadro o Doble Click Para Agregar Comentarios</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">manalisis</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">7</property>
    <property name="Top">334</property>
    <property name="Width">720</property>
    <property name="OnDblClick">manalisisDblClick</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Memo" name="mcorreccion" >
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">65</property>
    <property name="Hint">Escriba en el Recuadro o Doble Click Para Agregar Comentarios</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mcorreccion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">8</property>
    <property name="Top">422</property>
    <property name="Width">720</property>
    <property name="OnDblClick">mcorreccionDblClick</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">CORRECCION (Actividad a realizar de forma inmediata para solucionar el problema)</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">406</property>
    <property name="Width">550</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption"><![CDATA[&lt;P&gt;ACCION (Actividad a realizar para prevenir que vuelva a ocurrir el problema)&lt;/P&gt;]]></property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">494</property>
    <property name="Width">523</property>
  </object>
  <object class="Memo" name="maccion" >
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">65</property>
    <property name="Hint">Escriba en el Recuadro o Doble Click Para Agregar Comentarios</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">maccion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">9</property>
    <property name="Top">510</property>
    <property name="Width">720</property>
    <property name="OnDblClick">maccionDblClick</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Fecha Compromiso de Cierre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">421</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">310</property>
    <property name="Width">171</property>
  </object>
  <object class="DateTimePicker" name="dtcompromiso" >
    <property name="Caption">dtcompromiso</property>
    <property name="Height">21</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">595</property>
    <property name="Name">dtcompromiso</property>
    <property name="ShowsTime">0</property>
    <property name="Top">302</property>
    <property name="Width">130</property>
  </object>
  <object class="CheckBox" name="chksolicita" >
    <property name="Caption">Solicita Cierre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">255</property>
    <property name="Name">chksolicita</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">306</property>
    <property name="Width">121</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Notas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">645</property>
    <property name="Width">75</property>
    <property name="OnClick">lbnotasClick</property>
  </object>
  <object class="Label" name="lbnotas" >
    <property name="Caption">Notas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">lbnotas</property>
    <property name="ParentFont">0</property>
    <property name="Top">658</property>
    <property name="Width">720</property>
    <property name="OnClick">lbnotasClick</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">Estatus</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">517</property>
    <property name="Name">Label14</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">51</property>
  </object>
  <object class="ComboBox" name="cbestatus" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">569</property>
    <property name="Name">cbestatus</property>
    <property name="ParentColor">0</property>
    <property name="Top">56</property>
    <property name="Width">156</property>
    <property name="jsOnChange">cbestatusJSChange</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Adjuntos</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">578</property>
    <property name="Width">75</property>
  </object>
  <object class="Upload" name="upload" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Left">5</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="Top">592</property>
    <property name="Width">636</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Button" name="btnsubir" >
    <property name="Caption">Subir</property>
    <property name="Height">21</property>
    <property name="Left">650</property>
    <property name="Name">btnsubir</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">12</property>
    <property name="Top">592</property>
    <property name="Width">75</property>
    <property name="OnClick">btnsubirClick</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="Label" name="lbadjunto1" >
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Link">Adjuntos/abrir</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">615</property>
    <property name="Width">568</property>
  </object>
  <object class="Label" name="lbadjunto2" >
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Link">Adjuntos/abrir</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">630</property>
    <property name="Width">568</property>
  </object>
  <object class="Label" name="lbeliminar1" >
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">585</property>
    <property name="Link">Adjuntos/eliminar</property>
    <property name="Name">lbeliminar1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">615</property>
    <property name="Width">56</property>
    <property name="OnClick">lbeliminar1Click</property>
  </object>
  <object class="Label" name="lbeliminar2" >
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Weight">normal</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">585</property>
    <property name="Link">Adjuntos/eliminar</property>
    <property name="Name">lbeliminar2</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">630</property>
    <property name="Width">56</property>
    <property name="OnClick">lbeliminar2Click</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">513</property>
    <property name="Name">hfestatus</property>
    <property name="Top">140</property>
    <property name="Width">87</property>
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
    <property name="Left">389</property>
    <property name="Name">lbufh</property>
    <property name="ParentFont">0</property>
    <property name="Top">262</property>
    <property name="Width">336</property>
  </object>
  <object class="HiddenField" name="hfpath1" >
    <property name="Height">18</property>
    <property name="Left">604</property>
    <property name="Name">hfpath1</property>
    <property name="Top">140</property>
    <property name="Width">87</property>
  </object>
  <object class="HiddenField" name="hfpath2" >
    <property name="Height">18</property>
    <property name="Left">334</property>
    <property name="Name">hfpath2</property>
    <property name="Top">140</property>
    <property name="Width">87</property>
  </object>
  <object class="HiddenField" name="hfidnota" >
    <property name="Height">18</property>
    <property name="Left">421</property>
    <property name="Name">hfidnota</property>
    <property name="Top">140</property>
    <property name="Value">0</property>
    <property name="Width">87</property>
  </object>
  <object class="Edit" name="edfechacreacion" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Left">334</property>
    <property name="Name">edfechacreacion</property>
    <property name="ParentColor">0</property>
    <property name="Top">56</property>
    <property name="Width">121</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="HiddenField" name="hfidproblema" >
    <property name="Height">18</property>
    <property name="Left">285</property>
    <property name="Name">hfidproblema</property>
    <property name="Top">118</property>
    <property name="Value">0</property>
    <property name="Width">103</property>
  </object>
  <object class="HiddenField" name="hfidanalisis" >
    <property name="Height">18</property>
    <property name="Left">445</property>
    <property name="Name">hfidanalisis</property>
    <property name="Top">340</property>
    <property name="Value">0</property>
    <property name="Width">87</property>
  </object>
  <object class="HiddenField" name="hfidcorreccion" >
    <property name="Height">18</property>
    <property name="Left">445</property>
    <property name="Name">hfidcorreccion</property>
    <property name="Top">446</property>
    <property name="Value">0</property>
    <property name="Width">105</property>
  </object>
  <object class="HiddenField" name="hfidaccion" >
    <property name="Height">18</property>
    <property name="Left">445</property>
    <property name="Name">hfidaccion</property>
    <property name="Top">524</property>
    <property name="Value">0</property>
    <property name="Width">87</property>
  </object>
  <object class="Memo" name="mdescripcion" >
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">89</property>
    <property name="Hint">Doble Click Para Agregar Comentarios</property>
    <property name="Left">5</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mdescripcion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">4</property>
    <property name="Tag">1</property>
    <property name="Top">166</property>
    <property name="Width">720</property>
    <property name="OnDblClick">mdescripcionDblClick</property>
    <property name="jsOnKeyDown">mdescripcionJSKeyDown</property>
    <property name="jsOnKeyPress">edidaccionJSKeyPress</property>
  </object>
  <object class="HiddenField" name="hfclasificacion" >
    <property name="Height">18</property>
    <property name="Left">165</property>
    <property name="Name">hfclasificacion</property>
    <property name="Top">107</property>
    <property name="Value">0</property>
    <property name="Width">103</property>
  </object>
  <object class="HiddenField" name="hfauditar" >
    <property name="Height">18</property>
    <property name="Left">165</property>
    <property name="Name">hfauditar</property>
    <property name="Top">129</property>
    <property name="Value">0</property>
    <property name="Width">103</property>
  </object>
  <object class="MySQLTable" name="tbacciones" >
        <property name="Left">745</property>
        <property name="Top">63</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbacciones</property>
    <property name="TableName">acciones</property>
  </object>
  <object class="MySQLQuery" name="sqlnotas" >
        <property name="Left">748</property>
        <property name="Top">120</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="Name">sqlnotas</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
