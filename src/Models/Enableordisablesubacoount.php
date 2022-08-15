<?php
/*
 * PepipostLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PepipostLib\Models;

use JsonSerializable;

/**
 *EnableDisablesubaccount modal
 */
class Enableordisablesubacoount implements JsonSerializable
{
    /**
     * The username of the subaccount
     * @var string|null $username public property
     */
    public $username;

    /**
     * Flag to indicate whether the subaccount should be enabled or disabled.
     * @var bool|null $disabled public property
     */
    public $disabled;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $username Initialization value for $this->username
     * @param bool   $disabled Initialization value for $this->disabled
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->username = func_get_arg(0);
            $this->disabled = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['username'] = $this->username;
        $json['disabled'] = $this->disabled;

        return $json;
    }
}