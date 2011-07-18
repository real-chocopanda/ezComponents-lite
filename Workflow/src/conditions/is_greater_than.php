<?php
/**
 * File containing the ezcWorkflowConditionIsGreaterThan class.
 *
 * @package Workflow
 * @version 1.4rc1
 * @copyright Copyright (C) 2005-2009 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

/**
 * Condition that evaluates to true if the provided value is greater than the reference value.
 *
 * Typically used together with ezcWorkflowConditionVariable to use the
 * condition on a workflow variable.
 *
 * <code>
 * <?php
 * $condition = new ezcWorkflowConditionVariable(
 *   'variable name',
 *   new ezcWorkflowConditionIsGreatherThan( $comparisonValue )
 * );
 * ?>
 * </code>
 *
 * @package Workflow
 * @version 1.4rc1
 */
class ezcWorkflowConditionIsGreaterThan extends ezcWorkflowConditionComparison
{
    /**
     * Textual representation of the comparison operator.
     *
     * @var mixed
     */
    protected $operator = '>';

    /**
     * Evaluates this condition with $value and returns true if $value is greather than
     * the reference value or false if not.
     *
     * @param  mixed $value
     * @return boolean true when the condition holds, false otherwise.
     * @ignore
     */
    public function evaluate( $value )
    {
        return $value > $this->value;
    }
}
?>