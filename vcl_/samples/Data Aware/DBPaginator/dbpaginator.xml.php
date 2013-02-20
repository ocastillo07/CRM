<?php
<object class="Unit1" name="Unit1" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">DBPaginator sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">Unit1</property>
  <property name="Width">800</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Customer #:</property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label1</property>
    <property name="Top">16</property>
    <property name="Width">88</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Customer:</property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label2</property>
    <property name="Top">44</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Contact (first name):</property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label3</property>
    <property name="Top">76</property>
    <property name="Width">128</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Phone #:</property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label5</property>
    <property name="Top">140</property>
    <property name="Width">75</property>
  </object>
  <object class="DBPaginator" name="DBPaginator1" >
    <property name="Color">#D6D6D6</property>
    <property name="DataSource">dsCUSTOMER1</property>
    <property name="Height">19</property>
    <property name="Left">32</property>
    <property name="Name">DBPaginator1</property>
    <property name="PageNumberFormat">-%d-</property>
    <property name="ParentColor">0</property>
    <property name="ShownRecordsCount">11</property>
    <property name="Top">224</property>
    <property name="Width">608</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Save changes</property>
    <property name="Height">25</property>
    <property name="Hint"><![CDATA[this is &lt;script&gt;window.alert(this.id);&lt;/script&gt;]]></property>
    <property name="Left">192</property>
    <property name="Name">Button1</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">168</property>
    <property name="Width">107</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Label" name="fdCUSTOMER1" >
    <property name="Caption">CUST_NO</property>
    <property name="DataField">CUST_NO</property>
    <property name="Datasource">dsCUSTOMER1</property>
    <property name="Height">14</property>
    <property name="Left">192</property>
    <property name="Name">fdCUSTOMER1</property>
    <property name="Top">16</property>
    <property name="Width">100</property>
  </object>
  <object class="Edit" name="fdCUSTOMER2" >
    <property name="DataField">CUSTOMER</property>
    <property name="Datasource">dsCUSTOMER1</property>
    <property name="Height">21</property>
    <property name="Left">192</property>
    <property name="Name">fdCUSTOMER2</property>
    <property name="Text">CUSTOMER</property>
    <property name="Top">40</property>
    <property name="Width">192</property>
  </object>
  <object class="Edit" name="fdCUSTOMER3" >
    <property name="DataField">CONTACT_FIRST</property>
    <property name="Datasource">dsCUSTOMER1</property>
    <property name="Height">21</property>
    <property name="Left">192</property>
    <property name="Name">fdCUSTOMER3</property>
    <property name="Text">CONTACT_FIRST</property>
    <property name="Top">72</property>
    <property name="Width">192</property>
  </object>
  <object class="Edit" name="fdCUSTOMER4" >
    <property name="DataField">CONTACT_LAST</property>
    <property name="Datasource">dsCUSTOMER1</property>
    <property name="Height">21</property>
    <property name="Left">192</property>
    <property name="Name">fdCUSTOMER4</property>
    <property name="Text">CONTACT_LAST</property>
    <property name="Top">104</property>
    <property name="Width">192</property>
  </object>
  <object class="Edit" name="fdCUSTOMER5" >
    <property name="DataField">PHONE_NO</property>
    <property name="Datasource">dsCUSTOMER1</property>
    <property name="Height">21</property>
    <property name="Left">192</property>
    <property name="Name">fdCUSTOMER5</property>
    <property name="Text">PHONE_NO</property>
    <property name="Top">136</property>
    <property name="Width">192</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Contact (last name):</property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label4</property>
    <property name="Top">108</property>
    <property name="Width">134</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">Browse the customers:</property>
    <property name="Height">13</property>
    <property name="Left">32</property>
    <property name="Name">Label6</property>
    <property name="Top">208</property>
    <property name="Width">131</property>
  </object>
  <object class="Table" name="tbCUSTOMER1" >
        <property name="Left">545</property>
        <property name="Top">27</property>
    <property name="Active">1</property>
    <property name="Database">dbEMPLOYEE1</property>
    <property name="LimitCount"></property>
    <property name="LimitStart"></property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbCUSTOMER1</property>
    <property name="TableName">CUSTOMER</property>
  </object>
  <object class="Database" name="dbEMPLOYEE1" >
        <property name="Left">633</property>
        <property name="Top">27</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">localhost:C:\Program Files\Common Files\Borland Shared\Data\EMPLOYEE.GDB</property>
    <property name="DriverName">borland_ibase</property>
    <property name="Host">localhost</property>
    <property name="Name">dbEMPLOYEE1</property>
    <property name="UserName">sysdba</property>
    <property name="UserPassword">masterkey</property>
  </object>
  <object class="Datasource" name="dsCUSTOMER1" >
        <property name="Left">553</property>
        <property name="Top">99</property>
    <property name="Dataset">tbCUSTOMER1</property>
    <property name="Name">dsCUSTOMER1</property>
  </object>
</object>
?>
