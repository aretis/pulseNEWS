<head>
	<title>pulseNEWS, sponsored by your mind!</title>
<link rel="stylesheet" href="design/home.css" />
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
						<form id='start' name='formulaire' action='index.php?page=home' method='post'>
						<span style='color: white;'>pseudo</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span style='color: white;'>mot de passe</a>&nbsp;&nbsp;
					</div>
					
					<input id='pseudo' type='text'  name="pseudo" value='<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>'/>
					<input id='password' type='password' name="password" />
					
				</div>
				
				<input type="submit" value="Connexion"/>
				
				</form>
		</td>