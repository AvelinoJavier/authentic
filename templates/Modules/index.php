<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Module[]|\Cake\Collection\CollectionInterface $modules
 */
?>
<div class="modules index content">
    <?= $this->Html->link(__('New Module'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Modules') ?></h3>
    <div class="table-responsive">
        <?= $this->Form->create(null, ['valueSources' => 'query']) ?>
        <div class="container">
            <div class="row">
                <?= $this->Form->control('search', [
                    'type' => 'search',
                    'placeholder' => __('Buscar'),
                    'label' => false,
                    'style' => 'border-top-right-radius: 0; border-bottom-right-radius: 0;',
                    'templates' => [
                        'inputContainer' => '{{content}}'
                    ]
                ]) ?>
                <button type="submit" style="border-top-left-radius: 0; border-bottom-left-radius: 0;"><i class="fa-solid fa-search"></i> <?= __('Buscar') ?></button>
            </div>
        </div>
        <?= $this->Form->end() ?>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('table_name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modules as $module) : ?>
                    <tr>
                        <td><?= $this->Number->format($module->id) ?></td>
                        <td><?= h($module->name) ?></td>
                        <td><?= h($module->table_name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $module->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $module->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>