	<?php
		$info = employees();
	?>
	<h1>Verjaardagen</h1>
	<ul>
		<?php foreach($info as $row) { ?>
		<li>
			<span>
				<?php echo $row['name']?> is geboren op <?php echo $row['birth']?>

			</span>
			<?php
			// de opbouw van de link bepaald welke method in welke controller aangeroepen wordt.
			// het woordje "employee" in de url betekent dat het framework moet zoeken naar een controller genaamd "EmployeeController".
			// Hij maakt van de eerste letter een hoofdletter en plakt er zelf "Controller" achter.
			// Het woordje "update" of "delete" betekent dat hij in deze controller moet zoeken naar een method met deze naam.
			?>
			<a href="<?php echo URL ?>employee/update/<?php echo $row["id"]?>">Wijzigen</a> 
			<a href="<?php echo URL ?>employee/delete/<?php echo $row["id"]?>">Verwijderen</a>
		</li>
		<?php } ?>
	</ul>