<?php

namespace App\Class\Api;

/**
 * Represents the surah informations from the API.
 */
final class Surah
{
    private int $number;
    private RevelationPlace $revelationPlace;
    private string $simpleName;
    private string $arabicName;
    private int $versesCount;

    public static function createFromApiResponse(array $apiResponse): self
    {
        $surah = new self();
        $surah->number = $apiResponse['id'];
        $surah->revelationPlace = RevelationPlace::from($apiResponse['revelation_place']);
        $surah->simpleName = $apiResponse['name_simple'];
        $surah->arabicName = $apiResponse['name_arabic'];
        $surah->versesCount = $apiResponse['verses_count'];

        return $surah;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getRevelationPlace(): RevelationPlace
    {
        return $this->revelationPlace;
    }

    public function getSimpleName(): string
    {
        return $this->simpleName;
    }

    public function getArabicName(): string
    {
        return $this->arabicName;
    }

    public function getVersesCount(): int
    {
        return $this->versesCount;
    }
}
