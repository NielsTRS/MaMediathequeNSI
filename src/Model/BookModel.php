<?php


namespace Core\Model;


use Core\App\Model;


class BookModel extends Model
{

    public function getBooks()
    {
        $req = $this->getDB()->prepare($this->_getDatasQuery() . ' ORDER BY l.annee ASC');
        $req->execute();
        return $req->fetchAll();
    }

    public function getBooksByQuery(string $query)
    {
        $sql = $this->_getDatasQuery() . $this->_searchQuery();
        $sql .= ' ORDER BY l.annee ASC';
        $req = $this->getDB()->prepare($sql);
        $req->bindValue('query', "%$query%");
        $req->execute();
        return $req->fetchAll();
    }

    public function getBooksByFilter(int $filter)
    {
        $sql = $this->_getDatasQuery() . $this->_addFilter($filter);
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getBooksByQueryFiltered(string $query, int $filter)
    {
        $sql = $this->_getDatasQuery() . $this->_searchQuery() . $this->_addFilter($filter);
        $req = $this->getDB()->prepare($sql);
        $req->bindValue('query', "%$query%");
        $req->execute();
        return $req->fetchAll();
    }

    public function deleteBook(string $isbn)
    {

        $sql = "
            DELETE FROM emprunt WHERE emprunt.isbn = :isbn;
            DELETE FROM auteur_de WHERE auteur_de.isbn = :isbn; 
            DELETE FROM livre WHERE livre.isbn = :isbn;
            ";
        $req = $this->getDB()->prepare($sql);
        $req->bindParam('isbn', $isbn);
        return $req->execute();
    }

    private function _getDatasQuery()
    {
        return 'SELECT a.nom, l.titre, l.annee, e.retour, l.isbn FROM livre AS l JOIN auteur_de AS ad ON ad.isbn = l.isbn JOIN auteur AS a ON a.a_id = ad.a_id LEFT JOIN emprunt e on l.isbn = e.isbn';
    }

    private function _searchQuery()
    {
        return ' WHERE a.nom LIKE :query OR l.titre LIKE :query OR l.annee LIKE :query';
    }

    private function _addFilter(int $filter)
    {
        switch ($filter) {
            case 1:
                $sql = ' ORDER BY l.titre ASC';
                break;
            case 2:
                $sql = ' ORDER BY l.titre DESC';
                break;
            case 3:
                $sql = ' ORDER BY a.nom ASC';
                break;
            case 4:
                $sql = ' ORDER BY a.nom DESC';
                break;
            default:
                $sql = ' ORDER BY l.annee ASC';
        }
        return $sql;
    }
}