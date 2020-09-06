<h1>Voeg een medewerker toe</h1>
<form name="create" method="post" action="<?=URL?>/employee/store">
	<label for="">Naam</label>
	<input type="text" name="name" placeholder="Vul naam in"><br>
	<label for="">Geboortedatum</label>
	<input type="date" name="birth" placeholder="Vul geboortedatum in"><br>
	<input type="submit">
</form>