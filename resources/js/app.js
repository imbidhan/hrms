
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        msg: "",
        bUrl: 'http://localhost/hrms/public/',
        employee_id: "",
        employee: [],
        employee_pin: '',
        assignSupervisor_name: ''
    },
    methods: {
        onChange: function (employee_id) {
            axios.get(this.bUrl + 'addSupervisor/' + employee_id)
            .then( (response) => {
                if(response.status === 200){
                    //console.log(response.data);
                    app.employee = response.data;
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        getEmployeeValues: function (){
            //console.log(this.employee_pin);
            axios.post(this.bUrl + '/searchEmployee',{
                id: this.employee_pin
            })
            .then( (response) => {
                if(response.status === 200){
                    //console.log(response.data);
                    this.employee_pin = "";
                    app.employee = response.data;
                }
            })
            .catch(function (error) {
                app.msg = "Record Not Found !";
            });
        },

        assignSupervisor: function (assignSupervisor_name) {
        axios.get(this.bUrl + 'addSupervisor/' + assignSupervisor_name)
            .then( (response) => {
                    if(response.status === 200){
                    //console.log(response.data);
                    app.employee = response.data;
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
});
