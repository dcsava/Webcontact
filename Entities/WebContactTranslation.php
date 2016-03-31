<?php namespace Modules\Webcontact\Entities;

use Illuminate\Database\Eloquent\Model;

class WebContactTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'webcontact__webcontact_translations';
}
