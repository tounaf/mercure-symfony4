<?php
/**
 * Created by PhpStorm.
 * User: Harinjatovo
 * Date: 01/03/2019
 * Time: 16:20
 */

namespace App\Acme\TestBundle\Service;


class MailerLogger
{

    private $admiMailer;

    public function __construct($adminMailer)
    {
        $this->admiMailer = $adminMailer;
    }

    public function getMailer()
    {
        return $this->admiMailer;
    }

}