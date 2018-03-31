<template>
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-3">Welcome CTF</h1>
			<p class="lead">			:)</p>
			<hr>
			<p>make a first your account. and do Login.</p>
			<p class="lead">
				<router-link to="/login" class="btn btn-primary btn-lg">Login</router-link>
				<router-link to="/regist" class="btn btn-primary btn-lg">Regist</router-link>
			</p>
		</div>
	</div>
</template>

<script>
	export default {
		mounted() {
			console.log('Component mounted.')
		}
	}
</script>
