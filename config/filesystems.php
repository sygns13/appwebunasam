<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'web' => [
            'driver' => 'local',
            'root' => public_path('web'), // raiz web
            'visibility' => 'public',
         ],

         'banerUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/bannerunasam'), // banners facultades
            'visibility' => 'public',
         ],
         'banerFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/bannerfacultad'), // banners facultades
            'visibility' => 'public',
         ],
         'banerProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/bannerprograma'), // banners facultades
            'visibility' => 'public',
         ],

         'presentacionUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/presentacionunasam'), // banners facultades
            'visibility' => 'public',
         ],
         'presentacionFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/presentacionfacultad'), // presentaciones facultades
            'visibility' => 'public',
         ],
         'presentacionProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/presentacionprograma'), // presentaciones facultades
            'visibility' => 'public',
         ],

         'noticianUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/noticiaunasam'), // noticias facultades
            'visibility' => 'public',
         ],
         'noticiaFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/noticiafacultad'), // noticias facultades
            'visibility' => 'public',
         ],
         'noticiaProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/noticiaprograma'), // noticias facultades
            'visibility' => 'public',
         ],

         'eventoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/eventounasam'), // eventos facultades
            'visibility' => 'public',
         ],
         'eventoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/eventofacultad'), // eventos facultades
            'visibility' => 'public',
         ],
         'eventoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/eventoprograma'), // eventos facultades
            'visibility' => 'public',
         ],

         'comunicadoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/comunicadounasam'), // comunicados facultades
            'visibility' => 'public',
         ],
         'comunicadoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/comunicadofacultad'), // comunicados facultades
            'visibility' => 'public',
         ],
         'comunicadoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/comunicadoprograma'), // comunicados facultades
            'visibility' => 'public',
         ],

         'redsocialUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/redsocialunasam'), // redes sociales facultades
            'visibility' => 'public',
         ],
         'redsocialFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/redsocialfacultad'), // redes sociales facultades
            'visibility' => 'public',
         ],
         'redsocialProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/redsocialprograma'), // redes sociales facultades
            'visibility' => 'public',
         ],

         'historiaFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/historiafec'), // historia facultad
            'visibility' => 'public',
         ],
         'misionvisionFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/misionvisionfec'), // mision vision facultad
            'visibility' => 'public',
         ],


        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ]
    ],

];
