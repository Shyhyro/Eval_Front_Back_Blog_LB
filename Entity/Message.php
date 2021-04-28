<?php

class Message {

    private ?int $id;
    private ?int $user_fk;
    private ?string $content;
    private ?int $post_fk;

    /**
     * User constructor.
     * @param int|null $id
     * @param int|null $user_fk
     * @param string|null $content
     * @param int|null $post_fk
     */
    public function __construct(int $id = null, int $user_fk = null, string $content = null, int $post_fk = null)
    {
        $this->id = $id;
        $this->user_fk = $user_fk;
        $this->content = $content;
        $this->post_fk = $post_fk;
    }

    /**
     * Return id
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /* Get & set user of message */
    public function getUser(): ?int
    {
        return $this->user_fk;
    }

    public function setUser($user_fk): Message
    {
        $this->user_fk = $user_fk;
        return $this;
    }

    /* Get & set content of message */
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent($content): Message
    {
        $this->content = $content;
        return $this;
    }

    /* Get & set post of message */
    public function getPost(): ?int
    {
        return $this->post_fk;
    }

    public function setPost($post_fk): Message
    {
        $this->post_fk = $post_fk;
        return $this;
    }

}