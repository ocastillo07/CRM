<?php
<object class="frmusuarios" name="frmusuarios" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Usuarios</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">336</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmusuarios</property>
  <property name="Width">800</property>
  <property name="OnShow">frmusuariosShow</property>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfestatus" >
      <property name="Height">18</property>
      <property name="Left">460</property>
      <property name="Name">hfestatus</property>
      <property name="Top">16</property>
      <property name="Value">0</property>
      <property name="Width">82</property>
    </object>
    <object class="HiddenField" name="hfpass" >
      <property name="Height">18</property>
      <property name="Left">548</property>
      <property name="Name">hfpass</property>
      <property name="Top">15</property>
      <property name="Width">92</property>
    </object>
    <object class="HiddenField" name="hfpassactual" >
      <property name="Height">18</property>
      <property name="Left">643</property>
      <property name="Name">hfpassactual</property>
      <property name="Top">15</property>
      <property name="Width">73</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">141</property>
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
      <property name="Left">228</property>
      <property name="Name">btngcerrar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btngcerrarClick</property>
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
    <object class="Button" name="edregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">650</property>
      <property name="Name">edregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">edregresarClick</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Idusuario</property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label1</property>
    <property name="Top">62</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edidusuario" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">9</property>
    <property name="Name">edidusuario</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">78</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Nombre</property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label5</property>
    <property name="Top">118</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="ednombre" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">9</property>
    <property name="Name">ednombre</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">4</property>
    <property name="Top">134</property>
    <property name="Width">305</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Area</property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label10</property>
    <property name="Top">174</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbarea" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">9</property>
    <property name="Name">cbarea</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">7</property>
    <property name="Top">190</property>
    <property name="Width">261</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">E-Mail</property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label9</property>
    <property name="Top">222</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edmail" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">9</property>
    <property name="Name">edmail</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">238</property>
    <property name="Width">314</property>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario:</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">9</property>
    <property name="Name">lbufh</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">272</property>
    <property name="Width">583</property>
  </object>
  <object class="ComboBox" name="cbpuesto" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">284</property>
    <property name="Name">cbpuesto</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">8</property>
    <property name="Top">190</property>
    <property name="Width">265</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Puesto</property>
    <property name="Height">13</property>
    <property name="Left">284</property>
    <property name="Name">Label8</property>
    <property name="Top">174</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="edapaterno" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">332</property>
    <property name="Name">edapaterno</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">5</property>
    <property name="Top">134</property>
    <property name="Width">200</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Apellido Paterno</property>
    <property name="Height">13</property>
    <property name="Left">332</property>
    <property name="Name">Label6</property>
    <property name="Top">118</property>
    <property name="Width">99</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Apellido Materno</property>
    <property name="Height">13</property>
    <property name="Left">552</property>
    <property name="Name">Label7</property>
    <property name="Top">118</property>
    <property name="Width">107</property>
  </object>
  <object class="Edit" name="edamaterno" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">552</property>
    <property name="Name">edamaterno</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">6</property>
    <property name="Top">134</property>
    <property name="Width">185</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Plaza</property>
    <property name="Height">13</property>
    <property name="Left">576</property>
    <property name="Name">Label12</property>
    <property name="Top">174</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbplaza" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">576</property>
    <property name="Name">cbplaza</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">9</property>
    <property name="Top">190</property>
    <property name="Width">185</property>
  </object>
  <object class="Label" name="lbpassword" >
    <property name="Caption">Cambiar Password</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
        <property name="Color">#FF8000</property>
        <property name="Style">fsNormal</property>
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">622</property>
    <property name="Name">lbpassword</property>
    <property name="ParentFont">0</property>
    <property name="Top">78</property>
    <property name="Width">131</property>
    <property name="jsOnClick">lbpasswordJSClick</property>
  </object>
  <object class="CheckBox" name="ckactivo" >
    <property name="Caption">Activo</property>
    <property name="Height">21</property>
    <property name="Left">552</property>
    <property name="Name">ckactivo</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">3</property>
    <property name="Top">78</property>
    <property name="Width">56</property>
  </object>
  <object class="Edit" name="edlogin" >
    <property name="Height">21</property>
    <property name="Left">332</property>
    <property name="Name">edlogin</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">78</property>
    <property name="Width">137</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Usuario</property>
    <property name="Height">13</property>
    <property name="Left">332</property>
    <property name="Name">Label3</property>
    <property name="Top">62</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Iniciales</property>
    <property name="Height">13</property>
    <property name="Left">176</property>
    <property name="Name">Label2</property>
    <property name="Top">62</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="ediniciales" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">176</property>
    <property name="Name">ediniciales</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">78</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Perfil</property>
    <property name="Color">#F2F2F2</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">359</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">222</property>
    <property name="Width">60</property>
  </object>
  <object class="ComboBox" name="cbperfil" >
    <property name="Height">18</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">359</property>
    <property name="Name">cbperfil</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">12</property>
    <property name="Top">238</property>
    <property name="Width">289</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">748</property>
        <property name="Top">239</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLQuery" name="sqlgen2" >
        <property name="Left">641</property>
        <property name="Top">239</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLTable" name="tblusuarios" >
        <property name="Left">700</property>
        <property name="Top">241</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields"><![CDATA[a:1:{s:13:&quot;idoportunidad&quot;;s:1:&quot;0&quot;;}]]></property>
    <property name="MasterSource"></property>
    <property name="Name">tblusuarios</property>
    <property name="TableName">usuarios</property>
  </object>
</object>
?>
