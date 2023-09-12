<?php
// check admin
require "adminCheak.php";
// delete writer
if(isset($_GET['wrid'])){
    require "../../Include/databaseConn.php";
    $id = $_GET['wrid'];
    $q = "delete from writers where id='{$id}' limit 1";
    $conn->query($q);
    if($conn->affected_rows){
        header("location: ../writers.php");
    } 
}
// delete book
if(isset($_GET['booid'])){
    require "../../Include/databaseConn.php";
    $id = $_GET['booid'];
    $q = "delete from books where id='{$id}' limit 1";
    $conn->query($q);
    if($conn->affected_rows){
        header("location: ../books.php");
    } 
}
// delete users
if(isset($_GET['userid'])){
    require "../../Include/databaseConn.php";
    $id = $_GET['userid'];
    $q = "delete from users where id='{$id}' limit 1";
    $conn->query($q);
    if($conn->affected_rows){
        header("location: ../users.php");
    } 
};
// delete massage
if(isset($_GET['mgsid'])){
    require "../../Include/databaseConn.php";
    $id = $_GET['mgsid'];
    $q = "delete from contacts where id='{$id}' limit 1";
    $conn->query($q);
    if($conn->affected_rows){
        header("location: ../contacts.php");
    } 
};