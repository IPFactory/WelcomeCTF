<template>
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-3">Regist Your WelcomeCTF Account</h1>
			<div class="center-block">
				<form class="form-horizontal" id="registForm" name="registForm" >
					<fieldset>
						<div class="form-group">
							<div class="row">
								<label for="inputUserId" class="col-lg-2 col-lg-offset-1 control-label">User ID</label>
								<div class="col-lg-6">
									<input id="inputUserId" placeholder="User ID" type="text" class="form-control" v-model="userId" maxlength="16" pattern="^[0-9A-Za-z]+$" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label for="inputUserName" class="col-lg-2 col-lg-offset-1 control-label">User Name</label>
								<div class="col-lg-6">
									<input id="inputUserName" placeholder="User Name" type="text" class="form-control" v-model="userName" maxlength="32" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label for="inputPassword" class="col-lg-2 col-lg-offset-1 control-label">Password</label>
								<div class="col-lg-6">
									<input id="inputPassword" placeholder="Password" type="password" class="form-control" v-model="password" maxlength="64" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label for="inputPassword_again" class="col-lg-2 col-lg-offset-1 control-label">Password Again</label>
								<div class="col-lg-6">
									<input id="inputPassword_again" placeholder="Password" type="password" class="form-control" v-model="passwordAgain" maxlength="64" pattern="^[0-9A-Za-z]+$" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label for="icon" class="col-lg-2 col-lg-offset-1 control-label">Icon</label>
								<div class="col-lg-6">
									<img v-show="smallIcon" :src="smallIcon">
									<input id="icon" type="file" style="display:none" v-on:change="getIconData">
									<input type="button" value="Select Icon" class="btn btn-primary btn-lg" v-on:click="selectIcon">
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-offset-2">
									<p class="lead">
										<input type="submit" id="submit" style="display:none;">
										<input :disabled="processing" type="button" value="Regist" class="btn btn-primary btn-lg" v-on:click.prevent="onsubmit">
										<router-link to="/" class="btn btn-danger btn-lg">Cancel</router-link>
									</p>
								</div>
							</div>
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
			console.log("Component mounted.")
		},
		data() {
			return {
				userId: "",
				userName: "",
				password: "",
				passwordAgain: "",
				icon: "",
				smallIcon: "",
				processing: false
			}
		},
		methods: {
			onsubmit() {
				if (this.processing) {
					return;
				}
				const form = document.getElementById("registForm");
				const submit = document.getElementById("submit");

				let isCheckPassword = this.checkPassword();
				if (form.checkValidity() && isCheckPassword) {
					this.processing = true;
					this.sendRegist();
				} else if (!form.checkValidity() && !isCheckPassword) {
					submit.click();
				};
			},
			checkPassword() {
				if (this.password !== this.passwordAgain) {
					document.getElementById("inputPassword").setCustomValidity("パスワードが一致しません。");
					return false
				} else {
					if (this.password === "" || this.passwordAgain === "") {
						submit.click();
						return false
					}
					document.getElementById("inputPassword").setCustomValidity("");
					return true
				}
			},
			sendRegist() {
				const registParameter = {
					userId: this.userId,
					userName: this.userName,
					password: this.password,
					icon: this.icon,
					smallIcon: this.smallIcon
				};

				const headers = {
					"Accept": "application/json",
					"Content-Type": "application/json"
				};

				const body = JSON.stringify(registParameter);

				// APIサーバーの要件定義が不明の為仮実装
				fetch("/api/user/regist", {method: "POST", headers, body})
					.then((res) => {
						this.processing = false;
						if (res.ok) {
							this.$router.push("/login");
						}
					});
			},
			selectIcon(e) {
				document.getElementById("icon").click();
			},
			getIconData(e) {
				const fileReader = new FileReader();
				const img = new Image();
				fileReader.onload = (e) => {
					img.src = e.target.result;
				};
				img.onload = () => {
					this.resizeIcon(img);
					this.resizeIcon64(img);
				}

				fileReader.readAsDataURL(e.target.files[0]);
			},
			resizeIcon(img) {
				const ICON_SIZE = 512;
				const canvas = document.createElement("canvas");
				const ctx = canvas.getContext("2d");
				const imgWidth = img.width;
				const imgHeight = img.height;
				canvas.width = canvas.height = ICON_SIZE;
				console.log(`${imgWidth}  ${imgHeight}`)
				let width, height, xOffset, yOffset;
				if (imgWidth > imgHeight) {
					width = imgWidth * (ICON_SIZE / imgHeight);
					height = ICON_SIZE;
					xOffset = -(width - ICON_SIZE) / 2;
					yOffset = 0;
				} else {
					width = ICON_SIZE;
					height = imgHeight * (ICON_SIZE / imgWidth);
					yOffset = -(height - ICON_SIZE) / 2;
					xOffset = 0;
				}
				ctx.drawImage(img, xOffset, yOffset, width, height);
				this.icon = canvas.toDataURL("image/jpeg");
			},
			resizeIcon64(img) {
				const ICON_SIZE = 64;
				const canvas = document.createElement("canvas");
				const ctx = canvas.getContext("2d");
				const imgWidth = img.width;
				const imgHeight = img.height;
				canvas.width = canvas.height = ICON_SIZE;
				console.log(`${imgWidth}  ${imgHeight}`)
				let width, height, xOffset, yOffset;
				if (imgWidth > imgHeight) {
					width = imgWidth * (ICON_SIZE / imgHeight);
					height = ICON_SIZE;
					xOffset = -(width - ICON_SIZE) / 2;
					yOffset = 0;
				} else {
					width = ICON_SIZE;
					height = imgHeight * (ICON_SIZE / imgWidth);
					yOffset = -(height - ICON_SIZE) / 2;
					xOffset = 0;
				}
				ctx.drawImage(img, xOffset, yOffset, width, height);
				this.smallIcon = canvas.toDataURL("image/jpeg");
			}
		}
	}
</script>
