<?php
                            if($_SESSION['userverificationkey']){
                                if($row['mature_content']==0||$_SESSION['is_adult']==1) {
                                    include 'f_displayad.php';
                                }
                                if(($row['mature_content']==1)&&($_SESSION['is_adult']==0)) {
                                    //nic_nie_zobaczysz
                                }
                            }
                            else{
                                if($row['mature_content']==0){
                                    include 'f_displayad.php';
                                }
                            }
?>