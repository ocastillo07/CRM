<?php
<object class="ClockDemo" name="ClockDemo" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">Clock Demo</property>
  <property name="DocType">dtNone</property>
  <property name="Height">600</property>
  <property name="IsMaster">0</property>
  <property name="Name">ClockDemo</property>
  <property name="Width">800</property>
  <object class="Clock" name="Clock1" >
    <property name="Alarm">Date.parse(new Date)+5000</property>
    <property name="Background">background.gif</property>
    <property name="BackgroundPosition">center</property>
    <property name="BackgroundRepeat">no-repeat</property>
    <property name="Caption">{@fld}</property>
    <property name="Dynamic"></property>
    <property name="Font">
        <property name="Align">taCenter</property>
    </property>
    <property name="Height">200</property>
    <property name="Left">13</property>
    <property name="Name">Clock1</property>
    <property name="ParentFont">0</property>
    <property name="Top">16</property>
    <property name="Width">195</property>
    <property name="jsOnAlarm">Clock1JSAlarm</property>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="Height">136</property>
    <property name="Left">216</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="Top">72</property>
    <property name="Width">528</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption"><![CDATA[Every 5 seconds, alarm will be logged, you can set it with a JS function or to a fixed time, i.e. &quot;01:00:00 PM&quot;]]></property>
    <property name="Height">29</property>
    <property name="Left">216</property>
    <property name="Name">Label1</property>
    <property name="Top">40</property>
    <property name="Width">352</property>
  </object>
</object>
?>
