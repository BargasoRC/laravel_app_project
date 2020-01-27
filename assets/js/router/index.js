import Vue from 'vue'
import Router from 'vue-router'
import dashboard from '../components/dashboard'
import buses from '../components/addBus'
import schedules from '../components/schedules'
import bus from '../components/bus'
import update_bus from '../components/update'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
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
        }
    ]
})