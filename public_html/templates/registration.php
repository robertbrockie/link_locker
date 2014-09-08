<div class="registration">
	<h1>Link Locker Registration</h1>
	<form method="post" action="<?= $_SERVER["PHP_SELF"].'?action=registration' ?>">
		<p>
			<label for="email">Email:</label>
			<input type="text" name="email"/>
		</p>

		<p>
			<label for="password">Password:</label>
			<input type="password" name="password"/>
		</p>

		<p>
			<label for="username">Username:</label>
			<input type="username" name="username"/>
		</p>

		<p>
			<input type="submit" value="Register"/>
		</p>

		<p>
			<a href="index.php?action=login">Login Here</a>
		</p>
	</form>
</div>