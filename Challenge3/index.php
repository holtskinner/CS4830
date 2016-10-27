<!DOCTYPE html>
<html>
<head>
<?php include_once "materialize.php" ?>
</head>
<body>
	<div class="container">
		<h1 class="center-align">Challenge 3</h1>
		<div class="row">
			<form class="col s12" action="page2.php" method="post">
				<div class="row">
					<div class="input-field col s6"> <i class="material-icons prefix">account_circle</i>
						<input name="first-name" type="text" class="validate">
						<label for="first-name">First Name</label>
					</div>
					<div class="input-field col s6"> <i class="material-icons prefix">face</i>
						<input name="last-name" type="text" class="validate">
						<label for="last-name">Last Name</label>
					</div>
					<div class="input-field col s6"> <i class="material-icons prefix">cake</i>
						<input name="age" type="text" class="validate">
						<label for="age">Age</label>
					</div>
					<div class="input-field col s6"> <i class="material-icons prefix">place</i>
						<input name="city" type="text" class="validate">
						<label for="city">City</label>
					</div>
					<div class="input-field col s6"> <i class="material-icons prefix">my_location</i>
						<input name="state" type="text" class="validate">
						<label for="state">State</label>
					</div>
					<div class="input-field col s6"> <i class="material-icons prefix">phone</i>
						<input name="telephone" type="tel" class="validate">
						<label for="telephone">Telephone</label>
					</div>
				</div>
				<div class="center-align">
					<button class="btn waves-effect waves-light" type="submit" name="submit">Submit <i class="material-icons right">send</i> </button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>
