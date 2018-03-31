<template>
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-3">Regist Your WelcomeCTF Account</h1>
			<div class="center-block">
				<form class="form-horizontal">
					<fieldset>
						<div class="form-group">
							<label for="inputUserId" class="col-lg-2 control-label">User ID</label>
							<div class="col-lg-6">
								<input id="inputUserId" placeholder="User ID" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="inputUserId" class="col-lg-2 control-label">User Name</label>
							<div class="col-lg-6">
								<input id="inputUserName" placeholder="User Name" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-6">
								<input id="inputPassword" placeholder="Password" type="password" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword_again" class="col-lg-2 control-label">Password Again</label>
							<div class="col-lg-6">
								<input id="inputPassword_again" placeholder="Password" type="password" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-lg-2 control-label">Icon</label>
							<div class="col-lg-6">
								<input type="file" name="" id="">
							</div>
						</div>
						<hr>
						<div class="form-group">
							<p class="lead">
								<input type="button" value="Regist" class="btn btn-primary btn-lg">
								<input type="reset" value="Cancel" class="btn btn-lg">
							</p>
						</div>
					</fieldset>
				</form>
			</div>
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
