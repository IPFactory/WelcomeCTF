import top from "./components/Top.vue";
import login from "./components/Login.vue";
import regist from "./components/Regist.vue";
import main from "./components/Main.vue";
import user from "./components/User.vue";
import problem from "./components/Problem.vue";
import scoreboard from "./components/Scoreboard.vue";
import logout from "./components/Logout.vue";
import header from "./components/modules/Header.vue";

Vue.component("header", header);

export default [
	{
		path: "/",
		component: top
	},
	{
		path: "/login",
		component: login
	},
	{
		path: "/regist",
		component: regist
	},
	{
		path: "/main",
		component: main
	},
	{
		path: "/user",
		component: user
	},
	{
		path: "/problem",
		component: problem
	},	{
		path: "/scoreboard",
		component: scoreboard
	},
	{
		path: "/logout",
		component: logout
	}


]