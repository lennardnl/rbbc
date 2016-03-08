<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 8-3-2016
 */

namespace RBBC;


abstract class StackNode
{
    /**
     * Node is of the token type
     */
    const TOKEN = 0;

    /**
     * Node is of the text type
     */
    const TEXT = 1;

    /**
     * Node is of a tag type
     */
    const TAG = 2;

    /**
     * Node is a class
     */
    const CLASSB = 3;
}