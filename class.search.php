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
        $this->keywords = explode( " " , $searchItem);
        $this->coordinators = User::listCoordinators();
    }
    
    function getSearchResults(){
        
        $searchResults = array();
        
        foreach ($this->coordinators as $cKey => $coordinator) {
            
            var_dump($cKey);
            
            $urlForCoordinators = "---";// TEMPORARY --- it should be initialized in constants.php
            
            $fullName = $coordinator->firstName." ".$coordinator->lastName;
            $url = $urlForCoordinators+"/"+$coordinator->id;
            
            $firstNameAsArray = explode( " " , $coordinator->firstName);
            
            $searchResult = new SearchResult($fullName, $url);
            //var_dump($firstNameAsArray);
            $searchResult ->setNumberOfPossibleKeywordsHits((sizeof($firstNameAsArray) + 1)); // 1 means the lastName
            
            
            // Starting to search through coordinators
            
            foreach ($this->keywords as $keyword) {
                //strcasecmp($coordinator->lastName, $keyword) ;
                
                if(strcasecmp($coordinator->lastName, $keyword) == 0 /*$coordinator->lastName === $keyword*/){     
                    //echo 'ENTERED!!!';
                    $searchResult->incrementKeyWordsHits();      
                }
                
                
                foreach ($firstNameAsArray as $fName) {
                    if(strcasecmp($fName, $keyword) == 0/*$fName === $keyword*/){     
                        $searchResult->incrementKeyWordsHits();      
                    }              
                }
                
            } // end of checking every keyword
            
           
                    
            $searchResult->setKeywordsHitPercentage();
            
            if($searchResult->getKeywordsHitPercentage() > 0){
                
                array_push($searchResults, $searchResult);
                
            }
            
        }// end of itterating through coordinators
        
        
        
        
        
        
        
        // Starting to search through projects
        //NOT IMPLEMENTED YET
        //TODO
        
        foreach ($this->prjects as $pKey => $value) {
            
            
            
        }
        
        
        
        function compareSearchResult($a, $b)
        {
            //This is so that it will sort DESCENDING
            $aux = $b->getKeywordsHitPercentage() - $a->getKeywordsHitPercentage();
            //var_dump($aux);
            
            if ($aux < 0) {
                $aux = -1;
            } else if ($aux > 0) {
                $aux = 1;
            } else {
                $aux = 0;
            }

            return ($aux);  //strcmp($a->name, $b->name);
            
            
        }           

        //var_dump($searchResults);
        usort($searchResults, "compareSearchResult");
        
        return  $searchResults;
        
    }
    
    
    
}
