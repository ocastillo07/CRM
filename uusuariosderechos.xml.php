<?php
<object class="uusuariosderechos" name="uusuariosderechos" baseclass="page">
  <property name="Background"></property>
  <property name="Cached"></property>
  <property name="Caption">Derechos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">200</property>
  <property name="IsMaster">0</property>
  <property name="Name">uusuariosderechos</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">uusuariosderechosShow</property>
  <property name="jsOnLoad">uusuariosderechosJSLoad</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="Label" name="lbtitulo" >
      <property name="Caption"><![CDATA[&lt;FONT color=#004080&gt;&lt;STRONG&gt;lbtitulo &lt;/STRONG&gt;&lt;/FONT&gt;]]></property>
      <property name="Font">
            <property name="Color">#004080</property>
            <property name="Size">12</property>
            <property name="Weight">bolder</property>
      </property>
      <property name="Height">19</property>
      <property name="Left">2</property>
      <property name="Name">lbtitulo</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">15</property>
      <property name="Width">123</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">155</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">7</property>
      <property name="Top">9</property>
      <property name="Width">81</property>
      <property name="OnClick">btnguardarClick</property>
    </object>
    <object class="Button" name="btngcerrar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">248</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">8</property>
      <property name="Top">9</property>
      <property name="Width">121</property>
      <property name="OnClick">btngcerrarClick</property>
    </object>
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">687</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">11</property>
      <property name="Width">103</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Button" name="btnliberar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Liberar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">392</property>
      <property name="Name">btnliberar</property>
      <property name="ParentColor">0</property>
      <property name="Top">9</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btnliberarJSClick</property>
    </object>
    <object class="Button" name="btnbloquear" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Bloquear</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">480</property>
      <property name="Name">btnbloquear</property>
      <property name="ParentColor">0</property>
      <property name="Top">9</property>
      <property name="Width">75</property>
      <property name="jsOnClick">btnbloquearJSClick</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Paginas</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Layer">CREDITO Y COBRANZA</property>
    <property name="Left">17</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">92</property>
    <property name="Width">75</property>
  </object>
  <object class="HiddenField" name="hfidusr" >
    <property name="Height">18</property>
    <property name="Left">724</property>
    <property name="Name">hfidusr</property>
    <property name="Top">104</property>
    <property name="Width">57</property>
  </object>
  <object class="HiddenField" name="hfder" >
    <property name="Height">18</property>
    <property name="Left">550</property>
    <property name="Name">hfder</property>
    <property name="Top">104</property>
    <property name="Width">72</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">634</property>
    <property name="Name">hfestatus</property>
    <property name="Top">104</property>
    <property name="Value">0</property>
    <property name="Width">82</property>
  </object>
  <object class="Label" name="lbusuario" >
    <property name="Caption"><![CDATA[&lt;P&gt;dalyla&lt;/P&gt;
&lt;P&gt;daly&lt;/P&gt;]]></property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Color">#000080</property>
        <property name="Size">12</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">28</property>
    <property name="Left">9</property>
    <property name="Name">lbusuario</property>
    <property name="ParentFont">0</property>
    <property name="Top">61</property>
    <property name="Width">783</property>
  </object>
  <object class="Label" name="lbgrupo" >
    <property name="Caption">...</property>
    <property name="Color">#F2F2F2</property>
    <property name="Height">13</property>
    <property name="Left">240</property>
    <property name="Name">lbgrupo</property>
    <property name="Top">152</property>
    <property name="Width">227</property>
  </object>
  <object class="Label" name="lbderechos" >
    <property name="Caption">...</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">515</property>
    <property name="Name">lbderechos</property>
    <property name="Top">152</property>
    <property name="Width">275</property>
  </object>
  <object class="HiddenField" name="hfperfil" >
    <property name="Height">18</property>
    <property name="Left">473</property>
    <property name="Name">hfperfil</property>
    <property name="Top">104</property>
    <property name="Width">58</property>
  </object>
  <object class="Label" name="lbmodulo" >
    <property name="Caption">...</property>
    <property name="Color">#F2F2F2</property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">lbmodulo</property>
    <property name="Top">152</property>
    <property name="Width">187</property>
  </object>
</object>
?>
