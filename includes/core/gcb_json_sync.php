<?php
/**
 * Auto-Sync JSON Files
 * 
 */

function gcb_sync_acf_fields(){
    $groups = acf_get_field_groups();
    $sync   = array();

	// Bail early if no field groups
    if( empty( $groups ) ) return;

    // find JSON field groups which have not yet been imported
    foreach( $groups as $group ) {

        $local      = acf_maybe_get( $group, 'local', false );
        $modified   = acf_maybe_get( $group, 'modified', 0 );
        $private    = acf_maybe_get( $group, 'private', false );

        // Ignore DB / PHP / private Field Groups
        if( $local !== 'json' || $private ) {

            // Do nothing

        } elseif( ! $group[ 'ID' ] ) {
            $sync[ $group[ 'key' ] ] = $group;
        } elseif( $modified && $modified > get_post_modified_time( 'U', true, $group[ 'ID' ], true ) ) {
            $sync[ $group[ 'key' ] ]  = $group;
        }
    }

    // Bail if no sync needed
    if(empty($sync)) return;

    if(!empty($sync)){      //if( ! empty( $keys ) ) {

        $new_ids = array();

        foreach( $sync as $key => $v ) {	//foreach( $keys as $key ) {

            // Append Fields
            if(acf_have_local_fields($key))
				$sync[$key]['fields'] = acf_get_local_fields($key);

            // Import
            $field_group = acf_import_field_group($sync[$key]);

        }

    }

}
add_action( 'admin_init', 'gcb_sync_acf_fields' );