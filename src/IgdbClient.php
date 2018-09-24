<?php

namespace Legionth\React\IGDB;

use Legionth\React\Http\Client;
use React\Promise\Promise;
use React\Stream\ReadableStreamInterface;
use RingCentral\Psr7\Response;
use RingCentral\Psr7\ServerRequest;

class IgdbClient
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $baseUrl = 'tcp://api-endpoint.igdb.com:80';

    /**
     * @param string $apiKey
     * @param Client $httpClient
     */
    public function __construct(string $apiKey, Client $httpClient)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getAchievements(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('achievements', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getCharacters(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('characters', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getCollection(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        $uri = $this->baseUrl . '/collections/';
        $uri .= implode(',', $ids);

        return $this->sendRequest('collections', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getCompanies(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('companies', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getCredits(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('credits', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getExternalReview(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('external_reviews', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getExternalReviewSource(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('external_review_sources', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getFeed(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('feed', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getFranchise(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('franchise', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getGameEngine(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('game_engines', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getGameMode(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('game_mode', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getGenre(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('genre', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getPage(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        $uri = $this->baseUrl . '/keywords/';
        $uri .= implode(',', $ids);

        return $this->sendRequest('keywords', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getPerson(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('people', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getPlayTimes(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('play_times', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getPlayerPerspective(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('player_perspectives', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getPulse(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('pulses', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getPulseGroup(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('pulse_groups', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getPulseSource(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('pulse_source', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getReleaseDates(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('release_dates', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getReview(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('reviews', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getTheme(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('themes', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getTitle(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('titles', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getUserProfile(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('me', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getKeyword(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ){
        return $this->sendRequest('keywords', $fields, $ids);
    }

    /**
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getGamesCount(
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    )
    {
        return $this->sendRequest('game_versions', $fields, array());
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getVersions(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    )
    {
        return $this->sendRequest('game_versions', $fields, $ids);
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return IgdbClient|\React\Promise\PromiseInterface
     */
    public function getGames(
        array $ids = array(),
        array $fields = array(
            'fields' => '*',
            'limit' => '5'
        )
    ) {
        return $this->sendRequest('games', $fields, $ids);
    }

    /**
     * @param string $endPoint
     * @param array $fields
     * @param $ids
     * @return \React\Promise\PromiseInterface|static
     * @internal param $uri
     */
    public function sendRequest(string $endPoint, array $fields, $ids)
    {
        $uri = $this->baseUrl . '/' . $endPoint . '/';
        $uri .= implode(',', $ids);

        $request = new ServerRequest(
            'GET',
            $uri,
            array(
                'user-key' => $this->apiKey,
                'accept' => 'application/json'
            )
        );

        $request = $request->withQueryParams($fields);

        $promise = $this->httpClient->request(
            $uri,
            $request
        );

        return $promise->then(function (Response $response) {
            /** @var ReadableStreamInterface $body */
            $body = $response->getBody();

            $promise = new Promise(function ($resolve, $reject) use ($body) {
                $completeData = '';

                $body->on('data', function ($data) use (&$completeData) {
                    $completeData .= $data;
                });

                $body->on('end', function () use (&$completeData, $resolve) {
                    $array = json_decode($completeData, true);
                    $resolve($array);
                });
            });

            return $promise;
        }, function (\Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;
        });
    }
}