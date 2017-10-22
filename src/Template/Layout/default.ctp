<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <link rel="stylesheet" href="../../../js/bower_components/bootstrap/dist/css/bootstrap.css"/>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
    <script src="../../../js/bower_components/angular/angular.js"></script>
    <script src="../../../js/bower_components/angular-route/angular-route.js"></script>
    <script src="../../../js/bower_components/angular-messages/angular-messages.js"></script>
    <script src="../../../js/bower_components/traceur/traceur.js"></script>
    <script>
        traceur.options.experimental = true;
        new traceur.WebPageTranscoder(document.location.href).run();
    </script>

    <script type="module" src="../../../js/app/bootstrap.js"></script>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <div id="logo">
            <img src="http://www.openhost.es/wp-content/uploads/2015/08/openhost-logo.png" />
        </div>
        <div ng-view class="view"></div>
    </div>
    <footer>
    </footer>
</body>
</html>
<style>
    #logo {
        text-align: center;
        margin-top: 20px;
    }
    .spa_title{
        text-align: center;
        color: #3FB2E8;
    }
</style>

