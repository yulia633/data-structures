<?php

namespace App;

/**
 * Class Node
 * The node inside a binary tree
 */
class Node
{
    private $key;
    private $left;
    private $right;

    public function __construct($key = null, $left = null, $right = null)
    {
        $this->key = $key;
        $this->left = $left;
        $this->right = $right;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function getKey()
    {
        return $this->key;
    }

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
}
