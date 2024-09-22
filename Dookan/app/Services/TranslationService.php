<?php

namespace App\Services;

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslationService
{
    protected $translator;

    public function __construct()
    {
        // GoogleTranslate
        $this->translator = new GoogleTranslate();
    }

    public function translate($text, $targetLanguage = 'ar')
    {
        $this->translator->setSource(null);

        $translatedTextToEn = $this->translator->setTarget('en')->translate($text);
        $translatedTextToAr = $this->translator->setTarget('ar')->translate($text);

        if ($translatedTextToEn !== $text) {
            // $text is in ar -> return $translatedTextToEn
            return $translatedTextToEn;
        } else {
            // $text is in en -> return $translatedTextToAr
            return $translatedTextToAr;
        }
    }
}
