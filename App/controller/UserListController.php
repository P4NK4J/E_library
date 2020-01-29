<?php

$list = $app['database']->userList('reader');

require "views/users/readerlist.view.php";