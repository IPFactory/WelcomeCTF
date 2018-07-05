<template>
<div id="top">
    <div class="container">
        <div id="body_band">
            <p id="problem-info">  <span>Web</span> <span>Q.1 test</span> <span>100pt</span> </p>
        </div>
        <div id="back-list">
            <router-link to="/main"><b>&lt; &lt; problem::list</b></router-link >
            </div>
        <div id="message">
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
