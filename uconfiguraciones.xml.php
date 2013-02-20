<?php
<object class="uconfiguraciones" name="uconfiguraciones" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Configuraciones</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">648</property>
  <property name="IsMaster">0</property>
  <property name="Name">uconfiguraciones</property>
  <property name="Width">800</property>
  <property name="OnCreate">uconfiguracionesCreate</property>
  <property name="OnShow">uconfiguracionesShow</property>
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
    <object class="Button" name="btnguardarcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">222</property>
      <property name="Name">btnguardarcerrar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">28</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btnguardarcerrarClick</property>
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
  <object class="Edit" name="edcompra" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">147</property>
    <property name="Name">edcompra</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">80</property>
    <property name="Width">60</property>
    <property name="jsOnKeyPress">edcompraJSKeyPress</property>
  </object>
  <object class="Edit" name="edventa" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">147</property>
    <property name="Name">edventa</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">104</property>
    <property name="Width">60</property>
    <property name="jsOnKeyPress">edventaJSKeyPress</property>
  </object>
  <object class="Edit" name="edthorton" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">157</property>
    <property name="Name">edthorton</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">160</property>
    <property name="Width">50</property>
    <property name="jsOnKeyPress">edthortonJSKeyPress</property>
  </object>
  <object class="Edit" name="edrabon" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">157</property>
    <property name="Name">edrabon</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">184</property>
    <property name="Width">50</property>
    <property name="jsOnKeyPress">edrabonJSKeyPress</property>
  </object>
  <object class="Edit" name="edbus" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">157</property>
    <property name="Name">edbus</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">208</property>
    <property name="Width">50</property>
    <property name="jsOnKeyPress">edbusJSKeyPress</property>
  </object>
  <object class="Edit" name="edtracto" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">157</property>
    <property name="Name">edtracto</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">232</property>
    <property name="Width">50</property>
    <property name="jsOnKeyPress">edtractoJSKeyPress</property>
  </object>
  <object class="Edit" name="edligero" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">157</property>
    <property name="Name">edligero</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">256</property>
    <property name="Width">50</property>
    <property name="jsOnKeyPress">edligeroJSKeyPress</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Tractocamiones</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">64</property>
    <property name="Name">Label1</property>
    <property name="Top">240</property>
    <property name="Width">91</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption"><![CDATA[&lt;STRONG&gt;Tipo Cambio&lt;/STRONG&gt;]]></property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label2</property>
    <property name="Top">64</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Compra:</property>
    <property name="Height">13</property>
    <property name="Left">64</property>
    <property name="Name">Label3</property>
    <property name="Top">88</property>
    <property name="Width">60</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Venta:</property>
    <property name="Height">13</property>
    <property name="Left">64</property>
    <property name="Name">Label4</property>
    <property name="Top">112</property>
    <property name="Width">61</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption"><![CDATA[&lt;STRONG&gt;Porcentajes Utilidad&lt;/STRONG&gt;]]></property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label5</property>
    <property name="Top">142</property>
    <property name="Width">123</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Thortons</property>
    <property name="Height">13</property>
    <property name="Left">64</property>
    <property name="Name">Label6</property>
    <property name="Top">168</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Rabones</property>
    <property name="Height">13</property>
    <property name="Left">64</property>
    <property name="Name">Label7</property>
    <property name="Top">192</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Buses</property>
    <property name="Height">13</property>
    <property name="Left">64</property>
    <property name="Name">Label8</property>
    <property name="Top">216</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Ligeros</property>
    <property name="Height">13</property>
    <property name="Left">64</property>
    <property name="Name">Label9</property>
    <property name="Top">264</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edvendedor" >
    <property name="Height">21</property>
    <property name="Left">45</property>
    <property name="Name">edvendedor</property>
    <property name="ParentColor">0</property>
    <property name="Top">312</property>
    <property name="Width">161</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Puestos Vendedor</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">41</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">288</property>
    <property name="Width">107</property>
  </object>
</object>
?>
