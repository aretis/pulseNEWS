<head>
	<title>pulseNEWS, sponsored by your mind!</title>
<script type="text/javascript" src="modeles/button_input.js"></script>
<link rel="stylesheet" href="design/home.css" />
<link rel="icon" type="image/gif" href="favicon.gif" />
</head>
<body>
<div class='header'>
	<table cellspacing="1">
		<td>
			<img style='width: 451px;' src='design/img/logo_header.png'/>
		</td>
		
		<td style='width: 500;'></td>
		<td>
				<div class='header_info'>
				
					<div class='header_menu'>
						<form id='start' name='formulaire' action='index.php?page=home' method='post' onSubmit='verif_formulaire()'>
						<span style='color: white;'>pseudo</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span style='color: white;'>mot de passe</a>&nbsp;&nbsp;
					</div>
					
					<input id='name' type='text'  name="pseudo" VALUE ='<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>'/>
					<input id='password' type='text' name="password" />
					
				</div>
				
				<input type="submit" value="Connexion"/>
				
				</form>
		</td>