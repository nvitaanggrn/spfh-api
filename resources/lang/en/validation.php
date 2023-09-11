<?php
$validation = require_once(base_path('vendor/laravel/lumen-framework/resources/lang/en/validation.php'));
$validation['error'] = 'Oops! Something went wrong. Please try again.';
$validation['signin'] = 'Invalid your username/password.';
$validation['form'] = 'Mohon maaf! kemungkinan laporan anda sudah pernah dikirimkan oleh karyawan lain.';

return $validation;