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
            <td class="justify-center layout px-0">
                <v-btn icon class="mx-0" :to="{name : 'editEmployee',params: { id: props.item.id }}">
                    <v-icon color="teal">edit</v-icon>
                </v-btn>
                <v-btn icon class="mx-0" @click="deleteEmployee(props.item.id)">
                    <v-icon color="pink">delete</v-icon>
                </v-btn>
            </td>
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
                  { text: 'Mobile No', value: 'Mobile No.' },
                  { text: 'Action', value: 'Action' }
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
            },
            deleteEmployee(id)
            {
              let uri = `http://127.0.0.1:8000/employees/${id}`;
                this.axios.delete(uri);
                const index = this.employeeData.indexOf(id);
              this.employeeData.splice(index, 1);
              
              this.$router.push({name: 'employee'});
            }
        }
    }
</script>
