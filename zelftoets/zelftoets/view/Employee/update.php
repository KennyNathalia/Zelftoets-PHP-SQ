	
	<h1>Persoon wijzigen</h1>
	<form name="update" method="post" action="<?=URL?>employee/edit/<?php echo $updateId ?>">
	    <input type="hidden" name="id" value="<?=$employee["id"] ?>"/>
	    <!--  Bouw hier de rest van je formulier   -->
	    <label for="">Name</label>
		<input type="text" name="name" placeholder="Vul naam in"><br>
		<label for="">Geboortedatum</label>
		<input type="date" name="birth" placeholder="Vul geboortedatum in"><br>
		<input type="submit">
	</form>