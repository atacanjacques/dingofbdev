<footer class="footer">

	<div class="container">


		<div class="row text-center">
			<div class="col-sm-12 col-xs-12 text-center cgu">
				<a class="various buttonCGU mentionsLink fancybox.ajax" data-fancybox-type="iframe" href="/home/mentions_legales">Mentions légales</a>
				<a class="various buttonCGU cguLink fancybox.ajax" data-fancybox-type="iframe" href="/home/cgu">CGU</a>
				<?php if($_SESSION['isAdmin']){ ?>
				<a class="various buttonCGU" href="/admin">Administration</a>
				<?php } ?>
			</div>

		</div>
	</div>
</footer>


</body>

</html>