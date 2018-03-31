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
							<label for="icon" class="col-lg-2 control-label">Icon</label>
							<div class="col-lg-6">
								<img v-show="smallIcon" :src="smallIcon">
								<input id="icon" type="file" style="display:none" v-on:change="getIconData">
								<input type="button" value="Select Icon" class="btn btn-primary btn-lg" v-on:click="selectIcon">
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
		},
		data() {
			return {
				icon: null,
				smallIcon: null
			}
		},
		methods: {
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
