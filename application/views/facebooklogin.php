<script>

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

</script>