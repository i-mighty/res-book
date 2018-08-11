import axios from 'axios';
import Dialog from 'material-dialog';
import MaterialDateTimePicker from 'material-datetime-picker';

const input = document.querySelector('.c-datepicker-input');
const resForm = document.querySelector('#resForm');
const uRes = document.querySelector('#uRes');
const tabs = document.querySelector('#tabs');
const picker = new MaterialDateTimePicker({
    container: document.body,
}).on('submit', (val)=>{
    input.value = val.format("YYYY-MM-DD HH:mm:ss");
});
uRes.addEventListener('click', ()=> {
    new Dialog({
        title: 'Use a valid time in the future',
        body: 'Reservations must be made at least a day in advance',
        size: 'medium'
    }).show();
});
input.addEventListener('focus', () => picker.open());
input.addEventListener('blur', ()=>{
    var past = new Dialog({
        title: 'Use a valid time in the future',
        body: 'Reservations must be made at least a day in advance',
        size: 'small'
    });
    var unav = new Dialog({
        title: 'Table not available in that time',
        body: 'Please check the list of hours with available tables',
        size: 'small'
    })
    var now = moment();
    var res = moment(input.value);
    var date = input.value;
    date.replace(' ', 'T')
    if(now.isBefore(res, 'day')){
        axios.get(app_url+'/available', {
            params: {
                date_time: date,
                tabs: tabs.value
            }
        }).then(function (response) {
            if(response.status === 200){
                switch (response.data.status){
                    case true:return true;
                    case false:unav.show;
                }
            }
        }).catch(function (err) {

        });
    }else{
        past.show();
    }
});