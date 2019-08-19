<?php
namespace Ogurchik\gendiff;
use function Ogurchik\generateDiff\generateDiff;
use function Ogurchik\calc\kukla;

const DOC = <<<'DOCOPT'
Generate diff
Usage: 
    gendiff (-h|--help)
    gendiff (-v|--version)
    gendiff (--format <fmt>)
    gendiff (--where <path>)
    gendiff (<path> <path>)
Options:
    -h --help                     Show this screen
    -v --version                  Show version
    --format <fmt>                Report format [default: pretty]
    --where  <path>                     Show where this program launch
DOCOPT;
$result = \Docopt::handle(DOC, array('version'=>'0.0.1'));
//foreach ($result as $k=>$v)
    //echo $k.': '.json_encode($v).PHP_EOL;
