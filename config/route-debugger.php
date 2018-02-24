<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Enable or Disable the route listings
    |--------------------------------------------------------------------------
    |
    | This can be used to enable & disable the functionality.
    | You can disable this feature in production
    | environment so that your routes are not exposed publicly.
    |
    */
    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Route Path
    |--------------------------------------------------------------------------
    |
    | This is the path the route listens to.
    | You may change this if you want to move this functionality to a new url.
    |
    */
    'route' => '/routes',

    /*
    |--------------------------------------------------------------------------
    | View Directory & File
    |--------------------------------------------------------------------------
    |
    | This will be the blade file that the router will pass the values to.
    | You may change the file to your specific one, if you need to.
    |
    */
    'view_directory' => 'router/src/Resources/views',
    'view' => 'route'
];