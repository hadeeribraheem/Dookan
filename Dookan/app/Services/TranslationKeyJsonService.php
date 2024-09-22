<?php

namespace App\Services;

class TranslationKeyJsonService
{
    protected $translate ;

    public function __construct(TranslationService $translationService)
    {
        $this->translate = $translationService;
    }

    public function KeyMapTranslations($inputData)
    {
        $translated = $this->translate->translate($inputData);
        $SearchArabic = $this->containsArabic($inputData);

        if ($SearchArabic) {
            return [
                'ar' => $inputData,
                'en' => $translated
            ];
        } else {
            return [
                'en' => $inputData,
                'ar' => $translated
            ];
        }
    }

    /**
     * Determine if the given text contains Arabic characters.
     *
     * @param string $text
     * @return bool
     */
    private function containsArabic($text)
    {
        return preg_match('/\p{Arabic}/u', $text);
    }
}
