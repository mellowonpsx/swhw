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
    
    public function __construct($name, $url, $extraContent ) {
        $this->name = $name;
        $this->url = $url;
        $this->extraContent = $extraContent;
    }
    
    
    
    
}
