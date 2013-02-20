<?php
<object class="JTMenuDemo" name="JTMenuDemo" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">JTMenu Demo</property>
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
  <property name="Name">JTMenuDemo</property>
  <property name="Width">800</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow"></property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow"></property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <object class="Label" name="Label1" >
    <property name="Caption">JTMenu Demo</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">14pt</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">29</property>
    <property name="Left">8</property>
    <property name="Name">Label1</property>
    <property name="ParentFont">0</property>
    <property name="Top">11</property>
    <property name="Width">438</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">The JTMenu allows you to add drop-down menus to your page, and associate them with particular controls to automate the drop-down action.</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">8pt</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">32</property>
    <property name="Left">8</property>
    <property name="Name">Label2</property>
    <property name="ParentFont">0</property>
    <property name="Top">48</property>
    <property name="Width">784</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="JTMenu" name="JTMenu1" >
    <property name="Anchors">
        <property name="Bottom">0</property>
        <property name="Left">1</property>
        <property name="Relative">1</property>
        <property name="Right">0</property>
        <property name="Top">1</property>
    </property>
    <property name="AnchorsWorkaround">--Workaround--</property>
    <property name="Control"></property>
    <property name="Height">157</property>
    <property name="Items"><![CDATA[a:4:{i:0;a:3:{i:0;s:11:&quot;JTMenuItem1&quot;;i:1;s:11:&quot;JTMenuItem1&quot;;i:2;s:0:&quot;&quot;;}i:1;a:3:{i:0;s:11:&quot;JTMenuItem2&quot;;i:1;s:11:&quot;JTMenuItem2&quot;;i:2;s:0:&quot;&quot;;}i:2;a:3:{i:0;s:11:&quot;JTMenuItem3&quot;;i:1;s:11:&quot;JTMenuItem3&quot;;i:2;s:0:&quot;&quot;;}i:3;a:3:{i:0;s:11:&quot;JTMenuItem4&quot;;i:1;s:11:&quot;JTMenuItem4&quot;;i:2;s:0:&quot;&quot;;}}]]></property>
    <property name="Left">13</property>
    <property name="Name">JTMenu1</property>
    <property name="SiteTheme"></property>
    <property name="Top">123</property>
    <property name="Width">291</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
  </object>
  <object class="Button" name="Button1" >
    <property name="ButtonType">btNormal</property>
    <property name="Caption">Click Me</property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">8pt</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">25</property>
    <property name="Left">8</property>
    <property name="Name">Button1</property>
    <property name="ParentFont">0</property>
    <property name="Top">88</property>
    <property name="Width">112</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <property name="jsOnClick">Button1JSClick</property>
  </object>
  <object class="JTSiteTheme" name="JTSiteTheme1" >
        <property name="Left">710</property>
        <property name="Top">528</property>
    <property name="Name">JTSiteTheme1</property>
  </object>
</object>
?>
