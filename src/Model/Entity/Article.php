<?php

/**
 * User: jortsc@gmail.com
 * Date: 21/10/2017
 * Time: 09:59
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
    protected $_accessible = [
        'id' => false,
        'data' => true
    ];
}
