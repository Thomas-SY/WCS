<?php
namespace Controller;

// src/Controller/CategoryController.php
use Model\CategoryManager;

class CategoryController extends AbstractController
{
    private $twig;

    public function index()
    {
        $categoryManager = new CategoryManager($this->pdo);
        $categorys = $categoryManager -> selectAllCategorys();

        return $this->twig->render('/category.html.twig', ['categorys' => $categorys]);
    }

    public function show(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneCategory($id);

        return $this->twig->render('/showCategory.html.twig', ['category' => $category]);

    }
}
?>