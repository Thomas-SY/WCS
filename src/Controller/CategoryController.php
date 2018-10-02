<?php
namespace Controller;

// src/Controller/CategoryController.php
use Model\CategoryManager;

class CategoryController
{
    public function index()
    {
        $categoryManager = new CategoryManager();
        $categorys = $categoryManager -> selectAllCategorys();
        require __DIR__ . '/../View/category.php';
    }

    public function show(int $id)
    {
        $categoryManager = new CategoryManager();
        $categorys = $categoryManager->selectOneCategory($id);

        require __DIR__ . '/../View/showCategory.php';
    }
}
?>