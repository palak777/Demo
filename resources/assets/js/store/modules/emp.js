import * as types from '../mutation-types'

const state={
	'details':[]
}

const actions={
	getData({commit}){
		this.axios.get("http://127.0.0.1:8000/employees").then(
			(response)=>{
				console.log("test");
				commit(types.GET_DATA,response.data)
			}
		)
	}
}
const mutations={
	[types.GET_DATA](state,details){
		console.log("test",state);
		state.details=details;
	}
}


export default{
	state,
	actions,
	mutations
}
