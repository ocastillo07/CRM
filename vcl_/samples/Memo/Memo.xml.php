<?php
<object class="MemoSample" name="MemoSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Memo Sample</property>
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
  <property name="Name">MemoSample</property>
  <property name="Width">800</property>
  <object class="Memo" name="Memo1" >
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
    <property name="Height">104</property>
    <property name="Left">168</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="Top">32</property>
    <property name="Width">240</property>
    <property name="OnBeforeShow">Memo1BeforeShow</property>
  </object>
  <object class="Button" name="btClear" >
    <property name="Caption">Clear</property>
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
    <property name="Left">433</property>
    <property name="Name">btClear</property>
    <property name="Top">32</property>
    <property name="Width">111</property>
    <property name="OnClick">btClearClick</property>
  </object>
  <object class="Button" name="btReset" >
    <property name="Caption">Reset</property>
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
    <property name="Left">433</property>
    <property name="Name">btReset</property>
    <property name="Top">64</property>
    <property name="Width">111</property>
    <property name="OnClick">btResetClick</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Disable/Enable</property>
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
    <property name="Left">435</property>
    <property name="Name">Button1</property>
    <property name="Top">98</property>
    <property name="Width">109</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Label" name="lbLine" >
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
    <property name="Left">168</property>
    <property name="Name">lbLine</property>
    <property name="Top">192</property>
    <property name="Width">240</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Line Text</property>
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
    <property name="Left">96</property>
    <property name="Name">Label1</property>
    <property name="Top">192</property>
    <property name="Width">64</property>
  </object>
  <object class="Edit" name="ebLineNum" >
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
    <property name="Left">168</property>
    <property name="Name">ebLineNum</property>
    <property name="Top">152</property>
    <property name="Width">40</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Line Num</property>
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
    <property name="Left">96</property>
    <property name="Name">Label2</property>
    <property name="Top">160</property>
    <property name="Width">64</property>
  </object>
  <object class="Button" name="btGetLine" >
    <property name="Caption">Get Line Text</property>
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
    <property name="Left">219</property>
    <property name="Name">btGetLine</property>
    <property name="Top">154</property>
    <property name="Width">109</property>
    <property name="OnClick">btGetLineClick</property>
  </object>
</object>
?>
