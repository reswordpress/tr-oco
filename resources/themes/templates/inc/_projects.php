<?php

/**
 * Main Object - Projects
 */
$projects = tr_post_type('Project', 'Projects')
    ->setIcon('folder')
    ->setTitlePlaceholder('Enter project name/title')
    ->setSlug('project')
    ->setAdminOnly()
    ->setArchivePostsPerPage(-1)
    // ->setRest('projects')
    ;
$projects->setArguments(array_merge($projects->getArguments(), ['public' => true])); 

$projects
    ->addColumn('favourite_color', false, 'Color', function ($value) {
        echo $value;
    }, 'string')
    ->addColumn('profile_picture', false, 'Profile Picture', function ($value) {
        echo wp_get_attachment_image($value, 'thumbnail');
    }, 'number');

/**
 * Taxomomies
 */
$pub = tr_taxonomy('Publisher')
    ->setHierarchical()
    ->setMainForm(function () {
        $form = tr_form();
        echo $form->gallery('Gallery')->setSetting('button', 'Insert Images');
    })
    ->setSlug('publishers');

/**
 * Metaboxes
 */
$meta_proj_color = tr_meta_box('Extra information')->setCallback(function () {
    $form = tr_form();
    echo $form->image('Profile Picture');
    echo $form->color('Favourite Color');
});
// -> Apply taxonomies and metaboxes
$projects->apply([$pub, $meta_proj_color]);