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
        $this->searchItems = explode(" ", $searchItem);

        $this->coordinators = User::listCoordinators();

        $this->prjects = Projects::listAllProjects();
    }

    function getSearchResults() {

        $searchResults = array();


        //Starting to search through projects
        foreach ($this->prjects as $pKey => $project) {

            //var_dump($project);
            $hits = array();


            $resultName = $project->title;
            $urlForProjects = "--Project--"; // TODO TEMPORARY --- it should be initialized in constants.php
            $url = $urlForProjects + "/" + $project->id;


            $searchResult = new SearchResult($resultName, $url);

            $projectNameAsKeyWords = explode(" ", $project->title);

            $userById = User::getUserById($project->coordinatorId);
            $coordinatorFullName = $userById->firstName . " " . $userById->lastName;
            $professorFullNameAsArrayOfStrings = explode(" ", $coordinatorFullName);

            $description = $project->description;
            //var_dump($description);
            //This can be generated dinamically by searching use of a ASCII table
            $unwantedChars = array(".", ",", ":", ";", "'", "\"", "?", "!", "$", "-");

            $descriptionWithoutUnwantedCHars = str_replace($unwantedChars, "", $description);
            //var_dump($descriptionWithoutUnwantedCHars);
            $descriptionAsArrayOfStrings = explode(" ", $descriptionWithoutUnwantedCHars);

            $numberOfPossibleKeywordsHits = 0;
            $numberOfPossibleKeywordsHits += sizeof($project->keyword);
            $numberOfPossibleKeywordsHits += sizeof($projectNameAsKeyWords);
            $numberOfPossibleKeywordsHits += sizeof($professorFullNameAsArrayOfStrings);
            $numberOfPossibleKeywordsHits += sizeof($descriptionAsArrayOfStrings);

            //var_dump($firstNameAsArray);
            $searchResult->setNumberOfPossibleKeywordsHits($numberOfPossibleKeywordsHits);



            foreach ($this->searchItems as $searchItem) {

                //Searching through project NAME
                $this->searchThroughArrayOfKeyWords($projectNameAsKeyWords, $searchItem, $searchResult, $hits);

                //Searching through project KEYWORDS
                $this->searchThroughArrayOfKeyWords($project->keyword, $searchItem, $searchResult, $hits);

                //Searching through project COORDINATOR NAME
                $this->searchThroughArrayOfKeyWords($professorFullNameAsArrayOfStrings, $searchItem, $searchResult, $hits);

                //Searching through project DESCRIPTION
                $this->searchThroughArrayOfKeyWords($descriptionAsArrayOfStrings, $searchItem, $searchResult, $hits);
            }//end of itterating through search items

            $hits = array_unique($hits);

            $extraContent = ""; // PROJECT KEYWORDS
            //$coordinatorFullName = "";
            //$description = "";

            $searchResult->setKeywordsHitPercentage();

            foreach ($project->keyword as $value) {
                $extraContent.=$value . " ";
            }

            trim($extraContent);

            $extraContent = $this->getHitsInBoldFromText($extraContent, $hits);
            $searchResult->setExtraContent($extraContent);


            $coordinatorFullName = $this->getHitsInBoldFromText($coordinatorFullName, $hits);
            //var_dump($coordinatorFullName);
            $searchResult->setCoordinator($coordinatorFullName);

            $description = $this->getHitsInBoldFromText($description, $hits);
            //var_dump($description);
            $searchResult->setDescription($description);



            if ($searchResult->getKeywordsHitPercentage() > 0) {

                array_push($searchResults, $searchResult);
            }
        } // end of itteating through projects
        //All search results added at this point


        function compareSearchResult($a, $b) {
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
        return $searchResults;
    }

    //$arrayOfKeywors is the array of keywords related to the project (description, prof. name , project keywords)
    //$searchResult is the object of SearchResult type that we are currently building
    //&$searchItem is the search item in the search string for which we are currently comparing keywords
    //$hits is the hits array
    private function searchThroughArrayOfKeyWords($arrayOfKeywors, $searchItem, &$searchResult, &$hits) {

        foreach ($arrayOfKeywors as $value) {

            if (strcasecmp($value, $searchItem) == 0) {
                //TODO maybe make that particular 
                //var_dump($searchItem."---".$value);
                $searchResult->incrementKeyWordsHits();
                array_push($hits, (string) $value);
            }
        }
    }

//end of function searchThroughArrayOfKeyWords
    //DONE: Make function to return string with found hits in bold
    private function getHitsInBoldFromText($originalText, $hits) {

        foreach ($hits as $hit) {
            $originalText = str_replace($hit, "<b>{$hit}</b>", $originalText);
        }

        return $originalText; // the original text might be modified
    }

// end of private function getHitsInBoldFromText
}
