<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.module.index', function ($trail) {
    $trail->push('Module Explorer', route('admin.module.index'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

Breadcrumbs::for('admin.file_manager.index', function ($trail) {
    $trail->push('File Manager', route('admin.file_manager.index'));
});

Breadcrumbs::for('admin.settings.index', function ($trail) {
    $trail->push('General Settings', route('admin.settings.index'));
});

Breadcrumbs::for('admin.about_us', function ($trail) {
    $trail->push('About Us', route('admin.about_us'));
});

Breadcrumbs::for('admin.privacy_policy', function ($trail) {
    $trail->push('Privacy Policy', route('admin.privacy_policy'));
});

Breadcrumbs::for('admin.terms_and_conditions', function ($trail) {
    $trail->push('Terms and Conditions', route('admin.terms_and_conditions'));
});

Breadcrumbs::for('admin.contactus_thanks', function ($trail) {
    $trail->push('Contact Us Thanks Email', route('admin.contactus_thanks'));
});

Breadcrumbs::for('admin.package.index', function ($trail) {
    $trail->push('Packages', route('admin.package.index'));
});

Breadcrumbs::for('admin.package.create', function ($trail) {
    $trail->push('Create Package', route('admin.package.create'));
});
Breadcrumbs::for('admin.package.edit', function ($trail) {
    $trail->push('Edit Package', route('admin.package.edit',1));
});

Breadcrumbs::for('admin.country.index', function ($trail) {
    $trail->push('Country', route('admin.country.index'));
});
Breadcrumbs::for('admin.country.create', function ($trail) {
    $trail->push('Create Country', route('admin.country.create'));
});
Breadcrumbs::for('admin.country.edit', function ($trail) {
    $trail->push('Edit Country', route('admin.country.edit',1));
});

Breadcrumbs::for('admin.city.index', function ($trail) {
    $trail->push('City', route('admin.city.index'));
});
Breadcrumbs::for('admin.city.create', function ($trail) {
    $trail->push('Create City', route('admin.city.create'));
});
Breadcrumbs::for('admin.city.edit', function ($trail) {
    $trail->push('Edit City', route('admin.city.edit',1));
});

Breadcrumbs::for('admin.agent.index', function ($trail) {
    $trail->push('Agent List', route('admin.agent.index'));
});

Breadcrumbs::for('admin.donor.index', function ($trail) {
    $trail->push('Donor List', route('admin.donor.index'));
});

Breadcrumbs::for('admin.receivers_list', function ($trail) {
    $trail->push('Receivers', route('admin.receivers_list',1));
});

Breadcrumbs::for('admin.agent.show', function ($trail) {
    $trail->push('Show', route('admin.agent.show',1));
});

Breadcrumbs::for('admin.donate_gigs', function ($trail) {
    $trail->push('Donate Gigs', route('admin.donate_gigs',1));
});

Breadcrumbs::for('admin.donate_gigs_view', function ($trail) {
    $trail->push('Donate Gigs View', route('admin.donate_gigs_view',1));
});




