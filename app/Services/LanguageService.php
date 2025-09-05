<?php

namespace App\Services;

class LanguageService
{
    public function getLanguages()
    {
        $languages = [
            'english'   => 'English',
            'tamil'     => 'தமிழ்',
            'hindi'     => 'हिंदी',
            'telugu'    => 'తెలుగు',
            'kannada'   => 'ಕನ್ನಡ',
            'malayalam' => 'മലയാളം',
        ];

        return $languages;
    }
}
