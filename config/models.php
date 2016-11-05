<?php

return [

    'auth_user' => [
        'table' => 'users',
        'namespace' => "App\Models\Access\AuthUser\AuthUser"
    ],

    'user' => [
        'table' => 'users',
        'namespace' => "App\Models\Access\User\User"
    ],

    'user_settings' => [
        'namespace' => '\App\Models\Access\User\Settings\UserSettings',
        'table' => 'user_settings'
    ],

    'role' => [
        'table' => 'roles',
        'namespace' => "App\Models\Access\Role\Role"
    ],

    'assigned_role' => [
        'table' => 'role_user',
        'namespace' => "App\Models\User\AssignedRole\AssignedRole"
    ],

    "role_permission" => [
        "table" => "permission_role",
        'namespace' => "App\Models\Access\RolePermission\RolePermission"
    ],

    "role_dependency" => [
        "table" => "role_dependency",
        'namespace' => "App\Models\Access\Role\Dependency\RoleDependency"
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
        'namespace' => '\App\Models\AppData\AppData',
        'table' => 'app_data'
    ],

    'tag' => [
        'namespace' => '\App\Models\Tag\Tag',
        'table' => 'tags'
    ],

    'series' => [
        'namespace' => '\App\Models\Series\Series',
        'table' => 'series'
    ],

    'article' => [
        'namespace' => '\App\Models\Article\Article',
        'table' => 'articles'
    ],

    'section' => [
        'namespace' => '\App\Models\Article\Section\Section',
        'table' => 'article_sections'
    ],


    'section_type' => [
        'namespace' => '\App\Models\Article\Section\Type\ArticleSectionType',
        'table' => 'article_section_types'
    ],

    'content_markdown' => [
        'namespace' => '\App\Models\Article\Section\Content\Markdown\ContentMarkdown',
        'table' => 'content_markdown'
    ],

    'markdown' => [
        'namespace' => '\App\Models\Markdown\Markdown',
        'table' => 'markdowns'
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


    'country' => [
        'namespace' => '\App\Models\Geo\Country\Country',
        'table' => 'countries'
    ],

];
