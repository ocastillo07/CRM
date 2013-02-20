<?php
<object class="ulogin" name="ulogin" baseclass="page">
  <property name="Alignment">agCenter</property>
  <property name="Background"></property>
  <property name="Caption">Log In</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">232</property>
  <property name="IsMaster">0</property>
  <property name="Name">ulogin</property>
  <property name="UseAjax">1</property>
  <property name="UseAjaxDebug">1</property>
  <property name="Width">472</property>
  <property name="OnShow">uloginShow</property>
  <property name="jsOnLoad">uloginJSLoad</property>
  <object class="Panel" name="plogin" >
    <property name="Alignment">agCenter</property>
    <property name="Color">#808080</property>
    <property name="Dynamic"></property>
    <property name="Height">159</property>
    <property name="Left">40</property>
    <property name="Name">plogin</property>
    <property name="ParentColor">0</property>
    <property name="Top">40</property>
    <property name="Width">384</property>
    <object class="Label" name="Label1" >
      <property name="Caption">Usuario:</property>
      <property name="Height">13</property>
      <property name="Left">152</property>
      <property name="Name">Label1</property>
      <property name="Top">56</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption"><![CDATA[Contrase&ntilde;a:]]></property>
      <property name="Height">13</property>
      <property name="Left">152</property>
      <property name="Name">Label2</property>
      <property name="Top">88</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="edlogin" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Left">240</property>
      <property name="Name">edlogin</property>
      <property name="ParentColor">0</property>
      <property name="Top">48</property>
      <property name="Width">121</property>
    </object>
    <object class="Edit" name="edpassword" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="IsPassword">1</property>
      <property name="Left">240</property>
      <property name="Name">edpassword</property>
      <property name="ParentColor">0</property>
      <property name="Top">80</property>
      <property name="Width">121</property>
    </object>
    <object class="Button" name="btnlogin" >
      <property name="Caption">Log In</property>
      <property name="Height">25</property>
      <property name="Left">166</property>
      <property name="Name">btnlogin</property>
      <property name="ParentColor">0</property>
      <property name="Top">112</property>
      <property name="Width">75</property>
      <property name="OnClick">btnloginClick</property>
    </object>
    <object class="Button" name="btncancelar" >
      <property name="ButtonType">btReset</property>
      <property name="Caption">Cancelar</property>
      <property name="Height">25</property>
      <property name="Left">272</property>
      <property name="Name">btncancelar</property>
      <property name="ParentColor">0</property>
      <property name="Top">112</property>
      <property name="Width">75</property>
    </object>
    <object class="Image" name="Image1" >
      <property name="Border">0</property>
      <property name="Height">100</property>
      <property name="ImageSource">imagenes/international.png</property>
      <property name="Left">21</property>
      <property name="Link"></property>
      <property name="LinkTarget"></property>
      <property name="Name">Image1</property>
      <property name="Top">29</property>
      <property name="Width">99</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption"><![CDATA[Iniciar Sesi&oacute;n]]></property>
      <property name="Font">
            <property name="Size">14</property>
            <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Left">176</property>
      <property name="Name">Label3</property>
      <property name="ParentFont">0</property>
      <property name="Top">16</property>
      <property name="Width">128</property>
    </object>
  </object>
  <object class="HiddenField" name="hfwidth" >
    <property name="Height">18</property>
    <property name="Left">240</property>
    <property name="Name">hfwidth</property>
    <property name="Top">16</property>
    <property name="Width">78</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">10</property>
        <property name="Top">81</property>
    <property name="Active"></property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
