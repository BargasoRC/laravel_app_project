import Vue from 'vue'
import Router from 'vue-router'
import dashboard from '../components/dashboard'
import buses from '../components/addBus'
import schedules from '../components/schedules'
import bus from '../components/bus'
import update_bus from '../components/update'
import form from'../components/form.vue'

//user side
import welcome from '../components/UserMain.vue'
import chooseSeat from '../components/UserChooseSeat.vue'
import contact from '../components/UserContact.vue'
Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: dashboard
        },
        {
            path: '/bus/add_bus',
            name: 'buses',
            component: buses
        },
        {
            path: '/schedules',
            name: 'schedules',
            component: schedules
        },
        {
            path: '/bus',
            name: 'bus',
            component: bus
        },
        {
            path: '/bus/update',
            name: 'busUpdate',
            props:true,
            component: update_bus
        },
        {
            path: '/checkout_form',
            name:'form',
            component: form
        },
        //user side
        {
            path: '/welcome',
            name: 'welcome',
            component: welcome
        },
        {
            path: '/chooseSeat',
            name: 'chooseSeat',
            component: chooseSeat
        },
        {
            path: '/contact',
            name: 'contact',
            component: contact
        }

    
    ]
})