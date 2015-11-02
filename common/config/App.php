<?php

if (isProduct()) {
    return array(
        'static_server' => 'img.sucel-it.com',
        'upload_server' => 'upload.sucel-it.com',
    );
}
else {
    return array(
        'static_server' => '139.196.54.159:8080',
        'upload_server' => '139.196.54.159:8080',
    );
}