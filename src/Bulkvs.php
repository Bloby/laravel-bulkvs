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
     * @param $address1
     * @param string $address2
     * @param $state
     * @param $city
     * @param $zip
     * @return mixed|null
     */
    public function e911validateAddress($address1, $address2, $city, $state, $zip)
    {
        return $this->_handleQuery('e911validateAddress', compact(['address1','address2','city','state','zip']));
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

    /**
     * @param $dn
     * @return mixed|null
     */
    public function e911removeRecord($dn)
    {
        return $this->_handleQuery('e911removeRecord', compact(['dn']));
    }

    /**
     * @param $dn
     * @return mixed|null
     */
    public function e911queryRecord($dn)
    {
        return $this->_handleQuery('e911queryRecord', compact(['dn']));
    }

    /**
     * @return mixed|null
     */
    public function e911queryAll()
    {
        return $this->_handleQuery('e911queryAll', compact([]));
    }
}