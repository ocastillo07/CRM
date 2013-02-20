<?php
<object class="ZACLSample" name="ZACLSample" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">ACL Sample</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">ZACLSample</property>
  <property name="Width">800</property>
  <object class="DBGrid" name="dbgCustomerList" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource"></property>
    <property name="Height">128</property>
    <property name="Left">128</property>
    <property name="Name">dbgCustomerList</property>
    <property name="Top">40</property>
    <property name="Width">632</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Label" name="lbCustomerList" >
    <property name="Caption">Customer list:</property>
    <property name="Height">13</property>
    <property name="Left">128</property>
    <property name="Name">lbCustomerList</property>
    <property name="Top">16</property>
    <property name="Width">267</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;ACL Sample&lt;/STRONG&gt;&lt;/P&gt;]]></property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label2</property>
    <property name="Top">16</property>
    <property name="Width">75</property>
  </object>
  <object class="DBGrid" name="dbgCustomerInvoices" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource"></property>
    <property name="Height">128</property>
    <property name="Left">128</property>
    <property name="Name">dbgCustomerInvoices</property>
    <property name="Top">216</property>
    <property name="Width">632</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Label" name="lbCustomerInvoices" >
    <property name="Caption">Customer invoices:</property>
    <property name="Height">13</property>
    <property name="Left">128</property>
    <property name="Name">lbCustomerInvoices</property>
    <property name="Top">192</property>
    <property name="Width">269</property>
  </object>
  <object class="DBGrid" name="dbgCustomerReserved" >
    <property name="Columns">a:0:{}</property>
    <property name="DataSource"></property>
    <property name="Height">128</property>
    <property name="Left">128</property>
    <property name="Name">dbgCustomerReserved</property>
    <property name="Top">392</property>
    <property name="Width">632</property>
    <property name="jsOnRowChanged"></property>
    <property name="jsOnRowSaved"></property>
  </object>
  <object class="Label" name="lbCustomerReserved" >
    <property name="Caption">Customer reserved information:</property>
    <property name="Height">13</property>
    <property name="Left">128</property>
    <property name="Name">lbCustomerReserved</property>
    <property name="Top">368</property>
    <property name="Width">275</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Logout</property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Link">login.php?restore_session=1</property>
    <property name="Name">Label1</property>
    <property name="Top">136</property>
    <property name="Width">75</property>
  </object>
  <object class="ZACL" name="ZACL" >
        <property name="Left">32</property>
        <property name="Top">56</property>
    <property name="Name">ZACL</property>
    <property name="Rules"><![CDATA[a:3:{i:0;a:1:{s:21:&quot;Administrators access&quot;;a:2:{s:5:&quot;Roles&quot;;a:1:{i:0;a:2:{s:4:&quot;type&quot;;s:4:&quot;Role&quot;;s:5:&quot;value&quot;;s:5:&quot;admin&quot;;}}s:9:&quot;Resources&quot;;a:2:{i:0;a:5:{s:4:&quot;type&quot;;s:4:&quot;Page&quot;;s:6:&quot;value1&quot;;s:14:&quot;zaclsample.php&quot;;s:6:&quot;value2&quot;;s:0:&quot;&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:5:&quot;Allow&quot;;}i:1;a:5:{s:4:&quot;type&quot;;s:6:&quot;Custom&quot;;s:6:&quot;value1&quot;;s:1:&quot;*&quot;;s:6:&quot;value2&quot;;s:1:&quot;*&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:5:&quot;Allow&quot;;}}}}i:1;a:1:{s:16:&quot;Finantial access&quot;;a:2:{s:5:&quot;Roles&quot;;a:1:{i:0;a:2:{s:4:&quot;type&quot;;s:4:&quot;Role&quot;;s:5:&quot;value&quot;;s:9:&quot;financial&quot;;}}s:9:&quot;Resources&quot;;a:4:{i:0;a:5:{s:4:&quot;type&quot;;s:4:&quot;Page&quot;;s:6:&quot;value1&quot;;s:14:&quot;zaclsample.php&quot;;s:6:&quot;value2&quot;;s:0:&quot;&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:5:&quot;Allow&quot;;}i:1;a:5:{s:4:&quot;type&quot;;s:6:&quot;Custom&quot;;s:6:&quot;value1&quot;;s:1:&quot;*&quot;;s:6:&quot;value2&quot;;s:1:&quot;*&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:5:&quot;Allow&quot;;}i:2;a:5:{s:4:&quot;type&quot;;s:7:&quot;Control&quot;;s:6:&quot;value1&quot;;s:6:&quot;DBGrid&quot;;s:6:&quot;value2&quot;;s:19:&quot;dbgCustomerReserved&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:4:&quot;Deny&quot;;}i:3;a:5:{s:4:&quot;type&quot;;s:7:&quot;Control&quot;;s:6:&quot;value1&quot;;s:5:&quot;Label&quot;;s:6:&quot;value2&quot;;s:18:&quot;lbCustomerReserved&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:4:&quot;Deny&quot;;}}}}i:2;a:1:{s:14:&quot;Support access&quot;;a:2:{s:5:&quot;Roles&quot;;a:1:{i:0;a:2:{s:4:&quot;type&quot;;s:4:&quot;Role&quot;;s:5:&quot;value&quot;;s:7:&quot;support&quot;;}}s:9:&quot;Resources&quot;;a:6:{i:0;a:5:{s:4:&quot;type&quot;;s:4:&quot;Page&quot;;s:6:&quot;value1&quot;;s:14:&quot;zaclsample.php&quot;;s:6:&quot;value2&quot;;s:0:&quot;&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:5:&quot;Allow&quot;;}i:1;a:5:{s:4:&quot;type&quot;;s:6:&quot;Custom&quot;;s:6:&quot;value1&quot;;s:1:&quot;*&quot;;s:6:&quot;value2&quot;;s:1:&quot;*&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:5:&quot;Allow&quot;;}i:2;a:5:{s:4:&quot;type&quot;;s:7:&quot;Control&quot;;s:6:&quot;value1&quot;;s:6:&quot;DBGrid&quot;;s:6:&quot;value2&quot;;s:19:&quot;dbgCustomerInvoices&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:4:&quot;Deny&quot;;}i:3;a:5:{s:4:&quot;type&quot;;s:7:&quot;Control&quot;;s:6:&quot;value1&quot;;s:6:&quot;DBGrid&quot;;s:6:&quot;value2&quot;;s:19:&quot;dbgCustomerReserved&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:4:&quot;Deny&quot;;}i:4;a:5:{s:4:&quot;type&quot;;s:7:&quot;Control&quot;;s:6:&quot;value1&quot;;s:5:&quot;Label&quot;;s:6:&quot;value2&quot;;s:18:&quot;lbCustomerInvoices&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:4:&quot;Deny&quot;;}i:5;a:5:{s:4:&quot;type&quot;;s:7:&quot;Control&quot;;s:6:&quot;value1&quot;;s:5:&quot;Label&quot;;s:6:&quot;value2&quot;;s:18:&quot;lbCustomerReserved&quot;;s:5:&quot;right&quot;;s:4:&quot;Show&quot;;s:4:&quot;perm&quot;;s:4:&quot;Deny&quot;;}}}}}]]></property>
  </object>
</object>
?>
