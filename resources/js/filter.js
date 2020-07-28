import Vue from 'vue'
import moment from 'moment'
// time format 
Vue.filter('timeformat', arg => moment(arg).format("MMMM Do YYYY"))
// text short 
Vue.filter('textshort', (text, length, suffix) => text.substring(0, length) + suffix)