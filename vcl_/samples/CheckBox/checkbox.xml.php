<?php
<object class="CkeckboxSample" name="CkeckboxSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">CheckBox Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
    <property name="Align">taNone</property>
    <property name="Case"></property>
    <property name="Color"></property>
    <property name="Family">Verdana</property>
    <property name="LineHeight"></property>
    <property name="Size">10px</property>
    <property name="Style"></property>
    <property name="Variant"></property>
    <property name="Weight"></property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">CkeckboxSample</property>
  <property name="Width">800</property>
  <object class="Panel" name="Panel1" >
    <property name="Caption">Panel1</property>
    <property name="Dynamic"></property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">112</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
        <property name="UsePixelTrans">1</property>
    </property>
    <property name="Left">80</property>
    <property name="Name">Panel1</property>
    <property name="Top">32</property>
    <property name="Width">328</property>
    <object class="CheckBox" name="cbBannana" >
      <property name="Caption">Bannana</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">21</property>
      <property name="Left">29</property>
      <property name="Name">cbBannana</property>
      <property name="Top">17</property>
      <property name="Width">121</property>
    </object>
    <object class="CheckBox" name="cbKiwi" >
      <property name="Caption">Kiwi</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">21</property>
      <property name="Left">173</property>
      <property name="Name">cbKiwi</property>
      <property name="Top">17</property>
      <property name="Width">121</property>
    </object>
    <object class="CheckBox" name="cbOrange" >
      <property name="Caption">Orange</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">21</property>
      <property name="Left">29</property>
      <property name="Name">cbOrange</property>
      <property name="Top">65</property>
      <property name="Width">121</property>
    </object>
    <object class="CheckBox" name="cbGrape" >
      <property name="Caption">Grape</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">21</property>
      <property name="Left">173</property>
      <property name="Name">cbGrape</property>
      <property name="Top">65</property>
      <property name="Width">121</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Alignment">agCenter</property>
    <property name="Caption">Select the fruits you like and press button</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">24</property>
    <property name="Left">104</property>
    <property name="Name">Label1</property>
    <property name="Top">8</property>
    <property name="Width">280</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Tell computer</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">24</property>
    <property name="Left">160</property>
    <property name="Name">Button1</property>
    <property name="Top">160</property>
    <property name="Width">144</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Response:</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">16</property>
    <property name="Left">24</property>
    <property name="Name">Label2</property>
    <property name="Top">200</property>
    <property name="Width">72</property>
  </object>
  <object class="Label" name="lbResponse" >
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">16</property>
    <property name="Left">96</property>
    <property name="Name">lbResponse</property>
    <property name="Top">200</property>
    <property name="Width">312</property>
  </object>
</object>
?>
