<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 8-3-2016
 */

namespace RBBC;


class Mode
{
    /**
     * A simple replacement between bb and html
     */
    const SIMPLE = 0;

    /**
     * BBCode input (options) should be inserted in a template
     */
    const ENHANCED = 1;

    /**
     * The provided callback should be called
     */
    const CALLBACK = 2;

    /**
     * A library callback should be called
     */
    const LIBRARY = 3;
}