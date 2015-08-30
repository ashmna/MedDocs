<?php
namespace {

    use MD\Helpers\App;
    use MD\Helpers\Defines;

    $menu = [];
    if(App::isLoggedUser()) {
        switch(App::getUserRole()) {
            case Defines::ROLE_ADMIN:
            case Defines::ROLE_SECRETARY:
            case Defines::ROLE_DOCTOR:
            case Defines::ROLE_CLIENT:
            default:
                $menu = [
                    'index',
                    'doctors',
                    'clients',
                    'workingtimes',
                ];
                break;
        }
    }
    return $menu;
}