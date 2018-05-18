 <template>
  <form v-on:submit.prevent="submit">
    <v-container grid-list-md>
      <v-layout row>
        <v-flex xs4>
            <v-subheader >First Name : </v-subheader>
        </v-flex>
        <v-flex xs6>
            <v-text-field v-model="employeeData.first_name" placeholder="First Name" class="input-group--focused"  v-validate="'required|max:10'" data-vv-name="firstName" :error-messages="errors.collect('firstName')" counter="10"></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout row>
        <v-flex xs4>
            <v-subheader>Last Name : </v-subheader>
        </v-flex>
        <v-flex xs6>
            <v-text-field v-model="employeeData.last_name" placeholder="Last Name" class="input-group--focused"  v-validate="'required|max:10'" data-vv-name="lastName" :error-messages="errors.collect('lastName')" counter="10"></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout row>
        <v-flex xs4>
          <v-subheader>Gender : </v-subheader>
        </v-flex>
        <v-flex xs6>
          <v-radio-group v-model="employeeData.gender"  data-vv-name="gender">
            <v-radio label="Male" value="male"></v-radio>
            <v-radio label="Female" value="female"></v-radio>
          </v-radio-group>
        </v-flex>
      </v-layout>
      <!-- <v-layout row>
        <v-flex xs4>
          <v-subheader>Birthdate : </v-subheader>
        </v-flex>
        <v-flex xs6>
          <v-menu
          ref="menu"
          :close-on-content-click="false"
          v-model="menu"
          :nudge-right="40"
          :return-value.sync="date"
          lazy
          transition="scale-transition"
          offset-y
          full-width
          max-width="290px" min-width="290px">
            <v-text-field slot="activator" v-model="date" label="Birthdate" prepend-icon="event" readonly></v-text-field>
            <v-date-picker :show-current="true" class="input-group--focused"></v-date-picker>
          </v-menu>
        </v-flex>
      </v-layout>
      <v-layout row>
        <v-flex xs4>
          <v-subheader>City : </v-subheader>
        </v-flex>
        <v-flex xs6>
          <v-select  :items="citiesList">
          </v-select>
        </v-flex>
      </v-layout>
 -->  
     <v-layout row>
        <v-flex xs4>
            <v-subheader>Email : </v-subheader>
        </v-flex>
        <v-flex xs6>
            <v-text-field v-model="employeeData.email" placeholder="Email Address" class="input-group--focused"  v-validate="'required|email'" data-vv-name="emailId" :error-messages="errors.collect('emailId')"></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout row>
        <v-flex xs4>
            <v-subheader>Password : </v-subheader>
        </v-flex>
        <v-flex xs6>
            <v-text-field v-model="employeeData.password" placeholder="Password" class="input-group--focused" 
          :type="'password'" v-validate="'required|max:10'" data-vv-name="password" :error-messages="errors.collect('password')"></v-text-field>
        </v-flex>
      </v-layout>
      <v-layout row>
        <v-flex xs4>
            <v-subheader>Mobile No : </v-subheader>
        </v-flex>
        <v-flex xs6>
            <v-text-field v-model="employeeData.mobile_no" class="input-group--focused" counter="10" v-validate="'required'" data-vv-name="mobileNo" :error-messages="errors.collect('mobileNo')"></v-text-field>
        </v-flex>
      </v-layout>
    <!--   <v-layout row>
        <v-flex xs4>
            <v-subheader>Hobbies : </v-subheader>
        </v-flex>
        <v-flex xs6>
            <v-checkbox>
              
            </v-checkbox>
        </v-flex>
      </v-layout>
 -->      
      <v-layout>
        <v-btn type="submit">submit</v-btn>
        <v-btn color="error" @click="clear">clear</v-btn>
      </v-layout>
    </v-container>
  </form>
</template>

<script>
  export default {
    data(){
        return{
          // date: null,
          // menu: false,
          // modal: false,
          // citiesList:[
          //             {text:'city1'},
          //             {text:'city2'},
          //             {text:'city3'},
          //             {text:'city4'}],
          employeeData:{
            'first_name':'',
            'last_name':'',
            'gender':'',
            'email':'',
            'password':'',
            'mobile_no':'',
            'hobbies':['music','craft','sports']
          }
        }
    },
    methods: {
      submit () {
        this.$validator.validateAll()
        let uri = 'http://127.0.0.1:8000/employees';
              this.axios.post(uri, this.employeeData).then((response) => {
              this.$router.push({name: 'employee'})         
              });
      },
      clear () {        
        this.$validator.reset()
      },
      addEmployee(){
            //console.log(this.$validator.validateAll());

      }
    }
  }
</script>