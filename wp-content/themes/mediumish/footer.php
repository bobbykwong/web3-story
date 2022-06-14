</div><!-- /.site-content -->
        
        <div class="container">
            <footer class="footer"> 
                <p class="pull-left"> <?php echo wp_kses_data(get_theme_mod( 'footer_textleft', '&copy; Website Name. All rights reserved.')); ?> </p> 
                <p class="pull-right"> <?php echo wp_kses_data(get_theme_mod( 'footer_textright', 'Mediumish Theme by WowThemesNet.')); ?> </p> 
                <div class="clearfix"></div>
                <a href="" class="back-to-top hidden-md-down"> 
                <i class="fa fa-angle-up"></i>
                </a>
            </footer>
        </div>
        <?php wp_footer(); ?>
    </body>     
</html>
