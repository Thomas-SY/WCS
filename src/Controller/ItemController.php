<?php
namespace Controller;
// src/Controller/ItemController.php
use Model\Item;
use Model\ItemManager;
;
class ItemController extends AbstractController {
    /**
     * @param $itemManager
     */
    public function index() {
        $itemManager = new ItemManager($this->pdo);
        $items = $itemManager->selectAll();
        return $this->twig->render('Item/item.html.twig', ['items' => $items]);
    }

    public function show(int $id) {
        $itemManager = new ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);
        return $this->twig->render('Item/showItem.html.twig', ['item' => $item]);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $title = trim(htmlspecialchars($_POST['title']));
            // création d'un nouvel objet Item et hydratation avec les données du formulaire
            $item = new Item();
            $item->setTitle($title);
            $itemManager = new ItemManager($this->getPdo());
            // l'objet $item hydraté est simplement envoyé en paramètre de insert()
            $itemManager->insert($item);
            // si tout se passe bien, redirection
            header('Location: /');
            exit();
        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('Item/add.html.twig');
    }

    public function edit(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $itemArray = $itemManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemManager = new ItemManager($this->getPdo());
            $item = new Item();
            $title = htmlspecialchars($_POST['title']);
            $item->setId($_POST['id']);
            $item->setTitle($title);
            $itemManager->update($item);
            header("Location: /");
        }
        return $this->twig->render(
            'Item/edit.html.twig', [
                'item' => $item = $itemArray == null ? null : $itemArray
            ]
        );
    }

    public function delete(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $itemArray = $itemManager->selectOneById($id);
        if (!empty($_POST)) {
            $itemManager = new ItemManager($this->getPdo());
            $item = new Item();
            $item->setId($_POST['id']);
            $item->setTitle($_POST['title']);
            $itemManager->delete($id);
            header('Location: /');
            exit();
        }
        return $this->twig->render(
            'Item/delete.html.twig', [
                'item' => $item = $itemArray == null ? null : $itemArray
            ]
        );
    }
}