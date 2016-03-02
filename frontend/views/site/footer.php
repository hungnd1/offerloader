<div class="container-fluid  footer" data-reactid=".0.6.1.1">
    <div class="copyright sm-text-center" data-reactid=".0.6.1.1.0"><p
            class="small no-margin pull-left sm-pull-reset" data-reactid=".0.6.1.1.0.0"><span class="hint-text" style="padding-left: 250px;"
                                                                                              data-reactid=".0.6.1.1.0.0.0">Copyright © 2015 </span><span
                class="font-montserrat" data-reactid=".0.6.1.1.0.0.1">CN6</span><span
                data-reactid=".0.6.1.1.0.0.2">.&nbsp;</span><span class="hint-text" data-reactid=".0.6.1.1.0.0.3">All rights reserved.</span><span
                class="sm-block hidden" data-reactid=".0.6.1.1.0.0.4"><a href="#" class="m-l-10 m-r-10"
                                                                         data-reactid=".0.6.1.1.0.0.4.0">Terms of
                    use</a><span data-reactid=".0.6.1.1.0.0.4.1"> | </span><a href="#" class="m-l-10"
                                                                              data-reactid=".0.6.1.1.0.0.4.2">Privacy
                    Policy</a></span></p>
        <p class="small no-margin pull-right sm-pull-reset" data-reactid=".0.6.1.1.0.1">Where discovery meets
            opportunity</p>
        <div class="clearfix" data-reactid=".0.6.1.1.0.2"></div>
    </div>
</div>
<div data-reactid=".0.6.1.2"></div>
</div>
</div>


<!--ENDCONTENT-->
</div>
<!-- END class Full Height -->
<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-59080413-2', 'auto');
    ga('send', 'pageview');

</script>


<!-- BEGIN VENDOR JS -->
<!--<script src="static/assets/plugins/pace/pace.min.js" type="text/javascript"></script>-->


<script>
    $(document).ready(function () {

        (function ($) {

            $('#filter').keyup(function () {

                var rex = new RegExp($(this).val(), 'i');
                $('.searchable tr').hide();
                $('.searchable tr').filter(function () {
                    return rex.test($(this).text());
                }).show();

            })

        }(jQuery));

    });

</script>

<script type="text/javascript">

    $('#checkAll').change(function(){
        $('.chk').prop('checked',this.checked);
    });

    $(".chk").change(function () {
        if ($(".chk:checked").length == $(".chk").length) {
            $('#checkAll').prop('checked','checked');
        }else{
            $('#checkAll').prop('checked',false);
        }
    });
</script>
<!--<script src="static/js/main.js"></script>-->
