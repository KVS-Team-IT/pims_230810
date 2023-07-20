<script src="<?php echo base_url(); ?>js/autologout.js"></script>
<script>
$(window).bind("load", function() {
    // Remove splash screen after load
    $('.splash').css('display', 'none');
});
</script>
<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © <?php echo date("Y",strtotime("-1 year")).'-'.date('Y'); ?> <a
                    style="color:#fff!important; text-decoration: underline;" href="http://kvsangathan.nic.in"
                    target="_blank">Kendriya Vidyalaya Sangathan</a> | All Rights Reserved.</span>
        </div>
    </div>
</footer>
</body>

</html>