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


include './Model/SearchResult.php';
include './class.user.php';

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
        
    }
    
    function getSearchResults(){
        
        foreach ($this->coordinators as $cKey => $coordinator) {
            
            $fullName = $coordinator->firstName." ".$coordinator->lastName;
            $url = $urlForCoordinators+"/"+$coordinator->id;
            
            $firstNameAsArray = explode($coordinator->firstName, " ");
            
            $SearchResult = new SearchResult($fullName, $url);
            $SearchResult ->setNumberOfPossibleKeywordsHits(sizeof($firstNameAsArray) + 1); // 1 means the lastName
            
            
            // Starting to search through coordinators
            
            foreach ($this->keywords as $keyword) {
                
                if($coordinator->lastName === $keyword){     
                    $SearchResult->incrementKeyWordsHits();      
                }
                
                
                
                foreach ($firstNameAsArray as $fName) {
                    if($fName === $keyword){     
                        $SearchResult->incrementKeyWordsHits();      
                    }              
                }
                
            } // end of checking every keyword
            
            $SearchResult->
                    
            $SearchResult->setHeywordsHitPercentage();
            
            
        }// end of itterating through coordinators
        
        
        // Starting to search through projects
        
        foreach ($this->prjects as $pKey => $value) {
            
            
            
        }
        
        
        
    }
    
    
    
}
