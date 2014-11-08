<?php

//include '../Model/SearchResult.php';
//include '../Search.php';
//include '../class.user.php'
require_once 'utils.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$listCoordinators = User::listCoordinators();

//var_dump(($listCoordinators));

$search = new Search("Vlad Muresan");
$searchResults = $search->getSearchResults();

var_dump($searchResults);






?>