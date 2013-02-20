<?php
<object class="uproductos" name="uproductos" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Productos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">640</property>
  <property name="IsMaster">0</property>
  <property name="Name">uproductos</property>
  <property name="UseAjax">1</property>
  <property name="Width">800</property>
  <property name="OnShow">uproductosShow</property>
  <object class="PageControl" name="PageControl" >
    <property name="ActiveLayer">Generales</property>
    <property name="Height">552</property>
    <property name="Left">4</property>
    <property name="Name">PageControl</property>
    <property name="TabIndex">0</property>
    <property name="Tabs"><![CDATA[a:3:{i:0;s:9:&quot;Generales&quot;;i:1;s:9:&quot;Detallado&quot;;i:2;s:7:&quot;Adjunto&quot;;}]]></property>
    <property name="Top">52</property>
    <property name="Width">791</property>
    <object class="Edit" name="eddescripcion" >
      <property name="Height">20</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">eddescripcion</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">4</property>
      <property name="Top">155</property>
      <property name="Width">457</property>
      <property name="jsOnKeyPress">eddescripcionJSKeyPress</property>
    </object>
    <object class="Edit" name="edclave" >
      <property name="DataField">clave</property>
      <property name="Datasource">dsproductos</property>
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">edclave</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">2</property>
      <property name="Top">85</property>
      <property name="Width">457</property>
      <property name="jsOnKeyPress">edclaveJSKeyPress</property>
    </object>
    <object class="Edit" name="edcosto" >
      <property name="DataField">costo</property>
      <property name="Datasource">dsproductos</property>
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">edcosto</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">6</property>
      <property name="Top">222</property>
      <property name="Width">457</property>
      <property name="jsOnKeyPress">edcostoJSKeyPress</property>
    </object>
    <object class="Edit" name="edpreciomin" >
      <property name="DataField">preciominimo</property>
      <property name="Datasource">dsproductos</property>
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">edpreciomin</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">7</property>
      <property name="Top">253</property>
      <property name="Width">457</property>
      <property name="jsOnKeyPress">edpreciominJSKeyPress</property>
    </object>
    <object class="Label" name="fdproductos7" >
      <property name="Caption">Clave</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">fdproductos7</property>
      <property name="ParentColor">0</property>
      <property name="Top">85</property>
      <property name="Width">59</property>
    </object>
    <object class="Label" name="fdproductos8" >
      <property name="Caption">Descripcion</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">fdproductos8</property>
      <property name="ParentColor">0</property>
      <property name="Top">160</property>
      <property name="Width">74</property>
    </object>
    <object class="Label" name="fdproductos9" >
      <property name="Caption">Costo</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">fdproductos9</property>
      <property name="ParentColor">0</property>
      <property name="Top">230</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="fdproductos10" >
      <property name="Caption">Precio Minimo</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">fdproductos10</property>
      <property name="ParentColor">0</property>
      <property name="Top">261</property>
      <property name="Width">90</property>
    </object>
    <object class="ComboBox" name="cbtipos" >
      <property name="Height">18</property>
      <property name="ItemIndex">1</property>
      <property name="Items">a:0:{}</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">cbtipos</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">3</property>
      <property name="Top">121</property>
      <property name="Width">457</property>
      <property name="OnChange">cbtiposChange</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Tipo de Producto</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="Top">124</property>
      <property name="Width">98</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption"><![CDATA[&lt;STRONG&gt;Detalles&lt;/STRONG&gt;]]></property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
            <property name="Size">12</property>
      </property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">40</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">40</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Tipo Camion</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="Top">60</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Tipo Chasis</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="Top">85</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Configuracion</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="Top">116</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Motor</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="Top">148</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Transmision</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">392</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="Top">89</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label8" >
      <property name="Caption">Torque</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">392</property>
      <property name="Name">Label8</property>
      <property name="ParentColor">0</property>
      <property name="Top">120</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label9" >
      <property name="Caption">Embrague</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">392</property>
      <property name="Name">Label9</property>
      <property name="ParentColor">0</property>
      <property name="Top">152</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label10" >
      <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Ejes&lt;/STRONG&gt;&lt;/P&gt;]]></property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
            <property name="Size">12</property>
      </property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">40</property>
      <property name="Name">Label10</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">181</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label11" >
      <property name="Caption">Eje Delantero</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label11</property>
      <property name="ParentColor">0</property>
      <property name="Top">212</property>
      <property name="Width">84</property>
    </object>
    <object class="Label" name="Label12" >
      <property name="Caption">Eje Trasero</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">392</property>
      <property name="Name">Label12</property>
      <property name="ParentColor">0</property>
      <property name="Top">212</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label13" >
      <property name="Caption">Suspension Delantera</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label13</property>
      <property name="ParentColor">0</property>
      <property name="Top">250</property>
      <property name="Width">123</property>
    </object>
    <object class="Label" name="Label14" >
      <property name="Caption">Suspension Trasera</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label14</property>
      <property name="ParentColor">0</property>
      <property name="Top">283</property>
      <property name="Width">131</property>
    </object>
    <object class="Label" name="Label15" >
      <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Otros&lt;/STRONG&gt;&lt;/P&gt;]]></property>
      <property name="Color">#FFFFFF</property>
      <property name="Font">
            <property name="Size">12</property>
      </property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">40</property>
      <property name="Name">Label15</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">320</property>
      <property name="Width">66</property>
    </object>
    <object class="Label" name="Label16" >
      <property name="Caption">Bastidor</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label16</property>
      <property name="ParentColor">0</property>
      <property name="Top">360</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label17" >
      <property name="Caption">Camarote</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label17</property>
      <property name="ParentColor">0</property>
      <property name="Top">397</property>
      <property name="Width">75</property>
    </object>
    <object class="Edit" name="edchasis" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">138</property>
      <property name="Name">edchasis</property>
      <property name="ParentColor">0</property>
      <property name="TabStop">0</property>
      <property name="Text">chasis</property>
      <property name="Top">85</property>
      <property name="Width">222</property>
      <property name="jsOnKeyPress">edchasisJSKeyPress</property>
    </object>
    <object class="Edit" name="edconfiguracion" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">139</property>
      <property name="Name">edconfiguracion</property>
      <property name="ParentColor">0</property>
      <property name="TabStop">0</property>
      <property name="Text">configuracion</property>
      <property name="Top">112</property>
      <property name="Width">221</property>
      <property name="jsOnKeyPress">edconfiguracionJSKeyPress</property>
    </object>
    <object class="Edit" name="edmotor" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">139</property>
      <property name="Name">edmotor</property>
      <property name="ParentColor">0</property>
      <property name="Text">motor</property>
      <property name="Top">144</property>
      <property name="Width">221</property>
      <property name="jsOnKeyPress">edmotorJSKeyPress</property>
    </object>
    <object class="Edit" name="edtransmision" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">528</property>
      <property name="Name">edtransmision</property>
      <property name="ParentColor">0</property>
      <property name="Text">transmision</property>
      <property name="Top">85</property>
      <property name="Width">245</property>
      <property name="jsOnKeyPress">edtransmisionJSKeyPress</property>
    </object>
    <object class="Edit" name="edtorque" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">527</property>
      <property name="Name">edtorque</property>
      <property name="ParentColor">0</property>
      <property name="Text">torque</property>
      <property name="Top">112</property>
      <property name="Width">245</property>
      <property name="jsOnKeyPress">edtorqueJSKeyPress</property>
    </object>
    <object class="Edit" name="edembrague" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">528</property>
      <property name="Name">edembrague</property>
      <property name="ParentColor">0</property>
      <property name="Text">embrage</property>
      <property name="Top">144</property>
      <property name="Width">245</property>
      <property name="jsOnKeyPress">edembragueJSKeyPress</property>
    </object>
    <object class="Edit" name="edejedelantero" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">139</property>
      <property name="Name">edejedelantero</property>
      <property name="ParentColor">0</property>
      <property name="Text">ejedelantero</property>
      <property name="Top">208</property>
      <property name="Width">222</property>
      <property name="jsOnKeyPress">edejedelanteroJSKeyPress</property>
    </object>
    <object class="Edit" name="edejetrasero" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">527</property>
      <property name="Name">edejetrasero</property>
      <property name="ParentColor">0</property>
      <property name="Text">ejetrasero</property>
      <property name="Top">208</property>
      <property name="Width">245</property>
      <property name="jsOnKeyPress">edejetraseroJSKeyPress</property>
    </object>
    <object class="Edit" name="edsuspensiondelantera" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">138</property>
      <property name="Name">edsuspensiondelantera</property>
      <property name="ParentColor">0</property>
      <property name="Text">suspensiondelantera</property>
      <property name="Top">242</property>
      <property name="Width">634</property>
      <property name="jsOnKeyPress">edsuspensiondelanteraJSKeyPress</property>
    </object>
    <object class="Edit" name="edsuspensiontrasera" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">139</property>
      <property name="Name">edsuspensiontrasera</property>
      <property name="ParentColor">0</property>
      <property name="Text">suspensiontrasera</property>
      <property name="Top">275</property>
      <property name="Width">633</property>
      <property name="jsOnKeyPress">edsuspensiontraseraJSKeyPress</property>
    </object>
    <object class="Edit" name="edacondicionamiento" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">528</property>
      <property name="Name">edacondicionamiento</property>
      <property name="ParentColor">0</property>
      <property name="Text">acondicionamiento</property>
      <property name="Top">352</property>
      <property name="Width">245</property>
      <property name="jsOnKeyPress">edacondicionamientoJSKeyPress</property>
    </object>
    <object class="Edit" name="edbastidor" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">139</property>
      <property name="Name">edbastidor</property>
      <property name="ParentColor">0</property>
      <property name="Text">bastidor</property>
      <property name="Top">352</property>
      <property name="Width">221</property>
      <property name="jsOnKeyPress">edbastidorJSKeyPress</property>
    </object>
    <object class="Edit" name="edcamarote" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">139</property>
      <property name="Name">edcamarote</property>
      <property name="ParentColor">0</property>
      <property name="Text">camarote</property>
      <property name="Top">389</property>
      <property name="Width">221</property>
      <property name="jsOnKeyPress">edcamaroteJSKeyPress</property>
    </object>
    <object class="Edit" name="edclavevehicular" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">528</property>
      <property name="Name">edclavevehicular</property>
      <property name="ParentColor">0</property>
      <property name="Text">clavevehicular</property>
      <property name="Top">471</property>
      <property name="Width">245</property>
    </object>
    <object class="Edit" name="edfrenos" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">138</property>
      <property name="Name">edfrenos</property>
      <property name="ParentColor">0</property>
      <property name="Text">frenos</property>
      <property name="Top">471</property>
      <property name="Width">222</property>
      <property name="jsOnKeyPress">edfrenosJSKeyPress</property>
    </object>
    <object class="Edit" name="edlargototal" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">528</property>
      <property name="Name">edlargototal</property>
      <property name="ParentColor">0</property>
      <property name="Text">largototal</property>
      <property name="Top">389</property>
      <property name="Width">245</property>
      <property name="jsOnKeyPress">edlargototalJSKeyPress</property>
    </object>
    <object class="Edit" name="edllantas" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">139</property>
      <property name="Name">edllantas</property>
      <property name="ParentColor">0</property>
      <property name="Text">llantas</property>
      <property name="Top">432</property>
      <property name="Width">222</property>
      <property name="jsOnKeyPress">edllantasJSKeyPress</property>
    </object>
    <object class="Edit" name="edsistemadireccion" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">138</property>
      <property name="Name">edsistemadireccion</property>
      <property name="ParentColor">0</property>
      <property name="Text">sitemadireccion</property>
      <property name="Top">510</property>
      <property name="Width">221</property>
      <property name="jsOnKeyPress">edsistemadireccionJSKeyPress</property>
    </object>
    <object class="Edit" name="edtanque" >
      <property name="Color">#FFFFFF</property>
      <property name="Height">21</property>
      <property name="Layer">Detallado</property>
      <property name="Left">528</property>
      <property name="Name">edtanque</property>
      <property name="ParentColor">0</property>
      <property name="Text">tanquescombustible</property>
      <property name="Top">432</property>
      <property name="Width">245</property>
      <property name="jsOnKeyPress">edtanqueJSKeyPress</property>
    </object>
    <object class="Label" name="Label18" >
      <property name="Caption">Llantas</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled"></property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label18</property>
      <property name="ParentColor">0</property>
      <property name="Top">440</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label19" >
      <property name="Caption">Frenos</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label19</property>
      <property name="ParentColor">0</property>
      <property name="Top">479</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label20" >
      <property name="Caption">Sistema de Direccion</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">7</property>
      <property name="Name">Label20</property>
      <property name="ParentColor">0</property>
      <property name="Top">518</property>
      <property name="Width">124</property>
    </object>
    <object class="Label" name="Label21" >
      <property name="Caption">Acondicionamiento</property>
      <property name="Color">#FFFFFF</property>
      <property name="Enabled"></property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">392</property>
      <property name="Name">Label21</property>
      <property name="ParentColor">0</property>
      <property name="Top">360</property>
      <property name="Width">113</property>
    </object>
    <object class="Label" name="Label22" >
      <property name="Caption">Largo Total</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">392</property>
      <property name="Name">Label22</property>
      <property name="ParentColor">0</property>
      <property name="Top">397</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label23" >
      <property name="Caption">Tanques Combustible</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">392</property>
      <property name="Name">Label23</property>
      <property name="ParentColor">0</property>
      <property name="Top">440</property>
      <property name="Width">123</property>
    </object>
    <object class="Label" name="Label24" >
      <property name="Caption">Clave Vehicular</property>
      <property name="Color">#FFFFFF</property>
      <property name="Height">13</property>
      <property name="Layer">Detallado</property>
      <property name="Left">392</property>
      <property name="Name">Label24</property>
      <property name="ParentColor">0</property>
      <property name="Top">479</property>
      <property name="Width">75</property>
    </object>
    <object class="HiddenField" name="hfreturn" >
      <property name="Height">18</property>
      <property name="Layer">Generales</property>
      <property name="Left">439</property>
      <property name="Name">hfreturn</property>
      <property name="Width">77</property>
    </object>
    <object class="Label" name="Label25" >
      <property name="Caption">ID</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">Label25</property>
      <property name="ParentColor">0</property>
      <property name="Top">45</property>
      <property name="Width">59</property>
    </object>
    <object class="Edit" name="edproducto" >
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">edproducto</property>
      <property name="ParentColor">0</property>
      <property name="ReadOnly">1</property>
      <property name="TabOrder">1</property>
      <property name="Top">45</property>
      <property name="Width">87</property>
    </object>
    <object class="Edit" name="edexistencias" >
      <property name="DataField">existencias</property>
      <property name="Datasource">dsproductos</property>
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">edexistencias</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">6</property>
      <property name="Top">324</property>
      <property name="Width">457</property>
      <property name="jsOnKeyPress">edexistenciasJSKeyPress</property>
    </object>
    <object class="Edit" name="edbackorder" >
      <property name="DataField">backorder</property>
      <property name="Datasource">dsproductos</property>
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">edbackorder</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">6</property>
      <property name="Top">362</property>
      <property name="Width">457</property>
      <property name="jsOnKeyPress">edbackorderJSKeyPress</property>
    </object>
    <object class="Edit" name="edapartados" >
      <property name="DataField">apartados</property>
      <property name="Datasource">dsproductos</property>
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">edapartados</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">6</property>
      <property name="Top">397</property>
      <property name="Width">457</property>
      <property name="jsOnKeyPress">edapartadosJSKeyPress</property>
    </object>
    <object class="Edit" name="edfacturados" >
      <property name="DataField">facturados</property>
      <property name="Datasource">dsproductos</property>
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">edfacturados</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">6</property>
      <property name="Top">434</property>
      <property name="Width">457</property>
      <property name="jsOnKeyPress">edfacturadosJSKeyPress</property>
    </object>
    <object class="Label" name="Label26" >
      <property name="Caption">Existencias</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">Label26</property>
      <property name="ParentColor">0</property>
      <property name="Top">332</property>
      <property name="Width">90</property>
    </object>
    <object class="Label" name="Label27" >
      <property name="Caption">Backorder</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">Label27</property>
      <property name="ParentColor">0</property>
      <property name="Top">370</property>
      <property name="Width">90</property>
    </object>
    <object class="Label" name="Label28" >
      <property name="Caption">Apartados</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">Label28</property>
      <property name="ParentColor">0</property>
      <property name="Top">405</property>
      <property name="Width">90</property>
    </object>
    <object class="Label" name="Label29" >
      <property name="Caption">Facturados</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">Label29</property>
      <property name="ParentColor">0</property>
      <property name="Top">442</property>
      <property name="Width">90</property>
    </object>
    <object class="Upload" name="upload" >
      <property name="Height">21</property>
      <property name="Layer">Adjunto</property>
      <property name="Left">62</property>
      <property name="Name">upload</property>
      <property name="ParentColor">0</property>
      <property name="Top">77</property>
      <property name="Width">653</property>
    </object>
    <object class="Button" name="btnupload" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Subir Archivo</property>
      <property name="Height">25</property>
      <property name="Layer">Adjunto</property>
      <property name="Left">62</property>
      <property name="Name">btnupload</property>
      <property name="ParentColor">0</property>
      <property name="Top">110</property>
      <property name="Width">106</property>
      <property name="OnClick">btnuploadClick</property>
    </object>
    <object class="Label" name="lbadjunto" >
      <property name="Height">13</property>
      <property name="Layer">Adjunto</property>
      <property name="Left">63</property>
      <property name="Link">Adjuntos/Declaracion.doc</property>
      <property name="LinkTarget">blank</property>
      <property name="Name">lbadjunto</property>
      <property name="ParentColor">0</property>
      <property name="Top">162</property>
      <property name="Width">276</property>
    </object>
    <object class="Label" name="Label30" >
      <property name="Caption">Archivo</property>
      <property name="Height">13</property>
      <property name="Layer">Adjunto</property>
      <property name="Left">62</property>
      <property name="Name">Label30</property>
      <property name="ParentColor">0</property>
      <property name="Top">148</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="lbufh" >
      <property name="Caption">Usuario Fecha Hora</property>
      <property name="Font">
            <property name="Color">#808080</property>
            <property name="Style">fsNormal</property>
      </property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">lbufh</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">483</property>
      <property name="Width">361</property>
    </object>
    <object class="ComboBox" name="cbmoneda" >
      <property name="Height">18</property>
      <property name="Items">a:0:{}</property>
      <property name="Layer">Generales</property>
      <property name="Left">120</property>
      <property name="Name">cbmoneda</property>
      <property name="ParentColor">0</property>
      <property name="Top">289</property>
      <property name="Width">457</property>
    </object>
    <object class="Label" name="Label31" >
      <property name="Caption">Moneda</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">Label31</property>
      <property name="ParentColor">0</property>
      <property name="Top">294</property>
      <property name="Width">90</property>
    </object>
    <object class="ComboBox" name="cbcamiones" >
      <property name="Height">21</property>
      <property name="Items">a:0:{}</property>
      <property name="Layer">Generales</property>
      <property name="Left">119</property>
      <property name="Name">cbcamiones</property>
      <property name="ParentColor">0</property>
      <property name="Top">156</property>
      <property name="Width">459</property>
      <property name="OnChange">cbcamionesChange</property>
    </object>
    <object class="Label" name="lbadjunto2" >
      <property name="Height">13</property>
      <property name="Layer">Adjunto</property>
      <property name="Left">63</property>
      <property name="Link">Adjuntos/Declaracion.doc</property>
      <property name="LinkTarget">blank</property>
      <property name="Name">lbadjunto2</property>
      <property name="ParentColor">0</property>
      <property name="Top">176</property>
      <property name="Width">276</property>
    </object>
    <object class="Label" name="lbeliminar1" >
      <property name="Height">13</property>
      <property name="Layer">Adjunto</property>
      <property name="Left">359</property>
      <property name="Link">Adjuntos/Declaracion.doc</property>
      <property name="LinkTarget">blank</property>
      <property name="Name">lbeliminar1</property>
      <property name="ParentColor">0</property>
      <property name="Top">162</property>
      <property name="Width">50</property>
      <property name="OnClick">lbeliminar1Click</property>
    </object>
    <object class="Label" name="lbeliminar2" >
      <property name="Height">13</property>
      <property name="Layer">Adjunto</property>
      <property name="Left">359</property>
      <property name="Link">Adjuntos/Declaracion.doc</property>
      <property name="LinkTarget">blank</property>
      <property name="Name">lbeliminar2</property>
      <property name="ParentColor">0</property>
      <property name="Top">176</property>
      <property name="Width">50</property>
      <property name="OnClick">lbeliminar2Click</property>
    </object>
    <object class="Edit" name="edcomentario" >
      <property name="DataField">comentario</property>
      <property name="Datasource">dsproductos</property>
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">120</property>
      <property name="Name">edcomentario</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">5</property>
      <property name="Top">185</property>
      <property name="Width">457</property>
      <property name="jsOnKeyPress">edcomentarioJSKeyPress</property>
    </object>
    <object class="Label" name="Label32" >
      <property name="Caption">Comentario</property>
      <property name="Height">13</property>
      <property name="Layer">Generales</property>
      <property name="Left">17</property>
      <property name="Name">Label32</property>
      <property name="ParentColor">0</property>
      <property name="Top">193</property>
      <property name="Width">75</property>
    </object>
    <object class="CheckBox" name="chkactivo" >
      <property name="Caption">Activo</property>
      <property name="DataField">activo</property>
      <property name="DataSource">dsproductos</property>
      <property name="Height">21</property>
      <property name="Layer">Generales</property>
      <property name="Left">501</property>
      <property name="Name">chkactivo</property>
      <property name="ParentColor">0</property>
      <property name="Top">45</property>
      <property name="Width">77</property>
    </object>
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
    <object class="Button" name="btnguardacierra" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar y Cerrar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">224</property>
      <property name="Name">btnguardacierra</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">8</property>
      <property name="Top">8</property>
      <property name="Width">107</property>
      <property name="OnClick">btnguardacierraClick</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">142</property>
      <property name="Name">btnguardar</property>
      <property name="ParentColor">0</property>
      <property name="TabOrder">7</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnguardarClick</property>
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
    <object class="Button" name="btncopiar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Copiar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">463</property>
      <property name="Name">btncopiar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btncopiarClick</property>
    </object>
  </object>
  <object class="HiddenField" name="hfpath" >
    <property name="Height">18</property>
    <property name="Left">671</property>
    <property name="Name">hfpath</property>
    <property name="Top">132</property>
    <property name="Width">120</property>
  </object>
  <object class="HiddenField" name="hfdescripcion" >
    <property name="Height">18</property>
    <property name="Left">671</property>
    <property name="Name">hfdescripcion</property>
    <property name="Top">158</property>
    <property name="Width">118</property>
  </object>
  <object class="HiddenField" name="hfpath2" >
    <property name="Height">18</property>
    <property name="Left">671</property>
    <property name="Name">hfpath2</property>
    <property name="Top">191</property>
    <property name="Width">117</property>
  </object>
  <object class="Datasource" name="dsproductos" >
        <property name="Left">719</property>
        <property name="Top">80</property>
    <property name="Dataset">tbproductos</property>
    <property name="Name">dsproductos</property>
  </object>
  <object class="MySQLTable" name="tbproductos" >
        <property name="Left">679</property>
        <property name="Top">224</property>
    <property name="Active">1</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbproductos</property>
    <property name="TableName">productos</property>
  </object>
  <object class="Datasource" name="dsproductosdet" >
        <property name="Left">681</property>
        <property name="Top">288</property>
    <property name="Dataset">tbproductosdet</property>
    <property name="Name">dsproductosdet</property>
  </object>
  <object class="MySQLTable" name="tbproductosdet" >
        <property name="Left">680</property>
        <property name="Top">360</property>
    <property name="Active">1</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbproductosdet</property>
    <property name="TableName">productosdet</property>
  </object>
</object>
?>
