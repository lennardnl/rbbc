<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 8-3-2016
 */

namespace RBBC;


abstract class LexState
{
    /**
     * Next token is plain text
     */
    const TEXT = 0;

    /**
     * Next token is tag
     */
    const TAG = 1;
}