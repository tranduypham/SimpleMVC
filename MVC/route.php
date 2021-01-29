<?php
class Route{
    public function run(){
        

        $defaultController = "Product";
        $Control = isset($_GET["control"])?$_GET["control"]:$defaultController;
        $Control = ucfirst($Control)."Controller";
        $Controller = new $Control();
        // echo "<br>". $Control;


        $defaultAction = "index";
        $Action = isset($_GET["action"])?$_GET["action"]:$defaultAction;
        $Controller -> $Action();
        // echo "<br>". $Action;
    }
}