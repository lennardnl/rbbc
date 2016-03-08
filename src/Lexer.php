<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 8-3-2016
 */

namespace RBBC;


class Lexer
{
    private $returnToken;
    private $tokenText;
    private $tokenTag;

    private $originalText;
    private $tagMarker;
    private $endTagMarker;

    private $regexMarker;
    private $endRegexMarker;

    private $tokens;
    private $readPointer;
    private $inVerbatimMode;
    private $lexerState;

    private $mainPattern;

    public function __construct($tagMarker = '[', $endTagMarker = ']') {
        $this->tagMarker = $tagMarker;
        $this->endTagMarker = $endTagMarker;
    }

    public function setInput($input) {
        $this->originalText = $input;
    }

    public function tokanize() {
        $regexBeginMarkers = Array( '[' => '\[', '<' => '<', '{' => '\{', '(' => '\(' );
        $regexEndMarkers   = Array( ']' => '\]', '>' => '>', '}' => '\}', ')' => '\)' );

        $e = (!isset($regexEndMarkers[$this->endTagMarker]) ? '[' : $regexEndMarkers[$this->endTagMarker]);
        $b = (!isset($regexBeginMarkers[$this->tagMarker]) ? ']': $regexBeginMarkers[$this->tagMarker]);

        $this->mainPattern = "/( "
            // Match tags, as long as they do not start with [-- or [' or [!-- or [rem or [[.
            // Tags may contain "quoted" or 'quoted' sections that may contain [ or ] characters.
            // Tags may not contain newlines.
            . "{$b}"
            . "(?! -- | ' | !-- | {$b}{$b} )"
            . "(?: [^\\n\\r{$b}{$e}] | \\\" [^\\\"\\n\\r]* \\\" | \\' [^\\'\\n\\r]* \\' )*"
            . "{$e}"

            // Match wiki-links, which are of the form [[...]] or [[...|...]].  Unlike
            // tags, wiki-links treat " and ' marks as normal input characters; but they
            // still may not contain newlines.
            //. "| {$b}{$b} (?: [^{$e}\\r\\n] | {$e}[^{$e}\\r\\n] ){1,256} {$e}{$e}"

            // Match single-line comments, which start with [-- or [' or [rem .
            //. "| {$b} (?: -- | ' ) (?: [^{$e}\\n\\r]* ) {$e}"

            // Match multi-line comments, which start with [!-- and end with --] and contain
            // no --] in between.
            //. "| {$b}!-- (?: [^-] | -[^-] | --[^{$e}] )* --{$e}"

            // Match five or more hyphens as a special token, which gets returned as a [rule] tag.
            //. "| -----+"

            // Match newlines, in all four possible forms.
            . "| \\x0D\\x0A | \\x0A\\x0D | \\x0D | \\x0A"

            // Match whitespace, but only if it butts up against a newline, rule, or
            // bracket on at least one end.
            . "| [\\x00-\\x09\\x0B-\\x0C\\x0E-\\x20]+(?=[\\x0D\\x0A{$b}]|-----|$)"
            . "| (?<=[\\x0D\\x0A{$e}]|-----|^)[\\x00-\\x09\\x0B-\\x0C\\x0E-\\x20]+"

            . " )/Dx";

        $this->tokens = preg_split($this->mainPattern, $this->originalText, -1, PREG_SPLIT_DELIM_CAPTURE);

        // Current lexing state.
        $this->readPointer = 0;
        $this->lexerState = LexState::TEXT;
        $this->inVerbatimMode = false;

        // Return values.
        $this->returnToken = TokenType::EOI;
        $this->tokenText = "";
        $this->tokenTag = null;
    }

    public function getTokens() {
        return $this->tokens;
    }


    public function getNextToken() {
        return $this->tokens[$this->readPointer];
    }

    public function setNextToken() {

    }

    public function goNextToken() {

    }

    public function goPreviousToken() {

    }

    public function saveState() {

    }

    public function loadState() {

    }



}