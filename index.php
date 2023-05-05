<?php 
    require_once 'helpers/function.php';
    require_once 'helpers/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php component('head');?>
</head>
<body>
    <?php
        if(!isset($_SESSION['role'])) {
            component('header');
        } else {
            switch($_SESSION['role']) {
                case 'user':
                    component('header');
                    break;
    
                case 'member':
                    component('header_member');
                    break;
    
                case 'admin':
                    component('header_admin');
                    break;
            }
        }
    ?>
    <div class="content">
        <?php
            if(isset($_REQUEST['page'])) {
                switch($_REQUEST['page']) {
                    case 'home':
                        component('home');
                        break;
                
                    case 'feedback':
                        component('feedback');
                        break;
                    
                    case 'login':
                        component('login');
                        break;

                    case 'logout':
                        redirect('controllers/controller_logout.php');
                        break;

                    case 'addmovie':
                        component('add_movie');
                        break;
                    
                    case 'moviedetail':
                        component('moviedetail');
                        break;

                    case 'movieothers':
                        component('movieothers');
                        break;
                    
                    case 'moviepage':
                        component('moviepage');
                        break;
                    
                    case 'register':
                        component('register');
                        break;

                    case 'showfeedback':
                        component('showfeedback');
                        break;

                    case 'showfeedbackdetail':
                        component('showfeedbackdetail');
                        break;

                    default:
                        component('home');
                        break;
                }
            }
        ?>
    </div>
    <?php component('footer') ?>
</body>
</html>