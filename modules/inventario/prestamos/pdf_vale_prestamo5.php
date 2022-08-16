<?php

include_once("../../../config.php");  
include("../../../lib/ui/cls_tab.php");
include("../../../lib/ui/cls_boton.php");
include("../../../lib/generales/cls_master_page.php");
include("../../../lib/generales/cls_conexion.php");
include("../../../lib/generales/cls_general.php");
include("../../../lib/generales/cls_formulario.php");


include("../../../classes/cls_prestamo.php");     

$obj_prestamo = new Prestamo();
$obj_prestamo->id_prestamo = $_GET["id_prestamo"];
$obj_prestamo->cargarPorId();
MasterPage::iniciarSeccion();
?>





<page>

<html xmlns:v=3D"urn:schemas-microsoft-com:vml"
xmlns:o=3D"urn:schemas-microsoft-com:office:office"
xmlns:x=3D"urn:schemas-microsoft-com:office:excel"
xmlns=3D"http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=3DContent-Type content=3D"text/html; charset=3Dwindows-125=
2">
<meta name=3DProgId content=3DExcel.Sheet>
<meta name=3DGenerator content=3D"Microsoft Excel 14">
<link rel=3DFile-List href=3D"FO236-002BValedeprestamo.html_archivos/fileli=
st.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id=3D"FO236-002B Vale de prÈstamo_24423_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font524423
	{color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;}
.xl6624423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6724423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6824423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6924423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7024423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7124423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7224423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;

	mso-pattern:auto;
	white-space:nowrap;}
.xl7324423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7424423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7524423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7624423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7724423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7824423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7924423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8024423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8124423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8224423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8324423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8424423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8524423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8624423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8724423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8824423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8924423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9024423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9124423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9224423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9324423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9424423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9524423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9624423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9724423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9824423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9924423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10024423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10124423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10224423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10324423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10424423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10524423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10624423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10724423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10824423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10924423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11024423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl11124423
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl11224423
	{color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;
	padding-left:12px;
	mso-char-indent-count:1;}
.xl11324423
	{color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;
	padding-right:24px;
	mso-char-indent-count:2;}
.xl11424423
	{color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;
	padding-left:24px;
	mso-char-indent-count:2;}
.xl11524423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#F7FCF2;
	mso-pattern:black none;
	white-space:nowrap;}
.xl11624423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	background:#F7FCF2;
	mso-pattern:black none;
	white-space:nowrap;}
.xl11724423
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:#F7FCF2;
	mso-pattern:black none;
	white-space:nowrap;}
-->
</style>
</head>

<body>
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->
<!--La siguiente informaciÛn se generÛ mediante el Asistente para publicar =
como
p·gina web de Microsoft Excel.-->
<!--Si se vuelve a publicar el mismo elemento desde Excel, se reemplazar· t=
oda
la informaciÛn comprendida entre las etiquetas DIV.-->
<!----------------------------->
<!--INICIO DE LOS RESULTADOS DEL ASISTENTE PARA PUBLICAR COMO P¡GINA WEB DE
EXCEL -->
<!----------------------------->

<div id=3D"FO236-002B Vale de prÈstamo_24423" align=3Dcenter x:publishsourc=
e=3D"Excel">
  <table border=3D0 cellpadding=3D0 cellspacing=3D0 width=3D1070 class=3Dxl66=
24423
 style=3D'border-collapse:collapse;table-layout:fixed;width:808pt'>
    <col class=3Dxl6624423 width=3D10 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 365;width:8pt'>
    <col class=3Dxl6624423 width=3D31 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 1133;width:23pt'>
    <col class=3Dxl6624423 width=3D50 span=3D4 style=3D'mso-width-source:users=
et;
 mso-width-alt:1828;width:38pt'>
    <col class=3Dxl6624423 width=3D75 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 2742;width:56pt'>
    <col class=3Dxl6624423 width=3D17 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 621;width:13pt'>
    <col class=3Dxl6624423 width=3D75 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 2742;width:56pt'>
    <col class=3Dxl6624423 width=3D17 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 621;width:13pt'>
    <col class=3Dxl6624423 width=3D75 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 2742;width:56pt'>
    <col class=3Dxl6624423 width=3D50 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 1828;width:38pt'>
    <col class=3Dxl6624423 width=3D21 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 768;width:16pt'>
    <col class=3Dxl6624423 width=3D6 style=3D'mso-width-source:userset;mso-wid=
th-alt:
 219;width:5pt'>
    <col class=3Dxl6624423 width=3D57 span=3D3 style=3D'mso-width-source:users=
et;
 mso-width-alt:2084;width:43pt'>
    <col class=3Dxl6624423 width=3D50 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 1828;width:38pt'>
    <col class=3Dxl6624423 width=3D75 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 2742;width:56pt'>
    <col class=3Dxl6624423 width=3D17 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 621;width:13pt'>
    <col class=3Dxl6624423 width=3D44 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 1609;width:33pt'>
    <col class=3Dxl6624423 width=3D33 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 1206;width:25pt'>
    <col class=3Dxl6624423 width=3D75 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 2742;width:56pt'>
    <col class=3Dxl6624423 width=3D18 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 658;width:14pt'>
    <col class=3Dxl6624423 width=3D10 style=3D'mso-width-source:userset;mso-wi=
dth-alt:
 365;width:8pt'>
    <tr height=3D80 style=3D'mso-height-source:userset;height:60.0pt'>
      <td colspan=3D4 height=3D80 style=3D'border-right:.5pt solid =
black;
  height:60.0pt;width:107pt' align=3Dleft valign=3Dtop><!--[if gte vml 1]><=
v:shapetype
   id=3D"_x0000_t75" coordsize=3D"21600,21600" o:spt=3D"75" o:preferrelativ=
e=3D"t"
   path=3D"m@4@5l@4@11@9@11@9@5xe" filled=3D"f" stroked=3D"f">
   <v:stroke joinstyle=3D"miter"/>
   <v:formulas>
    <v:f eqn=3D"if lineDrawn pixelLineWidth 0"/>
    <v:f eqn=3D"sum @0 1 0"/>
    <v:f eqn=3D"sum 0 0 @1"/>
    <v:f eqn=3D"prod @2 1 2"/>
    <v:f eqn=3D"prod @3 21600 pixelWidth"/>
    <v:f eqn=3D"prod @3 21600 pixelHeight"/>
    <v:f eqn=3D"sum @0 0 1"/>
    <v:f eqn=3D"prod @6 1 2"/>
    <v:f eqn=3D"prod @7 21600 pixelWidth"/>
    <v:f eqn=3D"sum @8 21600 0"/>
    <v:f eqn=3D"prod @7 21600 pixelHeight"/>
    <v:f eqn=3D"sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok=3D"f" gradientshapeok=3D"t" o:connecttype=3D"rect"=
/>
   <o:lock v:ext=3D"edit" aspectratio=3D"t"/>
  </v:shapetype><v:shape id=3D"_x0033_1_x0020_Imagen" o:spid=3D"_x0000_s102=
7"
   type=3D"#_x0000_t75" style=3D'position:absolute;margin-left:23.25pt;
   margin-top:2.25pt;width:55.5pt;height:54.75pt;z-index:1;visibility:visib=
le'
   o:gfxdata=3D"UEsDBBQABgAIAAAAIQD0vmNdDgEAABoCAAATAAAAW0NvbnRlbnRfVHlwZXN=
dLnhtbJSRQU7DMBBF
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
BgcHCAkLCQgICggHBwoNCgoLDAwMDAcJDg8NDA4LDAwM/9sAQwECAgIDAwMGAwMGDAgHCAwMDAwM
DAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwM/8AAEQgAqQCoAwEi
AAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQE
AAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2
Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Sl
pqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8B
AAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUh
MQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJ
SlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2
t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A/fyg
naMmivHtf/bf+Edj8bNZ+FmveK9L0rxRYiKC4sNVBt4LoTwpKqpK4ET7kkUbN24kkYqZTUVqc+Ix
VGgk601HmdldpXfZX66PQ9TPifTQcf2hY59PPX/GrVvdR3abopI5F9UYMK+GP2xf+CdTeFbW68U/
D+GW50xQZrvSFJkktl6l4T1dPVTlh2yOB8jWt5NYyiSGWSF16MjFSPxFfnGa8dYvLcR7DF4S3Zqe
jXdPl1/NdTzMRm1ShPkqU/x/4B+0lFfkL4c/aK8ceDGU6b4y8RWap0jXUZTH+KFip/EV6h4H/wCC
pPxG8Gui6leaX4kt14K3toI5MezxbOfdgarB+JWBqO1anKPpaS/R/gTHP6H/AC8TX4n6VUV8x/s8
/wDBULwf8Z/FOneHtU0+88O65qky21tlxcWs8rHCoJAAysx4AK4yQM13n7Zn7T13+yt4F0nXLfRY
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
favuH4Tf8EYPA/wH0SHxJ8ePiHpsdvF8z2FpdixsiR/A1xJiSTP92NUb0Jr5t+Lf/Bcr46fFUSQa
dqWj+C7KTK+XotkPNK+8sxkcH3Qr+FfO/iT4oa98SddbVPEWt6rr2oy/fudQu3uZj7bnJNeLVlha
WsYOb89F93+Z8Th8dw9gHejSniJrrO0Yeqirt+kmfqZ4v/4KtfCD9mbwu3hf4K+EbbUEh4WeO3Nj
p2/pvYkedO3qWA3f3zXyV8a/2x/Hn7TGp+d4p1yaazV98OnW/wC5srf02xjgkf3m3N71846bqOcV
0ek6ptx81fM5xjcViYezk7R/lWi+7r8z0KnGGNxdoVJKMOkYrlivK3+dz0TS9S6c19l/8EgEW8+O
niCc8tDoLqPbdcQf/E18K6XqOe9fa3/BGfXFPx/8Q2jN80/h+R199txB/wDFfpXz/D+FUc3oN/zf
oz7LhnGqeLpxfc/SSvn39rf/AIKUfDz9kHxDDoOrLq/iDxNNEs7aVo8KSzW0bfdeZndEjDdQMliM
Hbgg19BV+Kf7SG2L9tT4palq11a363niK5NvdJOsyNDnEK7gSPkjCpjsUI7V+p8UZ/HKsKqunNJ2
in1fkup+mZlRzSdFvLKTlypynJRclThFXcpdF6vT5n118XP+C0HhPxx8Er+18C2uv6X441Ddara6
nbLFJp0ZGGuVZGZHPOFAbIYgsABg63/BNH9gG48Dz2vxG8cWbR6zIvmaPps6/PZBh/x8Sg9JCD8q
nlQcn5sbfkf9hvwinxK/4KD/AA/XSLGG+i0m4m1K/LQiSK3gjhfLsDkD52RVPZ2THOK/ZSvmspyd
53jqee5k7qmrU6drRjLrJ93e1uzXkj6fhLxExMeGquT4eChUnNqrVW9SNk4xS+zZNqVnZ62tzNBR
RRX6UeQFFFFABRRRQBT8QaBZ+KtCvNN1C3ju7HUIWt7iGQZWVGGGU/UGvz9h+Ht7+wL+2boN5dNI
/hW+uWit75/uyWkv7tw56b4twZh32qcYIr9Dq5X4yfBvQ/jr4FutA1+1861n+aOReJbWQZ2yRt2Y
Z+hBIIIJFfOcQ5H9ejCvQ92tSalB+ad7Pydvl99+LGYX2qU46Sjqv8jqgciisP4Z+E7rwJ4A0nRb
3U5NZuNLtltjevF5b3CrwpZcnnaACcnJGe9bF5eQ6daS3FxLHBbwIZJJJGCpGoGSxJ4AA5ya9+nJ
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
ZWdQSwUGAAAAAAYABgCFAQAACzcAAAAA
">
   <v:imagedata src=3D"FO236-002BValedeprestamo.html_archivos/FO236-002B%20=
Vale%20de%20prÈstamo_24423_image001.png"
    o:title=3D""/>
   <x:ClientData ObjectType=3D"Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]-->
          <![if !vml]>
          <span style=3D'mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:31px;margin-top:3px;width:74px;
  height:73px'><img width=3D74 height=3D73
  src=3D"FO236-002BValedeprestamo.html_archivos/FO236-002B%20Vale%20de%20pr=
Èstamo_24423_image002.png"
  v:shapes=3D"_x0033_1_x0020_Imagen"></span>
          <![endif]>
          <span style=3D'mso-ig=
nore:
  vglayout2'>
          <table cellpadding=3D0 cellspacing=3D0>
            <tr>
              <td colspan=3D4 height=3D80 class=3Dxl10424423 width=3D141 style=3D'bor=
der-right:
    .5pt solid black;height:60.0pt;width:107pt'>&nbsp;</td>
            </tr>
          </table>
          </span></td>
      <td colspan=3D16 class=3Dxl10424423 style=3D'border-right:.5p=
t solid black;
  border-left:none;width:565pt'>VALE DE PR…STAMO DE EQUIPO Y/O MATERIAL DE
        C”MPUTO</td>
      <td colspan=3D5 class=3Dxl10424423 style=3D'border-right:.5pt=
 solid black;
  border-left:none;width:136pt'>C”DIGO:<br>
        FO236-002/B</td>
    </tr>
  <td height=3D20 class=3Dxl6624423 style=3D'height:15.0pt'></td>
      <td class=3Dxl6624423></td>
    <td class=3Dxl8724423 width=108 style=3D'width:38pt'></td>
    <td class=3Dxl8724423 width=144 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=91 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=96 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=200 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=216 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=272 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:16pt'></td>
    <td class=3Dxl7924423 width=62 style=3D'width:5pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl8624423 width=40 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:33pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:25pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl6624423></td>
  </tr>
  <tr class=3Dxl7924423 height=3D20 style=3D'mso-height-source:userset;heigh=
t:15.0pt'>
    <td height=34 class=3Dxl6624423 style=3D'height:15.0pt'></td>
    <td class=3Dxl10324423 width=82 style=3D'width:38pt'>Plantel:</td>
    <td class=3Dxl10224423 width=108 style=3D'width:38pt'>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D10 style=3D'mso-height-source:userset;heigh=
t:7.5pt'>
    <td height=3D10 class=3Dxl6624423 style=3D'height:7.5pt'></td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl8724423 width=108 style=3D'width:38pt'></td>
    <td class=3Dxl8724423 width=144 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=91 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=96 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=200 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=216 style=3D'width:13pt'></td>
    <td class=3Dxl8624423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=272 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:16pt'></td>
    <td class=3Dxl7924423 width=62 style=3D'width:5pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl8624423 width=40 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:33pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:25pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl6624423></td>
  </tr>
  <tr class=3Dxl7924423 height=3D26 style=3D'mso-height-source:userset;heigh=
t:19.5pt'>
    <td colspan=3D23 class=3Dxl10724423 style=3D'width:792pt'>I.=
      Datos del
      Solicitante</td>
    <td class=3Dxl9924423>&nbsp;</td>
  </tr>
  <tr class=3Dxl9024423 height=3D33 style=3D'mso-height-source:userset;heigh=
t:24.75pt'>
    <td height=3D33 class=3Dxl7124423 style=3D'height:24.75pt'>Nombre</td>
    <td colspan=3D11 class=3Dxl10824423 style=3D'width:400pt'>_________________________</td>
    <td colspan=3D11 class=3Dxl10824423 style=3D'border-right:.5p=
t solid black;
  width:369pt'>Materia / Puesto: </td>
    <td class=3Dxl9424423 width=216 style=3D'width:8pt'>___________________________</td>
  </tr>
  <tr class=3Dxl9024423 height=3D33 style=3D'mso-height-source:userset;heigh=
t:24.75pt'>
    <td height=3D33 class=3Dxl7124423 style=3D'height:24.75pt'>Docente</td>
    <td colspan=3D11 class=3Dxl9024423 style=3D'width:400pt'>Å_________________________</td>
    <td class=3Dxl9724423 width=91 style=3D'width:56pt'><span class="3Dxl9024423" style="3D'width:400pt'">Administrativo<span
  style=3D'mso-spacerun:yes'>&nbsp;</span></span></td>
    <td class=3Dxl9724423 width=96 style=3D'width:56pt'><span class="3Dxl9024423" style="3D'width:400pt'">&#129;<span class="3Dxl9024423" style="3D'width:400pt'">Otro: ____________</span></span></td>
    <td class=3Dxl9724423 width=200 style=3D'width:56pt'>&nbsp;</td>
    <td colspan=3D11 class=3Dxl9124423 style=3D'border-right:.5pt=
 solid black;
  width:369pt'>Telefono (s): </td>
    <td class=3Dxl9324423 width=272 style=3D'width:8pt'><span class="3Dxl9124423" style="3D'border-right:.5pt=">__________________________________</span></td>
  </tr>
  <tr class=3Dxl9024423 height=3D33 style=3D'mso-height-source:userset;heigh=
t:24.75pt'>
    <td height=3D33 class=3Dxl7124423 style=3D'height:24.75pt'>Tipo de Identificaci&oacute;n </td>
    <td colspan=3D22 class=3Dxl9124423 style=3D'border-right:.5p=
t solid black;
  width:769pt'><font class=3D"font524423">CECYTEG</font></td>
    <td height=3D33 class=3Dxl7124423 style=3D'height:24.75pt'><font class=3D"font524423">Elector<span style=3D'mso-spacerun:yes'>&nbsp;</span></font></td>
    <td height=3D33 class=3Dxl7124423 style=3D'height:24.75pt'><font class=3D"font524423">Licencia de
      manejo<span style=3D'mso-spacerun:yes'>&nbsp;&nbsp;</span></font></td>
    <td height=3D33 class=3Dxl7124423 style=3D'height:24.75pt'><font class=3D"font524423">Otro:
      _________________________</font></td>
    <td height=3D33 class=3Dxl7124423 style=3D'height:24.75pt'>&nbsp;</td>
  </tr>
  <tr class=3Dxl9024423 height=3D8 style=3D'mso-height-source:userset;height=
:6.0pt'>
    <td height=3D8 class=3Dxl7124423 style=3D'height:6.0pt'>&nbsp;</td>
    <td class=3Dxl6924423>&nbsp;</td>
    <td class=3Dxl9724423 width=108 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=144 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=91 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=96 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=200 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=216 style=3D'width:13pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:13pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=272 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=58 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=58 style=3D'width:16pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=62 style=3D'width:5pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:43pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:43pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:43pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl9824423 width=40 style=3D'width:13pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:33pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:25pt'>&nbsp;</td>
    <td class=3Dxl9724423 width=40 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl6724423>&nbsp;</td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <td class=3Dxl9524423><span class="3Dxl9624423" style="3D'height:19.5pt'">II=Datos del Equipo y o Material </span></td>
  <tr class=3Dxl7924423 height=3D26 style=3D'mso-height-source:userset;heigh=
t:19.5pt'> </tr>
  <tr class=3Dxl9024423 height=3D33 style=3D'mso-height-source:userset;heigh=
t:24.75pt'>
    <td colspan=3D22 class=3Dxl10824423 style=3D'border-right:.5=
pt solid black;
  width:769pt'>Å <font class=3D"font524423">PC's<span
  style=3D'mso-spacerun:yes'>††† </span>Å<span
  style=3D'mso-spacerun:yes'>††</span><span style=3D'mso-spacerun:=
yes'>†††</span><span style=3D'mso-spacerun:yes'>††</span>Å</font></td>
    <td class=3Dxl6924423><span class="3Dxl10824423" style="3D'border-right:.5="> Pantalla<span
  style=3D'mso-spacerun:yes'>&nbsp;</span></span></td>
    <td class=3Dxl6924423><span class="3Dxl10824423" style="3D'border-right:.5="><span
  style=3D'mso-spacerun:yes'> </span>&#129; Can&oacute;n</span></td>
    <td class=3Dxl6924423><span class="3Dxl10824423" style="3D'border-right:.5="><span style=3D'mso-spacerun:=
yes'> </span>&#129; Tableta</span></td>
    <td class=3Dxl6924423><span class="3Dxl10824423" style="3D'border-right:.5="><span style=3D'mso-spacerun:yes'>&nbsp; </span>&#129; PRS<span
  style=3D'mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span></td>
    <td class=3Dxl9424423 width=216 style=3D'width:3pt'><span class="3Dxl10824423" style="3D'border-right:.5=">Otro: _________________________ </span></td>
  </tr>
  <tr class=3Dxl9024423 height=3D28 style=3D'mso-height-source:userset;heigh=
t:21.0pt'>
    <td colspan=3D11 class=3Dxl9124423 style=3D'width:400pt'>Marca:</td>
    <td class=3Dxl9224423 width=144 style=3D'width:5pt'><span class="3Dxl9124423" style="3D'width:400pt'"> __________________</span></td>
    <td colspan=3D10 class=3Dxl9124423 style=3D'border-right:.5pt=
 solid black;
  width:364pt'>No. De serie: ______________________________</td>
    <td class=3Dxl9324423 width=216 style=3D'width:8pt'>&nbsp;</td>
  </tr>
  <tr class=3Dxl9024423 height=3D28 style=3D'mso-height-source:userset;heigh=
t:21.0pt'>
    <td colspan=3D11 class=3Dxl9124423 style=3D'width:400pt'>Modelo:</td>
    <td class=3Dxl9224423 width=144 style=3D'width:5pt'><span class="3Dxl9124423" style="3D'width:400pt'"> ________________</span></td>
    <td colspan=3D10 class=3Dxl9124423 style=3D'border-right:.5pt=
 solid black;
  width:364pt'>No. De Inventario: _________________________</td>
    <td class=3Dxl9324423 width=216 style=3D'width:8pt'>&nbsp;</td>
  </tr>
  <tr class=3Dxl9024423 height=3D27 style=3D'mso-height-source:userset;heigh=
t:20.25pt'>
    <td class=3Dxl6624423 colspan=3D9>Estado general del equipo: Excelente </td>
    <td class=3Dxl6624423 colspan=3D9></td>
  </tr>
  <tr class=3Dxl9024423 height=3D27 style=3D'mso-height-source:userset;heigh=
t:20.25pt'>
    <td colspan=3D22 class=3Dxl10924423 style=3D'border-right:.5pt solid blac=
k'>Especifique,
      si aplica, el tipo de falla o detalle que presente el equipo: </td>
  </tr>
  <tr class=3Dxl7924423 height=3D16 style=3D'height:12.0pt'>
    <td class=3Dxl6624423 colspan=3D7>El equipo y/o material se presta con los
      siguientes accesorios:</td>
    <td class=3Dxl7924423 width=144 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=91 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=96 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=200 style=3D'width:16pt'></td>
    <td class=3Dxl7924423 width=216 style=3D'width:5pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=272 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:56pt'></td>
    <td class=3Dxl8624423 width=62 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:33pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:25pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl7024423>&nbsp;</td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D16 style=3D'height:12.0pt'>
    <td colspan=3D22 >Å Cable
      de alimentaciÛn Cable VGA Control Remoto Mouse Estuche Otro(s)
      (especifique):__________</td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D8 style=3D'mso-height-source:userset;height=
:6.0pt'>
    <td height=3D8 class=3Dxl7124423 style=3D'height:6.0pt'>&nbsp;</td>
    <td class=3Dxl6924423>&nbsp;</td>
    <td class=3Dxl8224423 width=108 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl8224423 width=144 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=91 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=96 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=200 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=216 style=3D'width:13pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:13pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=272 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=58 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=58 style=3D'width:16pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=62 style=3D'width:5pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:43pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:43pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:43pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:38pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl8124423 width=40 style=3D'width:13pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:33pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:25pt'>&nbsp;</td>
    <td class=3Dxl8024423 width=40 style=3D'width:56pt'>&nbsp;</td>
    <td class=3Dxl6724423>&nbsp;</td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D16 style=3D'height:12.0pt'>
    <td class=3Dxl6624423 colspan=3D13>El equipo y/o material se usar· en: Å&nbsp;Å&nbsp;Å&nbsp;</td>
    <td class=3Dxl7924423 width=144 style=3D'width:43pt'><span class="3Dxl6624423">Sal&oacute;n</span></td>
    <td class=3Dxl7924423 width=91 style=3D'width:43pt'><span class="3Dxl6624423">Aula Virtual</span></td>
    <td class=3Dxl7924423 width=96 style=3D'width:38pt'><span class="3Dxl6624423">Centro de C&oacute;mputo</span></td>
    <td  > Laboratorio de Computo</td>
    <td class=3Dxl8624423 width=216 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:33pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:25pt'></td>
    <td class=3Dxl7924423 width=272 style=3D'width:56pt'></td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl9024423 height=3D33 style=3D'mso-height-source:userset;heigh=
t:24.75pt'>
    <td  class=3Dxl10924423>Grado:</td>
    <td  class=3Dxl10924423></td>
    <td class=3Dxl9124423 style=3D'width:107pt'>Grupo:</td>
    <td  class=3Dxl10924423></td>
    <td  class=3Dxl9124423 style=3D'width:313pt'>Mater
      ia:      </td>
	  <td  class=3Dxl9124423 style=3D'width:313pt'>&nbsp;</td>
    <td c class=3Dxl9124423 style=3D'width:235pt'>Tema: __________________      </td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D16 style=3D'height:12.0pt'>
    <td height=3D16 class=3Dxl7124423 style=3D'height:12.0pt'>&nbsp;</td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl8724423 width=144 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=91 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=96 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=200 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=216 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=272 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:16pt'></td>
    <td class=3Dxl7924423 width=62 style=3D'width:5pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl8624423 width=40 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:33pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:25pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D24 style=3D'mso-height-source:userset;heigh=
t:18.0pt'>
   
    <td colspan=3D4 class=3Dxl11424423 style=3D'width:152pt'>Fech
      a de
      Prestamo:</td>
    
    <td colspan=3D4 class=3Dxl11324423 style=3D'width:167pt'>Hora=
      de
      Prestamo:</td>
   
    <td class=3Dxl6624423></td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D16 style=3D'height:12.0pt'>
    
    <td colspan=3D4 class=3Dxl11224423 style=3D'width:152pt'>Fecha de
      DevoluciÛn:</td>
    
    <td colspan=3D4 class=3Dxl11324423 style=3D'width:167pt'>Hora=
      de
      DevoluciÛn:</td>
 
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
 
  <tr class=3Dxl7924423 height=3D16 style=3D'height:12.0pt'>
    <td height=3D16 class=3Dxl7124423 style=3D'height:12.0pt'>&nbsp;</td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl8724423 width=108 style=3D'width:38pt'></td>
    <td class=3Dxl8724423 width=144 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=91 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=96 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=200 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=216 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=272 style=3D'width:56pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=58 style=3D'width:16pt'></td>
    <td class=3Dxl7924423 width=62 style=3D'width:5pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:43pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:38pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl8624423 width=40 style=3D'width:13pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:33pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:25pt'></td>
    <td class=3Dxl7924423 width=40 style=3D'width:56pt'></td>
    <td class=3Dxl6624423></td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D16 style=3D'height:12.0pt'>
    <td colspan=3D13 height=3D16 class=3Dxl7424423 style=3D'height:12.0pt'>__=
      _____________________________________</td>
    <td class=3Dxl7924423 width=144 style=3D'width:5pt'></td>
    <td colspan=3D10 class=3Dxl7324423>______________________________________=
      _</td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D21 style=3D'mso-height-source:userset;heigh=
t:15.75pt'>
    <td colspan=3D13 height=3D21 class=3Dxl7424423 style=3D'height:15.75pt'>F=
      irma del
      Responsable del PrÈstamo</td>
    <td class=3Dxl7924423 width=144 style=3D'width:5pt'></td>
    <td colspan=3D10 class=3Dxl7324423>Firma del solicitante del PrÈstamo</td>
    <td class=3Dxl7024423>&nbsp;</td>
  </tr>
  <tr class=3Dxl7924423 height=3D11 style=3D'mso-height-source:userset;heigh=
t:8.25pt'>
    
  <![endif]>
  </table>
</div>


<!----------------------------->
<!--FINAL DE LOS RESULTADOS DEL ASISTENTE PARA PUBLICAR COMO P¡GINA WEB DE
EXCEL-->
<!----------------------------->
</body>

</html>

</page>



<?php 
   MasterPage::finalizarSeccion($contenido); 
   include("../../main/master/pdf_reporte.php"); 
?>


