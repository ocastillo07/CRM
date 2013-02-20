<?php
<object class="EditSample" name="EditSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Edit Sample</property>
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
  <property name="Name">EditSample</property>
  <property name="Width">800</property>
  <object class="Edit" name="Edit1" >
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
    <property name="Left">72</property>
    <property name="Name">Edit1</property>
    <property name="Text">My Text</property>
    <property name="Top">33</property>
    <property name="Width">168</property>
  </object>
  <object class="Button" name="btCharCase" >
    <property name="Caption">Change Case</property>
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
    <property name="Height">25</property>
    <property name="Left">251</property>
    <property name="Name">btCharCase</property>
    <property name="Top">33</property>
    <property name="Width">101</property>
    <property name="OnClick">btCharCaseClick</property>
  </object>
  <object class="Button" name="btEnable" >
    <property name="Caption">Enable/Disable</property>
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
    <property name="Height">25</property>
    <property name="Left">72</property>
    <property name="Name">btEnable</property>
    <property name="Top">65</property>
    <property name="Width">112</property>
    <property name="OnClick">btEnableClick</property>
  </object>
  <object class="Button" name="btPassword" >
    <property name="Caption">Pass/Normal Mode</property>
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
    <property name="Height">25</property>
    <property name="Left">72</property>
    <property name="Name">btPassword</property>
    <property name="Top">129</property>
    <property name="Width">112</property>
    <property name="OnClick">btPasswordClick</property>
  </object>
  <object class="Button" name="btChangeColor" >
    <property name="Caption">Change Color</property>
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
    <property name="Height">25</property>
    <property name="Left">72</property>
    <property name="Name">btChangeColor</property>
    <property name="ParentFont">0</property>
    <property name="Top">97</property>
    <property name="Width">112</property>
    <property name="OnClick">btChangeColorClick</property>
  </object>
  <object class="Button" name="btSetMax" >
    <property name="Caption">Set MaxLen to 20 / Reset MaxLen</property>
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
    <property name="Height">25</property>
    <property name="Left">72</property>
    <property name="Name">btSetMax</property>
    <property name="Top">193</property>
    <property name="Width">208</property>
    <property name="OnClick">btSetMaxClick</property>
  </object>
  <object class="Button" name="btReadOnly" >
    <property name="Caption">Read/Write Only</property>
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
    <property name="Height">25</property>
    <property name="Left">72</property>
    <property name="Name">btReadOnly</property>
    <property name="Top">161</property>
    <property name="Width">112</property>
    <property name="OnClick">btReadOnlyClick</property>
  </object>
  <object class="Label" name="lbCase" >
    <property name="Autosize">1</property>
    <property name="Caption">ecNormal</property>
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
    <property name="Height">13</property>
    <property name="Left">360</property>
    <property name="Name">lbCase</property>
    <property name="Top">40</property>
    <property name="Width">75</property>
  </object>
</object>
?>
