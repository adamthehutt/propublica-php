<?php
declare(strict_types=1);

namespace AdamTheHutt\ProPublica\NonprofitExplorer\Organizations;

use stdClass;

/**
 * @see https://projects.propublica.org/nonprofits/api#organization-object
 */
class Organization
{
    /** @var string */
    public $ein;

    /** @var string */
    public $name;

    /** @var string */
    public $subName;

    /** @var string */
    public $address;

    /** @var string */
    public $city;

    /** @var string */
    public $state;

    /** @var string */
    public $zipCode;

    /** @var string */
    public $subsectionCode;

    /** @var string */
    public $nteeCode;

    /** @var string */
    public $guidestarUrl;

    /** @var string */
    public $nccsUrl;

    /** @var string` */
    public $updated;

    public function hydrate(stdClass $responseData)
    {
        $this->ein            = $responseData->ein ?? null;
        $this->name           = ucwords(strtolower($responseData->name ?? ""));
        $this->subName        = ucwords(strtolower($responseData->sub_name ?? ""));
        $this->address        = ucwords(strtolower($responseData->address ?? ""));
        $this->city           = ucwords(strtolower($responseData->city ?? ""));
        $this->state          = $responseData->state ?? null;
        $this->zipCode        = $responseData->zipcode ?? null;
        $this->subsectionCode = $responseData->subseccd ?? null;
        $this->nteeCode       = $responseData->ntee_code ?? null;
        $this->guidestarUrl   = $responseData->guidestar_url ?? null;
        $this->nccsUrl        = $responseData->nccs_url ?? null;
        $this->updated        = $responseData->updated ?? null;
    }

    public static function normalizeEin(string $ein): string
    {
        $ein = preg_replace("/[^0-9]/", "", $ein);
        return substr($ein, 0, 9);
    }
}
