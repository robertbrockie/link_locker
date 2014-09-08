<h1>Link Locker!</h1>
<h3>The name sucks and has to change</h3>

<p>The next step is for me to show the user a form to save a link.</p>

<p>Then display links previously saved</p>

<form method="post" action="index.php?action=add_link">
	<p><input type="text" name="url"/></p>
	<p><input type="submit" value="Save Link"/></p>
</form>

<pre>
<?= print_r($this->user, true); ?>
</pre>

<h4>Latest Links</h4>
<ul>
<?php foreach($this->links as $link) { ?>
	<li><a href="<?= $link->getUrl() ?>" target="_blank"><?= $link->getUrl() ?></a></li>
<?php } ?>
</ul>
<p><a href="index.php?action=logout">Logout</a></p>