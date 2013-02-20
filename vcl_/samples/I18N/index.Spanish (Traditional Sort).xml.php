<?php
<object class="myFirstI18n" name="myFirstI18n" baseclass="page">
  <property name="Language">Spanish (Traditional Sort)</property>
  <object class="Label" name="lblMainTitle" >
    <property name="Caption"><![CDATA[Espa&ntilde;ol]]></property>
    <property name="Font">
        <property name="Color">#00FF00</property>
    </property>
  </object>
  <object class="Label" name="lblTitle" >
    <property name="Caption">Por favor, rellene el formulario:</property>
  </object>
  <object class="Label" name="lblFirstName" >
    <property name="Caption">Nombre:</property>
  </object>
  <object class="Edit" name="edtFirstName" >
    <property name="Font">
        <property name="Color">#00FF00</property>
    </property>
  </object>
  <object class="Label" name="lblName" >
    <property name="Caption">Apellidos:</property>
  </object>
  <object class="Edit" name="edtName" >
    <property name="Font">
        <property name="Color">#00FF00</property>
    </property>
  </object>
  <object class="Button" name="btnEnter" >
    <property name="Caption">Introducir</property>
    <property name="Width">116</property>
  </object>
  <object class="Label" name="lblSelLang" >
    <property name="Caption">Seleccione idioma:</property>
    <property name="Font">
        <property name="Color">#00FF00</property>
    </property>
    <property name="Width">156</property>
  </object>
  <object class="ComboBox" name="cmbBxSelLang" >
    <property name="Height">24</property>
    <property name="Items"><![CDATA[a:4:{s:2:&quot;en&quot;;s:7:&quot;English&quot;;s:2:&quot;de&quot;;s:7:&quot;Deutsch&quot;;s:2:&quot;fr&quot;;s:8:&quot;Fran&ccedil;ais&quot;;s:2:&quot;es&quot;;s:8:&quot;Espa&ntilde;ol&quot;;}]]></property>
    <property name="Top">40</property>
  </object>
  <object class="Button" name="btnSelLang" >
    <property name="Caption">Cambiar:</property>
  </object>
  <object class="Image" name="Image1" >
    <property name="ImageSource">images/es.gif</property>
    <property name="Left">582</property>
  </object>
  <object class="Label" name="lblRes" >
    <property name="Caption">Ha enviado los siguientes nombres:</property>
    <property name="Font">
        <property name="Color">#00FF00</property>
    </property>
    <property name="Left">20</property>
    <property name="Width">488</property>
  </object>
  <object class="Label" name="lblResFirstname" >
    <property name="Height">13</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="lblResName" >
    <property name="Top">402</property>
    <property name="Width">75</property>
  </object>
</object>
?>
