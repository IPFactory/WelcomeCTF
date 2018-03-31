<template>
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-3">Login Your WelcomeCTF Account</h1>
			<form class="form-horizontal">
				<fieldset>
					<div class="form-group">
						<label for="inputUserId" class="col-lg-2 control-label">User ID</label>
						<div class="col-lg-10">
							<input id="inputUserId" placeholder="User ID" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-lg-2 control-label">Password</label>
						<div class="col-lg-10">
							<input id="inputPassword" placeholder="Password" type="password" class="form-control">
							<div class="checkbox">
								<label for="saveFlg">
									<input id="saveFlg" type="checkbox">
									Remenber Account
								</label>
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<p class="lead">
							<input type="button" value="Login" class="btn btn-primary btn-lg">
							<input type="reset" value="Clear" class="btn btn-lg">
						</p>
					</div>
				</fieldset>
			</form>
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
