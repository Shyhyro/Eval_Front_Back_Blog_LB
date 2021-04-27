<?php

class CategoryController {

    /**
     * Search a category in table category
     * @param $id
     * @return Category
     */
    public function searchCategory($id): ?Category
    {
        $stmt = DB::getInstance()->prepare("SELECT * FROM category  WHERE id = '$id' LIMIT 1");
        $state = $stmt->execute();
        if($state) {
            $categoryData = $stmt->fetch();
            $category = new Category($categoryData['id'], $categoryData['category']);
        }
        else {
            $category = null;
        }
        return $category;
    }

    /*
     * Add a new category in table category
     */
    public function addCategory($category) :bool
    {
        $stmt = DB::getInstance()->prepare("INSERT INTO category (category) VALUES ('$category')");
        return $stmt->execute();
    }

}
