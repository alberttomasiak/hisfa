<div class="header">
	<div class="left-icons"></div>
	<div class="middle-icons">{{ $title or 'Dashboard' }}</div>
	<div class="right-icons">
		@if(isset($silos))
			@if($silos->first())
			<a href="#" id="newNotification"><img src="img/notification-1.png" alt="New notification">
				<script type="text/javascript">
					document.getElementById("newNotification").addEventListener("click", function(event){
						swal({
							title: "De volgende silo's zijn bijna vol:",
							text: [@foreach($silos as $silo)
								"\n{{$silo->type . ' ' . $silo->number . ' is ' . $silo->volume . ' procent vol'}}", 
							@endforeach ],
							type: "error",
							confirmButtonText: "Begrepen"
						});
					});
				</script>
			</a>
			@else
			<a href="#" id="noNotification"><img src="img/notification.png" alt="No notifications">
			<script type="text/javascript">
					document.getElementById("noNotification").addEventListener("click", function(event){
						swal({
							title: "De silo's zijn nog niet vol.",
							type: "success",
							confirmButtonText: "Geweldig"
						});
					});
				</script>
			</a>
			@endif
		@endif
		<a href="/profiel">User Profile</a>
		</div>
</div>