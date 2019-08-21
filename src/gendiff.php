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
    gendiff (<path1> <path2>)
Options:
    -h --help                     Show this screen
    -v --version                  Show version
    --format <fmt>                Report format [default: pretty]
    --where  <path>                     Show where this program launch
DOCOPT;
function parser()
{
    $result = \Docopt::handle(DOC, array('version'=>'0.0.1'));
    if ($result["--where"]) {
        print_r("gugenotu=y");
    }
    if ($result["<path1>"] && $result["<path2>"]) {
        try {
            generateDiff($result["<path1>"], $result["<path2>"]);
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}
