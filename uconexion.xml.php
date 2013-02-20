<?php
<object class="uconexion" name="uconexion" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Conexion</property>
  <property name="Color">#808080</property>
  <property name="DocType">dtNone</property>
  <property name="Height">320</property>
  <property name="IsMaster">0</property>
  <property name="Name">uconexion</property>
  <property name="Width">384</property>
  <property name="OnShow">uconexionShow</property>
  <object class="Panel" name="pconexion" >
    <property name="Color">#FF972F</property>
    <property name="Height">273</property>
    <property name="Left">25</property>
    <property name="Name">pconexion</property>
    <property name="ParentColor">0</property>
    <property name="Top">24</property>
    <property name="Width">333</property>
    <object class="BitBtn" name="btncerrar" >
      <property name="Caption">Cerrar</property>
      <property name="Color">#FF972F</property>
      <property name="Height">25</property>
      <property name="Left">217</property>
      <property name="Name">btncerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">224</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btncerrarJSClick</property>
    </object>
    <object class="BitBtn" name="btnguardar" >
      <property name="Caption">Guardar</property>
      <property name="Height">25</property>
      <property name="Left">124</property>
      <property name="Name">btnguardar</property>
      <property name="Top">224</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="BitBtn" name="btnprobar" >
      <property name="Caption">Probar</property>
      <property name="Height">25</property>
      <property name="Left">36</property>
      <property name="Name">btnprobar</property>
      <property name="Top">224</property>
      <property name="Width">75</property>
      <property name="OnClick">btnprobarClick</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Confirmacion de Password:</property>
      <property name="Height">29</property>
      <property name="Left">36</property>
      <property name="Name">Label5</property>
      <property name="Top">180</property>
      <property name="Width">80</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Password:</property>
      <property name="Height">13</property>
      <property name="Left">36</property>
      <property name="Name">Label4</property>
      <property name="Top">148</property>
      <property name="Width">80</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Usuario:</property>
      <property name="Height">13</property>
      <property name="Left">36</property>
      <property name="Name">Label3</property>
      <property name="Top">116</property>
      <property name="Width">80</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Base de Datos:</property>
      <property name="Height">29</property>
      <property name="Left">36</property>
      <property name="Name">Label2</property>
      <property name="Top">84</property>
      <property name="Width">80</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Servidor:</property>
      <property name="Height">13</property>
      <property name="Left">36</property>
      <property name="Name">Label1</property>
      <property name="Top">52</property>
      <property name="Width">80</property>
    </object>
    <object class="Edit" name="Edconfirm" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="IsPassword">1</property>
      <property name="Left">148</property>
      <property name="Name">Edconfirm</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">4</property>
      <property name="Top">180</property>
      <property name="Width">150</property>
    </object>
    <object class="Edit" name="Edpass" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="IsPassword">1</property>
      <property name="Left">148</property>
      <property name="Name">Edpass</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">3</property>
      <property name="Top">148</property>
      <property name="Width">150</property>
    </object>
    <object class="Edit" name="Edusuario" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Left">148</property>
      <property name="Name">Edusuario</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">2</property>
      <property name="Top">116</property>
      <property name="Width">150</property>
    </object>
    <object class="Edit" name="Edbd" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Left">148</property>
      <property name="Name">Edbd</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">1</property>
      <property name="Top">84</property>
      <property name="Width">150</property>
    </object>
    <object class="Edit" name="edservidor" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Left">148</property>
      <property name="Name">edservidor</property>
      <property name="ParentColor">0</property>
      <property name="Top">52</property>
      <property name="Width">150</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Conexion a la Base de Datos</property>
      <property name="Font">
            <property name="Size">14</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">40</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">16</property>
      <property name="Width">258</property>
    </object>
  </object>
</object>
?>
