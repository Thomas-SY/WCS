<?php
namespace Model;
use Model\AbstractManager;
use Model\Item;
class ItemManager extends AbstractManager {
    /**
     * Targeted table const
     */
    const TABLE = 'item';
    /**
     *  Initializes this class.
     *
     * @param \PDO $pdo To use pdo into manager
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }
    /**
     * insert method
     *
     * @param Item $item Given user to insert
     *
     * @return int|null
     */
    public function insert(Item $item): int
    {
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`title`) VALUES (:title)");
        $statement->bindValue('title', $item->getTitle(), \PDO::PARAM_STR);
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }
    /**
     * Update method
     *
     * @param Item $item Given item to insert
     *
     * @return int|null
     */
    public function update(Item $item): ?int
    {
        $statement = $this->pdo->prepare("UPDATE $this->table SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $item->getId(), \PDO::PARAM_INT);
        $statement->bindValue('title', $item->getTitle(), \PDO::PARAM_STR);
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
        return null;
    }
    /**
     * Delete method
     *
     * @param int $id
     */
    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
