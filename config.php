<?php
session_start();

$menu = [
    'cimlap' => 'Főoldal',
    'video' => 'Videók',
    'kepek' => 'Képek',
    'hibafeladas' => 'Hibafeladás',
];

if (isset($_SESSION['user'])) {
    $menu['hibajegy'] = 'Hibajegy';
    $menu['kilepes'] = 'Kilépés';
} else {
    $menu['belepes'] = 'Belépés';
    $menu['regisztral'] = 'Regisztráció';
}