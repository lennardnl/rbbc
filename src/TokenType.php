<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 8-3-2016
 */

namespace RBBC;


abstract class TokenType
{
    /**
     * The token is end of input
     */
    const EOI = 0;

    /**
     * A non-newline whitespace token
     */
    const WS = 1;

    /**
     * A single new-line
     */
    const NL = 2;

    /**
     * A non-whitespace non-tag plain text
     */
    const TEXT = 3;

    /**
     * A tag
     */
    const TAG = 4;

    /**
     * An ending tag
     */
    const ENDTAG = 5;
}