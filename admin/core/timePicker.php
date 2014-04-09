    <script src="js/jquery.ui.timepicker.js"></script>
	<script src='js/jquery.ui.timepicker-fr.js'></script>
    <script type="text/javascript" src="js/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.widget.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.tabs.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.position.min.js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
    <link rel="stylesheet" href="style/css/jquery.ui.timepicker.css" />

	
    <script type="text/javascript">

        function plusone_clicked() {
            $('#thankyou').fadeIn(300);
        }

        $(document).ready(function() {
            $('#floating_timepicker').timepicker({
                onSelect: function(time, inst) {
                    $('#floating_selected_time').html('You selected ' + time);
                }
            });

            $('#tabs').tabs();

        });


    </script>