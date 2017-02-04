<?php

namespace App\Models\Video;

use App\Models\Model\Model;

class Video extends Model
{
    /**
     * Table Name
     * @var string
     */
    protected $model = "video";

    public function poster()
    {
        return $this->belongsTo(config('models.image.namespace'), 'poster_id');
    }

    public function getSourceById($id)
    {
        $sources = $this->sources;

        if (! $sources || $sources->count() < 1) {
            return null;
        }
        return $sources->first(function ($source) use ($id) {
            return $source->id === $id;
        });
    }

    public function sources()
    {
        return $this->belongsToMany(
            config('models.video_source.namespace'),
            config('models.video_video_source.table'),
            'video_id',
            'video_source_id'
        );
    }

    public function attachSource($source)
    {
        $sourceId = $source->id;
        $this->sources()->attach($sourceId);
    }
}
