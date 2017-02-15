<script>
	$(document).ready(function(){
		// $('.buttonVote').hide();
	});

	window.fbAsyncInit = function() {
		FB.init({
			appId   : '<?php echo $this->config->item('facebook_app_id'); ?>',
			cookie  : true,
			xfbml   : false,
			version : '<?php echo $this->config->item('facebook_graph_version'); ?>',
			status  : false
		});

		FB.getLoginStatus(function(response) {
			loginCheck(response);
		});
	};

	function statusCheck(response)
	{
		if (response.status === 'connected')
		{

			// $('.buttonLogin').hide();
			// $('.buttonVote').show();
		}
	}

	function loginCheck()
	{
		FB.getLoginStatus(function(response) {
			statusCheck(response);
		});
	}

	$(function(){
		$('.buttonLogin').click(function() {
			<?php
			if(isset($permissionsMissing))
			{
				?>

				FB.login(function(response){
					location.reload();
				}, {scope: '<?php echo implode(",", $permissionsMissing['permissions']); ?>', auth_type: 'rerequest'}  );
				<?php
			}
			else
			{
				?>
				FB.login(function(){
					location.reload();
					loginCheck();
				}, {scope: '<?php echo implode(",", $this->config->item('facebook_permissions')); ?>'});

				<?php
			}
			?>
		});


		$('.buttonParticipate').click(function() {
			<?php
			if(isset($permissionsMissing))
			{
				?>

				FB.login(function(){
					location.reload();
				}, {scope: '<?php echo implode(",", $permissionsMissing['permissions']); ?>', auth_type: 'rerequest'}  );
				<?php
			}
			else
			{
				?>
				FB.login(function(){
					location.reload();
					loginCheck();
				}, {scope: '<?php echo implode(",", array('email', 'user_photos', 'publish_actions')); ?>'});

				<?php
			}
			?>
		});
	});

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>