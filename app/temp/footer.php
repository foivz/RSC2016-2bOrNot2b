                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <footer itemscope itemtype="http://schema.org/WPFooter" aria-label="Footer" role="contentinfo">
    
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#datetimepicker1').datetimepicker({
                format: 'YYYY-mm-dd'
            });
		});
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
    $('ul').sortable({
        axis: 'y',
        stop: function (event, ui) {
            var data = $(this).sortable('serialize');
            $('span').text(data);
            /*$.ajax({
                    data: oData,
                type: 'POST',
                url: '/your/url/here'
            });*/
    }
    });
});
    </script>

</body>

</html>
