<?php namespace Modules\Webcontact\Repositories\Cache;

use Modules\Webcontact\Repositories\WebContactRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheWebContactDecorator extends BaseCacheDecorator implements WebContactRepository
{
    public function __construct(WebContactRepository $webcontact)
    {
        parent::__construct();
        $this->entityName = 'webcontact.webcontacts';
        $this->repository = $webcontact;
    }
}
