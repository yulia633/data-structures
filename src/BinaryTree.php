<?php

namespace App;

/**
 * Class BinaryTree
 * Represent an aggregation of data in a binary tree
 */
class BinaryTree extends Node
{
    /**
     * Create node
     * param  array $node
     * @param  array $acc
     * @return Node|null
     */
    public function makeNode($tree, $acc = [])
    {
        $formattedData = [$tree];
        return array_reduce($formattedData, function ($newAcc, $node) use ($acc) {
            if (!is_null($node->key)) {
                $acc[] = $node->key;
            }
            if (!is_null($node->left)) {
                $acc[] = $this->makeNode($node->left, $newAcc);
            }
            if (!is_null($node->right)) {
                $acc[] = $this->makeNode($node->right, $newAcc);
            }
            return $acc;
        }, $acc);
    }

    /**
     * Get all keys in the tree
     */
    public function getKeysTree()
    {
        $tree = new Node($this->key, $this->left, $this->right);
        $allNodes = $this->makeNode($tree, []);
        $flatten = $this->flatten($allNodes);
        return array_unique($flatten);
    }

    /**
     * Recursive flatten tree
     */
    public function flatten($tree)
    {
        if (!is_array($tree)) {
            return [$tree];
        }
        return array_reduce($tree, function ($acc, $item) {
            return array_merge($acc, $this->flatten($item));
        }, []);
    }

    /**
     * Count numbers of node in the tree
     */
    public function getCount()
    {
        return count($this->getKeysTree());
    }

    /**
     * Sum numbers in the tree
     */
    public function getSum()
    {
        return array_sum($this->getKeysTree());
    }

    /**
     * Tree like an array
     */
    public function toArray()
    {
        return array_values($this->getKeysTree());
    }

    /**
     * Tree like a string
     */
    public function toString()
    {
        return '(' . implode(', ', $this->toArray()) . ')';
    }
}
