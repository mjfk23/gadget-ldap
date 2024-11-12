<?php

declare(strict_types=1);

namespace Gadget\Ldap;

final class Constants
{
    /**
     * Specifies a bitwise level for debug traces.
     *
     * @var int
     * @link https://www.php.net/manual/en/ldap.constants.php#constant.ldap-opt-debug-level
     */
    public const LDAP_OPT_DEBUG_LEVEL = 20481;


    /**
     * Specifies the LDAP protocol to be used (V2 or V3).
     *
     * @var int
     * @link https://www.php.net/manual/en/ldap.constants.php#constant.ldap-opt-protocol-version
     */
    public const LDAP_OPT_PROTOCOL_VERSION = 17;


    /**
     * Specifies whether to automatically follow referrals returned by the LDAP server.
     *
     * @var int
     * @link https://www.php.net/manual/en/ldap.constants.php#constant.ldap-opt-referrals
     */
    public const LDAP_OPT_REFERRALS = 8;


    /**
     * Control Constant - Paged results (RFC 2696).
     *
     * @var string
     * @link https://www.php.net/manual/en/ldap.constants.php#constant.ldap-control-pagedresults
     * @link http://www.faqs.org/rfcs/rfc2696.html
     */
    public const LDAP_CONTROL_PAGEDRESULTS = '1.2.840.113556.1.4.319';
}
