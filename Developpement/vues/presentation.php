<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Présentation de pulseNEWS</title>
       
        <link rel="stylesheet" href="design/presentation.css" />

		<script src="js/jquery-1.7.1.min.js"></script>
		
		<script type="text/javascript">
		$(document).ready(function() {
			var imp = impress();
			
			$('#arrowLeft').click(function(e){
				imp.prev();
				e.preventDefault();
			});
			
			$('#arrowRight').click(function(e){
				imp.next();
				e.preventDefault();
			});
		
		
			setInterval( function(){
				$("#arrowRight").click();
			}, 15000);
		});

		</script>
    </head>
    
    <body>

		<div id="impress" class="impress-not-supported">
			<div id="lol">
			<div id="intro" class="step" data-x="0" data-y="0">
				
				
					<h2>Présentation de pulseNEWS</h2><div id="text_pn">
					<p>pulseNEWS est un réseau social basé sur l'information. <br>En plus de pouvoir créer votre propre blog personnalisable, <br>vous avez accès aux dernières actualités <br> en provenance de TOUS les journaux en ligne ! <br>Tous les membres peuvent débattre sur les articles tirés<br> de journaux ou rédigés par d'autres utilisateurs. <br>L'esprit pulseNEWS c'est VOUS !</p>
				</div>
				<!--<p>Réseau social basé sur l'information</br>Blog personnalisable </br>Accés aux dernières actualités de TOUS les journaux en ligne</br>Débat ouvert sur les articles tirés de journaux ou rédigé </br>L'esprit pulseNEWS c'est VOUS !</p>-->
		    
		        <img src="design/img/pn.png" width="250" height="250" alt="Galaxy Nexus" />
		    </div>
			</div>
		    
		    <div id="simplicity" class="step" data-x="1100" data-y="1200" data-scale="1.8" data-rotate="190">
		        <div id="pulse_texte"><h2>"Pulser" ou rédiger !</h2>
		        <p>Avec pulseNEWS, vous pouvez "pulser" une news, c'est à dire sélectionner une information afin de l’exposer au débat et à la réflexion, tant sur le 
				fil d'actualités que sur votre profil. De plus pour les plus créatif d'entre vous, il est également possible d'écrire votre propre article, et de l'illustrer avec une image !</p></div>
				
		        <img src="design/img/pulse.png" width="250" height="300" alt="Galaxy Nexus" />
		    </div>
		    
		    <div id="connect" class="step" data-x="-300" data-y="600" data-scale="0.2" data-rotate="270">
		        <h2>Commenter &amp; noter</h2>
		        <p>Le système de commentaire de pulseNEWS, a été pensé pour que vous puissiez même répondre au commentaire d'un autre pulseur, de ce fait le débat reste toujours très mouvementé ! De plus, le système de note vous permet de donner votre avis sur un article, si vous aimez, PROpulsez, sinon DEpulsez !</p>
		        <img src="design/img/smiley.png" width="500" height="250" alt="Galaxy Nexus" />
		    </div>
		    
		    <div id="upload" class="step" data-x="-200" data-y="1500" data-rotate="180">
		         <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Le débat du jour</h2>
		        <p>Vous avez toujours rêvé de pouvoir débattre sur un sujet qui vous plaît ? pulseNEWS est là pour ça ! Venez nous proposer un thème dans la page "débat du jour", ou votez pour l'un des thèmes suggérés par un pulseur. Le thème qui aura la meilleure note à 20h sera exposé au débat de 20h à 3h !</p>
		        <div id='debat_texte'><img src="design/img/voter.png" width="248" height="100" alt="Galaxy Nexus" /></div>
		    </div>
		    
		    <div id="music" class="step" data-x="-1200" data-y="1000" data-scale="0.8" data-rotate="270">
		        <div id="about_us"><h2>Une équipe de choc !</h2>
				
				
					<p>pulseNEWS a été créé par Salman ALAMDAR, Christie BUNLON, Michel GILLE et Brice HOFFMANN. En effet, après avoir obtenu la première place aux forums des Projets Industriels de janvier 2012 avec Educ'land (site d’activités éducatives), Salman et Christie sont restés dans leur lancée pour innover le Monde du Web. Voyant que les
					réseaux sociaux axés sur l'information avaient un futur prometteur, ils se sont associés avec Michel et Brice,
					deux éléments majeurs du projet iTiPiX (site internet de valorisation artistique) pour fonder la communauté pulseNEWS.<br><br><br>"Ceux qui osent se trompent souvent, ceux qui n'osent pas se trompent toujours."</p>
				</div>
		        <br><!--<img src="design/img/dream_team.jpg" width="600" height="400" alt="Galaxy Nexus" />-->
		    </div>
		    
		</div>


		<a id="arrowLeft" class="arrow">&lt;</a>
		<a id="arrowRight" class="arrow">&gt;</a>

        <!-- JavaScript includes -->

		<script src="js/impress.js"></script>
		
<a style='color: black;' href='index.php?page=news'><div class='retour'>Revenir sur pulseNEWS</div></a>
    </body>
</html>

