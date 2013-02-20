<?php
<object class="uresegnoref_conf" name="uresegnoref_conf" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Configuracion de Seguimiento a No Refacciones</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">760</property>
  <property name="IsMaster">0</property>
  <property name="Name">uresegnoref_conf</property>
  <property name="Width">800</property>
  <property name="OnCreate">uresegnoref_confCreate</property>
  <property name="OnShow">uresegnoref_confShow</property>
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
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">714</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnregresarClick</property>
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
      <property name="Top">8</property>
      <property name="Width">203</property>
    </object>
  </object>
  <object class="ComboBox" name="cbplaza" >
    <property name="Font">
        <property name="Case">caUpperCase</property>
    </property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">72</property>
    <property name="Name">cbplaza</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">198</property>
    <property name="Width">156</property>
    <property name="OnChange">cbplazaChange</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Plaza</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">206</property>
    <property name="Width">51</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Nota de Seguimiento:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">70</property>
    <property name="Width">131</property>
  </object>
  <object class="Memo" name="ednotaseg" >
    <property name="Height">89</property>
    <property name="Left">16</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">ednotaseg</property>
    <property name="ParentColor">0</property>
    <property name="Top">88</property>
    <property name="Width">773</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Correo Solicita a compra</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">17</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">342</property>
    <property name="Width">267</property>
  </object>
  <object class="Memo" name="edautorizarm" >
    <property name="Height">49</property>
    <property name="Left">17</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edautorizarm</property>
    <property name="ParentColor">0</property>
    <property name="Top">360</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Correo En Compra:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">19</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">422</property>
    <property name="Width">131</property>
  </object>
  <object class="Memo" name="edencompram" >
    <property name="Height">49</property>
    <property name="Left">19</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edencompram</property>
    <property name="ParentColor">0</property>
    <property name="Top">440</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Correo en Proceso:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">17</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">262</property>
    <property name="Width">186</property>
  </object>
  <object class="Memo" name="edprocesom" >
    <property name="Height">49</property>
    <property name="Left">17</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edprocesom</property>
    <property name="ParentColor">0</property>
    <property name="Top">280</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Correo en Proceso:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">409</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">262</property>
    <property name="Width">180</property>
  </object>
  <object class="Memo" name="edprocesos" >
    <property name="Height">49</property>
    <property name="Left">409</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edprocesos</property>
    <property name="ParentColor">0</property>
    <property name="Top">280</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Correo Surtido en Almacen:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">18</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">502</property>
    <property name="Width">178</property>
  </object>
  <object class="Memo" name="edsurtidom" >
    <property name="Height">49</property>
    <property name="Left">18</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edsurtidom</property>
    <property name="ParentColor">0</property>
    <property name="Top">520</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Correo Cerrado:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">19</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">670</property>
    <property name="Width">178</property>
  </object>
  <object class="Memo" name="edcerradom" >
    <property name="Height">49</property>
    <property name="Left">19</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edcerradom</property>
    <property name="ParentColor">0</property>
    <property name="Top">688</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">Correo Surtido Completamente en Almacen:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">19</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">582</property>
    <property name="Width">306</property>
  </object>
  <object class="Memo" name="edsurtidocompm" >
    <property name="Height">49</property>
    <property name="Left">19</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edsurtidocompm</property>
    <property name="ParentColor">0</property>
    <property name="Top">600</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Correo Solicita a compra</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">409</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">342</property>
    <property name="Width">267</property>
  </object>
  <object class="Memo" name="edautorizars" >
    <property name="Height">49</property>
    <property name="Left">409</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edautorizars</property>
    <property name="ParentColor">0</property>
    <property name="Top">360</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">Correo En Compra:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">409</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">425</property>
    <property name="Width">131</property>
  </object>
  <object class="Memo" name="edencompras" >
    <property name="Height">49</property>
    <property name="Left">409</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edencompras</property>
    <property name="ParentColor">0</property>
    <property name="Top">443</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Correo Surtido en Almacen:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">408</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">505</property>
    <property name="Width">178</property>
  </object>
  <object class="Memo" name="edsurtidos" >
    <property name="Height">49</property>
    <property name="Left">408</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edsurtidos</property>
    <property name="ParentColor">0</property>
    <property name="Top">523</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Correo Cerrado:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">409</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">673</property>
    <property name="Width">178</property>
  </object>
  <object class="Memo" name="edcerrados" >
    <property name="Height">49</property>
    <property name="Left">409</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edcerrados</property>
    <property name="ParentColor">0</property>
    <property name="Top">691</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">Correo Surtido Completamente en Almacen:</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">409</property>
    <property name="Name">Label14</property>
    <property name="ParentFont">0</property>
    <property name="Top">585</property>
    <property name="Width">306</property>
  </object>
  <object class="Memo" name="edsurtidocomps" >
    <property name="Height">49</property>
    <property name="Left">409</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">edsurtidocomps</property>
    <property name="ParentColor">0</property>
    <property name="Top">603</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">CORREOS PARA MOSTRADOR</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">238</property>
    <property name="Width">380</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">CORREOS PARA SERVICIO</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">408</property>
    <property name="Name">Label16</property>
    <property name="ParentFont">0</property>
    <property name="Top">238</property>
    <property name="Width">380</property>
  </object>
</object>
?>
