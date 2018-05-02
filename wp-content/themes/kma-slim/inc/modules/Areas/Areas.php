<?php
/**
 * Created by PhpStorm.
 * User: bbair
 * Date: 9/25/2017
 * Time: 8:51 PM
 */

namespace Includes\Modules\Areas;

use KeriganSolutions\CPT\CustomPostType;

class Areas
{
    public function __construct()
    {
    }

    public function setupAdmin()
    {
        $this->createPostType();
        //        $this->createAdminColumns();
    }

    public function createPostType()
    {
        $area = new CustomPostType(
            'Area',
            [
                'supports'           => ['title', 'thumbnail'],
                'menu_icon'          => 'dashicons-location-alt',
                'has_archive'        => false,
                'menu_position'      => null,
                'public'             => true,
                'publicly_queryable' => true,
                'hierarchical'       => true,
                'show_ui'            => true,
                'show_in_nav_menus'  => true,
                '_builtin'           => false,
                'rewrite'            => [
                    'slug'       => 'city-information',
                    'with_front' => true,
                    'feeds'      => true,
                    'pages'      => false
                ]
            ]
        );

        $area->addMetaBox(
            'Home Owner Content',
            [
                'HTML' => 'wysiwyg'
            ]
        );

        $area->addMetaBox(
            'Contractor Content',
            [
                'HTML' => 'wysiwyg'
            ]
        );
    }

    /**
     * @return null
     */
    public function createAdminColumns()
    {
        //        add_filter(
        //            'manage_area_posts_columns',
        //            function ($defaults) {
        //                $defaults = [
        //                    'title'       => 'Name'
        //                ];
        //
        //                return $defaults;
        //            },
        //            0
        //        );
        //
        //        add_action('manage_team_member_posts_custom_column', function ($column_name, $post_ID) {
        //            switch ($column_name) {
        //
        //            }
        //        }, 0, 2);
    }

    public function getAreas($args = [])
    {
        $request = [
            'post_type'      => 'area',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'offset'         => 0,
            'post_status'    => 'publish',
        ];

        $request = get_posts(array_merge($request, $args));

        $output = [];
        foreach ($request as $item) {
            array_push($output, [
                'id'                 => (isset($itemID) ? $item->ID : null),
                'name'               => $item->post_title,
                'contractor_content' => (isset($item->contractor_content_html) ? $item->contractor_content_html : null),
                'home_owner_content' => (isset($item->home_owner_content_html) ? $item->home_owner_content_html : null),
                'slug'               => (isset($item->post_name) ? $item->post_name : null),
                'images'             => [
                    'thumbnail' => get_the_post_thumbnail_url($item->ID, 'thumbnail'),
                    'medium'    => get_the_post_thumbnail_url($item->ID, 'medium'),
                    'large'     => get_the_post_thumbnail_url($item->ID, 'large'),
                    'full'      => get_the_post_thumbnail_url($item->ID, 'full')
                ],
                'link'               => get_permalink($item->ID)
            ]);
        }

        return $output;
    }

    public function getSingle($name)
    {
        $output = $this->getAreas([
            'title'          => $name,
            'posts_per_page' => 1,
        ]);

        return $output[0];
    }
}
