<?php

/**
 * SCSSPHP
 *
 * @copyright 2012-2020 Leaf Corcoran
 *
 * @license http://opensource.org/licenses/MIT MIT
 *
 * @link http://scssphp.github.io/scssphp
 */

namespace ERROPiX\AdvancedScripts\ScssCompiler;

/**
 * Block
 *
 * @author Anthon Pang <anthon.pang@gmail.com>
 *
 * @internal
 */
class Block
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var \ERROPiX\AdvancedScripts\ScssCompiler\Block
     */
    public $parent;

    /**
     * @var string
     */
    public $sourceName;

    /**
     * @var integer
     */
    public $sourceIndex;

    /**
     * @var integer
     */
    public $sourceLine;

    /**
     * @var integer
     */
    public $sourceColumn;

    /**
     * @var array|null
     */
    public $selectors;

    /**
     * @var array
     */
    public $comments;

    /**
     * @var array
     */
    public $children;

    /**
     * @var \ERROPiX\AdvancedScripts\ScssCompiler\Block|null
     */
    public $selfParent;
}
