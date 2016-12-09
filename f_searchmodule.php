<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $search=$_POST['search'];
        if(isset($search)){
            $providesearch=1;
            $searchstring = strip_tags($_POST['searchstring']);
        }
        else{
            $providesearch=0;
        }
    }
?>