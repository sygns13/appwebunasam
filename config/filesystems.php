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

         'logoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/logounasam'),
            'visibility' => 'public',
         ],
         'logoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/logofacultad'),
            'visibility' => 'public',
         ],
         'logoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/logoprograma'),
            'visibility' => 'public',
         ],


         'banerUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/bannerunasam'),
            'visibility' => 'public',
         ],
         'banerFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/bannerfacultad'),
            'visibility' => 'public',
         ],
         'banerProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/bannerprograma'),
            'visibility' => 'public',
         ],

         'presentacionUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/presentacionunasam'),
            'visibility' => 'public',
         ],
         'presentacionFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/presentacionfacultad'),
            'visibility' => 'public',
         ],
         'presentacionProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/presentacionprograma'),
            'visibility' => 'public',
         ],

         'noticianUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/noticiaunasam'),
            'visibility' => 'public',
         ],
         'noticiaFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/noticiafacultad'),
            'visibility' => 'public',
         ],
         'noticiaProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/noticiaprograma'),
            'visibility' => 'public',
         ],

         'eventoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/eventounasam'),
            'visibility' => 'public',
         ],
         'eventoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/eventofacultad'),
            'visibility' => 'public',
         ],
         'eventoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/eventoprograma'),
            'visibility' => 'public',
         ],

         'comunicadoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/comunicadounasam'),
            'visibility' => 'public',
         ],
         'comunicadoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/comunicadofacultad'),
            'visibility' => 'public',
         ],
         'comunicadoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/comunicadoprograma'),
            'visibility' => 'public',
         ],

         'redsocialUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/redsocialunasam'),
            'visibility' => 'public',
         ],
         'redsocialFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/redsocialfacultad'),
            'visibility' => 'public',
         ],
         'redsocialProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/redsocialprograma'),
            'visibility' => 'public',
         ],

         'linkinteresUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/linkinteresunasam'),
            'visibility' => 'public',
         ],
         'linkinteresFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/linkinteresfacultad'),
            'visibility' => 'public',
         ],
         'linkinteresProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/linkinteresprograma'),
            'visibility' => 'public',
         ],

         'historiaUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/historiaunasam'),
            'visibility' => 'public',
         ],
         'historiaFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/historiafacultad'),
            'visibility' => 'public',
         ],
         'historiaProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/historiaprograma'),
            'visibility' => 'public',
         ],
         

         'misionvisionUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/misionvisionunasam'),
            'visibility' => 'public',
         ],
         'misionvisionFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/misionvisionfacultad'),
            'visibility' => 'public',
         ],
         'misionvisionProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/misionvisionprograma'),
            'visibility' => 'public',
         ],

         'organoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/organounasam'),
            'visibility' => 'public',
         ],
         'organoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/organofacultad'),
            'visibility' => 'public',
         ],
         'organoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/organoprograma'),
            'visibility' => 'public',
         ],

         'objetivoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/objetivounasam'),
            'visibility' => 'public',
         ],
         'objetivoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/objetivofacultad'),
            'visibility' => 'public',
         ],
         'objetivoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/objetivoprograma'),
            'visibility' => 'public',
         ],

         'estatutoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/estatutounasam'),
            'visibility' => 'public',
         ],
         'estatutoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/estatutofacultad'),
            'visibility' => 'public',
         ],
         'estatutoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/estatutoprograma'),
            'visibility' => 'public',
         ],

         'contenidoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/contenidounasam'),
            'visibility' => 'public',
         ],
         'contenidoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/contenidofacultad'),
            'visibility' => 'public',
         ],
         'contenidoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/contenidoprograma'),
            'visibility' => 'public',
         ],

         'licenciamientoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/licenciamientounasam'),
            'visibility' => 'public',
         ],
         'licenciamientoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/licenciamientofacultad'),
            'visibility' => 'public',
         ],
         'licenciamientoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/licenciamientoprograma'),
            'visibility' => 'public',
         ],

         'documentoUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/documentounasam'),
            'visibility' => 'public',
         ],
         'documentoFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/documentofacultad'),
            'visibility' => 'public',
         ],
         'documentoProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/documentoprograma'),
            'visibility' => 'public',
         ],

         'organigramaUNASAM' => [
            'driver' => 'local',
            'root' => public_path('web/organigramaunasam'),
            'visibility' => 'public',
         ],
         'organigramaFacultad' => [
            'driver' => 'local',
            'root' => public_path('web/organigramafacultad'),
            'visibility' => 'public',
         ],
         'organigramaProgramaEstudio' => [
            'driver' => 'local',
            'root' => public_path('web/organigramaprograma'),
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
