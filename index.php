<?php
            session_start();
            if (isset ($_GET['x']) && $_GET['x']=='home'){
                $page = "home.php";
                include "main.php";

            } elseif (isset ($_GET['x']) && $_GET['x']=='order'){
                if($_SESSION['level_kuliner']==1 || $_SESSION['level_kuliner']==2 || $_SESSION['level_kuliner']==3){
                $page = "order.php";
                include "main.php";
            } else{
                $page = "home.php";
                include "main.php";
            }

            } elseif (isset ($_GET['x']) && $_GET['x']=='user'){
                if($_SESSION['level_kuliner']==1){
                    $page = "user.php";
                    include "main.php";
                } else{
                    $page = "home.php";
                    include "main.php";
                }

            } elseif (isset ($_GET['x']) && $_GET['x']=='dapur'){
                if($_SESSION['level_kuliner']==1 || $_SESSION['level_kuliner']==4){
                $page = "dapur.php";
                include "main.php";
            } else{
                $page = "home.php";
                include "main.php";
            }

            } elseif (isset ($_GET['x']) && $_GET['x']=='report'){
                if($_SESSION['level_kuliner']==1){
                    $page = "report.php";
                    include "main.php";
                } else{
                    $page = "home.php";
                    include "main.php";
                }

            
            } elseif (isset ($_GET['x']) && $_GET['x']=='menu'){
                if($_SESSION['level_kuliner']==1 || $_SESSION['level_kuliner']==3){
                $page = "menu.php";
                include "main.php";
            }else{
                $page = "home.php";
                include "main.php";
            }

            } elseif (isset ($_GET['x']) && $_GET['x']=='login'){
                include "login.php";
            } elseif (isset ($_GET['x']) && $_GET['x']=='logout'){
                include "proses/proses_logout.php";

            }elseif (isset ($_GET['x']) && $_GET['x']=='katmenu'){
                if($_SESSION['level_kuliner']==1){
                $page = "katmenu.php";
                include "main.php";
            }else{
                $page = "home.php";
                include "main.php";
            }

            }elseif (isset ($_GET['x']) && $_GET['x']=='orderitem'){
                if($_SESSION['level_kuliner']==1 || $_SESSION['level_kuliner']==2){
                $page = "order_item.php";
                include "main.php";
            }else{
                $page = "home.php";
                include "main.php";
            }
            }else{
                $page = "home.php";
                include "main.php";
            }
            ?>
            <!--- End content --->