<?php
/**
*  This file is part of the VCL for PHP project
*
*  Copyright (c) 2004-2008 qadram software S.L. <support@qadram.com>
*
*  Checkout AUTHORS file for more information on the developers
*
*  This library is free software; you can redistribute it and/or
*  modify it under the terms of the GNU Lesser General Public
*  License as published by the Free Software Foundation; either
*  version 2.1 of the License, or (at your option) any later version.
*
*  This library is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
*  Lesser General Public License for more details.
*
*  You should have received a copy of the GNU Lesser General Public
*  License along with this library; if not, write to the Free Software
*  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307
*  USA
*
*/


require_once("vcl/vcl.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("graphics.inc.php");

?>
<HTML>
<HEAD>
<title>Canvas Sample</title>
<script type="text/javascript" src="<?php echo(VCL_HTTP_PATH);?>/walterzorn/wz_jsgraphics.js"></script>
<script type="text/javascript" src="<?php echo(VCL_HTTP_PATH);?>/js/common.js"></script>
</HEAD>
<BODY>
<div id="TEST_outer" style="position:relative;height:250px;width:100%;"></div>
<?php
$c = new Canvas("TEST");
$c->SetCanvasProperties("TEST");

$c->BeginDraw();
$c->Brush->Color = "#000000";
$c->Pen->Color = "#00FFFF";
$c->Pen->Width = 2;
//        $c->Pen->Style=psDot;
$c->Ellipse(10, 150, 60, 200);
$c->Pen->Color = "#FF00FF";
$c->Brush->Color = "#FF0000";
$c->FillRect(70, 150, 120, 200);
$c->Brush->Color = "#00FF00";
$c->RoundRect(230, 150, 380, 300, 20, 20);
$c->Rectangle(30, 120, 150, 170);

$c->Font->Color = "#FF0000";
$c->Font->Style = "fsOblique";
$c->TextOut(10, 5, "Canvas Test");
$c->Font->Style = "fsNormal";
$c->TextOut(10, 20, "Brush color=" . $c->Brush->Color);
$c->TextOut(10, 35, "Font Name=" . $c->Font->Family);
$c->TextOut(10, 50, "Font Size=" . $c->Font->Size);
$c->TextOut(10, 65, "Pen Color=" . $c->Pen->Color);
$c->TextOut(10, 80, "Pen Width=" . $c->Pen->Width);

$c->Line(10, 115, 200, 115);
$c->EndDraw();
?>
</BODY>
</HTML>