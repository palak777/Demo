 <template>
  <form v-on:submit.prevent="submit" enctype="multipart/form-data">
    <v-container grid-list-md>
      <v-layout row>
        <center><h2>Login Details</h2></center>
      </v-layout>
      <v-layout row>
        <v-flex xs4>
            <v-subheader >User Name : </v-subheader>
        </v-flex>
        <v-flex xs6>
            <v-text-field v-model="userData.user_name" placeholder="User Name" class="input-group--focused"  v-validate="'required|max:10'" data-vv-name="userName" :error-messages="errors.collect('userName')" counter="10"></v-text-field>
        </v-flex>
      </v-layout>
    
      <v-layout row>
        <v-flex xs4>
            <v-subheader>Password : </v-subheader>
        </v-flex>
        <v-flex xs6>
            <v-text-field v-model="userData.password" placeholder="Password" class="input-group--focused" 
          :type="'password'" v-validate="'required|max:10'" data-vv-name="password" :error-messages="errors.collect('password')"></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout>
        <v-btn type="submit" color="success">submit</v-btn>
     </v-layout>
    </v-container>
      <v-btn  color="primary" dark class="mb-2" :to="{name:'register'}">Sign Up</v-btn>
  </form>
</template>

<script>
  export default {
    data(){
        return{
         
          userData:{
            'user_name':'',
            'password':''
          }
        }
    },
    methods: {
      submit () {
          let uri = 'http://127.0.0.1:8000/user/login';
          this.$validator.validateAll().then(
            (response)=>{
              this.axios.post(uri, this.userData).then(
                (response) => {
                  this.$toasted.success('successfull loggedin', {duration:1000});
                  this.$router.push({name: 'employee'})         
                },
                (error)=>{
                  this.$toasted.error('Somthing goes wrong !',{duration:1000});
                }
              );
            },
            (error)=>{

            }
            );
      }
    }
  }
</script>