
<div class="box-container">

	<form action="<?= $currentUrl ?>" method="POST">
		<h3> Ihre Zugangsdaten </h3>
		<div class="input-container inner-addon left-addon">
	 		<input name="benutzername" placeholder="Benutzername" type="text" class="loginField" />
		</div>

		<div class="input-container inner-addon left-addon">
	 		<input name="passwort" placeholder="Passwort" type="password" class="loginField" />
		</div>

		<input type="submit" value="Login">
	</form>
	

</div>

	


<style>

.box-container {

	padding: 0 0 15px 15px; 
	border: 2px solid grey; 
	min-height: 100px; 
	box-shadow: 5px 10px #888888; 
	background-color: whitesmoke;
	
	margin: .75rem 5rem .75rem 5rem;
}

.input-container {
  position: relative;
  margin-top: 20px;
}

input.loginField {
	width: 80%;
	padding: .50rem;
	border-radius:10px;
}

input[type=submit] {
	margin-top: .75rem;
	box-shadow: 0px 1px 0px 0px #3dc21b;
	background-color:#44c767;
	border-radius:6px;
	border:1px solid #18ab29;
	cursor:pointer;
	color:#ffffff;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	
}
</style>