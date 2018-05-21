import * as types from '../mutation-types'

const state={
	'employeeDetails':[]
}
const actions={
	SetData({commit}){
		 this.axios.get('http://127.0.0.1:8000/employees').then(
			(response)=>{
				console.log("test");
				commit(types.SET_DATA,response.data)
			},
			(error)=>{
				console.log("error");
			}
		)
	}
}

const mutations={
	[types.SET_DATA](state,employeeData){
		console.log('test');
		state.employeeDetails=employeeData;
	}
}

export default{
	state,
	actions,
	mutations
}
