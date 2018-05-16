<template>
  <div>
    <h1>Create An Employee</h1>
    <form v-on:submit.prevent="addEmployee">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>First Name:</label>
            <input type="text" class="form-control" v-model="employeeData.first_name" name="firstName" >
            <!-- <span v-show="errors.has('firstName')">First Name is Required</span> -->
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
          <button class="btn btn-primary">Add</button>
        </div>
    </form>
  </div>
</template>
<script>
  export default {
    data(){
        return{
          employeeData:{
            'first_name':'',
            'last_name':'',
            'email':'',
            'mobile_no':''
          }
        }
    },
    methods: {
      onSubmit:function(){
        this.$validator.validateAll().then(()=>
          {
            console.log('form is valid', this.employeeData)
            }).catch(() => {
            console.log('errors exist', this.errors)
            });

          }
      },
      addEmployee(){
       
            let uri = 'http://localhost:8000/employees';
            this.axios.post(uri, this.employeeData).then((response) => {
            this.$router.push({name: 'Employee'})
        });
      }
  
}
</script>
