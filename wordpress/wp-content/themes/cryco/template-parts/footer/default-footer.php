<?php
$footer_copyright = cryco_option('footer_copyright');
?>

<footer class="site-footer default-footer">
    <div class="footer__copyright">
        <div class="container">
            <div class="footer__copyright-inner ul_li_center">
                <div class="footer__copyright-text mt-15">
                    <?php if(!empty($footer_copyright)){echo esc_html($footer_copyright);}else{ esc_html_e( '© Cryco 2024 | All Right Reserved', 'cryco' );}?>
                </div>
            </div>
        </div>
    </div>
</footer>