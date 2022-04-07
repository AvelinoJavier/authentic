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
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'all.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('jquery-3.6.0.min') ?>
    <?= $this->Html->script('script') ?>
</head>

<body>
    <nav class="top-nav">
        <?php if ($user != null) { ?>
            <div class="dropdown">
                <input type="checkbox" id="dd">
                <label class="button" for="dd"><?= __('Ir a Módulo') ?></label>
                <ul>
                    <?php foreach ($allModules as $module) : ?>
                        <li><a href="<?= $this->Url->build('/' . $module->table_name) ?>"><?= $module->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="top-nav-links">
                <a href="<?= $this->Url->build('/users/logout') ?>"><?= __('Cerrar Sesión') ?></a>
            </div>
        <?php } ?>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>