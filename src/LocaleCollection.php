<?php 

namespace Armincms\Locale;

use Illuminate\Support\Collection;

class LocaleCollection extends Collection
{  
    /**
     * Create a new collection.
     *
     * @param  mixed  $items
     * @return void
     */
    public function __construct($items = [])
    {
        parent::__construct(require __DIR__.'/../config/locale.php');
    }
}
