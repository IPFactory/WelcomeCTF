import Vue from "vue";
import VueRouter from "vue-router";
import "./bootstrap";
import routes from "./routes";

Vue.use(VueRouter);

window.Vue = Vue;

const router = new VueRouter({
	routes: routes
});

const app = new Vue({
	el: "#app",
	router: router
});
