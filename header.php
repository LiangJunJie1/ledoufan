<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php if ( is_home() ) {
            bloginfo('name'); echo " - ";
            bloginfo('description');
        } elseif ( is_category() ) {
            single_cat_title(); echo " - ";
            bloginfo('name');
        } elseif (is_single() || is_page() ) {
            single_post_title();
        } elseif (is_search() ) {
            echo "搜索结果"; echo " - ";
            bloginfo('name');
        } elseif (is_404() ) {
            echo '页面未找到!';
        } else {
            wp_title('',true);
        } ?>
    </title>
    <link href="<?php bloginfo('template_url'); ?>/css/base.css" type="text/css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/common.css" type="text/css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" rel="stylesheet">
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
</head>
<body>
<?php include_once 'config.php' ?>
<header>
    <div class="container header">
        <a href="#" class="header-logo"></a>
        <ul class="header-nav" id="nav">
            <?php
            
                foreach ($navInfo as $k=>$item){
                    $classActive = $k == $slugs ? " active" : "";
                    echo '<li><a class="'.$item['class'].$classActive.'" href="'.$siteUrl.'/'.$k.'">'.$item['title'].'</a>';
                    echo '<ul class="header-nav-list">';
                    foreach ($item['child'] as $key=>$value){
                        if($value['class'] == 'icon')
                            echo '<li class="icon"><a href="'.$siteUrl.'/'.$k.'?id='.$key.'">'.$value['title'].'</a></li>';
                        else
                            echo '<li><a href="'.$siteUrl.'/'.$k.'?id='.$key.'">'.$value['title'].'</a></li>';
                    }
                    echo '</ul>';
                    echo '</li>';
                }
            ?>
        </ul>
    </div>
</header>
<div class="top">
    <img src="<?php bloginfo('template_url'); ?>/img/top-img.jpg">
    <div class="top-item">欢迎来到乐豆坊食品有限公司</div>
</div>
