<?php

class MessageController{

    /*
     * Get all message for a post in DB
     */
    public function getAllMessage($postId): array {
        $array = [];
        $stmt = DB::getInstance()->prepare("SELECT * FROM commentary WHERE post_fk = $postId");

        if($stmt->execute()) {
            foreach ($stmt->fetchAll() as $message) {
                $postData = new PostController();
                $postFk = $postData->searchPost($message['post_fk']);
                $userData = new UserController();
                $userFk = $userData->searchUser($message['user_fk']);
                $array[] = new Message($message['id'], $userFk->getId(), $message['content'], $postFk->getId());
            }
        }
        return $array;
    }

    /*
     * Add a new message for post in table commentary
     */
    public function addMessage($user_fk, $message, $post_fk) :bool
    {
        $stmt = DB::getInstance()->prepare("INSERT INTO commentary (user_fk, content, post_fk) VALUES ('$user_fk', '$message', '$post_fk')");
        return $stmt->execute();
    }

    /*
     * Delete a message for post in table commentary
     */
    public function deleteMessage($id) :bool
    {
        $stmt = DB::getInstance()->prepare("DELETE FROM commentary  WHERE id = '$id'");
        return $stmt->execute();
    }

}