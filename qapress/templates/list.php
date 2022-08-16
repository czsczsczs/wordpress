<div class="q-content q-panel">
    <div class="q-header">
        <div class="q-header-tab">
            <a href="<?php echo QAPress_category_url('');?>" class="topic-tab<?php echo !$current_cat ? ' current-tab':'';?>"><?php _ex('All', 'qapress', 'wpcom');?></a>
            <?php if($cats && $cats[0]){
                foreach ($cats as $cid) {
                    $cat = get_term(trim($cid), 'qa_cat');
                    if($cat){
                        $is_current = $current_cat && ($current_cat->slug==$cat->slug || $current_cat->slug==urldecode($cat->slug)); ?>
                        <a href="<?php echo QAPress_category_url($cat->slug);?>" class="topic-tab<?php echo ($is_current ? ' current-tab' : '');?>">
                            <?php echo $cat->name;?>
                        </a>
                    <?php }
                }
            } ?>
        </div>
        <div class="q-mobile-ask"><a href="<?php echo esc_url($new_url);?>"><i class="wpcom-icon wi"><svg aria-hidden="true"><use xlink:href="#wi-add"></use></svg></i></a></div>
    </div>

    <div class="q-topic-wrap">
        <div class="q-topic-list">
        <?php if($list){
            global $post;
            foreach ($list as $post) {
                echo QAPress_template('list-item', array('post'=> $post));
            }
        }else{ ?>
            <div class="q-topic-item q-topic-empty">
                <svg width="134" height="111" viewBox="0 0 134 111" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-3 -8)" fill="none" fill-rule="evenodd"><path d="M8.868 80c.474 0 .857.384.857.857v4.292h4.424a.85.85 0 1 1 0 1.702l-4.424-.001v4.293a.857.857 0 1 1-1.714 0V86.85h-4.16a.85.85 0 0 1 0-1.7l4.16-.001v-4.292c0-.473.384-.857.857-.857z" fill="#DAE0E5"/><ellipse fill="#DAE0E5" cx="70" cy="115" rx="40" ry="4"/><path d="M22 15.88v-5.76a1.216 1.216 0 0 1 1.73-1.102l6.17 2.88a1.216 1.216 0 0 1 0 2.204l-6.17 2.88A1.216 1.216 0 0 1 22 15.88z" fill="#DAE0E5"/><circle stroke="#DAE0E5" stroke-width="1.824" cx="120" cy="92" r="5"/><path d="M130.868 11c.474 0 .857.384.857.857v4.292h4.424a.85.85 0 0 1 0 1.702l-4.424-.001v4.293a.857.857 0 0 1-1.714 0V17.85h-4.16a.85.85 0 0 1 0-1.7l4.16-.001v-4.292c0-.473.384-.857.857-.857z" fill="#DAE0E5"/><path d="M31.382 39C28.415 39 26 41.426 26 44.406v39.088c0 2.98 2.415 5.406 5.382 5.406h16.82l-.79 6.132c-.299 1.178-.088 2.38.597 3.34A3.906 3.906 0 0 0 51.184 100c.728 0 1.455-.203 2.1-.586.08-.047.158-.099.233-.155l13.97-10.36h24.128c2.97 0 5.385-2.425 5.385-5.405V44.406C97 41.426 94.585 39 91.615 39H31.382zM67 85.81c-.612 0-1.208.197-1.7.563l-13.924 9.112.822-6.42a2.91 2.91 0 0 0-.69-2.275 2.85 2.85 0 0 0-2.151-.98l-19.898.1-.05-22.14-.05-21.298 64.548-.1.098 43.437H67z" fill="#DAE0E5" fill-rule="nonzero"/><path d="M109.619 19l-53.43.075c-2.86 0-5.189 2.317-5.189 5.163v8.238l3.37-.075V22.184h56.598v37.423l-7.234.075c-.684.492-1.025 1.19-1.025 2.092 0 .903.341 1.645 1.025 2.226h5.925c2.861 0 4.341-1.472 4.341-4.318V24.238c0-2.846-1.52-5.238-4.381-5.238zM63.642 70v-.608c0-.859.177-1.646.566-2.362.317-.644.812-1.288 1.483-1.86 1.66-1.468 2.649-2.398 2.967-2.791C69.54 61.234 70 59.766 70 58.013c0-2.147-.706-3.864-2.12-5.117C66.469 51.608 64.632 51 62.37 51c-2.613 0-4.661.751-6.145 2.29C54.742 54.793 54 56.832 54 59.444h3.709c0-1.574.317-2.79.953-3.65.707-1.037 1.872-1.538 3.462-1.538 1.271 0 2.295.358 3.002 1.074.67.715 1.024 1.681 1.024 2.934 0 .93-.353 1.789-.989 2.612l-.6.68c-2.19 1.968-3.532 3.435-3.991 4.436-.495.93-.707 2.076-.707 3.4V70h3.78z" fill="#DAE0E5" fill-rule="nonzero"/><path fill="#DAE0E5" d="M59 72h4v4h-4z"/></g></svg>
                <p class="q-topic-empty-text"><?php _ex('Question list is empty', 'qapress', 'wpcom');?></p>
            </div>
        <?php } ?>
        </div>
    <?php echo QAPress_pagination($per_page, $page, $current_cat);?>
    </div>
</div>