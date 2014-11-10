<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchResult
 *
 * @author Vlad
 */
class SearchResult {
    //put your code here
    
    private $name;
    private $url;
    private $extraContent;
    
    private $numberOfPossibleKeywordsHits; // 
    private $keywordsHits ;
    private $keywordsHitPercentage;
    
    private $coordinator;
    private $description;


    public function __construct($name, $url/*, $extraContent */) {
        $this->name = $name;
        $this->url = $url;
        $this->keywordsHits = 0;
        //$this->extraContent = $extraContent;
    }
    
    public function setNumberOfPossibleKeywordsHits($value) {
        $this->numberOfPossibleKeywordsHits = $value;
    }
    
    public function incrementKeyWordsHits(){
        $this->keywordsHits ++;
        //var_dump($this->keywordsHits);
    }
   
    public function setKeywordsHitPercentage(){
        $this->keywordsHitPercentage = $this->keywordsHits / $this->numberOfPossibleKeywordsHits;
    }
    
    public function setExtraContent($extraContent) {
        $this->extraContent = $extraContent;
    }

    public function getName() {
        return $this->name;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getExtraContent() {
        return $this->extraContent;
    }

    
    public function getKeywordsHitPercentage() {
        
        return $this->keywordsHitPercentage;
    }


    //public function compare()

    public function getCoordinator() {
        return $this->coordinator;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setCoordinator($coordinator) {
        $this->coordinator = $coordinator;
    }

    public function setDescription($description) {
        $this->description = $description;
    }


    
    
}
