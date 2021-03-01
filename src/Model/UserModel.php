<?php


namespace Core\Model;


use Core\App\Model;


class UserModel extends Model
{
    public function createUser(string $nom, string $prenom, string $adresse, string $cp, string $ville, string $email, int $role, string $code_barre, string $password)
    {
        $req = $this->getDB()->prepare('INSERT INTO usager VALUES (:nom, :prenom, :adresse, :cp, :ville, :email, :code_barre, :password, :role)');
        $req->bindParam('nom', $nom);
        $req->bindParam('prenom', $prenom);
        $req->bindParam('adresse', $adresse);
        $req->bindParam('cp', $cp);
        $req->bindParam('ville', $ville);
        $req->bindParam('email', $email);
        $req->bindParam('role', $role);
        $req->bindParam('code_barre', $code_barre);
        $req->bindValue('password', password_hash($password, PASSWORD_DEFAULT));

        return $req->execute();
    }

    public function checkUser(string $nom)
    {
        $req = $this->getDB()->prepare('SELECT password, role, code_barre FROM usager WHERE nom = ?');
        $req->execute([$nom]);
        if ($req->rowCount() == 1) {
            return $req->fetch();
        } else {
            return false;
        }
    }

    public function getUserByCode(string $code)
    {
        $req = $this->getDB()->prepare('SELECT nom FROM usager WHERE code_barre = ?');
        $req->execute([$code]);
        return $req->fetch();
    }
}