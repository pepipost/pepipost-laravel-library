<?php
/*
 * PepipostLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PepipostLib\Models;

use JsonSerializable;

/**
 *UpdateSubaccount modal
 */
class Updatesubaccount implements JsonSerializable
{
    /**
     * The username for the subaccount
     * @var string|null $username public property
     */
    public $username;

    /**
     * The new email address to be registered with the subaccount
     * @maps new_email
     * @var string|null $newEmail public property
     */
    public $newEmail;

    /**
     * The new password of the subaccount
     * @maps new_password
     * @var string|null $newPassword public property
     */
    public $newPassword;

    /**
     * reconfirm the new password for the subaccount
     * @maps confirm_password
     * @var string|null $confirmPassword public property
     */
    public $confirmPassword;

    /**
     * Allowed values one_time_credit or unlimited by default, all subaccounts are created with credit type
     * as unlimited.
     * @maps credit_type
     * @var string|null $creditType public property
     */
    public $creditType;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $username        Initialization value for $this->username
     * @param string $newEmail        Initialization value for $this->newEmail
     * @param string $newPassword     Initialization value for $this->newPassword
     * @param string $confirmPassword Initialization value for $this->confirmPassword
     * @param string $creditType      Initialization value for $this->creditType
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->username        = func_get_arg(0);
            $this->newEmail        = func_get_arg(1);
            $this->newPassword     = func_get_arg(2);
            $this->confirmPassword = func_get_arg(3);
            $this->creditType      = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['username']         = $this->username;
        $json['new_email']        = $this->newEmail;
        $json['new_password']     = $this->newPassword;
        $json['confirm_password'] = $this->confirmPassword;
        $json['credit_type']      = $this->creditType;

        return $json;
    }
}
