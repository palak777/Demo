<template>

    <div>
    <v-data-table  class="elevation-1">
        <tr>
            <v-tooltip bottom>
                <td>Id </td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Mobile No</td>
            </v-tooltip>
        </tr>
        <tr slot="employeeData" slot-scope="employee">
            <td>{{employee.id}}</td>
            <td>{{employee.first_name}}</td>
            <td>{{employee.last_name}}</td>
            <td>{{employee.email}}</td>
            <td>{{employee.mobile_no}}</td>
        </tr>
    </v-data-table>
</div>
 

</template>
<script>

    export default {
        data(){
            return{
                employeeData:[]
          
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
                  //console.log(response.data);
              });
            }
        }
    }
</script>
