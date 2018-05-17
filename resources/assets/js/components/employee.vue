<template>
    <div>
        <h2>Employees Information</h2>

        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
                 <router-link :to="{ name: 'addEmployee' }" class="btn btn-primary">Add</router-link>
          </div>
        </div><br />
        
        <div class="row" >
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>MobileNo</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="employee in employeeData">
                        <td>{{ employee.id }}</td>
                        <td>{{ employee.first_name }}</td>
                        <td>{{ employee.last_name }}</td>
                        <td>{{ employee.email }}</td>
                        <td>{{ employee.mobile_no }}</td>
                        <td>
                            <button class="btn btn-danger" :to="{name: 'editEmployee'}">Edit</button>
                            <button class="btn btn-danger" v-on:click="deleteEmployee(employee.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row"><span>There is no data</span></div>
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
              let uri = 'http://127.0.0.1:8000';
              this.axios.get(uri).then((response) => {
                  this.employeeData = response.data;
                  console.log(response.data);
              });
            },
            deleteEmployee(id)
            {
              let uri = `http://127.0.0.1:8000/employees/${id}`;
              this.items.splice(id, 1);
              this.axios.delete(uri);
            }
        }
    }
</script>
