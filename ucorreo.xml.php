<?php
<object class="ucorreo" name="ucorreo" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Envio de Correo</property>
  <property name="Color">#c0c0c0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">520</property>
  <property name="IsMaster">0</property>
  <property name="Name">ucorreo</property>
  <property name="Width">768</property>
  <property name="OnShow">ucorreoShow</property>
  <object class="Edit" name="edde" >
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">edde</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">16</property>
    <property name="Width">600</property>
  </object>
  <object class="Edit" name="edpara" >
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">edpara</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">48</property>
    <property name="Width">600</property>
  </object>
  <object class="Edit" name="edasunto" >
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">edasunto</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">88</property>
    <property name="Width">600</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">De:</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">24</property>
    <property name="Width">43</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Para:</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">22</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">56</property>
    <property name="Width">45</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Asunto:</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">96</property>
    <property name="Width">59</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Adjunto:</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Align">taRight</property>
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">6</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">128</property>
    <property name="Width">61</property>
  </object>
  <object class="Label" name="lbadjunto" >
    <property name="Height">13</property>
    <property name="Left">80</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto</property>
    <property name="ParentColor">0</property>
    <property name="Top">144</property>
    <property name="Width">211</property>
  </object>
  <object class="Memo" name="mmensaje" >
    <property name="Height">297</property>
    <property name="Left">80</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mmensaje</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">186</property>
    <property name="Width">600</property>
  </object>
  <object class="Button" name="btnenviar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Enviar</property>
    <property name="Height">25</property>
    <property name="Left">685</property>
    <property name="Name">btnenviar</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">12</property>
    <property name="Width">67</property>
    <property name="OnClick">btnenviarClick</property>
  </object>
  <object class="Upload" name="upload" >
    <property name="Height">21</property>
    <property name="Left">80</property>
    <property name="Name">upload</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">120</property>
    <property name="Width">540</property>
  </object>
  <object class="Button" name="btnadjuntar" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Adjuntar</property>
    <property name="Height">25</property>
    <property name="Left">623</property>
    <property name="Name">btnadjuntar</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">118</property>
    <property name="Width">57</property>
    <property name="OnClick">btnadjuntarClick</property>
  </object>
  <object class="Label" name="lbadjunto2" >
    <property name="Height">13</property>
    <property name="Left">80</property>
    <property name="LinkTarget">blank</property>
    <property name="Name">lbadjunto2</property>
    <property name="ParentColor">0</property>
    <property name="Top">160</property>
    <property name="Width">211</property>
  </object>
  <object class="Label" name="lbeliminar" >
    <property name="Height">13</property>
    <property name="Left">336</property>
    <property name="Link">correos/eliminar</property>
    <property name="Name">lbeliminar</property>
    <property name="ParentColor">0</property>
    <property name="Top">160</property>
    <property name="Width">75</property>
    <property name="OnClick">lbeliminarClick</property>
  </object>
  <object class="HiddenField" name="hfnombre" >
    <property name="Height">18</property>
    <property name="Left">572</property>
    <property name="Name">hfnombre</property>
    <property name="Top">155</property>
    <property name="Width">103</property>
  </object>
</object>
?>
