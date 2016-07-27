<script src="public/gallery/js/blueimp-gallery.min.js"></script>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<h2>Galeria</h2>
		
		<!-- The Gallery as inline carousel, can be positioned anywhere on the page -->
		<div id="blueimp-gallery-carousel" class="blueimp-gallery blueimp-gallery-carousel">
		    <div class="slides"></div>
		    <h3 class="title"></h3>
		    <a class="prev">‹</a>
		    <a class="next">›</a>
		    <a class="play-pause"></a>
		    <ol class="indicator"></ol>
		</div>
		

		<div id="links">
		    <a href="public/gallery/images/RSCN4257_min.JPG" title="">
<!-- 		        <img src="public/gallery/images/thumbnails/RSCN4257.JPG" alt=""> -->
		    </a>
		    <a href="public/gallery/images/DSCN0679_min.JPG" title="">
<!-- 		        <img src="public/gallery/images/DSCN0679_min.JPG" alt="lala"> -->
		    </a>
		    <a href="public/gallery/images/DSCN0720_min.JPG" title="">
<!-- 		        <img src="public/gallery/images/thumbnails/DSCN0720.JPG" alt=""> -->
		    </a>
		    <a href="public/gallery/images/IMG_20121124_183258_min.jpg" title="">
		    </a>
		    <a href="public/gallery/images/DSC00192_min.JPG" title="">
		    </a>
		</div>
		
		<script>
			document.getElementById('links').onclick = function (event) {
			    event = event || window.event;
			    var target = event.target || event.srcElement,
			        link = target.src ? target.parentNode : target,
			        options = {index: link, event: event},
			        links = this.getElementsByTagName('a');

			    blueimp.Gallery(links, options);
			};
			
			blueimp.Gallery(
			    document.getElementById('links').getElementsByTagName('a'),
			    {
			        container: '#blueimp-gallery-carousel',
			        carousel: true
			    }
			);

			var images = new Array()

			function preload() {
				for (i = 0; i < preload.arguments.length; i++) {
					images[i] = new Image()
					images[i].src = preload.arguments[i]
				}
			}
			preload(
				"public/gallery/images/RSCN4257_min.JPG",
				"public/gallery/images/DSCN0679_min.JPG",
				"public/gallery/images/DSCN0720_min.JPG",
				"public/gallery/images/IMG_20121124_183258_min.jpg",
				"public/gallery/images/DSC00192_min.JPG"
			)
		</script>
		
		
	</div>
</div>


