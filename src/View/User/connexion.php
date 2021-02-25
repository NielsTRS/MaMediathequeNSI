<form action="<?php echo WEB_ROOT; ?>connexion" method="post">
    <label for="nom">Nom : </label>
    <input type="text" name="nom" id="nom"/>
    <label for="password">Mot de passe : </label>
    <input type="password" name="password" id="password"/>
    <input type="submit" value="Se Connecter" name="connexion"/>
</form>
<?php
echo $msg;
?>