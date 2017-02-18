<?php

return [

    'auth_user' => [
        'table' => 'users',
        'namespace' => "App\Models\Access\User\Auth\AuthUser",
        'morph' => 'AUTH_USER'
    ],

    'assigned_role' => [
        'table' => 'role_user',
        'namespace' => "App\Models\User\AssignedRole\AssignedRole"
    ],

    'audit' => [
        'table' => 'audits',
        'namespace' => "App\Models\Audit\Audit"
    ],

    'audit_type' => [
        'table' => 'audit_types',
        'namespace' => "App\Models\Audit\Type\AuditType"
    ],

    'audit_action' => [
        'table' => 'audit_actions',
        'namespace' => "App\Models\Audit\Action\AuditAction"
    ],

    'audit_action_type' => [
        'table' => 'audit_action_types',
        'namespace' => "App\Models\Audit\Action\AuditAction\Type\AuditActionType"
    ],

    'app_data' => [
        'namespace' => 'App\Models\AppData\AppData',
        'table' => 'app_data'
    ],

    'article' => [
        'namespace' => 'App\Models\Article\Article',
        'table' => 'articles',
        'morph' => "ARTICLE"
    ],

    'country' => [
        'namespace' => '\App\Models\Geo\Country\Country',
        'table' => 'countries'
    ],

    'content_markdown' => [
        'namespace' => '\App\Models\Article\Section\Content\Markdown\ContentMarkdown',
        'table' => 'content_markdown',
        'morph' => 'CONTENT_MARKDOWN'
    ],

    'content_video' => [
        'namespace' => '\App\Models\Article\Section\Content\Video\ContentVideo',
        'table' => 'content_video',
        'morph' => 'CONTENT_VIDEO'
    ],

    'markdown' => [
        'namespace' => '\App\Models\Markdown\Markdown',
        'table' => 'markdowns'
    ],


    'image' => [
        'namespace' => '\App\Models\Image\Image',
        'table' => 'images'
    ],

    'video' => [
        'namespace' => '\App\Models\Video\Video',
        'table' => 'videos'
    ],

    'video_source' => [
        'namespace' => '\App\Models\Video\Source\VideoSource',
        'table' => 'video_sources'
    ],

    'video_video_source' => [
        'table' => 'video_video_source'
    ],

    'comment' => [
        'namespace' => '\App\Models\Comment\Comment',
        'table' => 'comments'
    ],
    'category' => [
        'namespace' => '\App\Models\Category\Category',
        'table' => 'categories',
    ],

    'phone' => [
        'namespace' => '\App\Models\Phone\Phone',
        'table' => 'phones',
    ],

    'phone_type' => [
        'namespace' => '\App\Models\Phone\PhoneType',
        'table' => 'phone_types'
    ],

    'permission' => [
        'table' => 'permissions',
        'namespace' => "App\Models\Access\Permission\Permission"
    ],

    'permission_type' => [
        'table' => 'permission_types',
        'namespace' => "App\Models\Access\Permission\Type\PermissionType"
    ],

    "permission_dependency" => [
        "table" => "permission_dependency",
        'namespace' => "App\Models\Access\Permission\Dependency\PermissionDependency"
    ],

    'role' => [
        'table' => 'roles',
        'namespace' => "App\Models\Access\Role\Role"
    ],


    "role_permission" => [
        "table" => "permission_role",
        'namespace' => "App\Models\Access\Role\Permission\RolePermission"
    ],

    "role_dependency" => [
        "table" => "role_dependency",
        'namespace' => "App\Models\Access\Role\Dependency\RoleDependency"
    ],

    'series' => [
        'namespace' => '\App\Models\Series\Series',
        'table' => 'series'
    ],

    'section' => [
        'namespace' => '\App\Models\Article\Section\Section',
        'table' => 'article_sections'
    ],


    'section_type' => [
        'namespace' => '\App\Models\Article\Section\Type\ArticleSectionType',
        'table' => 'article_section_types'
    ],


    'status' => [
        'namespace' => '\App\Models\Status\Status',
        'table' => 'statuses',
    ],

    'statusable' => [
        'table' => 'statusable',
    ],

    'tag' => [
        'namespace' => '\App\Models\Tag\Tag',
        'table' => 'tags'
    ],

    'taggable' => [
        'table' => 'taggables'
    ],

    'token' => [
        'namespace' => '\App\Models\Access\Token\Token',
        'table' => 'tokens'
    ],

    'token_provider' => [
        'namespace' => '\App\Models\Access\Token\Provider\TokenProvider',
        'table' => 'token_providers'
    ],

    'token_type' => [
        'namespace' => '\App\Models\Access\Token\Type\TokenType',
        'table' => 'token_types'
    ],

    'token_group' => [
        'namespace' => '\App\Models\Access\Token\Group\TokenGroup',
        'table' => 'token_groups'
    ],

    'user' => [
        'table' => 'users',
        'namespace' => "App\Models\Access\User\User"
    ],

    'user_settings' => [
        'namespace' => '\App\Models\Access\User\Settings\UserSettings',
        'table' => 'user_settings'
    ],


];
