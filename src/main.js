import { createApp } from 'vue'
import App from './App'
import './tailwind.css'
import { createStore } from 'vuex'
const store = createStore({
	
});

createApp(App).use(store).mount('#app')
