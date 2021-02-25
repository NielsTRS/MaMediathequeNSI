<?php


namespace Core\Model;


use Core\App\Model;

class TakeModel extends Model
{
    public function __construct()
    {
        $this->_purgeTakes();
    }

    public function getTakes()
    {
        $req = $this->getDB()->prepare('SELECT u.nom, l.titre, e.retour, e.isbn FROM emprunt AS e JOIN usager AS u on u.code_barre = e.code_barre JOIN livre AS l on l.isbn = e.isbn');
        $req->execute();
        return $req->fetchAll();
    }

    public function getByUser(string $user)
    {
        $req = $this->getDB()->prepare('SELECT u.nom, l.titre, e.retour, e.isbn FROM emprunt AS e JOIN usager AS u on u.code_barre = e.code_barre JOIN livre AS l on l.isbn = e.isbn WHERE u.nom = ?');
        $req->execute([$user]);
        return $req->fetchAll();
    }

    public function createTake(string $code, string $isbn, string $date)
    {
        $req = $this->getDB()->prepare('INSERT INTO emprunt VALUES (?, ?, ?)');
        return $req->execute([$code, $isbn, $date]);
    }

    public function removeTake(string $isbn)
    {
        $req = $this->getDB()->prepare('DELETE FROM emprunt WHERE emprunt.isbn = ?;');
        return $req->execute([$isbn]);
    }

    private function _purgeTakes()
    {
        $currentDate = date('Y-m-d');
        $req = $this->getDB()->prepare('DELETE FROM emprunt WHERE emprunt.retour < ?;');
        return $req->execute([$currentDate]);
    }
}