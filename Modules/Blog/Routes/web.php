<?php



// Switch between the included languages

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__.'/backend/');
});

Breadcrumbs::for('admin.category.index', function ($trail) {
    $trail->push('Category', route('admin.category.index'));
});
Breadcrumbs::for('admin.category.create', function ($trail) {
    $trail->push('Create Category', route('admin.category.create'));
});
Breadcrumbs::for('admin.category.edit', function ($trail) {
    $trail->push('Edit Category', route('admin.category.edit',1));
});

Breadcrumbs::for('admin.post.index', function ($trail) {
    $trail->push('Post', route('admin.post.index'));
});
Breadcrumbs::for('admin.post.create', function ($trail) {
    $trail->push('Create Post', route('admin.post.create'));
});
Breadcrumbs::for('admin.post.edit', function ($trail) {
    $trail->push('Edit Post', route('admin.post.edit',1));
});
