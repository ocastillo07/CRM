<?php
<object class="Register" name="Register" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Noname1</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">Register</property>
  <property name="ShowFooter">0</property>
  <property name="ShowHeader">0</property>
  <property name="TemplateEngine">SmartyTemplate</property>
  <property name="TemplateFilename">templates/register.tpl</property>
  <property name="Width">800</property>
  <property name="OnShow">RegisterShow</property>
  <object class="Button" name="SubmitButton" >
    <property name="Caption">Submit</property>
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">25</property>
    <property name="Left">7</property>
    <property name="Name">SubmitButton</property>
    <property name="ParentFont">0</property>
    <property name="Top">563</property>
    <property name="Width">84</property>
  </object>
  <object class="Edit" name="Username" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">8</property>
    <property name="Name">Username</property>
    <property name="ParentFont">0</property>
    <property name="Top">8</property>
    <property name="Width">284</property>
  </object>
  <object class="Edit" name="Password" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="IsPassword">1</property>
    <property name="Left">8</property>
    <property name="Name">Password</property>
    <property name="ParentFont">0</property>
    <property name="Top">37</property>
    <property name="Width">284</property>
  </object>
  <object class="Edit" name="NameEdit" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">8</property>
    <property name="Name">NameEdit</property>
    <property name="ParentFont">0</property>
    <property name="Top">62</property>
    <property name="Width">284</property>
  </object>
  <object class="Edit" name="Address" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">9</property>
    <property name="Name">Address</property>
    <property name="ParentFont">0</property>
    <property name="Top">91</property>
    <property name="Width">284</property>
  </object>
  <object class="Edit" name="City" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">9</property>
    <property name="Name">City</property>
    <property name="ParentFont">0</property>
    <property name="Top">122</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="State" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">8</property>
    <property name="Name">State</property>
    <property name="ParentFont">0</property>
    <property name="Top">152</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="Country" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">10</property>
    <property name="Name">Country</property>
    <property name="ParentFont">0</property>
    <property name="Top">184</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="Postcode" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">Postcode</property>
    <property name="ParentFont">0</property>
    <property name="Top">217</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="Phone" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">12</property>
    <property name="Name">Phone</property>
    <property name="ParentFont">0</property>
    <property name="Top">247</property>
    <property name="Width">199</property>
  </object>
  <object class="RawOutput" name="RegMsg" >
    <property name="Height">25</property>
    <property name="Left">13</property>
    <property name="Name">RegMsg</property>
    <property name="Top">512</property>
    <property name="Width">75</property>
  </object>
  <object class="Edit" name="Email" >
    <property name="Font">
        <property name="Size">10pt</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">302</property>
    <property name="Name">Email</property>
    <property name="ParentFont">0</property>
    <property name="Top">62</property>
    <property name="Width">284</property>
  </object>
</object>
?>
