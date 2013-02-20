<?php
<object class="myFirstI18n" name="myFirstI18n" baseclass="page">
  <property name="Language">French (France)</property>
  <object class="Label" name="lblMainTitle" >
    <property name="Caption">Entrer dans mon monde...</property>
    <property name="Font">
        <property name="Color">#FF8000</property>
    </property>
    <property name="Width">404</property>
  </object>
  <object class="Label" name="lblTitle" >
    <property name="Caption"><![CDATA[Veuillez compl&eacute;ter le formulaire ci-dessous s.v.p:]]></property>
    <property name="Width">460</property>
  </object>
  <object class="Label" name="lblFirstName" >
    <property name="Caption"><![CDATA[Pr&eacute;nom:]]></property>
  </object>
  <object class="Edit" name="edtFirstName" >
    <property name="Font">
        <property name="Color">#FF8000</property>
    </property>
  </object>
  <object class="Label" name="lblName" >
    <property name="Caption">Nom:</property>
  </object>
  <object class="Edit" name="edtName" >
    <property name="Font">
        <property name="Color">#FF8000</property>
    </property>
  </object>
  <object class="Button" name="btnEnter" >
    <property name="Caption">Entrer</property>
  </object>
  <object class="Label" name="lblSelLang" >
    <property name="Caption"><![CDATA[S&eacute;lectionner la langue:]]></property>
    <property name="Font">
        <property name="Color">#FF8000</property>
    </property>
    <property name="Left">436</property>
    <property name="Width">180</property>
  </object>
  <object class="ComboBox" name="cmbBxSelLang" >
    <property name="Height">24</property>
    <property name="Items"><![CDATA[a:4:{s:2:&quot;en&quot;;s:7:&quot;English&quot;;s:2:&quot;de&quot;;s:7:&quot;Deutsch&quot;;s:2:&quot;fr&quot;;s:8:&quot;Fran&ccedil;ais&quot;;s:2:&quot;es&quot;;s:8:&quot;Espa&ntilde;ol&quot;;}]]></property>
    <property name="Left">432</property>
    <property name="Top">40</property>
  </object>
  <object class="Button" name="btnSelLang" >
    <property name="Caption">Changer</property>
    <property name="Left">588</property>
  </object>
  <object class="Image" name="Image1" >
    <property name="ImageSource">images/fr.gif</property>
    <property name="Left">622</property>
  </object>
  <object class="Label" name="lblRes" >
    <property name="Caption"><![CDATA[Vous avez m'envoy&eacute; les noms suivants:]]></property>
    <property name="Font">
        <property name="Color">#FF8000</property>
    </property>
    <property name="Left">20</property>
    <property name="Top">339</property>
    <property name="Width">412</property>
  </object>
  <object class="Label" name="lblResFirstname" >
    <property name="Top">383</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="lblResName" >
    <property name="Top">402</property>
    <property name="Width">75</property>
  </object>
</object>
?>
