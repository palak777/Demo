<template>
    <div>
        <h1>Employee Data</h1>
        <div class="row">
            <div class="col-md-10"></div>
        </div>
        <br />
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email Id</td>
                    <td>Gender</td>
                    <td>Address</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="employee in employeeData">
                    <td>{{ employee.id }}</td>
                    <td>{{ employee.full_name }}</td>
                    <td>{{ employee.address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>

    export default {
        data(){
            return{
                employeeData: []
            }
        },

        created: function()
        {
            this.fetchItems();
        },

        methods: {
            fetchItems()
            {
              let uri = 'http://localhost:8000/employees';
              this.axios.get(uri).then((response) => {
                  this.employeeData = response.data;
              });
            }
        }
    }
</script>