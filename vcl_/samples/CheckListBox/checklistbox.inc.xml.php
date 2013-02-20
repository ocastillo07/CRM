<?php
<object class="ChecklistSample" name="ChecklistSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Checklist Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
    <property name="Align">taNone</property>
    <property name="Case"></property>
    <property name="Color"></property>
    <property name="Family">Verdana</property>
    <property name="LineHeight"></property>
    <property name="Size">10px</property>
    <property name="Style"></property>
    <property name="Variant">vaNormal</property>
    <property name="Weight">400</property>
  </property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
    <property name="UsePixelTrans">1</property>
  </property>
  <property name="Name">ChecklistSample</property>
  <property name="Width">800</property>
  <object class="CheckListBox" name="CheckListBox1" >
    <property name="Checked">a:0:{}</property>
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
    <property name="Header">a:0:{}</property>
    <property name="HeaderBackgroundColor">#FFFF80</property>
    <property name="HeaderColor">#FF8040</property>
    <property name="Height">141</property>
    <property name="Items"><![CDATA[a:4:{i:0;s:1:&quot;4&quot;;i:1;s:1:&quot;3&quot;;i:2;s:1:&quot;2&quot;;i:3;s:1:&quot;1&quot;;}]]></property>
    <property name="Left">42</property>
    <property name="Name">CheckListBox1</property>
    <property name="Top">35</property>
    <property name="Width">366</property>
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
    <property name="Left">184</property>
    <property name="Name">Edit2</property>
    <property name="Top">240</property>
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
    <property name="Left">112</property>
    <property name="Name">Label2</property>
    <property name="Top">248</property>
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
    <property name="Left">339</property>
    <property name="Name">btInsert</property>
    <property name="Top">243</property>
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
    <property name="Left">219</property>
    <property name="Name">btInsertColumn</property>
    <property name="Top">198</property>
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
    <property name="Left">323</property>
    <property name="Name">btDeleteColumn</property>
    <property name="Top">198</property>
    <property name="Width">93</property>
    <property name="OnClick">btDeleteColumnClick</property>
  </object>
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
    <property name="Left">184</property>
    <property name="Name">Edit1</property>
    <property name="Top">288</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">make colum item</property>
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
    <property name="Left">48</property>
    <property name="Name">Label1</property>
    <property name="Top">296</property>
    <property name="Width">120</property>
  </object>
  <object class="Button" name="btDoit" >
    <property name="Caption">Do it</property>
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
    <property name="Left">339</property>
    <property name="Name">btDoit</property>
    <property name="Top">291</property>
    <property name="Width">75</property>
    <property name="OnClick">btDoitClick</property>
  </object>
  <object class="Button" name="btSort" >
    <property name="Caption">Sort Items</property>
    <property name="Enabled">0</property>
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
    <property name="Left">427</property>
    <property name="Name">btSort</property>
    <property name="Top">71</property>
    <property name="Width">75</property>
    <property name="OnClick">btSortClick</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Select All</property>
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
    <property name="Left">427</property>
    <property name="Name">Button1</property>
    <property name="Top">39</property>
    <property name="Width">75</property>
    <property name="OnClick">Button1Click</property>
  </object>
</object>
?>
