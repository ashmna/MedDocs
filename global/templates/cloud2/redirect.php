<?php
namespace {

    use MD\Helpers\App;

    if(!App::isLoggedUser()) {
        App::setCurrentPage('login');
    } else {
        // $currentPage = App::getCurrentPage();
        // if not exist page
        // App::setCurrentPage('404');
    }

}