<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect'      => env('GOOGLE_REDIRECT_URI'),
    ],

    'prokerala' => [
        'client_id' => env('PROKERALA_CLIENT_ID'),
        'client_secret' => env('PROKERALA_CLIENT_SECRET'),
    ],

    'report' =>
    [
        'appID' => env('APP_ID'),
        'authID' => env('AUTH_ID'),
        'ayanamsa' => env('AYANAMSA'),
        'chartId' => env('CHART_ID'),
        'case2Flag' => env('CASE2_FLAG'),
        'astroOrgID' => env('ASTRO_ORGID'),
        'astroOrgSDTemplateID' => env('ASTRO_ORG_SDTEMPLATEID'),
        'astroOrgSDTemplateID_bhavaga' => env('ASTRO_ORG_SDTEMPLATEID_BHAVAGA'),
        'weightageMode' => env('WEIGHTAGE_MODE'),
        'customReportOrgConfigID' => env('CUSTOM_REPORT_ORGCONFIGID'),
        'customReportID' => env('CUSTOM_REPORTID'),
        'astroOrgConfigID' => env('ASTRO_ORG_CONFIGID'),
        'southIndianMatchTemplateID' => env('SOURTHINDIAN_MATCH_TEMPLATEID'),
        'northIndianMatchTemplateID' => env('NORTHINDIAN_MATCH_TEMPLATEID'),      
        'additional36pointTemplateID' => env('ADDITIONAL_36POINT_TEMPLATEID'),
        'overallMatchingDecisionTemplateID' => env('OVERALL_MATCHING_DECISION_TEMPLATEID'),
    ],

];
