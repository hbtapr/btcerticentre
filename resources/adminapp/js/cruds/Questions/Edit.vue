<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.question.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.question,
                      'is-focused': activeField == 'question'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.question.fields.question')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.question"
                      @input="updateQuestion"
                      @focus="focusField('question')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.question_type,
                      'is-focused': activeField == 'question_type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.question.fields.question_type')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.question_type"
                      @input="updateQuestionType"
                      @focus="focusField('question_type')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.difficulty,
                      'is-focused': activeField == 'difficulty'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.question.fields.difficulty')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.difficulty"
                      @input="updateDifficulty"
                      @focus="focusField('difficulty')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.theme.length !== 0,
                      'is-focused': activeField == 'theme'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.question.fields.theme')
                    }}</label>
                    <v-select
                      name="theme"
                      label="micro_theme"
                      :key="'theme-field'"
                      :value="entry.theme"
                      :options="lists.theme"
                      :closeOnSelect="false"
                      multiple
                      @input="updateTheme"
                      @search.focus="focusField('theme')"
                      @search.blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('QuestionsSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('QuestionsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setQuestion',
      'setQuestionType',
      'setDifficulty',
      'setTheme'
    ]),
    updateQuestion(e) {
      this.setQuestion(e.target.value)
    },
    updateQuestionType(e) {
      this.setQuestionType(e.target.value)
    },
    updateDifficulty(e) {
      this.setDifficulty(e.target.value)
    },
    updateTheme(value) {
      this.setTheme(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'questions.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
