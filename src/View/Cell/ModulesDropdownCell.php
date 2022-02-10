<?php

namespace App\View\Cell;

use Cake\View\Cell;

class ModulesDropdownCell extends Cell
{
    public function display()
    {
        $allModules = $this->fetchTable('Modules')->find('all', ['order' => 'Modules.name']);
        $this->set(compact('allModules'));
    }
}
