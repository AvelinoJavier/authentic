<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission[]|\Cake\Collection\CollectionInterface $permissions
 */
?>
<div class="permissions index content">
    <?= $this->Html->link(__('New Permission'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Permissions') ?></h3>
    <div class="table-responsive">
        <?= $this->cell('SearchForm')->render() ?>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('action') ?></th>
                    <th><?= $this->Paginator->sort('Modules.name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permissions as $permission) : ?>
                    <tr>
                        <td><?= $this->Number->format($permission->id) ?></td>
                        <td><?= h($permission->action) ?></td>
                        <td><?= $permission->has('module') ? $this->Html->link($permission->module->name, ['controller' => 'Modules', 'action' => 'view', $permission->module->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $permission->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permission->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?>
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