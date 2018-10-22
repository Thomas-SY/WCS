<?php
namespace Model;

class CategoryManager
{
    // récupération de tous les items
    public function selectAllCategorys() :array
    {
        $pdo = new \PDO(APP_DB_DSN, APP_DB_USER, APP_DB_PWD);
        $query = "SELECT * FROM category";
        $res = $pdo->query($query);
        return $res->fetchAll();
    }

    // la méthode prend l'id en paramètre
    public function selectOneCategory(int $id) : array
    {
        $pdo = new \PDO(APP_DB_DSN, APP_DB_USER, APP_DB_PWD);
        $query = "SELECT * FROM category WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetch();
    }
}


?>