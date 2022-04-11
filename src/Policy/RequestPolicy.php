<?php

namespace App\Policy;

use Authorization\Policy\RequestPolicyInterface;
use Cake\Http\ServerRequest;
use Cake\Datasource\FactoryLocator;

class RequestPolicy implements RequestPolicyInterface
{
    /**
     * Method to check if the request can be accessed
     *
     * @param \Authorization\IdentityInterface|null $identity Identity
     * @param \Cake\Http\ServerRequest $request Server Request
     * @return bool
     */
    public function canAccess($identity, ServerRequest $request)
    {
        $identityId = $identity ? $identity->get('id') : '';
        $identityIsAdmin = $identity ? $identity->get('admin') : '';

        $action = $request->getParam('action');
        $tableName = lcfirst($request->getParam('controller'));

        $authExceptions = $action == 'login' && $tableName == 'users'
            || $action == 'logout' && $tableName == 'users';

        return !$identityId
            || $identityIsAdmin
            || $authExceptions
            || !FactoryLocator::get('Table')
                ->get('Permissions')
                ->find('all')
                ->where(
                    [
                        'Permissions.action' => $action,
                        'Modules.table_name' => $tableName
                    ]
                )
                ->contain(['Modules'])
                ->innerJoinWith('Roles.Users', function ($q) use ($identityId) {
                    return $q->where(['Users.id' => $identityId]);
                })
                ->isEmpty();
    }
}
