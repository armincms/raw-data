<?php 

namespace Armincms\RawData;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Common extends Collection
{   
    /**
     * Common genders.
     * 
     * @return $this
     */
    public static function genders()
    { 
        return new static([
            'male'  => __("Male"),
            'female'=> __("Female"),
            // 'shemale'=> __("Shemale"),
        ]);
    } 
    
    /**
     * Common maritals.
     * 
     * @return $this
     */
    public static function maritals()
    {
        return new static([ 
            'married' => __('Married'), 
            'single'  => __('Single'),  
        ]);
    } 
    
    /**
     * Common maritals.
     * 
     * @return $this
     */
    public static function ages()
    {
        return new static([
            'child' => __('Child'), 
            'teen'  => __('Teen'), 
            'young' => __('Young'), 
            'adult' => __('Adult'), 
            'old'   => __('Old'),
        ]);
    } 
    
    /**
     * Common levels.
     * 
     * @return $this
     */
    public static function levels()
    {
        return new static([
            'easy'   => __('Easy'),
            'normal' => __('Normal'),
            'hard'   => __('Hard'),
            'expert' => __('Expert'),
        ]);
    } 

    /**
     * List of world countries name.
     * 
     * @return $this
     */
    public static function countries()
    { 
        return new static(require __DIR__.'/../config/countries.php');
    } 

    /**
     * List of available locales.
     * 
     * @return $this
     */
    public static function locales()
    { 
        return new static(require __DIR__.'/../config/locale.php');
    } 

    /**
     * List of general locales.
     * 
     * @return $this
     */
    public static function generalLocales()
    {
        $locales = static::locales();

        return $locales->filter(function($locale) use ($locales) {
            $similars = $locales
                            ->where('locale', $locale['locale'])
                            ->where('regional_locale', '!=', $locale['regional_locale']);

            if($similars->count() === 0) {
                return true;
            } 

            return is_null($similars->first(function($similar) use ($locale) { 
                return Str::contains($locale['name'], $similar['name']);
            }));
        });
    }

    /**
     * Common video qualities.
     * 
     * @return $this
     */
    public static function qualities()
    {
        return new static([
            240  => "SD - 240p",
            360  => "360p",
            480  => "480p",
            720  => "HHD - 720p",
            1080 => "FHD - 1080p",
            2160 => "4K - 2160p",
        ]);
    } 

    /**
     * Common volumes.
     * 
     * @return $this
     */
    public static function volumes()
    {
        return new static([
            "kb"  => "KB", 
            "mb"  => "MB", 
            "gb"  => "GB", 
            "tb"  => "TB", 
        ]);
    }  

    /**
     * Common time length.
     * 
     * @return $this
     */
    public static function durations()
    {
        return new static([
            "second"  => __("Second"), 
            "minute"  => __("Minute"),  
            "hour"    => __("Hours"),  
            "day"     => __("Day"),  
            "week"    => __("Week"),  
            "month"   => __("Month"),  
            "year"    => __("Year"),  
        ]);
    }
}
