    </main><!-- /.main -->

    <?php  
        $content = get_field( 'ct_footer_content' , pll_current_language() );
        $socials = get_field ( 'ct_socials' , 'option' );
        $contacts = get_field ( 'ct_contacts' , pll_current_language() );
        wp_footer();
    ?>
    
    <footer class="footer">
        <div class="shell">
            <div class="footer__inner">
                <div class="footer__content">
                    <a href="<?php echo home_url( '/' ) ?>" class="logo footer__logo">
                        <?php ct_include_fragment('svgs/logo' , []) ?>
                    </a><!-- /.logo -->

                    <?php if( ! empty( $content ) ) :?>
                        <div class="footer__entry">
                            <?php echo $content ?>
                        </div><!-- /.footer__entry -->
                    <?php endif ?>

                    <?php if( ! empty( $socials ) ) :?>
                        <ul class="socials">
                            <?php foreach( $socials as $social ) :?>
                                <li class="social">
                                    <a href="<?php echo $social['link'] ?>" target="_blank">
                                        <?php echo $social['icon'] ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </div><!-- /.footer__content -->

                <div class="footer__links">
                    <div class="footer__nav">
                        <h5> <?php ct_e('Menu', 'ct') ?> </h5>
                        
                        <?php wp_nav_menu( [
                            'theme_location' => 'header_menu',
                            'container' => 'nav',
                            'container_class' => 'footer-nav',
                        ] ); ?>
                    </div><!-- /.footer__nav -->
                   
                    <div class="footer__contacts">
                        <h5> <?php ct_e('Find Us', 'ct') ?> </h5>

                        <?php if( ! empty( $contacts ) ) :?>
                            <ul class="contacts">
                                <?php foreach( $contacts as $contact ) :?>
                                    <li class="contact">
                                        <a href="<?php echo ct_get_contact_link($contact['contact']) ?>" target="_blank"> 
                                            <strong>
                                                <?php 
                                                    $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'; 

                                                    if( str_starts_with($contact['contact'], '+') ) {
                                                        ct_e('P.' , 'ct');
                                                    }
                                                
                                                    else if( preg_match($regex, $contact['contact']) ) {
                                                        ct_e('E.' , 'ct');
                                                    }

                                                    else {
                                                        ct_e('L.' , 'ct');
                                                    }
                                                ?>                                        
                                            </strong>

                                            <?php echo $contact['contact'] ?>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </div><!-- /.footer__contacts -->
                </div><!-- /.footer__links -->
            </div><!-- /.footer__inner -->

            <div class="footer__bar">
                <p>&copy <?php echo ct__('Copyright', 'ct') . ' ' . get_bloginfo( 'name' ) . ' ' . date("Y") . ct__( ', All right reserved.' , 'ct' ); ?></p>
            </div><!-- /.footer__bar -->
        </div><!-- /.shell -->
    </footer><!-- /.footer -->
</div><!-- /.wrapper -->