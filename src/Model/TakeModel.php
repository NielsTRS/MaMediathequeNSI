<?php


namespace Core\Model;


use Core\App\Model;

/**
 * Class TakeModel
 * @package Core\Model
 */
class TakeModel extends Model
{
    /**
     * TakeModel constructor.
     */
    public function __construct()
    {
        $this->_purgeTakes();
    }

    /**
     * Get all taken books
     * @return array
     */
    public function getTakes()
    {
        $req = $this->getDB()->prepare($this->_getDatasQuery());
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * Create a taken book
     * @param string $code
     * @param string $isbn
     * @param string $date
     * @return bool
     */
    public function createTake(string $code, string $isbn, string $date)
    {
        $req = $this->getDB()->prepare('INSERT INTO emprunt VALUES (?, ?, ?)');
        return $req->execute([$code, $isbn, $date]);
    }

    /**
     * Delete a taken book
     * @param string $isbn
     * @param string|null $code
     * @return bool
     */
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

    /**
     * Get taken books by user
     * @param string $code
     * @return array
     */
    public function getByUserCode(string $code)
    {
        $req = $this->getDB()->prepare($this->_getDatasQuery() . ' WHERE u.code_barre = ?');
        $req->execute([$code]);
        return $req->fetchAll();
    }

    /**
     * Remove taken books older than the current date automatically
     * @return bool
     */
    private function _purgeTakes()
    {
        $currentDate = date('Y-m-d');
        $req = $this->getDB()->prepare('DELETE FROM emprunt WHERE emprunt.retour < ?;');
        return $req->execute([$currentDate]);
    }

    /**
     * Specific query to get informations
     * @return string
     */
    private function _getDatasQuery()
    {
        return 'SELECT u.nom, u.prenom, l.titre, e.retour, e.isbn FROM emprunt AS e JOIN usager AS u on u.code_barre = e.code_barre JOIN livre AS l on l.isbn = e.isbn';
    }
}