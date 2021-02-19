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
        if ($this->key === null) {
            $this->key = $key;
        }
        if ($key > $this->key && $this->right === null) {
            $this->right = new Node($key);
        }
        if ($key > $this->key && $this->right !== null) {
            $this->right->insert($key);
        }
        if ($key < $this->key && $this->left === null) {
            $this->left = new Node($key);
        }
        if ($key < $this->key && $this->left !== null) {
            $this->left->insert($key);
        }
    }
}
