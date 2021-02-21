<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\BinaryTree;

class BinaryTreeTest extends TestCase
{
    protected function setUp(): void
    {
        $this->tree = new BinaryTree(
            9,
            new BinaryTree(
                4,
                new BinaryTree(3),
                new BinaryTree(
                    6,
                    new BinaryTree(5),
                    new BinaryTree(7)
                )
            ),
            new BinaryTree(
                17,
                null,
                new BinaryTree(
                    22,
                    null,
                    new BinaryTree(23)
                )
            )
        );
    }

    public function testMethods()
    {
        $this->assertEquals(9, $this->tree->getCount());
        $this->assertEquals(96, $this->tree->getSum());
        $this->assertEquals([9, 4, 3, 6, 5, 7, 17, 22, 23], $this->tree->toArray());
        $this->assertEquals('(9, 4, 3, 6, 5, 7, 17, 22, 23)', $this->tree->toString());
    }
}
