<template>
	<div class="container">
		<div id="body_band">
			<p><b>Login Your WelcomeCTF Account</b></p>
		</div>
		<div id="message">
			<form>
				<div class="form-group">
					<label for="email">Email : </label>
					<input type="text" class="form-control" id="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="email">Password : </label>
					<input type="password" class="form-control" id="password" placeholder="password">
				</div>
				<!--<div class="alert alert-danger" role="alert" v-if="showAlert"><strong>{{ alertMessage }}</strong></div>-->
			</form>
			<div id="login-button" onclick="">
				<b>LOGIN</b>
			</div>
		</div>
	</div>
</template>


<script>
	export default {
		mounted() {
			console.log('Component mounted.')
		},
		data() {
			return {
				"notification": "none"
			}
		}
	}
</script>
