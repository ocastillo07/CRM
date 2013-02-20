<?php
<object class="Unit2" name="Unit2" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Radio Group Sample</property>
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
  <property name="Name">Unit2</property>
  <property name="Width">800</property>
  <object class="RadioGroup" name="RadioGroup1" >
    <property name="Color">#C0C0C0</property>
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
    <property name="Height">224</property>
    <property name="Hint">Radiogroup hint</property>
    <property name="Items"><![CDATA[a:2:{i:0;s:10:&quot;first item&quot;;i:1;s:11:&quot;second item&quot;;}]]></property>
    <property name="Left">158</property>
    <property name="Name">RadioGroup1</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="Top">16</property>
    <property name="Width">448</property>
  </object>
  <object class="Edit" name="Edit2" >
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
    <property name="Left">376</property>
    <property name="Name">Edit2</property>
    <property name="Top">296</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Item</property>
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
    <property name="Left">304</property>
    <property name="Name">Label2</property>
    <property name="Top">304</property>
    <property name="Width">56</property>
  </object>
  <object class="Button" name="btInsert" >
    <property name="Caption">Insert</property>
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
    <property name="Left">531</property>
    <property name="Name">btInsert</property>
    <property name="Top">299</property>
    <property name="Width">75</property>
    <property name="OnClick">btInsertClick</property>
  </object>
  <object class="Button" name="btInsertColumn" >
    <property name="Caption">Insert Column</property>
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
    <property name="Left">411</property>
    <property name="Name">btInsertColumn</property>
    <property name="Top">254</property>
    <property name="Width">93</property>
    <property name="OnClick">btInsertColumnClick</property>
  </object>
  <object class="Button" name="btDeleteColumn" >
    <property name="Caption">Delete Column</property>
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
    <property name="Left">515</property>
    <property name="Name">btDeleteColumn</property>
    <property name="Top">254</property>
    <property name="Width">93</property>
    <property name="OnClick">btDeleteColumnClick</property>
  </object>
</object>
?>
