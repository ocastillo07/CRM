<?php
<object class="dmAuth" name="dmAuth" baseclass="datamodule">
  <property name="Height">600</property>
  <property name="Name">dmAuth</property>
  <property name="Width">800</property>
  <object class="ZAuth" name="ZAuth" >
        <property name="Left">272</property>
        <property name="Top">176</property>
    <property name="AuthAdapter">ZAuthDigest</property>
    <property name="Name">ZAuth</property>
    <property name="UserRealm">Some Realm</property>
    <property name="OnLogin">ZAuthLogin</property>
  </object>
  <object class="ZAuthDigest" name="ZAuthDigest" >
        <property name="Left">352</property>
        <property name="Top">176</property>
    <property name="FileName">validusers.txt</property>
    <property name="Name">ZAuthDigest</property>
  </object>
</object>
?>
