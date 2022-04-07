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
        $identityId = $identity?->get('id');

        $action = $request->getParam('action');
        $tableName = lcfirst($request->getParam('controller'));

        $authExceptions = $action == 'login' && $tableName == 'users';

        debug(FactoryLocator::get('Table')
            ->get('Permissions')
            ->find('all')
            ->where(
                [
                    'Permissions.action' => $action,
                    'Modules.table_name' => $tableName
                ]
            )
            ->contain(['Modules'])
            ->leftJoinWith('Roles.Users', function ($q) use ($identityId) {
                return $q->where(['Users.id' => $identityId]);
            }));

        return $identity == null
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
                ->leftJoinWith('Roles.Users', function ($q) use ($identityId) {
                    return $q->where(['Users.id' => $identityId]);
                })
                ->leftJoinWith('Users', function ($q) use ($identityId) {
                    return $q->where(['Users.id' => $identityId]);
                })
                ->isEmpty();
        /*$permissionsTable = FactoryLocator::get('Table')
            ->get('Permissions')
            ->find('all')
            ->where(
                [
                    'Permissions.action' => $request->getParam('action'),
                    'Modules.table_name' => $request->getParam('controller')
                ]
            )
            ->contain(['Modules']);

        return $identity == null || !($permissionsTable
            ->matching('Users', function ($q) use ($identity) {
                return $q->where(['Users.id' => $identity->get('id')]);
            })
            ->isEmpty()
            &&
            $permissionsTable
            ->matching('Roles.Users', function ($q) use ($identity) {
                return $q->where(['Users.id' => $identity->get('id')]);
            })
            ->isEmpty());*/
    }
}
