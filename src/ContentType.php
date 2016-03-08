<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 8-3-2016
 */

namespace RBBC;


abstract class ContentType
{

    /**
     * Content may not be provided by user
     */
    const PROHIBIT = -1;

    /**
     * Content is permitted, but not required
     */
    const OPTIONAL = 0;
    /**
     * Content is required and can't be empty or whitespace
     */
    const REQUIRED = 1;

    /**
     * Content is not BBCode
     */
    const VERBATIM = 2;
}