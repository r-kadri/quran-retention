<?php

namespace App\Service;

use App\Class\Api\Surah;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class QuranApiService
{
    private string $QURAN_API_BASE_URL;

    public function __construct(
        private HttpClientInterface $httpClient,
        ParameterBagInterface $parameterBag,
    ) {
        $this->QURAN_API_BASE_URL = $parameterBag->get('quran_api_base_url');
    }

    /**
     * Get all surahs from the Quran API
     *
     * @return Surah[]
     */
    public function getAllSurahs(): array
    {
        $surahs = [];
        $surahInfos = $this->getRequest(
            'chapters'
        )->toArray()['chapters'];

        foreach ($surahInfos as $infos) {
            $surahs[] = Surah::createFromApiResponse($infos);
        }

        return $surahs;
    }

    /**
     * Get a specific surah from the Quran API
     *
     * @param int $number
     */
    public function getSurah(int $number): Surah
    {
        $surahInfos = $this->getRequest(
            'chapters/' . $number,
        )->toArray()['chapter'];

        return Surah::createFromApiResponse($surahInfos);
    }

    /**
     * Make a GET request to the Quran API
     *
     * @param string $endpoint
     * @param string[] $query
     */
    private function getRequest(
        string $endpoint,
        array $query = []
    ): ResponseInterface {
        return $this->httpClient->request(
            Request::METHOD_GET,
            $this->QURAN_API_BASE_URL . $endpoint,
            [
                'query' => $query,
            ]
        );
    }
}
