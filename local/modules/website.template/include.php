<?php
global $DB;

CModule::AddAutoloadClasses(
    "website.template",
    array(
        "website_template" => "install/index.php",
        "CModuleOptions" => "classes/general/CModuleOptions.php",
        'CWebsiteTemplate' => "classes/general/CWebsiteTemplate.php"
    )
);
