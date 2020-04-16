<?php 

namespace Armincms\Locale;

use Illuminate\Support\Collection;

class FielFormatCollection extends Collection
{  
    /**
     * Create a new collection.
     *
     * @param  mixed  $items
     * @return void
     */
    public function __construct($items = [])
    {
        parent::__construct(require __DIR__.'/../config/media.php');
    }

    /**
     * Collection of available media formats
     * 
     * @param  string $media 
     * @return $this        
     */
    public function medias(string $media = "media")
    {
        return $this->filter(function($file) use ($media) {
            return in_array($media, (array) $file['kind']);
        });
    }

    /**
     * Collection of available image formats
     *  
     * @return $this        
     */
    public function images()
    {
        return $this->medias("image");
    }

    /**
     * Collection of available video formats
     *  
     * @return $this        
     */
    public function videos()
    {
        return $this->medias("video");
    }

    /**
     * Collection of available audio formats
     *  
     * @return $this        
     */
    public function audios()
    {
        return $this->medias("audio");
    }  
}
