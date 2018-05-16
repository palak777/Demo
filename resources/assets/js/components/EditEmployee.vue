<template>
  <div>
    <h1>Update An Employee</h1>
    <form v-on:submit.prevent="updateEmployee">
    <div class="form-group">
      <label for="formName">Full Name:</label>
      <input type="text" name="name" class="form-control" id="formName" v-model="employeeData.first_name" v-validate="'required'"> 
      <span v-show="errors.has('name')" class="text-danger">{{ errors.first('name') }}</span>
    </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>First Name:</label>
            <input type="text" class="form-control" v-model="employeeData.first_name" v-validate="'required'" name="firstName" >
            <span v-show="errors.has('firstName')">First Name is Required</span>
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Last Name:</label>
            <input type="text" class="form-control" v-model="employeeData.last_name">
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Email:</label>
            <input type="text" class="form-control" v-model="employeeData.email">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Password:</label>
              <input type="password" class="form-control col-md-6" v-model="employeeData.password" />
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Mobile No:</label>
            <input type="text" class="form-control" v-model="employeeData.mobile_no">
          </div>
        </div>
        </div>
        <br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>

    export default{
        data(){
            return{
                employeeData:{}
            }
        },

        created: function(){
            this.getItem();
        },

        methods: {
            getEmployee()
            {
              let uri = `http://localhost:8000/employees/${this.$route.params.id}/edit`;
                this.axios.get(uri).then((response) => {
                    this.employeeData = response.data;
                });
            },

            updateEmployee()
            {
              let uri = 'http://localhost:8000/employees/'+this.$route.params.id;
                this.axios.patch(uri, this.employeeData).then((response) => {
                  this.$router.push({name: 'employee'});
                });
            }
        }
    }
</script>
