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
                $array[] = new Post($post['id'], $post['tittle'], $categoryFk->getCategory(), $post['date'], $post['resume'], $post['content'], $post['img'] );
            }
        }
        return $array;
    }

    /*
     * Get one post in DB
     */
    public function getOnePost($id): ?Post {
        $post = null;
        $stmt = DB::getInstance()->prepare("SELECT * FROM post WHERE id = '$id'");

        if($stmt->execute() && $data = $stmt->fetch()) {
                $postData = new CategoryController();
                $categoryFk = $postData->searchCategory($data['category_fk']);
                $post = new Post($data['id'], $data['tittle'], $categoryFk->getCategory(), $data['date'], $data['resume'], $data['content'], $data['img'] );
        }
        return $post;
    }

    /*
     * Add a new Post in table post
     */
    public function addPost($tittle, $category_fk, $resume, $content, $img) :bool
    {
        $stmt = DB::getInstance()->prepare("INSERT INTO post (tittle, category_fk, resume, content, img) VALUES ('$tittle', '$category_fk', '$resume', '$content', '$img')");
        return $stmt->execute();
    }

    /*
     * Update a Post in table post
     */
    public function updatePost($id, $tittle, $category_fk, $resume, $content, $img) :bool
    {
        $stmt = DB::getInstance()->prepare("UPDATE post SET tittle='$tittle', category_fk='$category_fk', resume='$resume', content='$content', img='$img' WHERE id = '$id'");
        return $stmt->execute();
    }

    /*
     * Delete a Post in table post
     */
    public function deletePost($id) :bool
    {
        $stmt = DB::getInstance()->prepare("DELETE FROM post WHERE id = '$id'");
        return $stmt->execute();
    }

    /**
     * Search a post in table post
     * @param $id
     * @return Post
     */
    public function searchPost($id): ?Post
    {
        $stmt = DB::getInstance()->prepare("SELECT * FROM post  WHERE id = '$id' LIMIT 1");
        $state = $stmt->execute();
        if($state) {
            $postData = $stmt->fetch();
            $post = new Post($postData['id']);
        }
        else {
            $post = null;
        }
        return $post;
    }

}
