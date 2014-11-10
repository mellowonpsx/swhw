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
   
            
    function __construct($searchItem) {
        
        //$this->searchItem = $searchItem;
        $this->searchItems = explode( " " , $searchItem);
        
        $this->coordinators = User::listCoordinators();
        
        $this->prjects = Projects::listAllProjects();
    }
    
    function getSearchResults(){
        
        $searchResults = array();
        
        //REMOVE COMMENT FORM HERE
//        
//        
//        
//        
//        foreach ($this->coordinators as $cKey => $coordinator) {
//            
//            //var_dump($cKey);
//            $urlForCoordinators = "---";// TODO TEMPORARY --- it should be initialized in constants.php
//            
//            $fullName = $coordinator->firstName." ".$coordinator->lastName;
//            $url = $urlForCoordinators+"/"+$coordinator->id;
//            
//            $firstNameAsArray = explode( " " , $coordinator->firstName);
//            
//            $searchResult = new SearchResult($fullName, $url);
//            //var_dump($firstNameAsArray);
//            $searchResult ->setNumberOfPossibleKeywordsHits((sizeof($firstNameAsArray) + 1)); // 1 means the lastName
//            
//            
//            // Starting to search through coordinators
//            
//            foreach ($this->searchItems as $searchItem) {
//                //strcasecmp($coordinator->lastName, $keyword) ;
//                
//                if(strcasecmp($coordinator->lastName, $searchItem) == 0 /*$coordinator->lastName === $keyword*/){     
//                    //echo 'ENTERED!!!';
//                    $searchResult->incrementKeyWordsHits();      
//                }
//                
//                
//                foreach ($firstNameAsArray as $fName) {
//                    if(strcasecmp($fName, $searchItem) == 0/*$fName === $keyword*/){     
//                        $searchResult->incrementKeyWordsHits();      
//                    }              
//                }
//                
//            } // end of checking every keyword
//            
//           
//                    
//            $searchResult->setKeywordsHitPercentage();
//            
//            if($searchResult->getKeywordsHitPercentage() > 0){
//                
//                array_push($searchResults, $searchResult);
//                
//            }
//            
//        }// end of itterating through coordinators
//        
//        
//        
//        
        
        
        
        //Starting to search through projects
        //TODO
        foreach ($this->prjects as $pKey => $project) {
            
            var_dump($project);
            $hits = array();
            
            
            $resultName = $project->title;
            $urlForProjects = "--Project--";// TODO TEMPORARY --- it should be initialized in constants.php
            $url = $urlForProjects+"/"+$project->id;
            
            
            $searchResult = new SearchResult($resultName, $url);
            
            $projectNameAsKeyWords = explode(" " , $project->title);
            
            $userById = User::getUserById($project->coordinatorId);
            $coordinatorFullName = $userById->firstName." ".$userById->lastName;
            $professorFullNameAsArrayOfStrings = explode(" ", $coordinatorFullName) ;
            
            $description = $project->description;
            
            //This can be generated dinamically by searching use of a ASCII table
            $unwantedChars = array(".", ",", ":", ";", "'", "\"", "?", "!", "$", "-");
            
            $description = str_replace($unwantedChars, "", $description);
            
            $descriptionAsArrayOfStrings = explode(" ", $description);
            
            $numberOfPossibleKeywordsHits =  0 ;
            $numberOfPossibleKeywordsHits += sizeof($project->keyword) ;
            $numberOfPossibleKeywordsHits += sizeof($projectNameAsKeyWords);
            $numberOfPossibleKeywordsHits += sizeof($professorFullNameAsArrayOfStrings);
            $numberOfPossibleKeywordsHits += sizeof($descriptionAsArrayOfStrings);
            
            //var_dump($firstNameAsArray);
            $searchResult ->setNumberOfPossibleKeywordsHits($numberOfPossibleKeywordsHits); 
            
           
            
            foreach ($this->searchItems as $searchItem) {
               
                //Searching through project NAME
                $this->searchThroughArrayOfKeyWords($projectNameAsKeyWords, $searchItem, $searchResult, $hits);
//                foreach ($projectNameAsKeyWords as $value) {
//                    
//                    if(strcasecmp($value, $searchItem) == 0){     
//                        //TODO maybe make that particular 
//                        //var_dump($searchItem."---".$value);
//                        $searchResult->incrementKeyWordsHits();     
//                        array_push($hits, $value);
//                    }
//                    
//                }
                
                //Searching through project KEYWORDS
                $this->searchThroughArrayOfKeyWords($project->keyword, $searchItem, $searchResult, $hits);
                
//                foreach ($project->keyword as $value) {
//                    
//                    if(strcasecmp($value, $searchItem) == 0){     
//                        //TODO maybe make that particular 
//                        //var_dump($searchItem."---".$value);
//                        $searchResult->incrementKeyWordsHits(); 
//                        array_push($hits, $value);
//                        //$extraContent .="<b>{$value} </b>";
//                    }//else{
//                        //$extraContent .="{$value} ";
//                   // }
//                    
//                }    
                    
                 //Searching through project COORDINATOR NAME
                 $this->searchThroughArrayOfKeyWords($professorFullNameAsArrayOfStrings, $searchItem, $searchResult, $hits);
                
//                foreach ($professorFullNameAsArrayOfStrings as $value) {
//                    
//                    if(strcasecmp($value, $searchItem) == 0){     
//                        //TODO maybe make that particular 
//                        //var_dump($searchItem."---".$value);
//                        $searchResult->incrementKeyWordsHits(); 
//                        array_push($hits, $value);
//                        
//                    }
//                    
//                }    
            
           
                
                    
            }//end of itterating through search items
            
             
            $extraContent = "" ;
            $coordinatorFullName = "";
            $description = "";
            
            $searchResult->setKeywordsHitPercentage();
            
             foreach ($project->keyword as $value) {
                 if(in_array($value, $hits)){
                 $extraContent .="<b>{$value}</b> ";
                    }else{
                        $extraContent .="{$value} ";
                    }
             }
            
            $searchResult->setExtraContent($extraContent);
            
            
            
            
            
            
            var_dump($professorFullNameAsArrayOfStrings);
            var_dump($hits);
            
            foreach ($professorFullNameAsArrayOfStrings as $value) {
                 if(in_array($value, $hits)){
                 $coordinatorFullName .="<b>{$value}</b> ";
                    }else{
                        $coordinatorFullName .="{$value} ";
                    }
             }
             var_dump($coordinatorFullName);

             $searchResult->setCoordinator($coordinatorFullName);
            
            
            
            if($searchResult->getKeywordsHitPercentage() > 0){
              
                array_push($searchResults, $searchResult);
              
            }
            
            
            
        } // end of itteating through projects
        
        
        //All search results added at this point
        
        
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
    
    //$arrayOfKeywors is the array of keywords related to the project (description, prof. name , project keywords)
    //$searchResult is the object of SearchResult type that we are currently building
    //&$searchItem is the search item in the search string for which we are currently comparing keywords
    //$hits is the hits array
    private function searchThroughArrayOfKeyWords($arrayOfKeywors, $searchItem, &$searchResult, &$hits){
        
        foreach ($arrayOfKeywors as $value) {
                    
                    if(strcasecmp($value, $searchItem) == 0){     
                        //TODO maybe make that particular 
                        //var_dump($searchItem."---".$value);
                        $searchResult->incrementKeyWordsHits();     
                        array_push($hits, $value);
                    }
                    
        }
    } //end of function searchThroughArrayOfKeyWords
    
    //TODO: Make function to return strign with found hits in bodld
}


