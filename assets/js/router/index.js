import Vue from 'vue'
import Router from 'vue-router'
import dashboard from '../components/dashboard'
import buses from '../components/buses'
import schedules from '../components/schedules'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: dashboard
        },
        {
            path: '/buses',
            name: 'buses',
            component: buses
        },
        {
            path: '/schedules',
            name: 'schedules',
            component: schedules
        }
    ]
})