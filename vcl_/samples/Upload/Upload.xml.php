<?php
<object class="UploadFileSample" name="UploadFileSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Upload File Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">UploadFileSample</property>
  <property name="Width">800</property>
  <object class="Upload" name="Upload1" >
    <property name="Accept">*.txt</property>
    <property name="Height">21</property>
    <property name="Left">112</property>
    <property name="Name">Upload1</property>
    <property name="Top">56</property>
    <property name="Width">368</property>
    <property name="OnUploaded">Upload1Uploaded</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Upload File</property>
    <property name="Height">25</property>
    <property name="Left">14</property>
    <property name="Name">Button1</property>
    <property name="Top">193</property>
    <property name="Width">75</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Label" name="lbUploadText" >
    <property name="Alignment">agLeft</property>
    <property name="Caption">No file uploaded</property>
    <property name="Height">72</property>
    <property name="Left">112</property>
    <property name="Name">lbUploadText</property>
    <property name="Style">border=1</property>
    <property name="Top">112</property>
    <property name="Width">368</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">State</property>
    <property name="Height">16</property>
    <property name="Left">16</property>
    <property name="Name">Label1</property>
    <property name="Top">112</property>
    <property name="Width">88</property>
  </object>
  <object class="Edit" name="ebMovePath" >
    <property name="Height">24</property>
    <property name="Left">112</property>
    <property name="Name">ebMovePath</property>
    <property name="Top">80</property>
    <property name="Width">368</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Move Path</property>
    <property name="Height">16</property>
    <property name="Left">16</property>
    <property name="Name">Label2</property>
    <property name="Top">88</property>
    <property name="Width">64</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">File To upload</property>
    <property name="Height">16</property>
    <property name="Left">16</property>
    <property name="Name">Label3</property>
    <property name="Top">64</property>
    <property name="Width">80</property>
  </object>
</object>
?>
