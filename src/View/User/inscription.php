<form action="<?php echo WEB_ROOT; ?>inscription" method="post">
    <label for="nom">Nom : </label>
    <input type="text" name="nom" id="nom"/>

    <label for="prenom">Prénom : </label>
    <input type="text" name="prenom" id="prenom"/>

    <label for="email">Email : </label>
    <input type="email" name="email" id="email"/>

    <label for="adresse">Adresse : </label>
    <input type="text" name="adresse" id="adresse"/>

    <label for="cp">Code Postal : </label>
    <input type="text" name="cp" id="cp"/>

    <label for="ville">Ville : </label>
    <input type="text" name="ville" id="ville"/>

    <label for="password">Mot de passe : </label>
    <input type="password" name="password" id="password"/>

    <input type="submit" value="S'inscrire" name="inscription"/>
</form>
<?php
echo $msg;
?>
