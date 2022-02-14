<?php 
namespace View;

class RegisterView{
    function __construct()
    {
        
    }
    function displayError($msg){
        print('<p>Error: '.$msg.'</p>');
    }
    function displayMsg($msg){
        print('<h4>Resultado: '.$msg.'</h4>');
    }
}
?>