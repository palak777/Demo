 <template>
  <form v-on:submit.prevent="submit" enctype="multipart/form-data">
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
            <v-text-field v-model="employeeData.mobile_no" class="input-group--focused" counter="10" v-validate="'required|numeric'" data-vv-name="mobileNo" :error-messages="errors.collect('mobileNo')"></v-text-field>
        </v-flex>
      </v-layout>
    <!--   <v-layout row>
        <v-flex xs4>
            <v-subheader>Hobbies : </v-subheader>
        </v-flex>
        <v-flex xs6>
            <v-checkbox v-model="employeeData.hobbies">Music</v-checkbox>
        </v-flex>
      </v-layout>
 -->      
    <!--   <v-layout>
          <v-flex xs4>
            <v-subheader>Picture : </v-subheader>
          </v-flex>
        <v-flex xs6 class="text-xs-center text-sm-center text-md-center text-lg-center">
          <img :src="imageUrl" height="30" v-if="imageUrl"/>
          <v-text-field label="Select Image" @click='pickFile' v-model='employeeData.pic'></v-text-field>
          <input
            type="file"
            style="display: none"
            ref="image"
            accept="image/*"
            @change="onFilePicked"
          >
        </v-flex>
       </v-layout> -->
      <v-layout>
        <v-btn type="submit" color="success">submit</v-btn>
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
          dialog: false,
          imageUrl: '',
          imageFile: '',
          employeeData:{
            'first_name':'',
            'last_name':'',
            'gender':'',
            'email':'',
            'password':'',
            'mobile_no':'',
            'pic':'',
            'hobbies':[]
          }
        }
    },
    methods: {
      submit () {
          let uri = 'http://127.0.0.1:8000/employees';
          this.$validator.validateAll().then(
            (response)=>{
              this.axios.post(uri, this.employeeData).then(
                (response) => {
                  this.$toasted.success('Employee Details have been saved', { icon : 'check'});
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
      },
      clear () {        
        this.$validator.reset()
      },
      pickFile () {
        this.$refs.image.click () 
      },
      onFilePicked (e) {
        const files = e.target.files
        if(files[0] !== undefined) {
          this.employeeData.pic = files[0].name
          if(this.employeeData.pic.lastIndexOf('.') <= 0) {
             return
          }
          const fr = new FileReader ()
          fr.readAsDataURL(files[0])
          fr.addEventListener('load', () => {
            this.imageUrl = fr.result
            this.imageFile = files[0] // this is an image file that can be sent to server...
          })
        } else {
          this.employeeData.pic = ''
          this.imageFile = ''
          this.imageUrl = ''
        }
      }
    }
  }
</script>