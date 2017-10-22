<?php

/**
 * User: jortsc@gmail.com
 * Date: 21/10/2017
 * Time: 09:59
 */
namespace App\Model\Table;

use Cake\ORM\Table;

class ArticlesTable extends Table
{
    public $jsonAllowedFields = array('title', 'short_description','description', 'author', 'read', 'later');

    public function initialize(array $config)
    {

    }
}
