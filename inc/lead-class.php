<?php

class LeadClass {

    
    function __construct() {

    }

    public function lead_download_offers() {
        $answer = file_get_contents("{$this->protocol}//api.leads.su/webmaster/offers/connectedPlatforms?limit=10&platform_id={$this->platform_id}&token={$this->token}");
        $answer = json_decode($answer, true);
        $this->offers = $answer;
        return $answer;
    }

    private function create_new_offers() {
        $uploads_offers_id = array();
        
        foreach ($this->offers['data'] as $offer) {
            $uploads_offers_id[] = $offer['id'];
        };

        $local_offers = get_posts(array(
            'numberposts'   => -1,
            'post_type'     => 'lead_offers',
            'post_status'   => 'publish',
            'meta_query'    => [
                'relation'  => 'OR',
                'id_lead'   => [
                    'key'   => 'id_lead',
                    'type'  =>'NUMERIC',
                    'meta_value_num' => $uploads_offers_id,
                    'compare'   => 'IN'
                ]
            ]
        ));

        // var_dump($local_offers);
        // var_dump($local_offers);

        $local_offers_id = [];
        foreach ($local_offers as $offer) {
            setup_postdata( $posts );
            $local_offers_id[] = $offer->id_lead;
        }
        wp_reset_postdata();
        

        $offers_for_create = array_diff( $uploads_offers_id, $local_offers_id );

        foreach ($this->offers['data'] as $offer) {
            // var_dump($offer);
            if (! in_array( $offer['id'], $offers_for_create )) continue;

            $local_ids_category = $this->get_local_ids_category($offer['categories']);
            // var_dump($local_ids_category);
            $offer_name = $offer['name'];
            $for_cut = stripos($offer_name,'[');
            if ($for_cut) {
                $offer_name = substr($offer_name, 0, $for_cut);
            }

            $post_data = [
                'post_title'    => $offer_name,
                'post_type'     => 'lead_offers',
                'post_category' => $local_ids_category,
                'post_status'   => 'publish',
                'meta_input'    => [
                    'id_lead'   => $offer['id']
                ]
            ];
            wp_insert_post( wp_slash( $post_data ));
        }
    }

    private function get_local_ids_category($cats_id) {
        $result = [];

        $atts = [
            'taxonomy'  => 'lead_categories',
            'type'      => 'lead_offers',
            'hide_empty'=> false,
            'meta_query'    => [
                'relation'  => 'OR',
                'id_lead_cat'   => [
                    'key'   => 'id_lead_cat',
                    'type'  =>'NUMERIC',
                    'meta_value_num' => $cats_id,
                    'compare'   => 'IN'
                ]
            ]

        ];
        $cats = get_categories( $atts );  
        // var_dump($cats);
        foreach ($cats as $cat) {
            $result[] = $cat->term_id;
        }

        return $result;
    }
    
}

?>