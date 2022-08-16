<?php
defined( 'ABSPATH' ) || exit;

$options = $GLOBALS['wpmx_options'];
$social_login_on = isset($options['social_login_on']) && $options['social_login_on']=='1' ? 1 : 0;
$classes = apply_filters('wpcom_login_form_classes', 'member-form-wrap member-form-login');
$logo = isset($options['login_logo']) && $options['login_logo'] ? wp_get_attachment_url( $options['login_logo'] ) : (function_exists('wpcom_logo') ? wpcom_logo() : '');
?>
<div class="<?php echo esc_attr($classes);?>">
    <div class="member-form-inner">
        <?php if($logo){ ?>
        <div class="member-form-head">
            <div class="member-form-head">
                <a class="member-form-logo" href="<?php bloginfo('url');?>" rel="home"><img class="j-lazy" src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' ));?>"></a>
            </div>
        </div>
        <?php } ?>
        <div class="member-form-title">
            <h3><?php _e('Sign In', 'wpcom');?></h3>
            <span class="member-switch pull-right"><?php _e('No account?', 'wpcom');?> <a href="<?php echo esc_url(wp_registration_url());?>"><?php _e('Create one!', 'wpcom');?></a></span>
        </div>
        <?php
        // 默认登录表单
        do_action( 'wpcom_login_form' );
        ?>
        <?php if( $social_login_on ){ ?>
            <div class="member-form-footer">
                <div class="member-form-social">
                    <span><?php _e('Sign in with', 'wpcom');?></span>
                    <?php do_action( 'wpcom_social_login' );?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>