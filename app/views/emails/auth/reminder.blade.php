<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Renouvellement de mot de passe</h2>

		<div>
			Pour renouveller votre mot de passe veuillez utiliser ce lien : 
			<p>
				{{ link_to('guest/reset/'.$token) }}
			</p>
		</div>
	</body>
</html>