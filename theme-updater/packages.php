<?php
// Theme with update info
$packages['theme'] = array( //Replace theme with theme stylesheet slug that the update is for
    'versions' => array(
        '1.0.0' => array( //Array name should be set to current version of update
            'version' => '1.0.0', //Current version available
            'date' => '2017-04-20', //Date version was released
            'package' => get_site_url(). '/theme-updater/download.php?key=' . md5('hellobase.zip' . mktime(0,0,0,date("n"),date("j"),date("Y"))),
            //file_name is the name of the file in the update folder.
            'file_name' => 'hellobase.zip',	//File name of theme zip file
            'author' => 'Luice Phillips', //Author of theme
            'name' => 'HelloBase', //Name of theme
            'requires' => '4.7', //Wordpress version required
            'tested' => '4.7.3', //WordPress version tested up to
            'screenshot_url' => get_site_url() . '/screenshot.png' //url of screenshot of theme
        )
    ),
    'info' => array(
        'url' => get_site_url()  // Website devoted to theme if available
    )
);
