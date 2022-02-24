<?php
declare(strict_types=1);

namespace AdamTheHutt\ProPublica\NonprofitExplorer\Organizations;

use stdClass;

class Request
{
    const BASE = 'https://projects.propublica.org/nonprofits/api/v2/';

    public function get(string $ein): ?stdClass
    {
        $ein = Organization::normalizeEin($ein);
        if (!$this->validEin($ein)) {
            return null;
        }

        $json = file_get_contents($this->url($ein));
        $data = json_decode($json);

        if (!$data?->organization?->name || "Unknown Organization" === $data->organization->name) {
            return null;
        }

        $response               = new stdClass();
        $response->organization = new Organization();
        $response->organization->hydrate($data->organization);

        return $response;
    }

    public function validEin(string $ein): bool
    {
        $http_status = get_headers($this->url($ein))[0];
        return false === strpos($http_status, "404");
    }

    protected function url(string $ein): string
    {
        return self::BASE.'organizations/'.Organization::normalizeEin($ein).'.json';
    }
}
