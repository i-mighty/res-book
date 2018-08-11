/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import moment from 'moment';
import axios from 'axios';
import moment from 'moment';
import Dialog from 'material-dialog';
import MaterialDateTimePicker from 'material-datetime-picker';
import {ServerTable, ClientTable, Event} from 'vue-tables-2';

require('./bootstrap');
window.Vue = require('vue');
Vue.use(ClientTable);
Vue.use(ServerTable);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app_url = "http://127.0.0.1:8000";
const app = new Vue({
    el: '#header',
    data:{
        name: 'AppBody',
    },
    methods:{

    }
});
new Vue({
    el: "#tables",
    data: {
        columns: ['date', 'time', 'available_tables'],
        tableData: [],
        options: {
            perPage:12,
            perPageValues:[12],
            requestAdapter(data) {
                return {
                    sort: data.orderBy ? data.orderBy : 'date',
                    direction: data.ascending ? 'asc' : 'desc'

                }
            },
            responseAdapter({data}) {
                return {
                    data,
                    count: data.length
                }
            },
            filterable: false,
            pagination: {
                chunk: 12,
                edge: false
            }
        }
    }
});
new Vue({
    el: "#your_res",
    data: {
        columns: ['date', 'time', 'till', 'number_of_People', 'number_of_Tables'],
        tableData: [],
        options: {
            perPage:12,
            perPageValues:[12],
            requestAdapter(data) {
                return {
                    sort: data.orderBy ? data.orderBy : 'date',
                    direction: data.ascending ? 'asc' : 'desc'

                }
            },
            responseAdapter({data}) {
                return {
                    data,
                    count: data.length
                }
            },
            filterable: false,
            pagination: {
                chunk: 12,
                edge: false
            }
        }
    }
});
var resForm = document.querySelector('#resForm');
var tabs = document.querySelector('#tabs');
if(resForm != null){
    var formVue = new Vue({
        el:'#resForm',
        data:{
            name:'Body',
            folks: 1,
        },
        computed:{
            tables: function () {
                return Math.ceil(this.folks/6)
            }
        }
    });
    var time_input = document.querySelector('.c-datepicker-input');
    var picker = new MaterialDateTimePicker({
        container: document.body,
        styles: {
            scrim: 'c-scrim',
            back: 'c-datepicker__back',
            container: 'c-datepicker__calendar',
            date: 'c-datepicker__date',
            dayBody: 'c-datepicker__days-body',
            dayBodyElem: 'c-datepicker__day-body',
            dayConcealed: 'c-datepicker__day--concealed',
            dayDisabled: 'c-datepicker__day--disabled',
            dayHead: 'c-datepicker__days-head',
            dayHeadElem: 'c-datepicker__day-head',
            dayRow: 'c-datepicker__days-row',
            dayTable: 'c-datepicker__days',
            month: 'c-datepicker__month',
            next: 'c-datepicker__next',
            positioned: 'c-datepicker--fixed',
            selectedDay: 'c-datepicker__day--selected',
            selectedTime: 'c-datepicker__time--selected',
            time: 'c-datepicker__time',
            timeList: 'c-datepicker__time-list',
            timeOption: 'c-datepicker__time-option',
            clockNum: 'c-datepicker__clock__num'
        },
    }).on('submit', (val)=>{
        time_input.value = val.format("YYYY-MM-DD HH:mm:ss")
    });
    time_input.addEventListener('focus', () => picker.open());
    time_input.addEventListener('blur', function () {
        var now = moment();
        var res = moment(time_input.value);
        var date = time_input.value;
        if(now.isBefore(res, 'day')){

        }else{
            new Dialog({
                title: 'Use a valid time in the future',
                body: 'Reservations must be made at least a day in advance',
                size: 'small'
            }).show();
            return false;
        }
    });
}
function validateReservation() {
    var now = moment();
    var res = moment(time_input.value);
    var date = time_input.value;
    date.replace(' ', 'T')
    if(now.isBefore(res, 'day')){
        axios.get(app_url+'/available', {
            params: {
                date_time: date,
                tabs: tabs.value
            }
        }).then(function (response) {
            if(response.status === 200){
                if(response.data.status === true){
                    return true;
                }else{
                    new Dialog({
                        title: 'Table not available in that time',
                        body: 'Please check the list of hours with available tables',
                        size: 'small'
                    }).show();
                    return false;
                }
            }
        }).catch(function (err) {

        });
    }else{
        new Dialog({
            title: 'Use a valid time in the future',
            body: 'Reservations must be made at least a day in advance',
            size: 'small'
        }).show();
        return false;
    }
}