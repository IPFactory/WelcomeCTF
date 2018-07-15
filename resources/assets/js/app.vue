<template>
<div class="container">
    <router-view :show=show ref="body"></router-view>
</div>
</template>

<script>
export default {
    props:["show"],
    data (){
      return {
      }
    },
    methods: {

    }
}
</script>
