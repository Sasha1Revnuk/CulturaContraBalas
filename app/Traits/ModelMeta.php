<?php

namespace App\Traits;

use App\Models\ModelHasMeta;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait ModelMeta
{


    /**
     * Поліморфний звязок
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function meta(): MorphOne
    {
        return $this->morphOne( ModelHasMeta::class, 'model' );
    }

    public function setMetaTitleAttribute( $value )
    {
        $this->metaTitle = $value;
    }

    public function setMetaDescriptionAttribute( $value )
    {
        $this->metaDescription = $value;
    }

    public function setMetaRobotsAttribute( $value )
    {
        $this->metaRobots = $value;
    }

    public function setMetaKeywordsAttribute( $value )
    {
        $this->metaKeywords = $value;
    }

    public function getMetaTitleAttribute(): ?string
    {
        return $this->meta?->meta_title;
    }

    public function getMetaDescriptionAttribute(): ?string
    {
        return $this->meta?->meta_description;
    }

    public function getMetaRobotsAttribute(): ?string
    {
        return $this->meta?->meta_robots;
    }

    public function getMetaKeywordsAttribute(): ?string
    {
        return $this->meta?->meta_key_words;
    }

    public function updateOrCreateMeta()
    {
        $arrayForUpdate = [];
        if ( $this->metaTitle ) {
            $arrayForUpdate['meta_title'] = $this->metaTitle;
        }

        if ( $this->metaDescription ) {
            $arrayForUpdate['meta_description'] = $this->metaDescription;
        }

        if ( $this->metaKeywords ) {
            $arrayForUpdate['meta_key_words'] = $this->metaKeywords;
        }

        if ( $this->metaRobots ) {
            $arrayForUpdate['meta_robots'] = $this->metaRobots;
        }

        $this->meta()->updateOrCreate(
            [
                'model_type' => get_class( $this ),
                'model_id'   => $this->id,
            ], $arrayForUpdate
        );

    }


}