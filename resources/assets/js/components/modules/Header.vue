<template>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="navbar-header">
					<router-link to="/" class="navbar-brand router-link-active">
						<span class="text-danger">welcomeCTF</span>
					</router-link>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><router-link to="/" >Top</router-link></li>
						<li><router-link to="/main" >Challenge</router-link></li>
						<li><router-link to="/scoreboard" >Score</router-link></li>
						<li><router-link to="/Logout" >Logout</router-link></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<router-link to="/user">
							<img src="data:image/png;base64,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" width="18" height="18" class="nav_img"> n1270026
							</router-link>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</template>

<script>
	export default {
		mounted() {
			console.log('Component mounted.')
		}
	}
</script>
