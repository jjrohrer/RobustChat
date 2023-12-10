<?php
declare(strict_types=1);
require_once (__DIR__.'/../vendor/autoload.php');
use League\CommonMark\CommonMarkConverter;
$output = (new CommonMarkConverter())->convert(file_get_contents('./readme.md'))->getContent();
print $output;
