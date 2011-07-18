<?php
/**
 * File containing the ezcDocumentDocbookToHtmlMappingHandler class.
 *
 * @package Document
 * @version 1.3rc1
 * @copyright Copyright (C) 2005-2009 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

/**
 * Simple mapping handler
 *
 * Special visitor for elements which just need trivial mapping of element
 * tag names. It ignores all attributes of the input element and just
 * converts the tag name.
 *
 * @package Document
 * @version 1.3rc1
 */
class ezcDocumentDocbookToHtmlMappingHandler extends ezcDocumentDocbookToHtmlBaseHandler
{
    /**
     * Mapping of element names.
     *
     * Element tag name mapping for elements, which just require trivial
     * mapping used by the visitWithMapper() method.
     *
     * @var array
     */
    protected $mapping = array(
        'article'      => 'body',
        'book'         => 'body',
        'literal'      => 'code',
        'itemizedlist' => 'ul',
        'orderedlist'  => 'ol',
        'listitem'     => 'li',
        'beginpage'    => 'hr',
        'variablelist' => 'dl',
        'table'        => 'table',
        'tbody'        => 'tbody',
        'thead'        => 'thead',
        'row'          => 'tr',
    );

    /**
     * Handle a node
     *
     * Handle / transform a given node, and return the result of the
     * conversion.
     *
     * @param ezcDocumentElementVisitorConverter $converter
     * @param DOMElement $node
     * @param mixed $root
     * @return mixed
     */
    public function handle( ezcDocumentElementVisitorConverter $converter, DOMElement $node, $root )
    {
        if ( !isset( $this->mapping[$node->tagName] ) )
        {
            $converter->triggerError( E_WARNING,
                "Mapping handler used for element '{$node->tagName}', not known by the mapping handler."
            );
            return $root;
        }

        $element = $root->ownerDocument->createElement( $this->mapping[$node->tagName] );
        $root->appendChild( $element );

        // Recurse
        $converter->visitChildren( $node, $element );
        return $root;
    }
}

?>
