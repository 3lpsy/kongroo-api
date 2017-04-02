<?php
namespace App\Transformers\Eloquent\Admin\Section;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
use App\Models\Article\Section\Section;
use App\Transformers\Eloquent\Admin\Status\ApiStatusTransformer;
use App\Transformers\Eloquent\Admin\SectionType\ApiSectionTypeTransformer;
use App\Transformers\Eloquent\Admin\Content\ApiVideoContentTransformer;
use App\Transformers\Eloquent\Admin\Content\ApiMarkdownContentTransformer;

class ApiSectionTransformer extends EloquentTransformer
{
    protected $availableIncludes = ['status', 'type', 'content'];

    public function transform(Section $section)
    {
        return [
            'id' => (int) $section->id,
            'header' => $section->header,
            'description' => $section->description,
            'slug' => $section->slug,
            'sort' => $section->sort
        ];
    }

    public function includeStatus(Section $section)
    {
        return $this->item($section->status, new ApiStatusTransformer, false);
    }

    public function includeContent(Section $section)
    {
        if ($section->content->contentType === 'content_video') {
            return $this->includeVideoContent($section);
        } elseif ($section->content->contentType === 'content_markdown') {
            return $this->includeMarkdownContent($section);
        }
        return null;
    }

    protected function includeVideoContent($section)
    {
        return $this->item($section->content, new ApiVideoContentTransformer, false);
    }

    protected function includeMarkdownContent($section)
    {
        return $this->item($section->content, new ApiMarkdownContentTransformer, false);
    }

    public function includeType(Section $section)
    {
        return $this->item($section->type, new ApiSectionTypeTransformer, false);
    }
}
