<div class="dropdown">
    <input type="checkbox" id="dd">
    <label class="button" for="dd"><?= __('Ir a Módulo') ?></label>
    <ul>
        <?php foreach ($allModules as $module) : ?>
            <li><a href="<?= $this->Url->build('/' . $module->table_name) ?>"><?= $module->name ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>