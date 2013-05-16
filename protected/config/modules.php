<?php
return array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            'generatorPaths' => array(//    'bootstrap.gii', // since 0.9.1
                'bootstrap.gii',
                'ext.giix-core',
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'lookup'=>array(
             'class'=>'application.modules.lookup.LookupModule',
             'lookupLayout'=>'//layouts/col2'
         ),
		 'venture',
    );