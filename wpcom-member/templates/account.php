<?php defined( 'ABSPATH' ) || exit;?>
<div class="member-account-wrap">
    <div class="member-account-nav">
        <div class="member-account-user">
            <div class="member-account-avatar">
                <?php echo get_avatar( $user->ID, 200 );?>
                <span class="edit-avatar" data-user="<?php echo $user->ID;?>"><?php wpmx_icon('camera');?></span>
                <?php wp_nonce_field( 'wpcom_cropper', 'wpcom_cropper_nonce', 0 );?>
            </div>
            <?php $show_profile = apply_filters( 'wpcom_member_show_profile' , true );?>
            <h3 class="member-account-name">
                <?php if($show_profile){?><a href="<?php echo esc_url(get_author_posts_url($user->ID)); ?>" target="_blank">
                    <?php echo esc_html($user->display_name);?>
                </a>
                <?php }else { echo esc_html($user->display_name); } ?>
            </h3>
            <?php if($user->description){ ?><div class="member-account-dio"><?php echo wp_kses($user->description, 'user_description');?></div><?php } ?>
        </div>
        <ul class="member-account-menu">
            <?php $current_tab = null;
            foreach ($tabs as $t){
                if( $t['slug'] == $subpage && isset($t['parent']) && $t['parent'] ) {
                    $current_tab = $t;
                    $current_tab['slug'] = $t['parent'];
                }
            }
            foreach ( $tabs as $i => $tab ) { if( $i<999 ) {
                if( !$current_tab && $tab['slug'] == $subpage ) $current_tab = $tab; ?>
                <li class="member-nav-<?php echo esc_attr($tab['slug']); if( $current_tab && $tab['slug']==$current_tab['slug'] ) echo ' active';?>">
                    <a href="<?php echo esc_url(wpcom_subpage_url($tab['slug']));?>">
                        <?php wpmx_icon($tab['icon'], true, 'member-nav-icon');?><?php echo esc_html($tab['title']);?>
                    </a>
                </li>
            <?php } } ?>
        </ul>
    </div>
    <div class="member-account-content">
        <h2 class="member-account-title"><?php echo esc_html($current_tab['title']);?></h2>
        <?php if( isset($GLOBALS['validation']) && empty( $GLOBALS['validation']['error'] ) ) { ?>
        <div class="alert alert-success" role="alert">
            <div class="close" data-dismiss="alert"><?php wpmx_icon('close');?></div>
            <?php _e( 'Updated successfully.', 'wpcom' ); ?>
        </div>
        <?php } ?>
        <?php do_action( 'wpcom_account_tabs_' . $subpage ); ?>
    </div>
</div>
