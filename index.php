<?php
/*************************************************
* Programm zum Testen von regulaeren Ausdruecken *
* Version 1.1 (11.11.2009)                       *
* (c) Frank Rosner                               *
*************************************************/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RegulÃ¤re AusdrÃ¼cke in PHP</title>
<style type="text/css">
<!--
body {
  font-family:sans-serif;
	font-size:14px;
}
#links {
	font-family:monospace;
}
#rechts {

}
-->
</style>
</head>
<body>
<?php
if ($_POST['submit']) {
	extract($_POST);

	if (!$posix) {
		if ($radio == "quellcode") {
		$reg = "^[a-zA-Z0-9][a-z0-9\._\-]*@[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9]\.[a-z][a-z]+$";
		}
		if (ereg($reg, $string)) {
			$color = "00FF00"; // grÃ¼n
			$bestanden = "bestanden";
		} else {
			$color = "FF0000"; // rot
			$bestanden = "nicht bestanden";
		}
	} else {
		if ($radio == "quellcode") {
		$reg = "/^[a-z0-9][a-z0-9\._\-]*@[a-z0-9][a-z0-9\-]*[a-z0-9]\.[a-z][a-z]+$/i";
		}
		if (preg_match($reg, $string)) {
			$color = "00FF00"; // grÃ¼n
			$bestanden = "bestanden";
		} else {
			$color = "FF0000"; // rot
			$bestanden = "nicht bestanden";
		}
	}
}
?>

<fieldset style="width:auto; float:left;">
<legend>RegulÃ¤re-Ausdruck-Testmaschine</legend>
<form id="form1" name="form1" method="post" action="reg.php">
    <p>
        <input type="radio" name="radio" value="eingabe" checked/>
        Eingegebenen Ausdruck verwenden <br />
        <input type="radio" name="radio" value="quellcode" />
        Beispielausdruck verwenden (e-Mail-PrÃ¼fung)<br />
		<input type="checkbox" name="posix" value="posix" <?php if ($posix) print("checked"); ?>/>
		POSIX-Auswertung (im Zweifel leer lassen)<br />
    </p>
    <p>
        RegulÃ¤rer Ausdruck:<br />
        <input type="text" name="reg" size="100" style="font-family:monospace;" value="<?php print($reg); ?>"/>
    </p>
    <p>
        Zu prÃ¼fende Zeichenkette:<br />
        <input type="text" name="string" size="50" style="font-family:monospace;" value="<?php print($string); ?>"/>
        <input type="submit" name="submit" id="submit" value="und go!"/>
        <input type="reset" value="reset" />
    </p>
</form>
<?php
if ($submit) {
	print("<p>Verwendete Zeichenkette:<br> <span style=\"font-family:monospace;\">$string</span> <br><br>\n");
	print("Verwendeter regulÃ¤rer Ausdruck:<br> <span style=\"font-family:monospace;\">$reg</span> <br><br>\n");
	print("Der eingegebene String hat die PrÃ¼fung <span style=\"color:#$color\"> $bestanden</span>.</p>");
}
?>
</fieldset>
<fieldset style="width:300px;">
<legend>Hilfe</legend>
<table>
	<tr>
    	<td id="links">
        	^
        </td>
        <td id="rechts">
        	Anfang eines Strings
        </td>
    </tr>
	<tr>
    	<td id="links">
        	$
        </td>
        <td id="rechts">
        	Ende eines Strings
        </td>
    </tr>
	<tr>
    	<td id="links">
        	.
        </td>
        <td id="rechts">
        	beliebliges Zeichen
        </td>
    </tr>
	<tr>
    	<td id="links">
        	n?
        </td>
        <td id="rechts">
        	nicht od. einmal vorkommendes 'n'
        </td>
    </tr>
	<tr>
    	<td id="links">
        	n+
        </td>
        <td id="rechts">
        	mindestens einmal vorkommend
        </td>
    </tr>
	<tr>
    	<td id="links">
        	n*
        </td>
        <td id="rechts">
        	beliebig oft vorkommend
        </td>
    </tr>
	<tr>
    	<td id="links">
        	n{2}
        </td>
        <td id="rechts">
        	zweifach vorkommend
        </td>
    </tr>
	<tr>
    	<td id="links">
        	n{2,}
        </td>
        <td id="rechts">
        	mindestens zweifach vorkommend
        </td>
    </tr>
	<tr>
    	<td id="links">
        	n{2,4}
        </td>
        <td id="rechts">
        	2 bis 4 mal vorkommend
        </td>
    </tr>
	<tr>
    	<td id="links">
        	()
        </td>
        <td id="rechts">
        	Klammern fÃ¼r AusdrÃ¼cke
        </td>
    </tr>
	<tr>
    	<td id="links">
        	(a|b)
        </td>
        <td id="rechts">
        	entweder 'a' oder 'b'
        </td>
    </tr>
	<tr>
    	<td id="links">
        	[1-6]
        </td>
        <td id="rechts">
        	eine Zahl zwischen 1 und 6
        </td>
    </tr>
	<tr>
    	<td id="links">
        	[a-z]
        </td>
        <td id="rechts">
        	ein Kleinbuchstabe
        </td>
    </tr>
	<tr>
    	<td id="links">
        	[^A-Z]
        </td>
        <td id="rechts">
        	kein Gro&szlig;buchstabe
        </td>
    </tr>
	<tr>
    	<td id="links">
        	\
        </td>
        <td id="rechts">
        	Escape-Zeichen
        </td>
    </tr>


</table>
</fieldset>
</body>
</html>
