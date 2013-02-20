<?php
<object class="RadioButtonSample" name="RadioButtonSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Radio Button Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">RadioButtonSample</property>
  <property name="Width">800</property>
  <object class="Panel" name="Panel1" >
    <property name="Caption">Panel1</property>
    <property name="Dynamic"></property>
    <property name="Height">112</property>
    <property name="Left">224</property>
    <property name="Name">Panel1</property>
    <property name="Top">72</property>
    <property name="Width">328</property>
    <object class="RadioButton" name="rbBannana" >
      <property name="Caption">Banana</property>
      <property name="Group">g1</property>
      <property name="Height">21</property>
      <property name="Left">19</property>
      <property name="Name">rbBannana</property>
      <property name="Top">18</property>
      <property name="Width">121</property>
    </object>
    <object class="RadioButton" name="rbKiwi" >
      <property name="Caption">Kiwi</property>
      <property name="Group">g1</property>
      <property name="Height">21</property>
      <property name="Left">163</property>
      <property name="Name">rbKiwi</property>
      <property name="Top">18</property>
      <property name="Width">121</property>
    </object>
    <object class="RadioButton" name="rbApple" >
      <property name="Caption">Apple</property>
      <property name="Group">g1</property>
      <property name="Height">21</property>
      <property name="Left">19</property>
      <property name="Name">rbApple</property>
      <property name="Top">74</property>
      <property name="Width">121</property>
    </object>
    <object class="RadioButton" name="rbGrape" >
      <property name="Caption">Grape</property>
      <property name="Group">g1</property>
      <property name="Height">21</property>
      <property name="Left">163</property>
      <property name="Name">rbGrape</property>
      <property name="Top">74</property>
      <property name="Width">121</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Alignment">agCenter</property>
    <property name="Caption">Select the fruit you like and press button</property>
    <property name="Height">24</property>
    <property name="Left">248</property>
    <property name="Name">Label1</property>
    <property name="Top">48</property>
    <property name="Width">280</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Tell computer</property>
    <property name="Height">24</property>
    <property name="Left">304</property>
    <property name="Name">Button1</property>
    <property name="Top">200</property>
    <property name="Width">144</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Response:</property>
    <property name="Height">16</property>
    <property name="Left">168</property>
    <property name="Name">Label2</property>
    <property name="Top">240</property>
    <property name="Width">72</property>
  </object>
  <object class="Label" name="lbResponse" >
    <property name="Height">16</property>
    <property name="Left">240</property>
    <property name="Name">lbResponse</property>
    <property name="Top">240</property>
    <property name="Width">312</property>
  </object>
</object>
?>
