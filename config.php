<?php
session_start();

$menu = [
    'cimlap' => 'Főoldal',
    'video' => 'Videók',
    'hibafeladas' => 'Hibafeladás',
    'kapcsolatok' => 'Kapcsolatok',
];

if (isset($_SESSION['user'])) {
    $menu['uzenetek'] = 'Üzenetek';
    $menu['hibajegy'] = 'Hibajegy';
    $menu['kilepes'] = 'Kilépés';
} else {
    $menu['belepes'] = 'Belépés';
    $menu['regisztral'] = 'Regisztráció';
}