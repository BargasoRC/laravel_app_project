import Vue from 'vue'
import Router from 'vue-router'
import dashboard from '../components/dashboard'
import buses from '../components/addBus'
import schedules from '../components/schedules'
import bus from '../components/bus'
import update_bus from '../components/update'


//user side
import form from'../components/Userform.vue'
import welcome from '../components/UserMain.vue'
import chooseSeat from '../components/UserChooseSeat.vue'
import contact from '../components/UserContact.vue'
import ticket from '../components/UserTicket.vue'
import about from '../components/UserAbout.vue'
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
            props:true,
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
            props:true,
            component: chooseSeat
           
        },
        {
            path: '/contact',
            name: 'contact',
            component: contact
        },
        {
            path: '/ticket',
            name: 'ticket',
            props: true,
            component: ticket
        },
        {
            path: '/about',
            name: 'about',
            component: about
        }

    
    ]
})