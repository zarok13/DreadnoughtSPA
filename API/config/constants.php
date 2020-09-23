<?php

// admin panel segment name //
if (!defined('ADMIN_PANEL_SEGMENT_NAME')) define('ADMIN_PANEL_SEGMENT_NAME', 'admin');
// admin //
if (!defined('ADMIN_LANGUAGE_SEGMENT_NUM')) define('ADMIN_LANGUAGE_SEGMENT_NUM', 2);
if (!defined('ADMIN_MODULE_SEGMENT_NUM')) define('ADMIN_MODULE_SEGMENT_NUM',3);
// web //
if (!defined('LANGUAGE_SEGMENT_NUM')) define('LANGUAGE_SEGMENT_NUM', 1);
// models path //
if (!defined('MODELS_PATH')) define('MODELS_PATH', '\\App\\');
// PageTypes
if (!defined('PAGE_TYPE_STATIC')) define('PAGE_TYPE_STATIC', 'static');
if (!defined('PAGE_TYPE_ARTICLES')) define('PAGE_TYPE_ARTICLES', 'articles');
if (!defined('PAGE_TYPE_CONTACT')) define('PAGE_TYPE_CONTACT', 'contact');
// database actions //
if (!defined('DATABASE_ACTION_CREATE')) define('DATABASE_ACTION_CREATE', 'An item has been created.');
if (!defined('DATABASE_ACTION_UPDATE')) define('DATABASE_ACTION_UPDATE', 'An item has been updated.');
if (!defined('DATABASE_ACTION_REMOVE')) define('DATABASE_ACTION_REMOVE', 'An item has been removed.');

if (!defined('EMAIL_REGEX')) define('EMAIL_REGEX', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix');

