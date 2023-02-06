import './bootstrap';

import { createApp } from 'vue'
import MainPage from './components/MainPage'

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUserPlus, faXmark, faCircleMinus, faCheck, faCaretDown, faCaretUp } 	from '@fortawesome/free-solid-svg-icons'
/* add icons to the library */
library.add(faUserPlus, faXmark, faCircleMinus, faCheck, faCaretDown, faCaretUp)


const app = createApp({})

app
	.component('font-awesome-icon', FontAwesomeIcon)
	.component('mainpage', MainPage)

app.mount('#app')

// createApp(App)
// .component('font-awesome-icon', FontAwesomeIcon)
// .component('mainpage', MainPage)
// .mount('#app')
