<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Node;

class NodeTest extends TestCase
{
    public function testGetters()
    {
        $tree = new Node(9, new Node(4), new Node(17));

        $this->assertEquals(9, $tree->getKey());
        $this->assertEquals(4, $tree->getLeft()->getKey());
        $this->assertEquals(17, $tree->getRight()->getKey());
    }

    public function testEmptyTree()
    {
        $tree = new Node();
        $this->assertNull($tree->getKey());
        $this->assertNull($tree->getLeft());
        $this->assertNull($tree->getRight());
    }

    public function testInsert()
    {
        $tree = new Node();
        $tree->insert(9);
        $tree->insert(17);
        $tree->insert(4);
        $tree->insert(3);
        $tree->insert(6);
        $tree->insert(22);
        $tree->insert(5);
        $tree->insert(7);
        $tree->insert(20);
        $tree->insert(4);
        $tree->insert(3);

        $this->assertEquals(9, $tree->getKey());

        $this->assertEquals(4, $tree->getLeft()->getKey());

        $this->assertEquals(3, $tree->getLeft()->getLeft()->getKey());
        $this->assertNull($tree->getLeft()->getLeft()->getLeft());
        $this->assertNull($tree->getLeft()->getLeft()->getRight());

        $this->assertEquals(6, $tree->getLeft()->getRight()->getKey());

        $this->assertEquals(5, $tree->getLeft()->getRight()->getLeft()->getKey());
        $this->assertNull($tree->getLeft()->getRight()->getLeft()->getLeft());
        $this->assertNull($tree->getLeft()->getRight()->getLeft()->getRight());

        $this->assertEquals(7, $tree->getLeft()->getRight()->getRight()->getKey());
        $this->assertNull($tree->getLeft()->getRight()->getRight()->getLeft());
        $this->assertNull($tree->getLeft()->getRight()->getRight()->getRight());

        $this->assertEquals(17, $tree->getRight()->getKey());
        $this->assertNull($tree->getRight()->getLeft());

        $this->assertEquals(22, $tree->getRight()->getRight()->getKey());
        $this->assertNull($tree->getRight()->getRight()->getRight());

        $this->assertEquals(20, $tree->getRight()->getRight()->getLeft()->getKey());
        $this->assertNull($tree->getRight()->getRight()->getLeft()->getLeft());
        $this->assertNull($tree->getRight()->getRight()->getLeft()->getRight());
    }

    public function testSearch()
    {
        $expected1 = new Node(5);
        $expected2 = new Node(22, new Node(20), null);
        $tree = new Node(
            9,
            new Node(
                4,
                new Node(3),
                new Node(
                    6,
                    $expected1,
                    new Node(7)
                )
            ),
            new Node(
                17,
                null,
                $expected2
            )
        );

        $this->assertEquals($expected1, $tree->search(5));
        $this->assertEquals($expected2, $tree->search(22));
        $this->assertNull($tree->search(35));
        $this->assertNull($tree->search(2));
    }

    public function testSearchAlgorithm()
    {
        $tree = new Node(
            9,
            new Node(
                4,
                new Node(
                    6,
                    new Node(5),
                    new Node(7)
                ),
                new Node(3)
            ),
            new Node(
                17,
                null,
                new Node(
                    22,
                    null,
                    new Node(20)
                )
            )
        );

        $this->assertNull($tree->search(5));
        $this->assertNull($tree->search(7));
        $this->assertNull($tree->search(6));
        $this->assertEquals(4, $tree->search(4)->getKey());
        $this->assertEquals(22, $tree->search(22)->getKey());
    }
}
