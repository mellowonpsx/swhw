<?php
require_once 'utils.php';

$res = Projects::listAviableProjects();
var_dump($res);

/*$category_array = array();
if(isset($_POST["category"]))
{
    global $db;
    $json_array = json_decode($_POST["category"]);
    foreach ($json_array as $category)
    {
        $category_array[$category->id] = objectToArray($category);
    }
}//get category from POST

$pageNumber = 1;
if(isset($_POST["pageNumber"]))
{
    $pageNumber = $db->escape(filter_var( $_POST["pageNumber"], FILTER_SANITIZE_NUMBER_INT));
}

$searchQuery = NULL;
if(isset($_POST["searchQuery"]))
{
    $searchQuery = $db->escape(filter_var( $_POST["searchQuery"], FILTER_SANITIZE_STRING));
}

$yearLimit = NULL;
if(isset($_POST["yearLimit"]))
{
    $yearLimit = $db->escape(filter_var( $_POST["yearLimit"], FILTER_SANITIZE_NUMBER_INT));
}

$documentPerPage = $config->getParam("documentPerPage");
$startLimit = ($pageNumber-1)*$documentPerPage;
$endLimit = $pageNumber*$documentPerPage;

$user = getSessionUser();
if($user != NULL)
{
    if($user->isAdmin())
    {
        //admin shows all
        //echo json_encode(Document::getDocumentList(0, 1000, Category::getCategoryList(), true, NULL, NULL));
        //echo json_encode(Document::getDocumentList(0, 1000, $category_array, true, NULL, NULL));
        $result_array = Document::getDocumentList($startLimit, $endLimit, $category_array, true, $user, $yearLimit, $searchQuery);
    }
    else //logged show public and his his own file 
    {
        //echo json_encode(Document::getDocumentList(0, 1000, Category::getCategoryList(), false, $user->getUserId(), NULL));
        //echo json_encode(Document::getDocumentList(0, 1000, $category_array, false, $user->getUserId(), NULL));
        $result_array = Document::getDocumentList($startLimit, $endLimit, $category_array, false, $user, $yearLimit, $searchQuery);
    }
}
else //user = null => not logged (?)
{
    //echo json_encode(Document::getDocumentList(0, 1000, Category::getCategoryList(), false, NULL, NULL));
    //echo json_encode(Document::getDocumentList(0, 1000, $category_array, false, NULL, NULL));
    $result_array = Document::getDocumentList($startLimit, $endLimit, $category_array, false, NULL, $yearLimit, $searchQuery);
}
echo json_ok($result_array);
exit();*/