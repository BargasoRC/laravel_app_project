import Vue from 'vue'
import Router from 'vue-router'
//user side
import welcome from '../components/UserMain.vue'
import chooseSeat from '../components/UserChooseSeat.vue'
import contact from '../components/UserContact.vue'
import form from'../components/Userform.vue'
Vue.use(Router)

export default new Router({
    routes: [
        //user side
        {
            path: '/',
            name: 'welcome',
            component: welcome
        },
        {
            path: '/chooseSeat',
            name: 'chooseSeat',
            props:true,
            component: chooseSeat
           
        },
        {
            path: '/contact',
            name: 'contact',
            component: contact
        },
        {
            path: '/checkout_form',
            name:'form',
            component: form
        }

    
    ]
})