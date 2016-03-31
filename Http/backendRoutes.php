<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/webcontact'], function (Router $router) {
    $router->bind('webcontacts', function ($id) {
        return app('Modules\Webcontact\Repositories\WebContactRepository')->find($id);
    });
    get('webcontacts', ['as' => 'admin.webcontact.webcontact.index', 'uses' => 'WebContactController@index']);
    get('webcontacts/create', ['as' => 'admin.webcontact.webcontact.create', 'uses' => 'WebContactController@create']);
    post('webcontacts', ['as' => 'admin.webcontact.webcontact.store', 'uses' => 'WebContactController@store']);
    get('webcontacts/{webcontacts}/edit', ['as' => 'admin.webcontact.webcontact.edit', 'uses' => 'WebContactController@edit']);
    put('webcontacts/{webcontacts}/edit', ['as' => 'admin.webcontact.webcontact.update', 'uses' => 'WebContactController@update']);
    delete('webcontacts/{webcontacts}', ['as' => 'admin.webcontact.webcontact.destroy', 'uses' => 'WebContactController@destroy']);
    get('webcontacts/{webcontacts}/view', ['as' => 'admin.webcontact.webcontact.view', 'uses' => 'WebContactController@view']);
});
