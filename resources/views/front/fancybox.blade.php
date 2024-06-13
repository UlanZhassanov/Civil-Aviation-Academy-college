<script src="/js/fancybox/jquery.fancybox.min.js"></script>
<link rel="stylesheet" href="/js/fancybox/jquery.fancybox.min.css">
<script>
    $(document).ready(function() {
        /* Apply fancybox to multiple items */
        $("a.group").fancybox({
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 600,
            'speedOut': 200,
            'overlayShow': false
        });

    });
</script>
