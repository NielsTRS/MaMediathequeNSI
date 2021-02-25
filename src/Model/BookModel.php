<?php


namespace Core\Model;


use Core\App\Model;


class BookModel extends Model
{

    public function getBooks()
    {
        $req = $this->getDB()->prepare('SELECT a.nom, l.titre, l.annee, l.isbn FROM livre AS l JOIN auteur_de AS ad ON ad.isbn = l.isbn JOIN auteur AS a ON a.a_id = ad.a_id ORDER BY l.annee ASC');
        $req->execute();
        return $req->fetchAll();
    }

    public function getBooksByQuery(string $query)
    {
        $sql = "
        SELECT a.nom, l.titre, l.annee, l.isbn FROM livre AS l JOIN auteur_de AS ad ON ad.isbn = l.isbn JOIN auteur AS a ON a.a_id = ad.a_id 
        WHERE a.nom LIKE :query
        OR l.titre LIKE :query
        OR l.annee LIKE :query
        ORDER BY l.annee ASC
        ";
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
}