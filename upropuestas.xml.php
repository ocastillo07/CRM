<?php
<object class="upropuestas" name="upropuestas" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Propuestas</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">690</property>
  <property name="IsMaster">0</property>
  <property name="Name">upropuestas</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnCreate">upropuestasCreate</property>
  <property name="OnShow">upropuestasShow</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">698</property>
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
      <property name="Left">137</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">27</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btnguardarcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">218</property>
      <property name="Name">btnguardarcerrar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">28</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btnguardarcerrarClick</property>
    </object>
    <object class="Button" name="btnactivar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Activar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">366</property>
      <property name="Name">btnactivar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">79</property>
      <property name="OnClick">btnactivarClick</property>
    </object>
    <object class="Button" name="btnmail" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Enviar Mail</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">543</property>
      <property name="Name">btnmail</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">79</property>
      <property name="OnClick">btnmailClick</property>
    </object>
    <object class="Button" name="btnimprimir" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Imprimir</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">454</property>
      <property name="Name">btnimprimir</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnimprimirClick</property>
    </object>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[&lt;FONT color=#004080&gt;&lt;STRONG&gt;lbtitulo &lt;/STRONG&gt;&lt;/FONT&gt;]]></property>
      <property name="Font">
            <property name="Color">#004080</property>
            <property name="Size">12</property>
            <property name="Weight">bolder</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">7</property>
      <property name="Name">lbtitulo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">15</property>
      <property name="Width">123</property>
    </object>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption"><![CDATA[&lt;STRONG&gt;Datos Principales&lt;/STRONG&gt;]]></property>
    <property name="Font">
        <property name="Size">12</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">50</property>
    <property name="Width">147</property>
  </object>
  <object class="HiddenField" name="hfemail" >
    <property name="Height">18</property>
    <property name="Left">653</property>
    <property name="Name">hfemail</property>
    <property name="Top">50</property>
    <property name="Width">96</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">564</property>
    <property name="Name">hfestatus</property>
    <property name="Top">50</property>
    <property name="Width">87</property>
  </object>
  <object class="Upload" name="ulrating" >
    <property name="Height">20</property>
    <property name="Left">2</property>
    <property name="Name">ulrating</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">13</property>
    <property name="Top">407</property>
    <property name="Width">306</property>
  </object>
  <object class="Label" name="lbadjrating" >
    <property name="Caption">...</property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjrating</property>
    <property name="ParentColor">0</property>
    <property name="Top">438</property>
    <property name="Width">303</property>
  </object>
  <object class="Button" name="btnrating" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Subir</property>
    <property name="Height">20</property>
    <property name="Left">317</property>
    <property name="Name">btnrating</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">14</property>
    <property name="Top">407</property>
    <property name="Width">56</property>
    <property name="OnClick">btnratingClick</property>
  </object>
  <object class="Label" name="lbelimrating" >
    <property name="Caption">Eliminar</property>
    <property name="Height">13</property>
    <property name="Left">315</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbelimrating</property>
    <property name="ParentColor">0</property>
    <property name="Top">439</property>
    <property name="Width">59</property>
    <property name="OnClick">lbelimratingClick</property>
  </object>
  <object class="Label" name="IdOferta" >
    <property name="Caption">IdPropuesta</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">IdOferta</property>
    <property name="Top">84</property>
    <property name="Width">69</property>
  </object>
  <object class="Edit" name="edidpropuesta" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">edidpropuesta</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder"></property>
    <property name="Top">76</property>
    <property name="Width">106</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">IdRevision</property>
    <property name="Height">13</property>
    <property name="Left">192</property>
    <property name="Name">Label5</property>
    <property name="ParentColor">0</property>
    <property name="Top">84</property>
    <property name="Width">64</property>
  </object>
  <object class="Edit" name="edrevision" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">259</property>
    <property name="Name">edrevision</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">76</property>
    <property name="Width">26</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Plaza</property>
    <property name="Height">13</property>
    <property name="Left">290</property>
    <property name="Name">Label6</property>
    <property name="Top">84</property>
    <property name="Width">32</property>
  </object>
  <object class="Edit" name="edplaza" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">325</property>
    <property name="Name">edplaza</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">76</property>
    <property name="Width">105</property>
  </object>
  <object class="Label" name="Label29" >
    <property name="Caption">Estatus</property>
    <property name="Height">13</property>
    <property name="Left">437</property>
    <property name="Name">Label29</property>
    <property name="Top">84</property>
    <property name="Width">43</property>
  </object>
  <object class="ComboBox" name="cbestatus" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">488</property>
    <property name="Name">cbestatus</property>
    <property name="ParentColor">0</property>
    <property name="Top">76</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label32" >
    <property name="Caption">FechaCreacion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">615</property>
    <property name="Name">Label32</property>
    <property name="Top">84</property>
    <property name="Width">83</property>
  </object>
  <object class="Edit" name="edcreacion" >
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">703</property>
    <property name="Name">edcreacion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">76</property>
    <property name="Width">87</property>
  </object>
  <object class="ComboBox" name="cbtipopropuesta" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">542</property>
    <property name="Name">cbtipopropuesta</property>
    <property name="ParentColor">0</property>
    <property name="Top">100</property>
    <property name="Width">248</property>
    <property name="jsOnChange">cbtipopropuestaJSChange</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Tipo Propuesta</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">437</property>
    <property name="Name">Label1</property>
    <property name="Top">104</property>
    <property name="Width">92</property>
  </object>
  <object class="Edit" name="edvendedor" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">edvendedor</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabStop">0</property>
    <property name="Top">100</property>
    <property name="Width">350</property>
  </object>
  <object class="Label" name="Label27" >
    <property name="Caption">Vendedor</property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label27</property>
    <property name="Top">108</property>
    <property name="Width">55</property>
  </object>
  <object class="Label" name="Cliente" >
    <property name="Caption">Cliente</property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Cliente</property>
    <property name="Top">132</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Vehiculo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label4</property>
    <property name="Top">157</property>
    <property name="Width">54</property>
  </object>
  <object class="Edit" name="edvehiculo" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">edvehiculo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">149</property>
    <property name="Width">710</property>
  </object>
  <object class="Edit" name="edcliente" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">199</property>
    <property name="Name">edcliente</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">1</property>
    <property name="Top">124</property>
    <property name="Width">591</property>
  </object>
  <object class="Edit" name="edatencion" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">edatencion</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">173</property>
    <property name="Width">711</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">Atencion</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label14</property>
    <property name="Top">181</property>
    <property name="Width">70</property>
  </object>
  <object class="Label" name="lbrenta" >
    <property name="Caption">Renta Mensual</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">104</property>
    <property name="Name">lbrenta</property>
    <property name="Top">206</property>
    <property name="Width">87</property>
  </object>
  <object class="Edit" name="edrenta" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">104</property>
    <property name="Name">edrenta</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">221</property>
    <property name="Width">126</property>
    <property name="jsOnKeyPress">edrentaJSKeyPress</property>
  </object>
  <object class="Label" name="Label26" >
    <property name="Caption">Plazo (Meses)</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label26</property>
    <property name="Top">206</property>
    <property name="Width">87</property>
  </object>
  <object class="Edit" name="edplazo" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">3</property>
    <property name="Name">edplazo</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">221</property>
    <property name="Width">87</property>
    <property name="jsOnKeyPress">edplazoJSKeyPress</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">Costo de Manto. por KM</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">488</property>
    <property name="Name">Label16</property>
    <property name="Top">206</property>
    <property name="Width">137</property>
  </object>
  <object class="Edit" name="edcosto" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">488</property>
    <property name="Name">edcosto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">221</property>
    <property name="Width">136</property>
    <property name="jsOnKeyPress">edcostoJSKeyPress</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption">Recorrido Anual Calculado</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">329</property>
    <property name="Name">Label20</property>
    <property name="Top">206</property>
    <property name="Width">153</property>
  </object>
  <object class="Edit" name="edrecorrido" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">329</property>
    <property name="Name">edrecorrido</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">221</property>
    <property name="Width">148</property>
    <property name="jsOnKeyPress">edrecorridoJSKeyPress</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">Rating</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">2</property>
    <property name="Name">Label21</property>
    <property name="Top">386</property>
    <property name="Width">87</property>
  </object>
  <object class="Label" name="Label24" >
    <property name="Caption">LifeCycle</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">407</property>
    <property name="Name">Label24</property>
    <property name="Top">386</property>
    <property name="Width">87</property>
  </object>
  <object class="Upload" name="ullife" >
    <property name="Height">20</property>
    <property name="Left">407</property>
    <property name="Name">ullife</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">15</property>
    <property name="Top">407</property>
    <property name="Width">303</property>
  </object>
  <object class="Button" name="btnlife" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Subir</property>
    <property name="Height">20</property>
    <property name="Left">719</property>
    <property name="Name">btnlife</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">16</property>
    <property name="Top">407</property>
    <property name="Width">56</property>
    <property name="OnClick">btnlifeClick</property>
  </object>
  <object class="Label" name="Label25" >
    <property name="Caption">Moneda</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">633</property>
    <property name="Name">Label25</property>
    <property name="Top">206</property>
    <property name="Width">51</property>
  </object>
  <object class="ComboBox" name="cbmoncosto" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">633</property>
    <property name="Name">cbmoncosto</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="Tag"></property>
    <property name="Top">221</property>
    <property name="Width">103</property>
  </object>
  <object class="Label" name="Label28" >
    <property name="Caption">Moneda</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">235</property>
    <property name="Name">Label28</property>
    <property name="Top">206</property>
    <property name="Width">51</property>
  </object>
  <object class="ComboBox" name="cbmonrenta" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">235</property>
    <property name="Name">cbmonrenta</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">8</property>
    <property name="Tag"></property>
    <property name="Top">221</property>
    <property name="Width">82</property>
  </object>
  <object class="Button" name="btnbuscarcliente" >
    <property name="Caption">Busca</property>
    <property name="Height">21</property>
    <property name="Hint">Click para Buscar Cliente</property>
    <property name="ImageSource">imagenes/edit-find22.png</property>
    <property name="Left">174</property>
    <property name="Name">btnbuscarcliente</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="TabOrder">2</property>
    <property name="Top">124</property>
    <property name="Width">21</property>
    <property name="OnClick">btnbuscarclienteClick</property>
  </object>
  <object class="Edit" name="edidcliente" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">edidcliente</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">124</property>
    <property name="Width">91</property>
    <property name="jsOnBlur">edidclienteJSBlur</property>
  </object>
  <object class="Label" name="lbadjlife" >
    <property name="Caption">...</property>
    <property name="Height">13</property>
    <property name="Left">407</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjlife</property>
    <property name="ParentColor">0</property>
    <property name="Top">438</property>
    <property name="Width">303</property>
  </object>
  <object class="Label" name="lbelimlife" >
    <property name="Caption">Eliminar</property>
    <property name="Height">13</property>
    <property name="Left">719</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbelimlife</property>
    <property name="ParentColor">0</property>
    <property name="Top">439</property>
    <property name="Width">59</property>
    <property name="OnClick">lbelimlifeClick</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Notas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">1</property>
    <property name="Name">Label9</property>
    <property name="Top">458</property>
    <property name="Width">383</property>
  </object>
  <object class="Memo" name="ednotas" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">82</property>
    <property name="Left">2</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">ednotas</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">17</property>
    <property name="Top">476</property>
    <property name="Width">784</property>
  </object>
  <object class="HiddenField" name="hfpathlife" >
    <property name="Height">18</property>
    <property name="Left">560</property>
    <property name="Name">hfpathlife</property>
    <property name="Top">386</property>
    <property name="Width">104</property>
  </object>
  <object class="HiddenField" name="hfpathrating" >
    <property name="Height">18</property>
    <property name="Left">101</property>
    <property name="Name">hfpathrating</property>
    <property name="Top">383</property>
    <property name="Width">136</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Llantas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">2</property>
    <property name="Name">Label7</property>
    <property name="Top">302</property>
    <property name="Width">51</property>
  </object>
  <object class="ComboBox" name="cbllantas" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:2:{s:3:&quot;INC&quot;;s:9:&quot;INCLUIDAS&quot;;s:2:&quot;CC&quot;;s:16:&quot;CARGO AL CLIENTE&quot;;}]]></property>
    <property name="Left">2</property>
    <property name="Name">cbllantas</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="Tag"></property>
    <property name="Top">317</property>
    <property name="Width">207</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Ubicacion de Servicio</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">218</property>
    <property name="Name">Label8</property>
    <property name="Top">302</property>
    <property name="Width">135</property>
  </object>
  <object class="ComboBox" name="cbubicacion" >
    <property name="Height">21</property>
    <property name="Items"><![CDATA[a:2:{s:1:&quot;T&quot;;s:16:&quot;TALLER IDEALEASE&quot;;s:1:&quot;S&quot;;s:8:&quot;EN SITIO&quot;;}]]></property>
    <property name="Left">218</property>
    <property name="Name">cbubicacion</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="Tag"></property>
    <property name="Top">317</property>
    <property name="Width">207</property>
  </object>
  <object class="Label" name="lbnotasestatus" >
    <property name="Caption">Notas por Estatus</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">lbnotasestatus</property>
    <property name="Top">570</property>
    <property name="Width">309</property>
  </object>
  <object class="Memo" name="ednotasestatus" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">82</property>
    <property name="Left">4</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">ednotasestatus</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">17</property>
    <property name="Top">588</property>
    <property name="Width">784</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Archivo de Calculo</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">433</property>
    <property name="Name">Label3</property>
    <property name="Top">293</property>
    <property name="Width">142</property>
  </object>
  <object class="Upload" name="ulcalculo" >
    <property name="Height">20</property>
    <property name="Left">433</property>
    <property name="Name">ulcalculo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">15</property>
    <property name="Top">317</property>
    <property name="Width">287</property>
  </object>
  <object class="Button" name="btncalculo" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Subir</property>
    <property name="Height">20</property>
    <property name="Left">725</property>
    <property name="Name">btncalculo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">16</property>
    <property name="Top">318</property>
    <property name="Width">56</property>
    <property name="OnClick">btncalculoClick</property>
  </object>
  <object class="Label" name="lbadjcalc" >
    <property name="Caption">...</property>
    <property name="Height">13</property>
    <property name="Left">433</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjcalc</property>
    <property name="ParentColor">0</property>
    <property name="Top">345</property>
    <property name="Width">287</property>
  </object>
  <object class="Label" name="lbelimcalculo" >
    <property name="Caption">Eliminar</property>
    <property name="Height">13</property>
    <property name="Left">725</property>
    <property name="Link">Adjuntos/Declaracion.doc</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbelimcalculo</property>
    <property name="ParentColor">0</property>
    <property name="Top">345</property>
    <property name="Width">59</property>
    <property name="OnClick">lbelimcalculoClick</property>
  </object>
  <object class="HiddenField" name="hfpathcalculo" >
    <property name="Height">18</property>
    <property name="Left">677</property>
    <property name="Name">hfpathcalculo</property>
    <property name="Top">291</property>
    <property name="Width">104</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Costo por Apertura</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">2</property>
    <property name="Name">Label10</property>
    <property name="Top">253</property>
    <property name="Width">137</property>
  </object>
  <object class="Edit" name="edcostoapertura" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Font">
        <property name="Align">taLeft</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">2</property>
    <property name="Name">edcostoapertura</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">10</property>
    <property name="Top">268</property>
    <property name="Width">136</property>
    <property name="jsOnKeyPress">edcostoJSKeyPress</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Moneda</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">149</property>
    <property name="Name">Label11</property>
    <property name="Top">253</property>
    <property name="Width">51</property>
  </object>
  <object class="ComboBox" name="cbmonapertura" >
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">149</property>
    <property name="Name">cbmonapertura</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="Tag"></property>
    <property name="Top">268</property>
    <property name="Width">103</property>
  </object>
  <object class="MySQLTable" name="tbpropuestas" >
        <property name="Left">562</property>
        <property name="Top">489</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbpropuestas</property>
    <property name="TableName">idlpropuestas</property>
  </object>
  <object class="Datasource" name="dspropuestas" >
        <property name="Left">491</property>
        <property name="Top">489</property>
    <property name="DataSet">tbpropuestas</property>
    <property name="Name">dspropuestas</property>
  </object>
</object>
?>
