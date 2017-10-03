<?php

namespace Bulkvs;

class Bulkvs extends Core
{
    /**
     * Instantiate a new instance
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * First run "e911validateAddress" to validate a US or Canadian address
     *
     * @param $state
     * @param $city
     * @param $zip
     * @param $address1
     * @param null $address2
     * @return mixed|null
     */
    public function e911validateAddress($state, $city, $zip, $address1, $address2 = null)
    {
        return $this->_handleQuery('e911validateAddress', compact(['state','city','zip','address1','address2']));
    }

    /**
     * You would use the Address ID retrieved through Step 1, and call "e911provisionAddress" with the phone number (dn), Name (callername) and Address ID (addressid).
     *
     * @param $dn
     * @param $callername
     * @param $addressid
     * @return mixed|null
     */
    public function e911provisionAddress($dn, $callername, $addressid)
    {
        return $this->_handleQuery('e911provisionAddress', compact(['dn','callername','addressid']));
    }

}