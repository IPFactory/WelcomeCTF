import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes";
import "./bootstrap";

Vue.use(VueRouter);

window.Vue = Vue;

const router = new VueRouter({
	routes: routes
});

const app = new Vue({
	el: "#app",
	router: router
});
