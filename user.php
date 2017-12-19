<!DOCTYPE html>
<html>
<head>
	<title>Liste</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
	<h1>Liste des utilisateurs</h1>
	<?php
		try

		{

		    $db = new PDO('mysql:host=localhost;dbname=leader;charset=utf8', 'root', 'passer');

		}

		catch (Exception $e)

		{

		        die('Erreur : ' . $e->getMessage());

		}
				
		$lis = $db -> query(' SELECT id, nomComplet, tel, email, login,dateofbirth, p.profil FROM profil as p, utilisateur, userProfil as up  where id=utilisateur and p.idProfil=up.profil');

		echo "<table border='1' width='500' height='100'>";
		echo "<tr>";
			echo "<th>Nom</th>";
			echo "<th>Tel</th>";
			echo "<th>Email</th>";
			echo "<th>login</th>";
			echo "<th>Date de naissance</th>";
			echo "<th>profil</th>";
			echo "<th>Editer</th>";
		echo "</tr>";

		while ($donnees = $lis->fetch()) {
			echo "<tr>";
			echo "<td>".$donnees['nomComplet']."</td>";
			echo "<td>".$donnees['tel']."</td>";
			echo "<td>".$donnees['email']."</td>";
			echo "<td>".$donnees['login']."</td>";
			echo "<td>".$donnees['dateofbirth']."</td>";
			echo "<td>".$donnees['profil']."</td>";
			echo "<td><a href='editer.php?id=".$donnees['id']."'>editer</a></td>";
			echo "</tr>";

		}
		echo "</table>";
	?>
	</center>
</body>
</html>