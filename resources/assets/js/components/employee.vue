<template>
     <v-app id="inspire">
    <div>
     <v-btn slot="activator" color="primary" dark class="mb-2" :to="{name : 'addEmployee'}">New Employee</v-btn>
    <v-data-table  class="elevation-1" :headers="headers" :items="employeeData"
        :search="search" :pagination.sync="pagination" >
        
        <template slot="items" slot-scope="props" >
            <td>{{props.item.id}}</td>
            <td>{{props.item.first_name}}</td>
            <td>{{props.item.last_name}}</td>
            <td>{{props.item.email}}</td>
            <td>{{props.item.mobile_no}}</td>
        </template> 
                    
    </v-data-table>
</div>
 </v-app>

</template>
<script>

    export default {
        data(){
            return{
                 headers: [
                  { text: 'No', value: '#' },
                  { text: 'First Name', value: 'First Name' },
                  { text: 'Last Name', value: 'Last Name' },
                  { text: 'Email Id', value: 'Email Id' },
                  { text: 'Mobile No', value: 'Mobile No.' }
                ],
                search:'',
                pagination:{},
                employeeData:[]
                
            }
        },
        computed: {
          pages () {
            if (this.pagination.rowsPerPage == null ||
              this.pagination.totalItems == null
            ) return 0

            return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage)
          }
        },
        created: function()
        {
            this.fetchEmployee();
        },
        methods: {
            fetchEmployee()
            {
              let uri = 'http://127.0.0.1:8000/employees';
              this.axios.get(uri).then((response) => {
                  this.employeeData = response.data;
              });
            }
        }
    }
</script>
