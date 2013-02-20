<?php
<object class="myFirstI18n" name="myFirstI18n" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">myFirstI18n</property>
  <property name="DocType">dtXHTML_1_0_Transitional</property>
  <property name="Font">
    <property name="Size">14px</property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">myFirstI18n</property>
  <property name="Width">800</property>
  <object class="Label" name="lblMainTitle" >
    <property name="Caption">Enter My World...</property>
    <property name="Font">
        <property name="Color">#0000FF</property>
        <property name="Size">30px</property>
    </property>
    <property name="Height">50</property>
    <property name="Left">20</property>
    <property name="Name">lblMainTitle</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">15</property>
    <property name="Width">400</property>
  </object>
  <object class="Label" name="lblTitle" >
    <property name="Caption">Please fill out the form:</property>
    <property name="Font">
        <property name="Size">16px</property>
    </property>
    <property name="Height">30</property>
    <property name="Left">20</property>
    <property name="Name">lblTitle</property>
    <property name="ParentFont">0</property>
    <property name="Top">80</property>
    <property name="Width">400</property>
  </object>
  <object class="Label" name="lblFirstName" >
    <property name="Caption">First name:</property>
    <property name="Font">
        <property name="Size">14px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">20</property>
    <property name="Name">lblFirstName</property>
    <property name="ParentFont">0</property>
    <property name="Top">110</property>
    <property name="Width">400</property>
  </object>
  <object class="Edit" name="edtFirstName" >
    <property name="Font">
        <property name="Color">#0000FF</property>
        <property name="Size">14px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">20</property>
    <property name="Name">edtFirstName</property>
    <property name="ParentFont">0</property>
    <property name="Top">130</property>
    <property name="Width">150</property>
  </object>
  <object class="Label" name="lblName" >
    <property name="Caption">Name:</property>
    <property name="Font">
        <property name="Size">14px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">20</property>
    <property name="Name">lblName</property>
    <property name="ParentFont">0</property>
    <property name="Top">160</property>
    <property name="Width">400</property>
  </object>
  <object class="Edit" name="edtName" >
    <property name="Font">
        <property name="Color">#0000FF</property>
        <property name="Size">14px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">20</property>
    <property name="Name">edtName</property>
    <property name="ParentFont">0</property>
    <property name="Top">180</property>
    <property name="Width">150</property>
  </object>
  <object class="Button" name="btnEnter" >
    <property name="Caption">Enter</property>
    <property name="Font">
        <property name="Size">14px</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">20</property>
    <property name="Name">btnEnter</property>
    <property name="ParentFont">0</property>
    <property name="Top">230</property>
    <property name="Width">75</property>
    <property name="OnClick">btnEnterClick</property>
  </object>
  <object class="Label" name="lblSelLang" >
    <property name="Caption">Select language:</property>
    <property name="Font">
        <property name="Color">#0000FF</property>
        <property name="Size">14px</property>
        <property name="Weight">900</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">420</property>
    <property name="Name">lblSelLang</property>
    <property name="ParentFont">0</property>
    <property name="Top">14</property>
    <property name="Width">132</property>
  </object>
  <object class="ComboBox" name="cmbBxSelLang" >
    <property name="Font">
        <property name="Size">14px</property>
    </property>
    <property name="Height">25</property>
    <property name="Items"><![CDATA[a:4:{s:2:&quot;en&quot;;s:7:&quot;English&quot;;s:2:&quot;de&quot;;s:7:&quot;Deutsch&quot;;s:2:&quot;fr&quot;;s:8:&quot;Fran&ccedil;ais&quot;;s:2:&quot;es&quot;;s:7:&quot;Espa&ntilde;ol&quot;;}]]></property>
    <property name="Left">424</property>
    <property name="Name">cmbBxSelLang</property>
    <property name="ParentFont">0</property>
    <property name="Top">39</property>
    <property name="Width">150</property>
  </object>
  <object class="Button" name="btnSelLang" >
    <property name="Caption">Change</property>
    <property name="Height">25</property>
    <property name="Left">580</property>
    <property name="Name">btnSelLang</property>
    <property name="ParentFont">0</property>
    <property name="Top">39</property>
    <property name="Width">75</property>
    <property name="OnClick">btnSelLangClick</property>
  </object>
  <object class="Image" name="Image1" >
    <property name="Border">0</property>
    <property name="Height">16</property>
    <property name="ImageSource">images/us.gif</property>
    <property name="Left">556</property>
    <property name="Link"></property>
    <property name="LinkTarget"></property>
    <property name="Name">Image1</property>
    <property name="Top">16</property>
    <property name="Width">18</property>
  </object>
  <object class="Label" name="lblRes" >
    <property name="Caption">You have submitted the following names:</property>
    <property name="Font">
        <property name="Color">#0000FF</property>
        <property name="Size">20px</property>
    </property>
    <property name="Height">29</property>
    <property name="Left">16</property>
    <property name="Name">lblRes</property>
    <property name="ParentFont">0</property>
    <property name="Top">323</property>
    <property name="Visible">0</property>
    <property name="Width">424</property>
  </object>
  <object class="Label" name="lblResFirstname" >
    <property name="Font">
        <property name="Size">14px</property>
    </property>
    <property name="Height">17</property>
    <property name="Left">20</property>
    <property name="Name">lblResFirstname</property>
    <property name="Top">367</property>
    <property name="Visible">0</property>
    <property name="Width">153</property>
  </object>
  <object class="Label" name="lblResName" >
    <property name="Font">
        <property name="Size">14px</property>
    </property>
    <property name="Height">22</property>
    <property name="Left">20</property>
    <property name="Name">lblResName</property>
    <property name="Top">394</property>
    <property name="Visible">0</property>
    <property name="Width">150</property>
  </object>
</object>
?>
