<?php namespace Modules\Webcontact\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class WebContact extends Model
{
    /*use Translatable;*/

    protected $table = 'webcontact__webcontacts';
    /*public $translatedAttributes = [];*/
    protected $fillable = [
        'contact_name',
        'contact_phone',
        'contact_email',
        'contact_subject',
        'contact_message',
    ];
}
