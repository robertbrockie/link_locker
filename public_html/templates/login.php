<div class="login">
	<h1>Login</h1>
	<form method="post" action="<?= $_SERVER["PHP_SELF"].'?action=login' ?>">
		<p>
			<label for="email">Email:</label>
			<input type="text" name="email"/>
		</p>

		<p>
			<label for="password">Password:</label>
			<input type="password" name="password"/>
		</p>

		<p>
			<input type="submit" name="Login"/>
		</p>

		<p>
			<a href="index.php?action=registration">Signup</a>
		</p>
	</form>
</div>