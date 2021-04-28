<?php

class Post
{
    private ?int $id;
    private ?string $tittle;
    private ?string $category_fk;
    private ?string $date;
    private ?string $resume;
    private ?string $content;
    private ?string $img;

    /** post constructor.
     * @param int|null $id
     * @param string|null $tittle
     * @param string|null $category_fk
     * @param string|null $date
     * @param string|null $resume
     * @param string|null $content
     * @param string|null $img
     */
    public function __construct(int $id = null, string $tittle = null, string $category_fk = null, string $date = null, string $resume = null, string $content =null, string $img = null)
    {
        $this->id = $id;
        $this->tittle = $tittle;
        $this->category_fk = $category_fk;
        $this->date = $date;
        $this->resume = $resume;
        $this->content = $content;
        $this->img = $img;
    }

    /* Get id of post */
    public function getId(): ?int
    {
        return $this->id;
    }

    /* Get & set tittle of post */
    public function getTittle(): ?string
    {
        return $this->tittle;
    }

    public function setTittle($tittle): Post
    {
        $this->tittle = $tittle;
        return $this;
    }

    /* Get & set category of post */
    public function getCategory(): ?string
    {
        return $this->category_fk;
    }

    public function setCategory($category_fk): Post
    {
        $this->category_fk = $category_fk;
        return $this;
    }

    /* Get date of post */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /* Get & set resume of post */
    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume($resume): Post
    {
        $this->resume = $resume;
        return $this;
    }

    /* Get & set resume of post */
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent($content): Post
    {
        $this->content = $content;
        return $this;
    }

    /* Get & set resume of post */
    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg($img): Post
    {
        $this->img = $img;
        return $this;
    }

}
