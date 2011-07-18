<?php
/**
 * File containing the ezcDocumentWikiToken struct
 *
 * @package Document
 * @version 1.3rc1
 * @copyright Copyright (C) 2005-2009 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

/**
 * Struct for Wiki document document tokens
 *
 * @package Document
 * @version 1.3rc1
 */
abstract class ezcDocumentWikiToken extends ezcBaseStruct
{
    /**
     * Token content
     *
     * @var mixed
     */
    public $content;

    /**
     * Line of the token in the source file
     *
     * @var int
     */
    public $line;

    /**
     * Position of the token in its line.
     *
     * @var int
     */
    public $position;

    /**
     * Construct Wiki token
     *
     * @ignore
     * @param string $content
     * @param int $line
     * @param int $position
     * @return void
     */
    public function __construct( $content, $line, $position = 0 )
    {
        $this->content  = $content;
        $this->line     = $line;
        $this->position = $position;
    }

    /**
     * Set state after var_export
     *
     * @param array $properties
     * @return void
     * @ignore
     */
    public static function __set_state( $properties )
    {
        return null;
    }
}

?>
