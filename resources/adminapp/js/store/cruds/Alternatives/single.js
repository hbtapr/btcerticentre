function initialState() {
  return {
    entry: {
      id: null,
      questions: [],
      theme: [],
      alt_1: '',
      alt_2: '',
      alt_3: '',
      alt_4: '',
      alt_5: '',
      right_alternative: '',
      type_id: null,
      difficulty_id: null,
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      questions: [],
      theme: [],
      type: [],
      difficulty: []
    },
    loading: false
  }
}

const route = 'alternatives'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setQuestions({ commit }, value) {
    commit('setQuestions', value)
  },
  setTheme({ commit }, value) {
    commit('setTheme', value)
  },
  setAlt1({ commit }, value) {
    commit('setAlt1', value)
  },
  setAlt2({ commit }, value) {
    commit('setAlt2', value)
  },
  setAlt3({ commit }, value) {
    commit('setAlt3', value)
  },
  setAlt4({ commit }, value) {
    commit('setAlt4', value)
  },
  setAlt5({ commit }, value) {
    commit('setAlt5', value)
  },
  setRightAlternative({ commit }, value) {
    commit('setRightAlternative', value)
  },
  setType({ commit }, value) {
    commit('setType', value)
  },
  setDifficulty({ commit }, value) {
    commit('setDifficulty', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setQuestions(state, value) {
    state.entry.questions = value
  },
  setTheme(state, value) {
    state.entry.theme = value
  },
  setAlt1(state, value) {
    state.entry.alt_1 = value
  },
  setAlt2(state, value) {
    state.entry.alt_2 = value
  },
  setAlt3(state, value) {
    state.entry.alt_3 = value
  },
  setAlt4(state, value) {
    state.entry.alt_4 = value
  },
  setAlt5(state, value) {
    state.entry.alt_5 = value
  },
  setRightAlternative(state, value) {
    state.entry.right_alternative = value
  },
  setType(state, value) {
    state.entry.type_id = value
  },
  setDifficulty(state, value) {
    state.entry.difficulty_id = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
