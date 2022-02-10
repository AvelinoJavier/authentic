<div class="dropdown">
    <input type="checkbox" id="ct">
    <label class="button" for="ct"><?= __('Ir a Módulo') ?></label>
    <ul>
        <?php foreach ($allModules as $module) : ?>
            <li><a href="<?= $this->Url->build('/' . $module->table_name) ?>"><?= $module->name ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>