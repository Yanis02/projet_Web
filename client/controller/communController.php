<?php
require_once("./view/commun.php");
class communController{
    private $communView;
    public function __construct() {
        $this->communView = new Commun();
    }
    public function showSeparator(){
        
        $this->communView->separator();
    }
    public function showFooter(){
        $this->communView->footer();


    }
}

?>