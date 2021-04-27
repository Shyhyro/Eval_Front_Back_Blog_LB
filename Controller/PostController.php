<?php

class PostController
{
    /*
     * Get all post in DB
     */
    public function getPost(): array {
        $array = [];
        $stmt = DB::getInstance()->prepare("SELECT * FROM post");

        if($stmt->execute()) {
            foreach ($stmt->fetchAll() as $post) {
                $postData = new CategoryController();
                $categoryFk = $postData->searchCategory($post['category_fk']);
                $array[] = new Post($post['id'], $post['tittle'], $categoryFk->getId(), $post['date'], $post['resume'], $post['content'] );
            }
        }
        return $array;
    }

    /*
     * Add a new Post in table post
     */
    public function addPost($tittle, $category_fk, $resume, $content) :bool
    {
        $stmt = DB::getInstance()->prepare("INSERT INTO post (tittle, category_fk, resume, content) VALUES ('$tittle', '$category_fk', '$resume', '$content')");
        return $stmt->execute();
    }

}
