<?php
require('connection.inc.php');
require('functions.inc.php');

$cat_res=mysqli_query($con,"select * from categories where status=0 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[]=$row;
}


?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecom Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <!--<link rel="stylesheet" href="newstyle.css">-->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>


<!-- Body main wrapper start -->
<div class="wrapper">
    <header id="htc__header" class="htc__header__area header--one">
        <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
            <div class="container">
                <div class="row">
                    <div class="menumenu__container clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                            <div class="logo">
                                <a href="index.php"><img src="images/log2.png" alt="logo images"></a>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                            <nav class="main__menu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php">Home</a></li>
                                    <?php
                                    foreach($cat_arr as $list){
                                        ?>
                                        <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                        <?php
                                    }
                                    ?>
                                    <li><a href="contact.php">contact</a></li>
                                    <li><a href="mapp.php">map</a></li>
                                </ul>
                            </nav>

                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Dropdown button
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <?php
                                                foreach($cat_arr as $list){
                                                    ?>
                                                    <a class="dropdown-item" href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <li><a href="contact.php">contact</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
        </div>
    </header>