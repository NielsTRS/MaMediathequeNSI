<?php


namespace Core\Model;


use Core\App\Model;

class TakeModel extends Model
{
    public function __construct()
    {
        $this->_purgeTakes();
    }

    private function _purgeTakes()
    {
        $currentDate = date('Y-m-d');
        $req = $this->getDB()->prepare('DELETE FROM emprunt WHERE emprunt.retour < ?;');
        return $req->execute([$currentDate]);
    }

    public function getTakes()
    {
        $req = $this->getDB()->prepare($this->_getDatasQuery());
        $req->execute();
        return $req->fetchAll();
    }

    private function _getDatasQuery()
    {
        return 'SELECT u.nom, l.titre, e.retour, e.isbn FROM emprunt AS e JOIN usager AS u on u.code_barre = e.code_barre JOIN livre AS l on l.isbn = e.isbn';
    }

    public function getByUserCode(string $code)
    {
        $req = $this->getDB()->prepare($this->_getDatasQuery() . ' WHERE u.code_barre = ?');
        $req->execute([$code]);
        return $req->fetchAll();
    }

    public function createTake(string $code, string $isbn, string $date)
    {
        $req = $this->getDB()->prepare('INSERT INTO emprunt VALUES (?, ?, ?)');
        return $req->execute([$code, $isbn, $date]);
    }

    public function removeTake(string $isbn, string $code = null)
    {
        if (is_null($code)) {
            $req = $this->getDB()->prepare('DELETE FROM emprunt WHERE emprunt.isbn = ?;');
            return $req->execute([$isbn]);
        } else {
            $req = $this->getDB()->prepare('DELETE FROM emprunt WHERE emprunt.isbn = ? AND emprunt.code_barre = ?;');
            return $req->execute([$isbn, $code]);
        }
    }
}