<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'utils.php';

global $projectsDB;

$xsl = simplexml_load_file('xls/example.xls');
$xslt = new XSLTProcessor;
$xslt->importStyleSheet($xsl);
 
echo $xslt->transformToXML($projectsDB);