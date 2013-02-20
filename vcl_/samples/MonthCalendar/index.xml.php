<?php
<object class="Index" name="Index" baseclass="page">
  <property name="Background"></property>
  <property name="Caption">MonthCalendar sample</property>
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
  <property name="Name">Index</property>
  <property name="Width">800</property>
  <object class="MonthCalendar" name="MonthCalendar1" >
    <property name="DateFormat">%m/%d/%Y %I:%M</property>
    <property name="Height">200</property>
    <property name="Left">24</property>
    <property name="Name">MonthCalendar1</property>
    <property name="Top">32</property>
    <property name="Width">208</property>
    <property name="jsOnUpdate">MonthCalendar1JSUpdate</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">This is the MonthCalendar component</property>
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
    <property name="Height">13</property>
    <property name="Left">24</property>
    <property name="Name">Label1</property>
    <property name="Top">8</property>
    <property name="Width">240</property>
  </object>
  <object class="Button" name="btnShowsHideTime" >
    <property name="Caption">Hide Time</property>
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
    <property name="Left">280</property>
    <property name="Name">btnShowsHideTime</property>
    <property name="Top">40</property>
    <property name="Width">91</property>
    <property name="OnClick">btnShowsHideTimeClick</property>
  </object>
  <object class="Edit" name="edFirstDay" >
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
    <property name="Height">21</property>
    <property name="Left">363</property>
    <property name="Name">edFirstDay</property>
    <property name="Text">1</property>
    <property name="Top">80</property>
    <property name="Width">41</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">First day:</property>
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
    <property name="Height">13</property>
    <property name="Left">280</property>
    <property name="Name">Label2</property>
    <property name="Top">84</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="btnSetFirstDay" >
    <property name="Caption">Set</property>
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
    <property name="Left">416</property>
    <property name="Name">btnSetFirstDay</property>
    <property name="Top">78</property>
    <property name="Width">75</property>
    <property name="OnClick">btnSetFirstDayClick</property>
  </object>
  <object class="Edit" name="edDate" >
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
    <property name="Height">21</property>
    <property name="Left">363</property>
    <property name="Name">edDate</property>
    <property name="Top">116</property>
    <property name="Width">121</property>
  </object>
  <object class="Button" name="btnSetDate" >
    <property name="Caption">Set</property>
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
    <property name="Left">496</property>
    <property name="Name">btnSetDate</property>
    <property name="Top">116</property>
    <property name="Width">75</property>
    <property name="OnClick">btnSetDateClick</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Date:</property>
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
    <property name="Height">13</property>
    <property name="Left">280</property>
    <property name="Name">Label3</property>
    <property name="Top">120</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="btnGetDate" >
    <property name="Caption">Get Date</property>
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
    <property name="Left">24</property>
    <property name="Name">btnGetDate</property>
    <property name="Top">240</property>
    <property name="Width">83</property>
    <property name="OnClick">btnGetDateClick</property>
  </object>
  <object class="Label" name="lbDate" >
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
    <property name="Height">13</property>
    <property name="Left">112</property>
    <property name="Name">lbDate</property>
    <property name="Top">246</property>
    <property name="Width">120</property>
  </object>
</object>
?>
