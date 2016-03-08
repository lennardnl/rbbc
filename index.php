<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 8-3-2016
 */

include('src/lexer.php');
include('src/LexState.php');
include('src/TokenType.php');

$lexer = new \RBBC\Lexer();
$lexer->setInput('Wat random tekst [i]\n [!-- comments --!][b]Dit is dikgedrukt[/b] [quote name="rik"]Dit is een quote[/quote]');
$lexer->tokanize();

header('content-type: application/json');
echo json_encode( $lexer->getTokens() );