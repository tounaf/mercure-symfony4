<?php
/**
 * Created by PhpStorm.
 * User: Harinjatovo
 * Date: 01/03/2019
 * Time: 16:32
 */

namespace App\Acme\TestBundle\Service;


class SmtpDomaine
{
    private $smtp;
    public function __construct($smtp)
    {

        $this->smtp = $smtp;

    }

    public function getSmtp()
    {
        return $this->smtp;
    }
}