<?php

class Category {

    private ?int $id;
    private ?string $category;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $category
     */
    public function __construct(int $id = null, string $category = null)
    {
        $this->id = $id;
        $this->category = $category;
    }

    /**
     * Return id
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return category
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * Set the name of Category
     * @param string|null $category
     */
    public function setCategory(?string $category): Category
    {
        $this->category = $category;
        return $this;
    }

}