<?php
<object class="unotificaciones" name="unotificaciones" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Notificaciones</property>
  <property name="Color">#C0C0C0</property>
  <property name="DocType">dtNone</property>
  <property name="Height">888</property>
  <property name="IsMaster">0</property>
  <property name="Name">unotificaciones</property>
  <property name="Width">800</property>
  <property name="OnCreate">unotificacionesCreate</property>
  <property name="OnShow">unotificacionesShow</property>
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
  <object class="Label" name="Label10" >
    <property name="Caption">Correos para Aviso de Ofertas</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label10</property>
    <property name="ParentFont">0</property>
    <property name="Top">64</property>
    <property name="Width">467</property>
  </object>
  <object class="Label" name="Label11" >
    <property name="Caption">E-Mail</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label11</property>
    <property name="Top">88</property>
    <property name="Width">44</property>
  </object>
  <object class="Memo" name="mofertas" >
    <property name="Height">54</property>
    <property name="Hint">Los correos van separados por comas</property>
    <property name="Left">73</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mofertas</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">88</property>
    <property name="Width">385</property>
  </object>
  <object class="Label" name="Label13" >
    <property name="Caption">Correos para Avisos de Acciones</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label13</property>
    <property name="ParentFont">0</property>
    <property name="Top">149</property>
    <property name="Width">195</property>
  </object>
  <object class="Label" name="Label14" >
    <property name="Caption">E-Mail</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label14</property>
    <property name="Top">168</property>
    <property name="Width">44</property>
  </object>
  <object class="Memo" name="macciones" >
    <property name="Height">54</property>
    <property name="Hint">Los correos van separados por comas</property>
    <property name="Left">73</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">macciones</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">167</property>
    <property name="Width">385</property>
  </object>
  <object class="Label" name="Label15" >
    <property name="Caption">Correos para Avisos de Refacciones Almacen 1</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label15</property>
    <property name="ParentFont">0</property>
    <property name="Top">236</property>
    <property name="Width">299</property>
  </object>
  <object class="Label" name="Label16" >
    <property name="Caption">E-Mail</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label16</property>
    <property name="Top">255</property>
    <property name="Width">44</property>
  </object>
  <object class="Memo" name="mrefacciones01" >
    <property name="Height">54</property>
    <property name="Hint">Los correos van separados por comas</property>
    <property name="Left">73</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mrefacciones01</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">255</property>
    <property name="Width">385</property>
  </object>
  <object class="Label" name="Label17" >
    <property name="Caption">Correos para Avisos de Refacciones Almacen 2</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label17</property>
    <property name="ParentFont">0</property>
    <property name="Top">316</property>
    <property name="Width">301</property>
  </object>
  <object class="Label" name="Label18" >
    <property name="Caption">E-Mail</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label18</property>
    <property name="Top">335</property>
    <property name="Width">44</property>
  </object>
  <object class="Memo" name="mrefacciones02" >
    <property name="Height">54</property>
    <property name="Hint">Los correos van separados por comas</property>
    <property name="Left">73</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mrefacciones02</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">335</property>
    <property name="Width">385</property>
  </object>
  <object class="Label" name="Label19" >
    <property name="Caption">Correos para Avisos de Refacciones Almacen 3</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label19</property>
    <property name="ParentFont">0</property>
    <property name="Top">396</property>
    <property name="Width">280</property>
  </object>
  <object class="Label" name="Label20" >
    <property name="Caption">E-Mail</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label20</property>
    <property name="Top">415</property>
    <property name="Width">44</property>
  </object>
  <object class="Memo" name="mrefacciones03" >
    <property name="Height">54</property>
    <property name="Hint">Los correos van separados por comas</property>
    <property name="Left">73</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mrefacciones03</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">415</property>
    <property name="Width">385</property>
  </object>
  <object class="Label" name="Label21" >
    <property name="Caption">Correos para Avisos de Solicitudes de Informatica</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">9</property>
    <property name="Name">Label21</property>
    <property name="ParentFont">0</property>
    <property name="Top">485</property>
    <property name="Width">445</property>
  </object>
  <object class="Label" name="Label22" >
    <property name="Caption">E-Mail</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">25</property>
    <property name="Name">Label22</property>
    <property name="Top">504</property>
    <property name="Width">44</property>
  </object>
  <object class="Memo" name="msolicitudes" >
    <property name="Height">54</property>
    <property name="Hint">Los correos van separados por comas</property>
    <property name="Left">73</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">msolicitudes</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">504</property>
    <property name="Width">385</property>
  </object>
  <object class="Label" name="Label23" >
    <property name="Caption">Correos para Avisos de Idealease</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label23</property>
    <property name="ParentFont">0</property>
    <property name="Top">656</property>
    <property name="Width">445</property>
  </object>
  <object class="Label" name="Label24" >
    <property name="Caption">E-Mail</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">29</property>
    <property name="Name">Label24</property>
    <property name="Top">675</property>
    <property name="Width">44</property>
  </object>
  <object class="Memo" name="midealease" >
    <property name="Height">54</property>
    <property name="Hint">Los correos van separados por comas</property>
    <property name="Left">77</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">midealease</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">675</property>
    <property name="Width">385</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Correos para Avisos de RH</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">740</property>
    <property name="Width">445</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">E-Mail</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">29</property>
    <property name="Name">Label2</property>
    <property name="Top">759</property>
    <property name="Width">44</property>
  </object>
  <object class="Memo" name="mRH" >
    <property name="Height">54</property>
    <property name="Hint">Los correos van separados por comas</property>
    <property name="Left">77</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mRH</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">759</property>
    <property name="Width">385</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Correos para Avisos de Solicitudes Mantenimiento a Vehiculos</property>
    <property name="Color">#C0C0C0</property>
    <property name="Font">
        <property name="Weight">bold</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label3</property>
    <property name="ParentFont">0</property>
    <property name="Top">569</property>
    <property name="Width">445</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">E-Mail</property>
    <property name="Color">#C0C0C0</property>
    <property name="Height">13</property>
    <property name="Left">29</property>
    <property name="Name">Label4</property>
    <property name="Top">588</property>
    <property name="Width">44</property>
  </object>
  <object class="Memo" name="mmantos" >
    <property name="Height">54</property>
    <property name="Hint">Los correos van separados por comas</property>
    <property name="Left">77</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">mmantos</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">588</property>
    <property name="Width">385</property>
  </object>
</object>
?>
