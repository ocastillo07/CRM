<?php
<object class="udiasfvos" name="udiasfvos" baseclass="page">
  <property name="Action">javascript:function a() { return false; }</property>
  <property name="Background"></property>
  <property name="Caption">Dias Festivos</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">392</property>
  <property name="IsMaster">0</property>
  <property name="Name">udiasfvos</property>
  <property name="Width">800</property>
  <property name="OnShow">udiasfvosShow</property>
  <property name="jsOnLoad">udiasfvosJSLoad</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Id Dia</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">91</property>
  </object>
  <object class="Edit" name="edidcontador" >
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">24</property>
    <property name="Name">edidcontador</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="ReadOnly">1</property>
    <property name="Top">112</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="edfestividad" >
    <property name="CharCase">ecUpperCase</property>
    <property name="Height">21</property>
    <property name="Left">25</property>
    <property name="Name">edfestividad</property>
    <property name="ParentColor">0</property>
    <property name="TabOrder">1</property>
    <property name="Top">168</property>
    <property name="Width">485</property>
  </object>
  <object class="Label" name="lbufh" >
    <property name="Caption">Usuario:</property>
    <property name="Font">
        <property name="Color">#808080</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">25</property>
    <property name="Name">lbufh</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">354</property>
    <property name="Width">583</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Nombre</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">152</property>
    <property name="Width">75</property>
  </object>
  <object class="ComboBox" name="cbdia" >
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:32:{i:0;s:14:&quot;Seleccione Dia&quot;;i:1;s:1:&quot;1&quot;;i:2;s:1:&quot;2&quot;;i:3;s:1:&quot;3&quot;;i:4;s:1:&quot;4&quot;;i:5;s:1:&quot;5&quot;;i:6;s:1:&quot;6&quot;;i:7;s:1:&quot;7&quot;;i:8;s:1:&quot;8&quot;;i:9;s:1:&quot;9&quot;;i:10;s:2:&quot;10&quot;;i:11;s:2:&quot;11&quot;;i:12;s:2:&quot;12&quot;;i:13;s:2:&quot;13&quot;;i:14;s:2:&quot;14&quot;;i:15;s:2:&quot;15&quot;;i:16;s:2:&quot;16&quot;;i:17;s:2:&quot;17&quot;;i:18;s:2:&quot;18&quot;;i:19;s:2:&quot;19&quot;;i:20;s:2:&quot;20&quot;;i:21;s:2:&quot;21&quot;;i:22;s:2:&quot;22&quot;;i:23;s:2:&quot;23&quot;;i:24;s:2:&quot;24&quot;;i:25;s:2:&quot;25&quot;;i:26;s:2:&quot;26&quot;;i:27;s:2:&quot;27&quot;;i:28;s:2:&quot;28&quot;;i:29;s:2:&quot;29&quot;;i:30;s:2:&quot;30&quot;;i:31;s:2:&quot;31&quot;;}]]></property>
    <property name="Left">24</property>
    <property name="Name">cbdia</property>
    <property name="ParentColor">0</property>
    <property name="Top">224</property>
    <property name="Width">185</property>
  </object>
  <object class="ComboBox" name="cbmes" >
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:13:{i:0;s:14:&quot;Seleccione Mes&quot;;i:1;s:5:&quot;Enero&quot;;i:2;s:7:&quot;Febrero&quot;;i:3;s:5:&quot;Marzo&quot;;i:4;s:5:&quot;Abril&quot;;i:5;s:4:&quot;Mayo&quot;;i:6;s:5:&quot;Junio&quot;;i:7;s:5:&quot;Julio&quot;;i:8;s:6:&quot;Agosto&quot;;i:9;s:10:&quot;Septiembre&quot;;i:10;s:7:&quot;Octubre&quot;;i:11;s:9:&quot;Noviembre&quot;;i:12;s:9:&quot;Diciembre&quot;;}]]></property>
    <property name="Left">264</property>
    <property name="Name">cbmes</property>
    <property name="ParentColor">0</property>
    <property name="Top">224</property>
    <property name="Width">185</property>
  </object>
  <object class="ComboBox" name="cbsustituto" >
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:8:{i:0;s:13:&quot;Sin sustituto&quot;;i:1;s:7:&quot;Domingo&quot;;i:2;s:5:&quot;Lunes&quot;;i:3;s:6:&quot;Martes&quot;;i:4;s:9:&quot;Miercoles&quot;;i:5;s:6:&quot;Jueves&quot;;i:6;s:7:&quot;Viernes&quot;;i:7;s:6:&quot;Sabado&quot;;}]]></property>
    <property name="Left">24</property>
    <property name="Name">cbsustituto</property>
    <property name="ParentColor">0</property>
    <property name="Top">304</property>
    <property name="Width">185</property>
  </object>
  <object class="ComboBox" name="cbsemana" >
    <property name="Height">18</property>
    <property name="Items"><![CDATA[a:5:{i:0;s:18:&quot;Sin Cambio Semanal&quot;;i:1;s:14:&quot;Primera Semana&quot;;i:2;s:14:&quot;Segunda Semana&quot;;i:3;s:14:&quot;Tercera Semana&quot;;i:4;s:13:&quot;Cuarta Semana&quot;;}]]></property>
    <property name="Left">264</property>
    <property name="Name">cbsemana</property>
    <property name="ParentColor">0</property>
    <property name="Top">304</property>
    <property name="Width">185</property>
  </object>
  <object class="CheckBox" name="cksexenial" >
    <property name="Caption">Sexenial</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">494</property>
    <property name="Name">cksexenial</property>
    <property name="ParentFont">0</property>
    <property name="Top">221</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Dia de la semana sustituto</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">280</property>
    <property name="Width">164</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Numero de Semana de la festividad</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">264</property>
    <property name="Name">Label4</property>
    <property name="ParentFont">0</property>
    <property name="Top">280</property>
    <property name="Width">211</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Mes</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">264</property>
    <property name="Name">Label5</property>
    <property name="ParentFont">0</property>
    <property name="Top">208</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Dia del Mes</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label6</property>
    <property name="ParentFont">0</property>
    <property name="Top">208</property>
    <property name="Width">75</property>
  </object>
  <object class="CheckBox" name="ckcambia" >
    <property name="Caption">Cambia la fecha por otra</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">494</property>
    <property name="Name">ckcambia</property>
    <property name="ParentFont">0</property>
    <property name="Top">301</property>
    <property name="Width">201</property>
  </object>
  <object class="Panel" name="pbotones" >
    <property name="Background">imagenes/bar2.png</property>
    <property name="Dynamic"></property>
    <property name="Height">48</property>
    <property name="Name">pbotones</property>
    <property name="ParentColor">0</property>
    <property name="Width">800</property>
    <object class="HiddenField" name="hfestatus" >
      <property name="Height">18</property>
      <property name="Left">580</property>
      <property name="Name">hfestatus</property>
      <property name="Top">16</property>
      <property name="Value">0</property>
      <property name="Width">82</property>
    </object>
    <object class="Button" name="btnguardar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Guardar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">230</property>
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
      <property name="Left">316</property>
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
    <object class="Button" name="btnregresar" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Regresar</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">690</property>
      <property name="Name">btnregresar</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnregresarClick</property>
    </object>
    <object class="Button" name="btnnuevo" >
      <property name="ButtonType">btNormal</property>
      <property name="Caption">Nuevo</property>
      <property name="Color">#FF8000</property>
      <property name="Height">32</property>
      <property name="Left">140</property>
      <property name="Name">btnnuevo</property>
      <property name="ParentColor">0</property>
      <property name="Top">8</property>
      <property name="Width">75</property>
      <property name="OnClick">btnnuevoClick</property>
    </object>
  </object>
  <object class="MySQLQuery" name="sqlgen2" >
        <property name="Left">513</property>
        <property name="Top">63</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLTable" name="tbldias" >
        <property name="Left">567</property>
        <property name="Top">65</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields"><![CDATA[a:1:{s:13:&quot;idoportunidad&quot;;s:1:&quot;0&quot;;}]]></property>
    <property name="MasterSource"></property>
    <property name="Name">tbldias</property>
    <property name="TableName">diasfestivos</property>
  </object>
  <object class="MySQLQuery" name="sqlgen" >
        <property name="Left">615</property>
        <property name="Top">63</property>
    <property name="Database">dmconexion.conexion</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">sqlgen</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
