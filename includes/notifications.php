<?php
add_action('ae_convert_notify', 'lp_ae_convert_notify', 11);
function lp_ae_convert_notify($notify){
	$notify->content = lp_fre_notify_item($notify);
	return $notify;
}

function lp_fre_notify_item( $notify ) {
	// parse post excerpt to get data
	$post_excerpt = str_replace( '&amp;', '&', $notify->post_excerpt );
	$output = array();
	if( ! empty( $post_excerpt) ){
		parse_str( $post_excerpt, $output );
	}
	extract($output);
	if ( ! isset( $type ) || ! $type ) {
		return;
	}
	$no_project_types = apply_filters('none_project_types',array(
		'new_invite',
		'approve_order',
		'cancel_order',
		'approve_withdraw',
		'cancel_withdraw',
		'new_payment',
		'add_credit',
		'minus_credit',
		'membership',
	));
	if ( ! in_array( $type, $no_project_types )	) {
		if ( ! isset( $project ) || ! $project ) {
			return;
		}
		$project_post = get_post( $project );

		if ( ! isset( $project ) || ! $project ) {
			return;
		}
		// check project exists or deleted
		if ( ! $project_post || is_wp_error( $project_post ) ) {
			return;
		}

		$project_link = '';
		if ( isset( $project ) ) {
			$project_link = '<a class="project-link" href="' . get_permalink( $project ) . '" >' . get_the_title( $project ) . '</a>';
		}
		$postdata[] = $notify;
	}
	$content = '';
	$content = apply_filters( 'fre_notify_item', $content, $notify, $type );
	switch ( $type ) {
		case 'resolve_project':
			// text : [Admin] Resolved the disputed project [dispute_project_name]
			$message = sprintf( __( '%s resolved the disputed job %s', ET_DOMAIN ),
				'<strong class="author-admin">' . get_the_author_meta( 'display_name', $admin ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '?dispute=1">
                            <span class="notify-avatar">' . get_avatar( $admin, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'report_dispute_project':
			// text : [Admin] Sent you a report on [dispute_detail_page]
			$classAdmin = '';
			if ( ae_user_role( $admin ) == 'administrator' ) {
				$classAdmin = 'author-admin';
			}
			$message = sprintf( __( '%s sent you a report on %s', ET_DOMAIN ),
				'<strong class="' . $classAdmin . '">' . get_the_author_meta( 'display_name', $admin ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '?dispute=1">
                            <span class="notify-avatar">' . get_avatar( $admin, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'approve_order':
			$order_type = get_post_meta( $order, 'et_order_product_type', true );
			//$href       = et_get_page_link( 'profile' );
			$href = '';
			if ( $order_type == 'fre_credit_plan' ) {
				$href = ' href="' . et_get_page_link( 'my-credit' ) . '" ';
			}
			$package = current( get_post_meta( $order, 'et_order_products', true ) );

			// text : [Admin] Approved your payment on [package_name] package
			$message = sprintf( __( '%s approved your payment on %s package', ET_DOMAIN ),
				'<strong class="author-admin">' . get_the_author_meta( 'display_name', $admin ) . '</strong>',
				'<strong>' . $package['NAME'] . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" ' . $href . '>
                            <span class="notify-avatar">' . get_avatar( $admin, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'cancel_order':
			$order_type = get_post_meta( $order, 'et_order_product_type', true );
			$href       = et_get_page_link( 'profile' );
			if ( $order_type == 'fre_credit_plan' ) {
				$href = et_get_page_link( 'my-credit' );
			}
			$package = current( get_post_meta( $order, 'et_order_products', true ) );

			// text : [Admin] Declined your payment on [package_name] package
			$message = sprintf( __( '%s declined your payment on %s package', ET_DOMAIN ),
				'<strong class="author-admin">' . get_the_author_meta( 'display_name', $admin ) . '</strong>',
				'<strong>' . $package['NAME'] . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" href="' . $href . '">
                            <span class="notify-avatar">' . get_avatar( $admin, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'reject_project':
			// text: [Admin] Rejected your project [project_name]
			$message = sprintf( __( '%s rejected your job %s', ET_DOMAIN ),
				'<strong class="author-admin">' . get_the_author_meta( 'display_name', $admin ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '">
                            <span class="notify-avatar">' . get_avatar( $admin, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'archive_project':
			// text: [Admin] Archived your draft project [project_name]
			$message = sprintf( __( '%s archived your draft job %s', ET_DOMAIN ),
				'<strong class="author-admin">' . get_the_author_meta( 'display_name', $admin ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '">
                            <span class="notify-avatar">' . get_avatar( $admin, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'delete_project':
			// text: [Admin] Deleted your archived project [project_name]
			$message = sprintf( __( '%s deleted your archived job %s', ET_DOMAIN ),
				'<strong class="author-admin">' . get_the_author_meta( 'display_name', $admin ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '">
                            <span class="notify-avatar">' . get_avatar( $admin, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'publish_project':
			// text: [Admin] Approved your project [project_name]
			$message = sprintf( __( '%s approved your job %s', ET_DOMAIN ),
				'<strong class="author-admin">' . get_the_author_meta( 'display_name', $admin ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '">
                            <span class="notify-avatar">' . get_avatar( $admin, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'close_project':
			// Text: <employer> closed your working project <project_title>
			$project_owner = get_post_field( 'post_author', $project );
			$message       = sprintf( __( '%s closed your working job %s', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $project_owner ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content       .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '?dispute=1">
                            <span class="notify-avatar">' . get_avatar( $project_owner, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'quit_project':
			// Text: <freelancer> discontinued on your project <project_title>
			$project_owner = get_post_field( 'post_author', $project );
			$bid_id        = get_post_meta( $project, 'accepted', true );
			$bid_author    = get_post_field( 'post_author', $bid_id );
			$message       = sprintf( __( '%s discontinued on your job %s', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $bid_author ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content       .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '?dispute=1">
                            <span class="notify-avatar">' . get_avatar( $bid_author, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'delete_bid':
			// Text: <freelancer> cancelled his bid on your project <project_title>
			$message = sprintf( __( '%s cancelled his application on your job %s', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $freelancer ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '">
                            <span class="notify-avatar">' . get_avatar( $freelancer, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		// notify employer when his project have new bid
		case 'new_bid':
			// Text: <freelancer> bidded on your project <project_title>
			// get bid author
			$bid_author = get_post_field( 'post_author', $bid );
			$message    = sprintf( __( '%s application to your job %s', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $bid_author ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content    .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '">
                            <span class="notify-avatar">' . get_avatar( $bid_author, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;

		case 'bid_accept':
			// Text: <employer> accepted your bid on the project <project_title>
			$project_owner = get_post_field( 'post_author', $project );
			$message       = sprintf( __( '%s accepted your application on the job %s', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $project_owner ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content       .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '">
                            <span class="notify-avatar">' . get_avatar( $project_owner, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;

		case 'complete_project':
			// Text: <employer> finished your working project <project_title>
			$project_owner = get_post_field( 'post_author', $project );
			$message       = sprintf( __( '%s finished your working job %s', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $project_owner ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content       .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '?workspace=1' . '">
                            <span class="notify-avatar">' . get_avatar( $project_owner, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;

		case 'review_project':
			// Text: <freelancer> reviewed on your project <project_title>
			$accepted_bid = get_post_meta( $project, 'accepted', true );
			$bid_author   = get_post_field( 'post_author', $accepted_bid );
			$message      = sprintf( __( '%s reviewed on your job %s', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $bid_author ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content      .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '?workspace=1' . '">
                            <span class="notify-avatar">' . get_avatar( $bid_author, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;

		case 'new_message':
			// Text: <employer> sent you a message on the <project_title> workspace
			$user_profile_id = get_user_meta( $sender, 'user_profile_id', true );
			if ( ! isset( $sender ) ) {
				$sender = 1;
			}
			$workspace_link = add_query_arg( array( 'workspace' => 1 ), get_permalink( $project ) );
			$message        = sprintf( __( '%s sent you a message on %s workspace ', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $sender ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content        .= '<a class="fre-notify-wrap" href="' . $workspace_link . '">
                            <span class="notify-avatar">' . get_avatar( $sender, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'new_invite':
			$project = get_post_meta( $notify->ID, 'project_list', true );
			$message = sprintf( __( '%s invited you to join job %s', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $send_invite ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content .= '<a class="fre-notify-wrap" href="' . get_permalink( $project ) . '">
                            <span class="notify-avatar">' . get_avatar( $send_invite, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;

		case 'new_comment':
			// Text: <user> commented on your project <project_title>
			$workspace_link = add_query_arg( array( 'workspace' => 1 ), get_permalink( $project ) );
			$message        = sprintf( __( '%s commented on your job %s', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $comment_author_id ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content        .= '<a class="fre-notify-wrap" href="' . $workspace_link . '">
                            <span class="notify-avatar">' . get_avatar( $comment_author_id, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'lock_file_project':
			// Text: <employer> sent you a message on the <project_title> workspace
			$user_profile_id = get_user_meta( $sender, 'user_profile_id', true );
			if ( ! isset( $sender ) ) {
				$sender = 1;
			}
			$workspace_link = add_query_arg( array( 'workspace' => 1 ), get_permalink( $project ) );
			$message        = sprintf( __( '%s locked the file section in the job %s. Click here for details', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $sender ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content        .= '<a class="fre-notify-wrap" href="' . $workspace_link . '">
                            <span class="notify-avatar">' . get_avatar( $sender, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'unlock_file_project':
			// Text: <employer> sent you a message on the <project_title> workspace
			$user_profile_id = get_user_meta( $sender, 'user_profile_id', true );
			if ( ! isset( $sender ) ) {
				$sender = 1;
			}
			$workspace_link = add_query_arg( array( 'workspace' => 1 ), get_permalink( $project ) );
			$message        = sprintf( __( '%s unlocked the file section in the job %s. Click here for details', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $sender ) . '</strong>',
				'<strong>' . get_the_title( $project ) . '</strong>'
			);
			$content        .= '<a class="fre-notify-wrap" href="' . $workspace_link . '">
                            <span class="notify-avatar">' . get_avatar( $sender, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'new_payment': // 1.8.8

			if ( ! isset( $buyer ) ) {
				$buyer = 1;
			}
			$admin_url = add_query_arg( array( 'page' => 'et-payments' ), admin_url('admin.php') );
			$message        = sprintf( __( '%s made a payment . Click here for details', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $buyer ) . '</strong>'	);

			$content        .= '<a class="fre-notify-wrap" href="' . $admin_url . '">
                            <span class="notify-avatar">' . get_avatar( $buyer, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;
		case 'project_status': // 1.8.8
			$status = isset($status) ? $status : '';

			$project_url  = get_permalink($project);
			$message        = sprintf( __( 'Your job is published. Go to job details', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $owner ) . '</strong>'	);
			if($status == 'archive'){
				$message        = sprintf( __( 'Your job is archive. Go to job details', ET_DOMAIN ),
				'<strong>' . get_the_author_meta( 'display_name', $owner ) . '</strong>'	);
			}

			$content        .= '<a class="fre-notify-wrap" href="' . $project_url . '">
                            <span class="notify-avatar">' . get_avatar( $owner, 48 ) . '</span>
                            <span class="notify-info">' . $message . '</span>
                            <span class="notify-time">' . sprintf( __( "%s on %s", ET_DOMAIN ), get_the_time( '', $notify->ID ), get_the_date( '', $notify->ID ) ) . '</span>
                        </a>';
			break;

		default:
			break;
	}

	$content .= '<a class="notify-remove" data-id="' . $notify->ID . '"><span></span></a>';

	// return notification content
	return $content;
}