<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 *
 * @author Vlad
 */


//include './Model/SearchResult.php';
//include './class.user.php';

class Search {
    //put your code here
    private $searchItems;
    
    private $prjects;
    private $coordinators;
            
    //private $searchItem;
    private $keywords;
            
    function __construct($searchItem) {
        
        //$this->searchItem = $searchItem;
        $this->keywords = explode($searchItem, " ");
        $this->coordinators = User::listCoordinators();
    }
    
    function getSearchResults(){
        
        $searchResults = array();
        
        foreach ($this->coordinators as $cKey => $coordinator) {
            
            var_dump($cKey);
            
            $urlForCoordinators = "---";// TEMPORARY --- it should be initialized in constants.php
            
            $fullName = $coordinator->firstName." ".$coordinator->lastName;
            $url = $urlForCoordinators+"/"+$coordinator->id;
            
            $firstNameAsArray = explode($coordinator->firstName, " ");
            
            $searchResult = new SearchResult($fullName, $url);
            $searchResult ->setNumberOfPossibleKeywordsHits(sizeof($firstNameAsArray) + 1); // 1 means the lastName
            
            
            // Starting to search through coordinators
            
            foreach ($this->keywords as $keyword) {
                
                if($coordinator->lastName === $keyword){     
                    $searchResult->incrementKeyWordsHits();      
                }
                
                
                
                foreach ($firstNameAsArray as $fName) {
                    if($fName === $keyword){     
                        $searchResult->incrementKeyWordsHits();      
                    }              
                }
                
            } // end of checking every keyword
            
            //$SearchResult->
                    
            $searchResult->setKeywordsHitPercentage();
            
            if($searchResult->getKeywordsHitPercentage() > 0){
                
                array_push($searchResults, $searchResult);
                
            }
            
        }// end of itterating through coordinators
        
        
        
        
        
        
        
        // Starting to search through projects
        //NOT IMPLEMENTED YET
        //TODO
        
//        foreach ($this->prjects as $pKey => $value) {
//            
//            
//            
//        }
        
        return  $searchResults;
        
    }
    
    
    
}
