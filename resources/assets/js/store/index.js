import Vue from 'vue'
import Vuex from 'vuex'

import * as actions from './actions'
import * as getters from './getters'
import * as types from './mutation-types'

//import Employee from './modules/employee'
import Emp from './modules/emp'

Vue.use(Vuex)

const state = {
}

const mutations = {
}

export default new Vuex.Store({
  state,
  actions,
  mutations,
  getters,
  modules: {
  //	Employee,
  	Emp
  }
})

