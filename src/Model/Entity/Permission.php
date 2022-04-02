<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permission Entity
 *
 * @property int $id
 * @property string $action
 * @property int $module_id
 *
 * @property \App\Model\Entity\Module $module
 * @property \App\Model\Entity\Role[] $roles
 * @property \App\Model\Entity\User[] $users
 */
class Permission extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'action' => true,
        'module_id' => true,
        'module' => true,
        'roles' => true,
        'users' => true,
    ];

    protected function _getControllerAction()
    {
        return $this->module->name . ' - ' . $this->action;
    }
}
