<?php
namespace Controller;

// src/Controller/CategoryController.php
use Twig_Loader_Filesystem;
use Twig_Environment;
use Model\CategoryManager;

class CategoryController
{
    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig = new Twig_Environment($loader);
    }

    public function index()
    {
        $categoryManager = new CategoryManager();
        $categorys = $categoryManager -> selectAllCategorys();

        return $this->twig->render('/category.html.twig', ['categorys' => $categorys]);
    }

    public function show(int $id)
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneCategory($id);

        return $this->twig->render('/showCategory.html.twig', ['category' => $category]);

    }
}
?>