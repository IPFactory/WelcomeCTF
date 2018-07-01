<template>
<div id="top">
	<div class="container">
		<div id="body_band">
			<p><b>Welcome CTF</b></p>
		</div>
		<div id="message">
			<h1>競技形式</h1>
			<p>Jeopardy</p>
			<h1>競技時間</h1>
			<p>XXXX - MM - DD hh:mm:ss ~ XXXX - MM - DD hh:mm:ss</p>
		</div>
		<div id="body_band">
			<p><b>LOGIN</b></p>
		</div>
		<div id="message">
			<p><a href="#"><b>DIGEST</b></a></p>
			<p><a href="#"><b style="color:#1ca1f2;">Twitter</b></a></p>
			<p><a href="#"><b style="color:#394148;">GitHub</b></a></p>
			<p><a href="#"><b>登録</b></a></p>
		</div>
		<!--
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
	-->
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
