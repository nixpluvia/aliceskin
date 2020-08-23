<?php

class App {
    public static function isLogined(): bool {
        if ( isset($_SESSION['loginedMemberId']) ){
            return true;
        }
        return false;
    }
}

// require_once __DIR__ . '/app/ArticleService.php';
// require_once __DIR__ . '/app/ArticleDao.php';

require_once __DIR__ . '/MemberService.php';
require_once __DIR__ . '/MemberDao.php';