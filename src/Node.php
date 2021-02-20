<?php

namespace App;

/**
 * Class Node
 * Represent a node inside a binary tree
 */
class Node
{
    /**
     * @var mixed
     */
    private $key;

    /**
     * @var Node|null
     */
    private $left;

    /**
     * @var Node|null
     */
    private $right;

    /**
     * Construct an instance od a Node
     */
    public function __construct($key = null, $left = null, $right = null)
    {
        $this->key = $key;
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * Get the left child node
     * @return Node|null
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Get the right child node
     * @return Node|null
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Get the key child node
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Insert a node into the tree
     * @param mixed $key
     * @return Node
     */
    public function insert($key)
    {
        if (is_null($this->key)) {
            $this->key = $key;
        }
        if ($key > $this->key) {
            if (is_null($this->right)) {
                $this->right = new Node($key);
            }
            $this->right->insert($key);
        }
        if ($key < $this->key) {
            if (is_null($this->left)) {
                $this->left = new Node($key);
            }
            $this->left->insert($key);
        }
    }

    /**
     * The search in the tree
     * @param mixed $key
     * @return Node|null
     */
    public function search($key)
    {
        if ($key === $this->key) {
            return $this;
        }
        if ($key < $this->key && $this->left) {
            return $this->left->search($key);
        }
        if ($key > $this->key && $this->right) {
            return $this->right->search($key);
        }
        return null;
    }
}
