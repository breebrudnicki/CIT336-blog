<?php
require_once 'model/blog_db.php';
//controller for blog page! (home page)
        $blogPosts= get_posts();
        include 'views/blog.php';

