<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * -------------------------------------------
 * FILE KONFIGURASI UBD-CMS
 * -------------------------------------------
 *
 * Pada file ini akan dimuat beberapa konfigurasi 
 * dasar. File ini juga yang akan direferensikan
 * ke konfigurasi engine ubd-cms dalam hal ini ci.
 *
 * Berikut beberapa konfigurasi yang ada dalam file ini:
 *
 * # Database Settings
 * # 
 */

// ** Database Settings ** //
/** Alamat host database */
define('DB_HOST', 'localhost');

/** User database */
define('DB_USER', 'development');

/** Password database */
define('DB_PASSWORD', '');

/** Nama database */
define('DB_NAME', 'ubd-cms');

/** Nama database */
define('DB_DRIVER', 'mysqli');

/** Prefix tabel database */
define('DB_PREFIX', 'ubd_');

/** Database charset */
define('DB_CHARSET', 'utf8');