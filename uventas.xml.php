<?php
<object class="uventas" name="uventas" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Ventas</property>
  <property name="Color">#c0c0c0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">688</property>
  <property name="IsMaster">0</property>
  <property name="Name">uventas</property>
  <property name="Width">800</property>
  <property name="OnShow">uventasShow</property>
  <property name="jsOnLoad">uventasJSLoad</property>
  <object class="Edit" name="edidpresupuesto" >
    <property name="Height">21</property>
    <property name="Left">92</property>
    <property name="Name">edidpresupuesto</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">2</property>
    <property name="TabStop">0</property>
    <property name="Top">89</property>
    <property name="Width">81</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">IdPresupuesto</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">92</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">72</property>
    <property name="Width">84</property>
  </object>
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
  <object class="Edit" name="edrevision" >
    <property name="Height">21</property>
    <property name="Left">180</property>
    <property name="Name">edrevision</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">3</property>
    <property name="TabStop">0</property>
    <property name="Top">89</property>
    <property name="Width">73</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">IdRevision</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">180</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">72</property>
    <property name="Width">70</property>
  </object>
  <object class="Edit" name="edfactura" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">340</property>
    <property name="Name">edfactura</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">182</property>
    <property name="Width">81</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Factura</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">340</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">166</property>
    <property name="Width">71</property>
  </object>
  <object class="Edit" name="edalmacen" >
    <property name="Height">21</property>
    <property name="Left">260</property>
    <property name="Name">edalmacen</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">4</property>
    <property name="TabStop">0</property>
    <property name="Top">89</property>
    <property name="Width">73</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Almacen</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">260</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">72</property>
    <property name="Width">72</property>
  </object>
  <object class="Edit" name="edidventa" >
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">edidventa</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">1</property>
    <property name="TabStop">0</property>
    <property name="Top">89</property>
    <property name="Width">81</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">IdVenta</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">72</property>
    <property name="Width">72</property>
  </object>
  <object class="Edit" name="edfechafactura" >
    <property name="Height">21</property>
    <property name="Left">340</property>
    <property name="Name">edfechafactura</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">5</property>
    <property name="TabStop">0</property>
    <property name="Top">89</property>
    <property name="Width">87</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">FechaFactura</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">340</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">72</property>
    <property name="Width">88</property>
  </object>
  <object class="Edit" name="edpromotor" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">431</property>
    <property name="Name">edpromotor</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">6</property>
    <property name="TabStop">0</property>
    <property name="Top">89</property>
    <property name="Width">294</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Promotor</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">431</property>
    <property name="Name">Label7</property>
    <property name="ParentFont">0</property>
    <property name="Top">72</property>
    <property name="Width">88</property>
  </object>
  <object class="HiddenField" name="hfidpromotor" >
    <property name="Height">18</property>
    <property name="Left">523</property>
    <property name="Name">hfidpromotor</property>
    <property name="Top">53</property>
    <property name="Width">87</property>
  </object>
  <object class="Edit" name="edcliente" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">edcliente</property>
    <property name="ParentColor">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">7</property>
    <property name="TabStop">0</property>
    <property name="Top">136</property>
    <property name="Width">420</property>
  </object>
  <object class="Label" name="Label8" >
    <property name="Caption">Cliente</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label8</property>
    <property name="ParentFont">0</property>
    <property name="Top">120</property>
    <property name="Width">88</property>
  </object>
  <object class="HiddenField" name="hfidcliente" >
    <property name="Height">18</property>
    <property name="Left">102</property>
    <property name="Name">hfidcliente</property>
    <property name="Top">117</property>
    <property name="Width">87</property>
  </object>
  <object class="Label" name="Label9" >
    <property name="Caption">%Iva</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label9</property>
    <property name="ParentFont">0</property>
    <property name="Top">165</property>
    <property name="Width">71</property>
  </object>
  <object class="Edit" name="edsubtotal" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">92</property>
    <property name="Name">edsubtotal</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">12</property>
    <property name="TabStop">0</property>
    <property name="Top">182</property>
    <property name="Width">81</property>
  </object>
  <object class="Label" name="Label10" >
    <property name="Caption">Subtotal</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">92</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">165</property>
    <property name="Width">71</property>
  </object>
  <object class="Edit" name="ediva" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">180</property>
    <property name="Name">ediva</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">13</property>
    <property name="TabStop">0</property>
    <property name="Top">182</property>
    <property name="Width">73</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">IVA</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">180</property>
    <property name="Name">Label11</property>
    <property name="ParentFont">0</property>
    <property name="Top">165</property>
    <property name="Width">71</property>
  </object>
  <object class="Edit" name="edtotal" >
    <property name="Font">
        <property name="Align">taRight</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">260</property>
    <property name="Name">edtotal</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="TabOrder">14</property>
    <property name="TabStop">0</property>
    <property name="Top">182</property>
    <property name="Width">73</property>
  </object>
  <object class="Label" name="Label12" >
    <property name="Caption">Total</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">260</property>
    <property name="Name">Label12</property>
    <property name="ParentFont">0</property>
    <property name="Top">165</property>
    <property name="Width">71</property>
  </object>
  <object class="ComboBox" name="cbiva" >
    <property name="Enabled">0</property>
    <property name="Height">21</property>
    <property name="Items">a:0:{}</property>
    <property name="Left">7</property>
    <property name="Name">cbiva</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">11</property>
    <property name="TabStop">0</property>
    <property name="Top">182</property>
    <property name="Width">81</property>
  </object>
  <object class="Memo" name="mobservacion" >
    <property name="Height">89</property>
    <property name="Left">7</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mobservacion</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">2</property>
    <property name="Top">232</property>
    <property name="Width">718</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Observaciones</property>
    <property name="Color">#c0c0c0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">214</property>
    <property name="Width">103</property>
  </object>
  <object class="HiddenField" name="hfestatus" >
    <property name="Height">18</property>
    <property name="Left">627</property>
    <property name="Name">hfestatus</property>
    <property name="Top">53</property>
    <property name="Width">87</property>
  </object>
  <object class="Label" name="lbdetalle" >
    <property name="Color">#c0c0c0</property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">lbdetalle</property>
    <property name="Top">338</property>
    <property name="Width">721</property>
  </object>
  <object class="MySQLTable" name="tbventas" >
        <property name="Left">747</property>
        <property name="Top">58</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbventas</property>
    <property name="TableName">reventas</property>
  </object>
</object>
?>
