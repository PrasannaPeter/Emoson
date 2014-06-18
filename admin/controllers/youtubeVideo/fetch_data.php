<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<div class="videos">
  <div class="youtube-video"> <a href="http://www.youtube.com/watch?v=_OBlgSz8sSM"> <img src="http://img.youtube.com/vi/_OBlgSz8sSM/2.jpg" title="Play" alt="Play"/> </a> </div>
  <div class="details">
    <h6>Charlie bit my finger - again !</h6>
    <p class="link">http://www.youtube.com</p>
    <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
  </div>
</div>

<script type="text/javascript">
    jQuery(".videos .youtube-video a").click(function (){
		var videoID = jQuery(this).attr("href").split("=");
		var videoWidth = parseInt(jQuery(this).parent().parent().css("width"));
		var videoHeight = Math.ceil(videoWidth*(0.56)+1);

                jQuery(this).parent().hide();
		jQuery(this).parent().next().css('margin-left', '0');
		jQuery(this).parent().parent().prepend('<iframe width="500" height="300" src="http://www.youtube.com/embed/'+(videoID[1])+'?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>');
		return false;
});


</script>