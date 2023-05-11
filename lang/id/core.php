<?php

return [
    // Halaman response
    '404' => 'Tidak ditemukan!',

    // Ini bagian metode event
    'online' => [
        'text' => 'Daring',
        'class' => 'bg-light-warning text-warning'
    ],
    'offline' => [
        'text' => 'Luring',
        'class' => 'bg-light-success text-success'
    ],
    'hybrid' => [
        'text' => 'Hybrid',
        'class' => 'bg-light-primary text-primary'
    ],

    // Metode pemilu
    'active' => [
        'text' => 'Aktif',
        'class' => 'rounded-pill bg-success'
    ],
    'inactive' => [
        'text' => 'Tidak Aktif',
        'class' => 'rounded-pill bg-orange'
    ],
    'done' => [
        'text' => 'Selesai',
        'class' => 'rounded-pill bg-purple'
    ],

    // Aktivasi
    'not send' => [
        'text' => 'Aktivasi belum dikirim',
        'class' => 'text-warning'
    ],
    'sent' => [
        'text' => 'Belum aktivasi',
        'class' => 'text-danger'
    ],
    'activated' => [
        'text' => 'Sudah aktivasi',
        'class' => 'text-success'
    ],

];
