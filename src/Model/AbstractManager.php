<?php
namespace Model;
abstract class AbstractManager
{
    protected $pdo; // connexion
    protected $table;
    protected $className;
    public function __construct(string $table, \PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->className = __NAMESPACE__ . '\\' . ucfirst($table);
    }
    /**
     * Get all rows from database.
     *
     * @return array
     */
    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }
    /**
     * Get one row from database by ID.
     *
     * @param int $id Given id
     *
     * @return array Fetching array
     */
    public function selectOneById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }
}