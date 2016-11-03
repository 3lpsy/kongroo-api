<?php

return [
    'appData' => [
        'namespace' => '\App\Models\AppData\AppData',
        'table' => 'app_data',
        'class' => \App\Models\AppData\AppData::class
    ],
    'role' => [
        'namespace' => '\App\Models\Access\Role\Role',
        'table' => 'roles',
        'class' => \App\Models\Access\Role\Role::class
    ],
    'permission' => [
        'namespace' => '\App\Models\Access\Permission\Permission',
        'table' => 'permissions',
        'class' => \App\Models\Access\Permission\Permission::class
    ],
    'user' => [
        'namespace' => '\App\Models\Access\User\User',
        'table' => 'users',
        'class' => \App\Models\Access\User\User::class
    ],
    'tag' => [
        'namespace' => '\App\Models\Tag\Tag',
        'table' => 'tags',
        'class' => \App\Models\Tag\Tag::class
    ],
    'series' => [
        'namespace' => '\App\Models\Series\Series',
        'table' => 'series',
        'class' => \App\Models\Series\Series::class
    ],
    'article' => [
        'namespace' => '\App\Models\Article\Article',
        'table' => 'articles',
        'class' => \App\Models\Article\Article::class
    ],
    'section' => [
        'namespace' => '\App\Models\Article\Section\Section',
        'table' => 'article_sections',
        'class' => \App\Models\Article\Section\Section::class
    ],
    'sectionType' => [
        'namespace' => '\App\Models\Article\Section\Type\SectionType',
        'table' => 'article_section_types',
        'class' => \App\Models\Article\Section\Type\SectionType::class
    ],
    'contentMarkdown' => [
        'namespace' => '\App\Models\Article\Section\Content\Markdown\ContentMarkdown',
        'table' => 'content_markdown',
        'class' => \App\Models\Article\Section\Content\Markdown\ContentMarkdown::class
    ],
    'markdown' => [
        'namespace' => '\App\Models\Markdown\Markdown',
        'table' => 'markdowns',
        'class' => \App\Models\Markdown\Markdown::class
    ],


    'comment' => [
        'namespace' => '\App\Models\Comment\Comment',
        'table' => 'comments',
        'class' => \App\Models\Comment\Comment::class
    ],
    'category' => [
        'namespace' => '\App\Models\Category\Category',
        'table' => 'categories',
        'class' => \App\Models\Category\Category::class
    ],
    'status' => [
        'namespace' => '\App\Models\Status\Status',
        'table' => 'statuses',
        'class' => \App\Models\Status\Status::class
    ],
    'status' => [
        'namespace' => '\App\Models\Status\Status',
        'table' => 'statuses',
        'class' => \App\Models\Status\Status::class
    ],
    'phone' => [
        'namespace' => '\App\Models\Phone\Phone',
        'table' => 'phones',
        'class' => \App\Models\Phone\Phone::class
    ],
    'phoneType' => [
        'namespace' => '\App\Models\Phone\PhoneType',
        'table' => 'phone_types',
        'class' => \App\Models\Phone\PhoneType::class
    ],
    'userSettings' => [
        'namespace' => '\App\Models\Access\User\UserSettings',
        'table' => 'user_settings',
        'class' => \App\Models\Access\User\UserSettings::class
    ],

    'country' => [
        'namespace' => '\App\Models\Geo\Country\Country',
        'table' => 'countries',
        'class' => \App\Models\Geo\Country\Country::class
    ],

];
